<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ImpresionController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/registros/{registro}/marcar-impreso', [ImpresionController::class, 'marcarImpreso'])
     ->middleware('auth:sanctum');
