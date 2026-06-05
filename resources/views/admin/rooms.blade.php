@extends('admin.layout')

@section('title', 'Rooms')

@section('conteudo')
<div class="row container">

@foreach ($rooms as $room)
    <div class="col s12 m3">
        <div class="card-content">
        <span class="card-title">{{ $room->name }}</span>
        <p style="text-overflow: ellipsis;">Id do quarto: {{ $room->id }}</p>
        <p style="text-overflow: ellipsis;">Contagem de inventário: {{ $room->inventory_count }}</p>
        </div>  
    </div>  
@endforeach
</div>
@endsection