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
    Route::get('hotels', function() {
        return view('admin.hotels');
    })->name('hotels');

    Route::get('admin/reservations', [ReservationController::class, 'index'])->name('reservations');

    Route::get('rooms', function() {
        return view('admin.rooms');
    })->name('rooms');
});

