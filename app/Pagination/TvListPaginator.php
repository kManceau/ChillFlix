<?php

namespace App\Pagination;

use Illuminate\Pagination\LengthAwarePaginator;

class TvListPaginator extends LengthAwarePaginator
{
    public function url($page)
    {
        return url("tvs/{$page}");
    }
}
