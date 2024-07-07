<?php

use Illuminate\Support\Facades\Route;
use MobarokLab\SupportTickety\Http\Controllers\SupportTicketController;
use MobarokLab\SupportTickety\Http\Controllers\SupportCategoryController;

Route::middleware(['auth'])->group(function () {

    Route::resource('support-categories', SupportCategoryController::class);
    Route::resource('tickets', SupportTicketController::class);

});
