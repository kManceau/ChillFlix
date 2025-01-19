<?php

namespace App\Http\Controllers;

use App\Pagination\FavoritesMoviesPaginator;
use App\Pagination\FavoritesTvPaginator;
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
//        $this->middleware('auth');
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

    public function favorites($moviePage, $tvPage, TmdbApiService $apiService)
    {
        $moviesLiked = Auth::user()->likes->filter(function ($like) {
            return $like->type === 'movie';
        })->toArray();
        $tvsLiked = Auth::user()->likes->filter(function ($like) {
            return $like->type === 'tv';
        })->toArray();
        usort($moviesLiked, function ($a, $b) {
            return strcmp($a['title'], $b['title']);
        });
        usort($tvsLiked, function ($a, $b) {
            return strcmp($a['title'], $b['title']);
        });

        $movieOffset = ($moviePage - 1) * 20;
        $moviesForPage = array_slice($moviesLiked, $movieOffset, 20);
        $movies = [];
        foreach ($moviesForPage as $movie) {
            array_push($movies, $apiService->getMovie($movie['tmdb_id']));
        }
        $moviePaginator = new FavoritesMoviesPaginator($movies, count($moviesLiked), 20, $moviePage);

        $tvOffset = ($tvPage - 1) * 20;
        $tvForPage = array_slice($tvsLiked, $tvOffset, 20);
        $tvs = [];
        foreach ($tvForPage as $tv) {
            array_push($tvs, $apiService->getTvShow($tv['tmdb_id']));
        }
        $tvPaginator = new FavoritesTvPaginator($tvs, count($tvsLiked), 20, $tvPage);
        return view('favorites', compact('movies', 'tvs', 'moviePaginator', 'tvPaginator'));
    }
    public function account()
    {
        return view('account');
    }
}
