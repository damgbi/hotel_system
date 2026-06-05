<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoomController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
], function() {
    Route::get('hotels', [HotelController::class, 'index'])->name('hotels');

    Route::get('reservations', [ReservationController::class, 'index'])->name('reservations');

    Route::get('rooms', [RoomController::class, 'index'])->name('rooms');
});

