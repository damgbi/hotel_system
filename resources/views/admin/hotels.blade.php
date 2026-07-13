@extends('admin.layout')

@section('title', 'Hotels')


@section('content')
<h1>Hotels</h1>

<div class="row container">

    @foreach ($hotels as $hotel)
        <div class="col s12 m3">
            <div class="card-content">
            <span class="card-title">{{ $hotel->name}}</span>
            <p style="text-overflow: ellipsis;">{{ $hotel->external_id }}</p>
            </div>
        </div>
    @endforeach

</div>
@endsection