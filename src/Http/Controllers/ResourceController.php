<?php

namespace Webmkr\Hub\Http\Controllers;

use App\Permission;
use App\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResourceController extends Controller
{

    public function permissions(Role $role)
    {
        $permissions = $role->permissions()->orderBy('name', 'ASC')->get();
        return response()->json($permissions, 200);
    }

}