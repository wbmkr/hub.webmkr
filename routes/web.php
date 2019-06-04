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
    });
});