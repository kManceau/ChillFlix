<?php

namespace App\Pagination;

use Illuminate\Pagination\LengthAwarePaginator;

class FavoritesTvPaginator extends LengthAwarePaginator
{
    public function url($tvPage)
    {
        $url = $_SERVER['REQUEST_URI'];
        $url = explode('/', $url);
        array_pop($url);
        $moviePage = end($url);
        return url("fav/{$moviePage}/{$tvPage}");
    }
}
