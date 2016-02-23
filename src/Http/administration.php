<?php

/*
|--------------------------------------------------------------------------
| Administration Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the administration routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['web']], function () {
    // The administration setup group.
    Route::group(['prefix' => 'setup', 'as' => 'setup.', 'middleware' => ['admin.setup']], function () {
        // The administration begin setup route.
        Route::get('/', [
            'as' => 'welcome',
            'uses' => 'SetupController@welcome',
        ]);

        Route::get('begin', [
            'as' => 'begin',
            'uses' => 'SetupController@begin',
        ]);

        // The administration finish setup route.
        Route::post('finish', [
            'as' => 'finish',
            'uses' => 'SetupController@finish',
        ]);
    });

    // The users resource.
    Route::resource('users', 'UserController');

    // The roles resource.
    Route::resource('roles', 'RoleController');

    // The permissions resource.
    Route::resource('permissions', 'PermissionController');

    // Administration login view.
    Route::get('auth/login', [
        'as'    => 'auth.login',
        'uses'  => 'AuthController@getLogin'
    ]);

    // Administration post login view.
    Route::post('auth/login', [
        'as'    => 'auth.login',
        'uses'  => 'AuthController@postLogin',
    ]);

    // Administration logout.
    Route::get('auth/logout', [
        'as'    => 'auth.logout',
        'uses'  => 'AuthController@getLogout',
    ]);
});
