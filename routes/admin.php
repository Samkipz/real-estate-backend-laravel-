<?php

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix'     => 'admin',
    'middleware' => ['auth:api'],
], function () {
    Route::resource('permission', 'PermissionController');
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
});
