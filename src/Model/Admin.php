<?php

namespace App;

use App\Notifications\Admin\ResetPasswordNotification;
use App\Notifications\Admin\WelcomeNotification;
use App\Traits\HasPermissionTrait;
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

    # RELATIONSHIPS

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
}