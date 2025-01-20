@extends('layouts.app')

@section('styles')
    @vite('resources/sass/item_list.scss')
@endsection

@section('content')
    <section class="item-list-container container-fluid">
        <h2>Films à regarder :</h2>
            @if(count($movies) == 0)
                <p>Vous n'avez pas de films à regarder.</p>
            @else
            <div class="items-grid">
                @foreach($movies as $movie)
                    <a href="{{ route('movie', $movie['id']) }}" class="cards">
                        <h3 class="h5 cards-title">{{$movie['original_title']}}</h3>
                        <img src="https://image.tmdb.org/t/p/w500/{{$movie['poster_path']}}"
                             alt="Affiche de {{ $movie['original_title'] }}" class="cards-img">
                    </a>
                @endforeach
            </div>
            @endif
                <div class="pagination">
                    {{ $moviePaginator->links() }}
                </div>
    </section>

    <section class="item-list-container container-fluid">
        <h2>Séries à regarder :</h2>
        @if(count($tvs) == 0)
            <p>Vous n'avez pas de séries à regarder.</p>
        @else
            <div class="items-grid">
                @foreach($tvs as $tv)
                    <a href="{{ route('tv', $tv['id']) }}" class="cards">
                        <h3 class="h5 cards-title">{{$tv['name']}}</h3>
                        <img src="https://image.tmdb.org/t/p/w500/{{$tv['poster_path']}}"
                             alt="Affiche de {{ $tv['name'] }}" class="cards-img">
                    </a>
                @endforeach
            </div>
        @endif
                <div class="pagination">
                    {{ $tvPaginator->links() }}
                </div>
    </section>
@endsection
