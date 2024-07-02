<?php

use YourName\LaravelTicket\Http\Controllers\TicketController;

Route::middleware(['web'])->group(function () {
    Route::get('/tickets/create', [TicketController::class, 'create'])->name('tickets.create');
    Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store');
});
