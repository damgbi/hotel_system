<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Hotel;

class HotelController extends Controller
{
    public function index() {
        $hotels = Hotel::all();

        return view('admin.hotels', compact('hotels'));
    }

    public function details($id) {
        $hotel = Hotel::where('id', $id)->first();

        return view('admin.hotelDetails', compact('hotel'));
    }
}
?>
