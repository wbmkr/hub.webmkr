<?php

namespace Webmkr\Hub\Http\Controllers;

use App\Permission;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index(Request $request)
    {
        $permissions = Permission::orderBy('name', 'ASC')->paginate(50);
        
        if ($request->get('query')) {
          $permissions = $this->getSearch($request);
        }
        
        return view('hub::admin.settings.permissions.index', compact('permissions'));
    }

    public function create(Request $request)
    {
        $admin = $request->user();

        if ($admin->can('criar-permissao')) {
            $permission = new Permission;
            return view('hub::admin.settings.permissions.create', compact('permission'));
        }
        
        return redirect()->route('admin.dashboard');
    }

    public function store(Request $request)
    {
        $validate = $request->validate(Permission::$rules);

        $permission = new Permission($request->all());
        $permission->setAttributes($request);

        if ($permission->save()) {
            session()->flash('success', __('message.common.alert.success.create'));
            return redirect()->route('admin.settings.permissions.index');
        }

        return redirect()->back()->with('error', __('message.common.alert.error.create'));
    }

    public function edit(Request $request, $slug)
    {
        $admin = $request->user();

        if ($admin->can('editar-permissao')) {
            $permission = Permission::slug($slug)->first();
            return view('hub::admin.settings.permissions.edit', compact('permission'));
        }
        
        return redirect()->route('admin.dashboard');
    }

    public function update(Request $request, $slug)
    {
        $validate = $request->validate(Permission::$rules);

        $permission = Permission::slug($slug)->first();
        $permission->fill($request->all());
        $permission->setAttributes($request);

        if ($permission->save()) {
            session()->flash('info', __('message.common.alert.success.edit'));
            return redirect()->route('admin.settings.permissions.index');
        }

        return redirect()->back()->with('error', __('message.common.alert.error.edit'));
    }

    public function delete(Request $request, $slug)
    {
        $admin = $request->user();

        if ($admin->can('deletar-permissao')) {
            $permission = Permission::slug($slug)->first();

            if ($permission->delete()) {
                session()->flash('info', __('message.common.alert.success.delete'));
                return redirect()->route('admin.settings.permissions.index');
            }

            return redirect()->back()->with('error', __('message.common.alert.error.delete'));
        }
        
        return redirect()->route('admin.dashboard');
    }

    # PROTECTED
    protected function getSearch($request)
    {
        $permissions = (new Permission)->newQuery();

        $permissions->where('name', 'like', '%'.$request->get('query').'%');
        
        $permissions = $permissions->orderBy('name', 'ASC')->paginate(50);

        return $permissions;
    }
}