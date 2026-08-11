<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ReservationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

Route::apiResource('rooms', RoomController::class);
Route::apiResource('reservations', ReservationController::class);

Route::post('/tokens/create', function (Request $request) {

    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'token_name' => 'required|string',
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        return response() -> json(['message' => 'Credenciais inválidas'], 401);
    }
    $token = $user->createToken($request->token_name)->plainTextToken;
 
    return response()->json (['token' => $token]);
});