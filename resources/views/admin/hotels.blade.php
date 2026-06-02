@extends('admin.layout')

@section('title', 'Hotels')

@section('conteudo')
<h1>Hotels</h1>

<?php foreach ($hotels as $hotel): ?>
    {{ $hotel->name }} - {{ $hotel->location }}
    {{ $hotel->description }}
<?php endforeach; ?>
@endsection