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

    public function getLastMovies()
    {

        $response = Http::get('https://api.themoviedb.org/3/discover/movie', [
            'api_key' => $this->apiKey,
            'language' => 'fr-FR',
            'primary_release_date.lte' => date('Y-m-d'),
            'sort_by' => 'primary_release_date.desc',
            'vote_count.gte' => '10',
            'page' => '1'
        ]);
        return $response->json()['results'];
    }

    public function getMostPopularMovies()
    {
        $response = Http::get('https://api.themoviedb.org/3/discover/movie', [
            'api_key' => $this->apiKey,
            'language' => 'fr-FR',
            'sort_by' => 'vote_count.desc',
            'page' => '1'
        ]);
        return $response->json()['results'];
    }

    public function getLastTvShows()
    {
        $response = Http::get('https://api.themoviedb.org/3/discover/tv', [
            'api_key' => $this->apiKey,
            'language' => 'fr-FR',
            'sort_by' => 'first_air_date.desc',
            'vote_count.gte' => '10',
            'page' => '1'
        ]);
        return $response->json()['results'];
    }

    public function getMostPopularTvShows()
    {
        $response = Http::get('https://api.themoviedb.org/3/discover/tv', [
            'api_key' => $this->apiKey,
            'language' => 'fr-FR',
            'sort_by' => 'vote_count.desc',
            'page' => '1'
        ]);
        return $response->json()['results'];
    }

    public function getMovie($id)
    {
        $response = Http::get('https://api.themoviedb.org/3/movie/' . $id, [
            'api_key' => $this->apiKey,
            'language' => 'fr-FR'
        ]);
        return $response->json();
    }

    public function getTvShow($id)
    {
        $response = Http::get('https://api.themoviedb.org/3/tv/' . $id, [
            'api_key' => $this->apiKey,
            'language' => 'fr-FR'
        ]);
        return $response->json();
    }

    public function getMovieList($page)
    {
        $response = Http::get('https://api.themoviedb.org/3/discover/movie', [
           'api_key' => $this->apiKey,
           'language' => 'fr-FR',
           'sort_by' => 'original_title.asc',
           'vote_count.gte' => '1000',
           'page' => $page,
        ]);
        return $response->json();
    }

    public function getTvList($page)
    {
        $response = Http::get('https://api.themoviedb.org/3/discover/tv', [
            'api_key' => $this->apiKey,
            'language' => 'fr-FR',
            'sort_by' => 'original_name.asc',
            'vote_count.gte' => '50',
            'page' => $page,
        ]);
        return $response->json();
    }

    public function searchMovies($search)
    {
        $response = Http::get('https://api.themoviedb.org/3/search/movie', [
            'api_key' => $this->apiKey,
            'language' => 'fr-FR',
            'query' => $search,
        ]);
        return $response->json()['results'];
    }
    public function searchTv($search)
    {
        $response = Http::get('https://api.themoviedb.org/3/search/tv', [
            'api_key' => $this->apiKey,
            'language' => 'fr-FR',
            'query' => $search,
        ]);
        return $response->json()['results'];
    }
}
