<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class TmdbApiService
{
    protected $apiKey;
    public function __construct()
    {
        $this->apiKey = env('TMDB_API_KEY');
    }
    public function getMostPopularMovies()
    {
        $response = Http::get('https://api.themoviedb.org/3/movie/popular', [
          'api_key' => $this->apiKey,
          'language' => 'fr-FR',
          'page' => '1'
        ]);
        return $response->json()['results'];
    }
}
