<?php

use Illuminate\Support\Facades\Route;

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

    Route::get('reservations', function() {
        return view('admin.reservations');
    })->name('reservations');

    Route::get('rooms', function() {
        return view('admin.rooms');
    })->name('rooms');
});

