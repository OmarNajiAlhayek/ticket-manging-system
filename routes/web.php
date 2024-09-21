<?php

use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

Route::view('/',  'home')->name('home');
Route::view('/contact', 'contact');

Route::resource('/tickets', TicketController::class);

Route::patch('/update-status/{newStatus}/{ticket}', [TicketController::class, 'updateStatus'])
     ->name('tickets.update-status');

