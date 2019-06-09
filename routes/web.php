<?php

Route::prefix('admin')->middleware('web')->name('admin.')->group(function(){
    # AUTHENTICATION ROUTES
    Route::name('auth.')->group(function(){
        Route::get('login', 'Webmkr\Hub\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
        Route::post('login', 'Webmkr\Hub\Http\Controllers\Auth\LoginController@login');
        Route::get('sair', 'Webmkr\Hub\Http\Controllers\Auth\LoginController@logout')->name('logout');

        Route::name('password.')->group(function(){
            Route::get('esqueci-minha-senha', 'Webmkr\Hub\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm')->name('request');
            Route::post('esqueci-minha-senha', 'Webmkr\Hub\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail')->name('email');
            Route::get('redefinir-senha/{token}', 'Webmkr\Hub\Http\Controllers\Auth\ResetPasswordController@showResetForm')->name('reset');
            Route::post('redefinir-senha', 'Webmkr\Hub\Http\Controllers\Auth\ResetPasswordController@reset')->name('update');
        });
    });
    
    # PROTECTED ROUTES
    Route::middleware('auth:admin')->group(function(){
        Route::get('/', 'Webmkr\Hub\Http\Controllers\DashboardController@index')->name('dashboard');
        Route::get('editar-perfil', 'Webmkr\Hub\Http\Controllers\AdminController@me')->name('account');
        Route::post('editar-perfil', 'Webmkr\Hub\Http\Controllers\AdminController@updateMe');
        
        Route::prefix('configuracoes')->name('settings.')->group(function(){
            Route::prefix('permissoes')->name('permissions.')->group(function(){
                Route::get('/', 'Webmkr\Hub\Http\Controllers\PermissionController@index')->name('index');
                Route::get('nova', 'Webmkr\Hub\Http\Controllers\PermissionController@create')->name('create');
                Route::post('nova', 'Webmkr\Hub\Http\Controllers\PermissionController@store');
                Route::get('{slug}/editar', 'Webmkr\Hub\Http\Controllers\PermissionController@edit')->name('edit');
                Route::post('{slug}/editar', 'Webmkr\Hub\Http\Controllers\PermissionController@update');
                Route::get('{slug}/deletar', 'Webmkr\Hub\Http\Controllers\PermissionController@delete')->name('delete');
            });

            Route::prefix('cargos')->name('roles.')->group(function(){
                Route::get('/', 'Webmkr\Hub\Http\Controllers\RoleController@index')->name('index');
                Route::get('novo', 'Webmkr\Hub\Http\Controllers\RoleController@create')->name('create');
                Route::post('novo', 'Webmkr\Hub\Http\Controllers\RoleController@store');
                Route::get('{slug}/editar', 'Webmkr\Hub\Http\Controllers\RoleController@edit')->name('edit');
                Route::post('{slug}/editar', 'Webmkr\Hub\Http\Controllers\RoleController@update');
                Route::get('{slug}/deletar', 'Webmkr\Hub\Http\Controllers\RoleController@delete')->name('delete');
            });

            Route::prefix('administradores')->name('admins.')->group(function(){
                Route::get('/', 'Webmkr\Hub\Http\Controllers\AdminController@index')->name('index');
                Route::get('novo', 'Webmkr\Hub\Http\Controllers\AdminController@create')->name('create');
                Route::post('novo', 'Webmkr\Hub\Http\Controllers\AdminController@store');
                Route::get('{slug}/editar', 'Webmkr\Hub\Http\Controllers\AdminController@edit')->name('edit');
                Route::post('{slug}/editar', 'Webmkr\Hub\Http\Controllers\AdminController@update');
                Route::get('{slug}/deletar', 'Webmkr\Hub\Http\Controllers\AdminController@delete')->name('delete');
            });
        });
        
    });

    # RESOURCES
    Route::prefix('resources')->group(function(){
        Route::prefix('permissions')->group(function(){
            Route::get('{role}', 'Webmkr\Hub\Http\Controllers\ResourceController@permissions');
        });
    });
});