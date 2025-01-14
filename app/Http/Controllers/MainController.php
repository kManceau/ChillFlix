<?php

namespace App\Http\Controllers;

use App\Services\TmdbApiService;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(TmdbApiService $apiService)
    {
        $lastMovies = $apiService->getLastMovies();
        $popularMovies = $apiService->getMostPopularMovies();
        $lastTvShows = $apiService->getLastTvShows();
        $popularTvShows = $apiService->getMostPopularTvShows();
        return view('home', compact('lastMovies', 'popularMovies', 'lastTvShows', 'popularTvShows'));
    }
}
