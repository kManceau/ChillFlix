<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\User;
use App\Models\Watchlist;
use Illuminate\Http\Request;

class WatchlistController extends Controller
{
    public function addWatched($user_id, $tmdb_id, $type)
    {
        if($user_id == 'none'){
            return redirect()->route('login');
        } else {
            $user = User::find($user_id);
            $watched = new Watchlist([
                    'tmdb_id' => $tmdb_id,
                    'type' => $type,
                ]
            );
            $user->watched()->save($watched);
            return redirect()->back();
        }
    }
    public function removeWatched($user_id, $tmdb_id, $type)
    {
        if($user_id == 'none'){
            return redirect()->route('login');
        } else{
            $user = User::find($user_id);
            $watched = $user->watched()->where(['tmdb_id' => $tmdb_id, 'type' => $type]);
            $watched->delete();
            return redirect()->back();
        }
    }
}
