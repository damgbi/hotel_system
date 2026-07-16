@extends('admin.layout')

@section('title', 'Reservations')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h4 class="indigo-text text-darken-4" style="font-weight: 700; margin-bottom: 5px; display: flex; align-items: center; gap: 10px">
                    <h1>Reservas realizadas:</h1>
                </h4>
                <p class="grey-text text-darken-1" style="font-size: 1.1rem; margin-top: 0;">
                    Gerencie as conexões, quartos e reservas dos hotéis cadastrados no sistema.
                </p>    
            </div>
        </div>
    </div>

<div class="container">
    <div class="row">
        @foreach ($reservations as $reservation)
            <div class="col s12 m10">
                <div class="card white hoverable" style="border-top: 4px solid #1a237e; border-radius: 4px;">
                    <div class="card-content grey-text text-darken-3">
                        <span class="card-title indigo-text text-darken-4" style="font-weight: 600; font-size: 1.3rem;">
                            {{ $reservation->hotel->name}}
                        </span>
                        <p class="grey-text text-darken-1" style="display: flex; align-items: center; gap: 5px; font-size: 0.9rem;">
                            <span style="font-weight: bold;">Cliente:</span>{{ $reservation->customer_first_name }} {{ $reservation->customer_last_name }}
                        </p>
                        <p class="grey-text text-darken-1" style="display: flex; align-items: center; gap: 5px; font-size: 0.9rem;">
                            <span style="font-weight: bold;">Quarto:</span> {{ $reservation->room->name }}
                        </p>
                         <p class="grey-text text-darken-1" style="display: flex; align-items: center; gap: 5px; font-size: 0.9rem;">
                            <span style="font-weight: bold;">Check-in:</span> {{ $reservation->arrival_date }} <span style="font-weight: bold;">Check-out:</span> {{ $reservation->departure_date }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>    
</div>

<div class="row center">
    {{ $reservations->links('custom.pagination') }}
</div>

@endsection