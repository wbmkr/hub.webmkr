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

class Admin extends Authenticatable
{
    use HasPermissionTrait, Notifiable, SoftDeletes, Sluggable;

    protected $fillable = [
        'name', 'avatar', 'birthdate', 'email', 'password', 'active'
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

    # SCOPES
    public function scopeSlug($query, $slug)
    {
        return $query->where('slug', $slug);
    }
}