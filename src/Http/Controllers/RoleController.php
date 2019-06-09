<?php

namespace Webmkr\Hub\Http\Controllers;

use App\Role;
use App\Permission;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        $roles = Role::orderBy('name', 'ASC')->paginate(50);

        if ($request->get('query')) {
          $roles = $this->getSearch($request);
        }
        
        return view('hub::admin.settings.roles.index', compact('roles'));
    }

    public function create()
    {
        $role = new Role;
        $permissions = $this->getPermissions();
        return view('hub::admin.settings.roles.create', compact('role', 'permissions'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate(Role::$rules);

        $permissions = [];
        foreach ($request->role['permission'] as $permission) {
            $permissions[] = $permission;
        }
        
        $role = new Role($request->all());
        $role->setAttributes($request);

        if ($role->save()) {
            $role->permissions()->attach($permissions);
            session()->flash('success', __('message.common.alert.success.create'));
            return redirect()->route('admin.settings.roles.index');
        }

        return redirect()->back()->with('error', __('message.common.alert.error.create'));
    }

    public function edit($slug)
    {
        $role = Role::slug($slug)->first();
        $permissions = $this->getPermissions();
        return view('hub::admin.settings.roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, $slug)
    {
        $validate = $request->validate(Role::$rules);

        $permissions = [];
        foreach ($request->role['permission'] as $permission) {
            $permissions[] = $permission;
        }
        
        $role = Role::slug($slug)->first();
        $role->fill($request->all());
        $role->setAttributes($request);

        if ($role->save()) {
            $role->permissions()->sync($permissions);
            session()->flash('success', __('message.common.alert.success.edit'));
            return redirect()->route('admin.settings.roles.index');
        }

        return redirect()->back()->with('error', __('message.common.alert.error.edit'));
    }

    public function delete($slug)
    {
        $role = Role::slug($slug)->first();

        if ($role->delete()) {
            session()->flash('info', __('message.common.alert.success.delete'));
            return redirect()->route('admin.settings.roles.index');
        }

        return redirect()->back()->with('error', __('message.common.alert.error.delete'));
    }

    # PROTECTED
    protected function getSearch($request)
    {
        $roles = (new Role)->newQuery();
        $roles->where('name', 'like', '%'.$request->get('query').'%');
        $roles = $roles->orderBy('name', 'ASC')->paginate(50);

        return $roles;
    }

    protected function getPermissions()
    {
        $permissions = Permission::orderBy('name', 'ASC')->pluck('name', 'id');
        return $permissions;
    }
}