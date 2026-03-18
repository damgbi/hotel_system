<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Http\Request;

class ReservationController extends Controller
{   
    public function index()
    {
        $reservations = \App\Models\Reservation::all();

        return response()->json([
            'data' => $reservations,
            'status' => 200
        ]);
    }

    public function store(Request $request)
    {   
        
        $validated = $request->validate([
            'external_id' => 'required',
            'hotel_id' => 'required|exists:hotels,id',
            'room_id' => 'required|exists:rooms,id',
            'customer_first_name' => 'required|string',
            'customer_last_name' => 'required|string',
            'arrival_date' => 'required|date',
            'departure_date' => 'required|date|after:arrival_date',
            'total_price' => 'required|numeric'
        ]);

        $reservation = \App\Models\Reservation::create($validated);

        return response()->json([
            'message' => 'Reserva criada com sucesso',
            'data' => $reservation
        ], 201);
    }
}
