@extends('site\layout')
@section('title', 'Hoteis')
@section('content')
    
{{--Isso é um comentário--}}
@include('include.mensagem', ['titulo' => 'Mensagem de sucesso!'])

@component('components.sidebar')
    @slot('paragrafo')
        Texto do paragrafo
    @endslot
@endcomponent

@endsection