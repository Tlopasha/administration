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

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    // The users resource.
    Route::resource('users', 'UserController');

    // The roles resource.
    Route::resource('roles', 'RoleController');

    // The permissions resource.
    Route::resource('permissions', 'PermissionController');
});
