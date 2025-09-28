<?php

use App\Http\Controllers\Admin\PruebaController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PermissionController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Contracts\Role;

Route::get('/', function () {
    return view('admin.dashboard');
})
->middleware('can:manage_dashboard')
->name('dashboard')
;

Route::resource('users', UserController::class)
->middleware('can:manage_users');

Route::resource('roles', RoleController::class)
->middleware('can:manage_roles');

Route::resource('permissions', PermissionController::class)
->middleware('can:manage_permissions');

