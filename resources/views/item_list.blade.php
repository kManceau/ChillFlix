@extends('layouts.app')

@section('styles')
    @vite('resources/sass/item_list.scss')
@endsection

@section('content')
    <section class="item-list-container container-fluid">
        <h2>Tout{{ array_key_exists('original_title', $items['0']) ? '' : 'es' }} les {{ array_key_exists('original_title', $items['0']) ? 'films' : 'séries' }} :</h2>
        <div class="items-grid">
            @foreach($items as $item)
                <a href="{{ array_key_exists('original_title', $items['0']) ? route('movie', $item['id']) : route('tv', $item['id']) }}" class="cards">
                    <h3 class="h5 cards-title">{{$item['original_title']?? $item['original_name']}}</h3>
                    <img src="https://image.tmdb.org/t/p/w500/{{$item['poster_path']}}"
                         alt="Affiche de {{ $item['original_title']?? $item['original_name'] }}" class="cards-img">
                </a>
            @endforeach

        </div>
        <div class="pagination">
            {{ $paginator->links() }}
        </div>
    </section>
@endsection
