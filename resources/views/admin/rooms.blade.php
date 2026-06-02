@extends('admin.layout')

@section('title', 'Rooms')

@section('conteudo')
<h1>Rooms</h1>

<?php foreach ($rooms as $room): ?>
    {{ $room->number }} - {{ $room->type }}
    {{ $room->description }}
<?php endforeach; ?>

@endsection