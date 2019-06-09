<?php

namespace App;

use App\Notifications\Admin\ResetPasswordNotification;
use App\Notifications\Admin\WelcomeNotification;
use App\Traits\HasPermissionTrait;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Image;
use Storage;

class Admin extends Authenticatable
{
    use HasPermissionTrait, Notifiable, SoftDeletes, Sluggable;

    protected $fillable = [
        'name', 'avatar', 'birthdate', 'email', 'active'
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];

    public static function boot()
    {
        parent::boot();

        self::created(function($self){
            $self->sendWelcomeNotification();
        });
    }

    # RULES
    public static $loginRules = [
        'email'     => 'required|email|exists:admins,email',
        'password'  => 'required|min:6'
    ];

    public static $rules = [
        'name'              => 'required',
        'email'             => 'required|email|unique:admins,email',
        'role'              => 'required',
        'admin.permission'  => 'required|min:1'
    ];

    public static $updateRules = [
        'name'              => 'required',
        'email'             => 'required|email',
        'role'              => 'required',
        'admin.permission'  => 'required|min:1'
    ];

    # RELATIONSHIPS

    # ATTRIBUTES
    public function setAttributes($request)
    {
        $this->active = $request->active ? true : false;

        if ($request->password !== null) {
            $this->password = bcrypt($request->password);
        }

        if ($request->avatar !== null) {
            $this->storeImage($request->file('avatar'));
        }

        if ($request->birthdate !== null) {
            $this->birthdate = Carbon::createFromFormat('d/m/Y', $request->birthdate);
        }
    }

    public function setTrackable($request)
    {
        $this->signin_count = $this->signin_count+1;
        $this->last_signin_ip = $this->current_signin_ip;
        $this->last_signin_at = $this->current_signin_at;
        $this->current_signin_ip = $request->ip();
        $this->current_signin_at = Carbon::now();
    }

    # SHORTCUTS
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function sendWelcomeNotification()
    {
        $data['name'] = $this->name;
        $data['token'] = app('auth.password.broker')->createToken($this);

        $this->notify(new WelcomeNotification($data));
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function profile()
    {
        return $this->avatar ? $this->avatar : 'https://api.adorable.io/avatars/280/'.$this->slug.'@adorable.png';
    }

    public function storeImage($image)
    {
        $file = Image::make($image);
        $resize = $file->resize(280, null, function($constraint){
            $constraint->aspectRatio();
        });

        $directory = '/Hub/uploads/admin/'.$this->slug.'/';
        $cloudinary = Storage::disk('cloudinary');
        $cloudinary->put($directory.$this->slug.'-cover', $resize->encode());

        $this->avatar = env('CLOUDINARY_BASE_URL').'/uploads/admin/'.$this->slug.'/'.$this->slug.'-cover'.'.'.$image->getClientOriginalExtension();
    }

    public function birthdateForHuman()
    {
        return Carbon::parse($this->birthdate)->format('d/m/Y');
    }

    # SCOPES
    public function scopeSlug($query, $slug)
    {
        return $query->where('slug', $slug);
    }
}