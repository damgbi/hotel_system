<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $rooms = Room::all();

        return response()->json(['data' => $rooms, 'status' => 200]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $room = Room::create($request->all());

        return response()->json([
            'message' => 'Quarto criado com sucesso!',
            'data' => $room
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $room = Room::find($id);

        if (!$room) {
            return response()->json(['error' => 'Quarto não encontrado'], 404);
        }

        return response()->json(['data' => $room, 'status' => 200]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $room = Room::find($id);

        if (!$room) {
            return response()->json(['error' => 'Quarto não encontrado'], 404);
        }

        $room->update($request->all());

        return response()->json([
            'message' => 'Quarto atualizado',
            'data' => $room
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $room = Room::find($id);

        if (!$room) {
            return response()->json(['error' => 'Quarto não encontrado'], 404);
        }

        $room->delete();

        return response()->json(['message' => 'Quarto excluido'], 200);
    }
}
