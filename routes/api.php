<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;

Route::apiResource('rooms', RoomController::class);