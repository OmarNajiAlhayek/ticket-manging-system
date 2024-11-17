<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TicketController;
use App\Http\Controllers\Api\TicketFileController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('/tickets', TicketController::class);

Route::get('/ticket-file', [TicketFileController::class, 'index'])
     ->name('ticket-file.index');

Route::post('/ticket-file/{ticket}', [TicketFileController::class, 'store'])
     ->name('ticket-file.store');

Route::get('/ticket-file/{ticket}', [TicketFileController::class, 'showAllTicketFiles']);


Route::delete('/ticket-files/{ticketFile}', [TicketFileController::class, 'destroy'])
     ->name('ticket-files.destroy');

