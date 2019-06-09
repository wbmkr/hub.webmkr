<?php

namespace App;

use App\Permission;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes, Sluggable;

    protected $fillable = [
        'name'
    ];

    # RULES
    public static $rules = [
        'name'              => 'required',
        'role.permission'   => 'required|min:1'
    ];

    # RELATIONSHIPS
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    # ATTRIBUTES
    public function setAttributes($request)
    {}

    # SHORTCUTS
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    # SCOPES
    public function scopeSlug($query, $slug)
    {
        return $query->where('slug', $slug);
    }
}