<?php

use App\Http\Controllers\ControlVehicular\TicketController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('controlVehicular.dashboard');
})->name('dashboard');

Route::get('ticket', [TicketController::class,'index'])->name('ticket.index')
->middleware('can:manage_tickets');
