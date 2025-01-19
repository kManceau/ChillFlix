<?php

namespace App\Http\Controllers;

use App\Pagination\MovieListPaginator;
use App\Pagination\TvListPaginator;
use App\Services\TmdbApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(TmdbApiService $apiService)
    {
        $lastMovies = $apiService->getLastMovies();
        $popularMovies = $apiService->getMostPopularMovies();
        $lastTvShows = $apiService->getLastTvShows();
        $popularTvShows = $apiService->getMostPopularTvShows();
        return view('home', compact('lastMovies', 'popularMovies', 'lastTvShows', 'popularTvShows'));
    }

    public function movie($id, TmdbApiService $apiService)
    {
        $item = $apiService->getMovie($id);
        return view('item', compact('item'));
    }

    public function tv($id, TmdbApiService $apiService)
    {
        $item = $apiService->getTvShow($id);
        return view('item', compact('item'));
    }

    public function movieList($page, TmdbApiService $apiService)
    {
        $items = $apiService->getMovieList($page)['results'];
        $movieCount = $apiService->getMovieList($page)['total_results'];
        $paginator = new MovieListPaginator($items, $movieCount, 20, $page);
        return view('item_list', compact('items', 'paginator'));
    }

    public function tvList($page, TmdbApiService $apiService)
    {
        $items = $apiService->getTvList($page)['results'];
        $tvCount = $apiService->getTvList($page)['total_results'];
        $paginator = new TvListPaginator($items, $tvCount, 20, $page);
        return view('item_list', compact('items', 'paginator'));
    }

    public function favorites(TmdbApiService $apiService)
    {
        $moviesLiked = Auth::user()->likes->filter(function ($like) {
            return $like->type === 'movie';
        });
        $tvsLiked = Auth::user()->likes->filter(function ($like) {
            return $like->type === 'tv';
        });
        $favoritesMovies = [];
        $favoritesTvs = [];
        foreach ($moviesLiked as $movie) {
            array_push($favoritesMovies, $apiService->getMovie($movie['tmdb_id']));
        }
        foreach ($tvsLiked as $tv) {
            array_push($favoritesTvs, $apiService->getTvShow($tv['tmdb_id']));
        }

        return view('favorites', compact('favoritesMovies', 'favoritesTvs'));
    }
    public function account()
    {
        return view('account');
    }
}
