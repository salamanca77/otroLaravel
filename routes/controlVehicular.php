<?php

use App\Http\Controllers\ControlVehicular\TicketController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('controlVehicular.dashboard');
})->name('dashboard');

Route::get('ticket', [TicketController::class, 'index'])
    ->name('ticket.index')  // Se convierte en: controlVehicular.ticket.index
    ->middleware('can:manage_tickets');
    
Route::get('ticket', [TicketController::class, 'index'])
    ->name('ticket.index')  // Se convierte en: controlVehicular.ticket.index
    ->middleware('can:manage_tickets');
    
Route::post('ticket/entrada_store', [TicketController::class, 'entrada_store'])
    ->name('ticket.entrada_store')  // Se convierte en: controlVehicular.ticket.store
    ->middleware('can:manage_tickets');
    
Route::get('ticket/salida', [TicketController::class, 'salida'])
    ->name('ticket.salida')  // Se convierte en: controlVehicular.ticket.index
    ->middleware('can:manage_tickets');

Route::post('ticket/salida_store', [TicketController::class, 'salida_store'])
    ->name('ticket.salida_store')  // Se convierte en: controlVehicular.ticket.store
    ->middleware('can:manage_tickets');
