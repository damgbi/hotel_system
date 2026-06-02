@extends('admin.layout')

@section('conteudo')
<h1>Hotels</h1>
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Hotel;

class HotelController extends Controller
{
    public function index() {
        $hotels = Hotel::all();
        return view('admin/hotels', ['hotels' => $hotels]);
    }
}
?>
@endsection
