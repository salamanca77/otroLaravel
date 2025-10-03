<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('control-vehicular/ticket/imprimir/{id}', [ControlVehicularController::class, 'imprimir'])
//     ->name('controlVehicular.ticket.imprimir');
