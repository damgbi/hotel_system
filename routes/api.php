<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ReservationController;

Route::apiResource('rooms', RoomController::class);
Route::apiResource('reservations', ReservationController::class);