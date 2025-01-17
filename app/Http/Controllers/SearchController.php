<?php

namespace App\Http\Controllers;

use App\Services\TmdbApiService;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request, TmdbApiService $apiService)
    {
        $search = $request->input('search');
        if($search) {
            $items['movies'] = $apiService->searchMovies($search);
            $items['tvs'] = $apiService->searchTv($search);
        } else{
            $items = null;
        }
        return view('search', compact('items'));
    }

    public function getMovieSearch($query, TmdbApiService $apiService)
    {
        return $apiService->searchMovies($query);
    }

    public function getTvSearch($query, TmdbApiService $apiService)
    {
        return $apiService->searchTv($query);
    }
}
