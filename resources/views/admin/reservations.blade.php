@extends('admin.layout')

@section('title', 'Reservations')

@section('content')
<h1>Reservas</h1>
<div class="row container">

@foreach ($reservations as $reservation)
    <div class="col s12 m3">
            <div class="card-content">
            <span class="card-title">{{ $reservation->hotel->name}}</span>
            <p>{{ $reservation->customer_first_name }} {{ $reservation->customer_last_name }}</p>
            <p>Quarto: {{ $reservation->room_number }}</p>
            <p> check-in: {{ $reservation->arrival_date }} check-out: {{ $reservation->departure_date }}</p>
            </div>
    </div>

@endforeach
</div> 

@endsection