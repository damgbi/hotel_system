@extends('admin.layout')

@section('title', 'hotelDetails')


@section('content')

    <div class="container">
        <div class="row">
            <div class="col s12">
                <h4 class="indigo-text text-darken-4" style="font-weight: 700; margin-bottom: 5px; display: flex; align-items: center; gap: 10px">
                    <h1>Detalhe do hotel:</h1>
                </h4>
                <p class="grey-text text-darken-1" style="font-size: 1.1rem; margin-top: 0;">
                    Visualize as informações detalhadas do hotel selecionado, incluindo seu nome e ID externo.
                </p>    
            </div>
        </div>
    </div> 

    <div class="container">
        <div class="row">
            <div class="col s12 m10">
                <div class="card white hoverable" style="border-top: 4px solid #1a237e; border-radius: 4px;">
                    <div class="card-content grey-text text-darken-3">
                        <span class="card-title indigo-text text-darken-4" style="font-weight: 600; font-size: 1.3rem;">
                            {{ $hotel->name }}
                        </span>
                        <p class="grey-text text-darken-1" style="display: flex; align-items: center; gap: 5px; font-size: 0.9rem;">
                            <span style="font-weight: bold;">ID externo:</span> {{ $hotel->external_id }}
                        </p>
                        <p class="grey-text text-darken-1" style="display: flex; align-items: center; gap: 5px; font-size: 0.9rem;">
                            <span style="font-weight: bold;">Quantidade de quartos:</span> {{ $hotel->rooms->count() }}
                        </p>
                        <p class="grey-text text-darken-1" style="display: flex; align-items: center; gap: 5px; font-size: 0.9rem;">
                            <span style="font-weight: bold;">Quantidade de reservas:</span> {{ $hotel->reservations->count() }}
                        </p>
                    </div>
                </div>
            </div>
         </div>    
    </div>

@endsection