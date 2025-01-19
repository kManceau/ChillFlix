<?php

namespace App\Pagination;

use Illuminate\Pagination\LengthAwarePaginator;

class FavoritesMoviesPaginator extends LengthAwarePaginator
{
    public function url($moviePage)
    {
        $url = $_SERVER['REQUEST_URI'];
        $url = explode('/', $url);
        $tvPage = end($url);
        return url("fav/{$moviePage}/{$tvPage}");
    }
}
