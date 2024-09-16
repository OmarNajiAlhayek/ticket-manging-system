<?php

//! fix the mobile ancors, and tags ...
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;
use App\Models\Ticket;
//Route::get('/', [TicketController::class, 'index']);

Route::view('/',  'home')->name('home');
Route::view('/contact', 'contact');

Route::resource('/tickets', TicketController::class);

Route::patch('/update-status/{newStatus}/{ticket}', [TicketController::class, 'updateStatus'])
     ->name('tickets.update-status');


// Route::get('/test', function(){
//     return Ticket::all();
// });

// vs code productive.
// vim tow videos














