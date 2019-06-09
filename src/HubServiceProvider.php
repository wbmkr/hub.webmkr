<?php

namespace Webmkr\Hub;

use Illuminate\Support\ServiceProvider;

class HubServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'hub');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->publishes([
            # WEBPACK & RESOURCES
            __DIR__.'/../resources/webpack.mix.js' => base_path('webpack.mix.js'),
            __DIR__.'/../resources/js' => resource_path('js'),
            __DIR__.'/../resources/sass' => resource_path('sass'),
            __DIR__.'/../resources/views' => resource_path('views'),

            # CONFIG
            __DIR__.'/../config/auth.php' => config_path('auth.php'),
            __DIR__.'/../config/app.php' => config_path('app.php'),
            __DIR__.'/../config/filesystems.php' => config_path('filesystems.php'),
            __DIR__.'/../resources/lang/pt-br' => resource_path('lang/pt-br'),
            __DIR__.'/../database/migrations' => database_path('migrations'),
            __DIR__.'/../database/seeds' => database_path('seeds'),
            __DIR__.'/Traits' => app_path('Traits'),
            __DIR__.'/Exceptions' => app_path('Exceptions'),
            __DIR__.'/Helper' => app_path('Helper'),
            __DIR__.'/Providers' => app_path('Providers'),

            # MIDDLEWARE
            __DIR__.'/Http/Middleware/Authenticate.php' => app_path('Http/Middleware/Authenticate.php'),
            __DIR__.'/Http/Middleware/RoleMiddleware.php' => app_path('Http/Middleware/RoleMiddleware.php'),

            # MODELS
            __DIR__.'/Model' => app_path('/'),

            # NOTIFICATIONS
            __DIR__.'/Notifications' => app_path('Notifications'),
        ]);
    }

    public function register()
    {
        $this->app->make('Webmkr\Hub\Http\Controllers\DashboardController');
        $this->app->make('Webmkr\Hub\Http\Controllers\Auth\LoginController');
        $this->app->make('Webmkr\Hub\Http\Controllers\Auth\ForgotPasswordController');
    }
}