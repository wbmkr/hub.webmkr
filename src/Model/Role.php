<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Webmkr\Hub\Permission;

class Role extends Model
{
    use SoftDeletes, Sluggable;

    protected $fillable = [
        'name'
    ];

    # RULES

    # RELATIONSHIPS
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}