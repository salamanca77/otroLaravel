<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('control_vehicular.dashboard');
})->name('dashboard');
