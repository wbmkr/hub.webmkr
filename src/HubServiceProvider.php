<?php

namespace Webmkr\Hub;

use Illuminate\Support\ServiceProvider;

class HubServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'hub');

        $this->publishes([
            # WEBPACK & RESOURCES
            __DIR__.'/../resources/webpack.mix.js' => base_path('webpack.mix.js'),
            __DIR__.'/../resources/js' => resource_path('js'),
            __DIR__.'/../resources/sass' => resource_path('sass'),
            __DIR__.'/../resources/views' => resource_path('views'),

            # CONFIG
            __DIR__.'/../config/auth.php' => config_path('auth.php'),

            # MIDDLEWARE
            __DIR__.'/Http/Middleware/Authenticate.php' => app_path('Http/Middleware/Authenticate.php'),
        ]);
    }

    public function register()
    {
        $this->app->make('Webmkr\Hub\Http\Controllers\DashboardController');
        $this->app->make('Webmkr\Hub\Http\Controllers\Auth\LoginController');
    }
}