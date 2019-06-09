<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use App\Permission;

class PermissionsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Permission::get()->map(function($permission){
            Gate::define($permission->slug, function($admin) use($permission){
                return $admin->hasPermissionTo($permission);
            });
        });

        Blade::directive('role', function ($role){
            return "<?php if(auth()->check() && auth()->user()->hasRole({ $role })) : ?>";
        });
        
        Blade::directive('endrole', function ($role){
            return "<?php endif; ?>";
        });
    }

    public function register()
    {}
}
