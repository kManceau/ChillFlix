@extends('layouts.app')

@section('styles')
    @vite('resources/sass/item_list.scss')
    @vite('resources/js/search.js')
@endsection

@section('content')
    <section id="search" class="item-list-container container-fluid">
        <h2>Recherche :</h2>
        <form action="{{ route('search') }}" method="GET" class="search-form">
            <div class="input-group">
                <input type="text" class="form-control search-item" id="search-input" placeholder="Search..." name="search"
                       aria-label="Formulaire de recherche">
                <button class="btn btn-outline-secondary search-item" type="submit"><i
                        class="bi bi-search"></i></button>
            </div>
        </form>
        @if(isset($items))
            <h3>Films :</h3>
            <div class="items-grid movie-grid">
            @if(count($items['movies']) == 0)
                <p>Aucun résultat.</p>
            @else

                    @foreach($items['movies'] as $item)
                        @if($item['poster_path'])
                            <a href="{{ route('movie', $item['id']) }}" class="cards">
                                <h3 class="h5 cards-title">{{$item['original_title']}}</h3>
                                <img src="https://image.tmdb.org/t/p/w500/{{$item['poster_path']}}"
                                     alt="Affiche de {{ $item['original_title'] }}" class="cards-img">
                            </a>
                        @endif
                    @endforeach
            @endif
            </div>
            <h3>Séries :</h3>
            @if(count($items['tvs']) == 0)
                <p>Aucun résultat.</p>
            @else
                <div class="items-grid tv-grid">
                    @foreach($items['tvs'] as $item)
                        @if($item['poster_path'])
                            <a href="{{ route('tv', $item['id']) }}" class="cards">
                                <h3 class="h5 cards-title">{{$item['original_name']}}</h3>
                                <img src="https://image.tmdb.org/t/p/w500/{{$item['poster_path']}}"
                                     alt="Affiche de {{ $item['original_name'] }}" class="cards-img">
                            </a>
                        @endif
                    @endforeach
                </div>
            @endif
        @else
            <h3>Films :</h3>
            <div class="items-grid movie-grid">
                <p>Saisissez une recherche</p>
            </div>
            <h3>Séries</h3>
            <div class="items-grid tv-grid">
                <p>Saisissez une recherche</p>
            </div>
        @endif
    </section>
@endsection
