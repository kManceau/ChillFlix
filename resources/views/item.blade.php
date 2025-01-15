@extends('layouts.app')

@section('content')
    <section class="item-container">
        <div class="item-image-background" style="background-image:url('https://image.tmdb.org/t/p/original{{ $item['backdrop_path'] }}');"></div>
        <img src="https://image.tmdb.org/t/p/w500{{ $item['poster_path'] }}" alt="Affiche de {{ $item['title'] }}" class="item-poster">
        <div class="item-infos">
            <h2>{{$item['title']}}</h2>
        </div>
    </section>
@endsection
