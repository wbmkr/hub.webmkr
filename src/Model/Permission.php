<?php

namespace App;

use App\Role;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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