<?php

namespace Webmkr\Hub\Http\Controllers;

use App\Admin;
use App\Permission;
use App\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $admins = Admin::orderBy('name', 'ASC')->paginate(50);
        
        if ($request->get('query')) {
            $admins = $this->getSearch($request);
        }
        
        return view('hub::admin.settings.admins.index', compact('admins'));
    }

    public function create()
    {
        $admin = new Admin;
        $roles = $this->getRoles();
        $permissions = $this->getPermissions();
        return view('hub::admin.settings.admins.create', compact('admin', 'roles', 'permissions'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate(Admin::$rules);
        
        $permissions = [];
        foreach ($request->admin['permission'] as $permission) {
            $permissions[] = $permission;
        }

        $admin = new Admin($request->all());
        $admin->setAttributes($request);

        if ($admin->save()) {
            $admin->roles()->attach($request->role);
            $admin->permissions()->attach($permissions);
            session()->flash('success', __('message.common.alert.success.create'));
            return redirect()->route('admin.settings.admins.index');
        }

        return redirect()->back()->with('error', __('message.common.alert.error.create'));
    }

    public function edit($slug)
    {
        $admin = Admin::slug($slug)->first();
        $roles = $this->getRoles();
        $permissions = $this->getPermissions();
        return view('hub::admin.settings.admins.edit', compact('admin', 'roles', 'permissions'));
    }

    public function update(Request $request, $slug)
    {
        $validate = $request->validate(Admin::$updateRules);

        $permissions = [];
        foreach ($request->admin['permission'] as $permission) {
            $permissions[] = $permission;
        }

        $admin = Admin::slug($slug)->first();
        $admin->fill($request->all());
        $admin->setAttributes($request);

        if ($admin->save()) {
            $admin->roles()->sync($request->role);
            $admin->permissions()->sync($permissions);
            session()->flash('info', __('message.common.alert.success.edit'));
            return redirect()->route('admin.settings.admins.index');
        }

        return redirect()->back()->with('error', __('message.common.alert.error.edit'));
    }

    public function delete($slug)
    {
        $admin = Admin::slug($slug)->first();

        if ($admin->delete()) {
            session()->flash('info', __('message.common.alert.success.delete'));
            return redirect()->route('admin.settings.admins.index');
        }

        return redirect()->back()->with('error', __('message.common.alert.error.delete'));
    }

    public function me(Request $request)
    {
        $admin = $request->user();
        return view('hub::admin.account.edit', compact('admin'));
    }

    public function updateMe(Request $request)
    {
        $admin = $request->user();
        $admin->fill($request->all());
        $admin->setAttributes($request);

        if ($admin->save()) {
            session()->flash('info', __('message.common.alert.success.edit'));
        } else {
            session()->flash('info', __('message.common.alert.error.edit'));
        }

        return redirect()->back();
    }

    # PROTECTED
    protected function getRoles()
    {
        $roles = Role::orderBy('name', 'ASC')->pluck('name', 'id');
        return $roles;
    }

    protected function getPermissions()
    {
        $permissions = Permission::orderBy('name', 'ASC')->pluck('name', 'id');
        return $permissions;
    }

    protected function getSearch($request)
    {
        $admins = (new Admin)->newQuery();
        $admins
            ->where('name', 'like', '%'.$request->get('query').'%')
            ->orWhere('email', 'like', '%'.$request->get('query').'%');
        $admins = $admins->orderBy('name', 'ASC')->paginate(50);

        return $admins;
    }
}