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
    public static $rules = [
        'name' => 'required'
    ];

    # RELATIONSHIPS
    public function roles()
    {
        return $this->belongsToMany(Role::class);
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

    # ATTRIBUTES
    public function setAttributes($request)
    {}

    # SCOPES
    public function scopeSlug($query, $slug)
    {
        return $query->where('slug', $slug);
    }
}