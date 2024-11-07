<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ProfileController;

Route::view('/',  'home')->name('home');
Route::view('/contact', 'contact');

Route::resource('tickets', TicketController::class)->only([
    'index', 'show'
]);

Route::middleware(['auth'])->group(function () {
    Route::resource('tickets', TicketController::class)->only([
        'create', 'store', 'update', 'edit', 'destroy'
    ]);

    Route::patch('/update-status/{newStatus}/{ticket}', [TicketController::class, 'updateStatus'])
         ->name('tickets.update-status');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('as-api', fn() => response()->json(['ss'=>'ss'], 400));

require __DIR__.'/auth.php';

