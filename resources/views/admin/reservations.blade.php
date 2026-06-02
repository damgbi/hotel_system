@extends('admin.layout')

@section('title', 'Reservations')

@section('conteudo')
<h1>Reservations</h1>

<?php 
use Illuminate\Http\Request;
use App\Models\Reservations;

foreach ($reservations as $reservation):
    echo $reservation->customer_first_name . " " . $reservation->customer_last_name . " - " . $reservation->room_number;
    echo $reservation->arrival_date . " to " . $reservation->departure_date;
endforeach; 
?>
@endsection