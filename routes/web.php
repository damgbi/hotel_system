<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('site.home');
});

Route::get('/login', function () {
    return view('site.home');
})->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::group(['prefix' => 'admin'] , function () {
    Route::get('/hoteis', [HotelController::class, 'index'])->name('admin.hoteis');
    Route::get('/reservas', [ReservationController::class, 'index'])->name('admin.reservas');
    Route::get('/quartos', [RoomController::class, 'index'])->name('admin.quartos');    
});

Route::get('/hotels/{id}', [HotelController::class, 'details'])->name('admin.hotelDetails');


