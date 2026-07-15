@extends('admin.layout')

@section('title', 'Rooms')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h4 class="indigo-text text-darken-4" style="font-weight: 700; margin-bottom: 5px; display: flex; align-items: center; gap: 10px">
                    <h1>Quartos disponíveis:</h1>
                </h4>
                <p class="grey-text text-darken-1" style="font-size: 1.1rem; margin-top: 0;">
                    Gerencie as conexões, quartos e reservas dos hotéis cadastrados no sistema.
                </p>    
            </div>
        </div>
    </div> 

    <div class="container">
        <div class="row">
            @foreach ($rooms as $room)
                <div class="col s12 m10">
                    <div class="card white hoverable" style="border-top: 4px solid #1a237e; border-radius: 4px;">
                        <div class="card-content grey-text text-darken-3">
                            <span class="card-title indigo-text text-darken-4" style="font-weight: 600; font-size: 1.3rem;">
                                {{ $room->name }}
                            </span>
                            <p class="grey-text text-darken-1" style="display: flex; align-items: center; gap: 5px; font-size: 0.9rem;">
                                <span style="font-weight: bold;">Id do quarto:</span> {{ $room->id }}
                            </p>
                            <p class="grey-text text-darken-1" style="display: flex; align-items: center; gap: 5px; font-size: 0.9rem;">
                                <span style="font-weight: bold;">Contagem de inventário:</span> {{ $room->inventory_count }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>    
    </div>

@endsection