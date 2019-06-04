<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Webmkr\Hub\Role;

class Permission extends Model
{
    use SoftDeletes, Sluggable;

    protected $fillable = [
        'name'
    ];

    # RULES

    # RELATIONSHIPS
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}