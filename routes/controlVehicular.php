<?php

use App\Http\Controllers\ControlVehicular\TicketController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('controlVehicular.dashboard');
})->name('dashboard');

Route::get('ticket', [TicketController::class, 'index'])
    ->name('ticket.index')  // Se convierte en: controlVehicular.ticket.index
    ->middleware('can:manage_tickets');

Route::post('ticket/store', [TicketController::class, 'store'])
    ->name('ticket.store')  // Se convierte en: controlVehicular.ticket.store
    ->middleware('can:manage_tickets');
