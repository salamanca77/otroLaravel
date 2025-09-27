<?php

use App\Http\Controllers\Admin\PruebaController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Contracts\Role;

Route::get('/', function () {
    return view('admin.dashboard');
})->name('dashboard');

Route::resource('users', UserController::class);
Route::resource('roles', RoleController::class);

