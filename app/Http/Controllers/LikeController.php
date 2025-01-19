<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\User;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function addLike($user_id, $tmdb_id, $type, $title)
    {
        if($user_id == 'none'){
            return redirect()->route('login');
        } else {
            $user = User::find($user_id);
            $like = new Like([
                    'tmdb_id' => $tmdb_id,
                    'type' => $type,
                    'title' => $title,
                ]
            );
            $user->likes()->save($like);
            return redirect()->back();
        }
    }
    public function removeLike($user_id, $tmdb_id, $type)
    {
        if($user_id == 'none'){
            return redirect()->route('login');
        } else{
            $user = User::find($user_id);
            $like = $user->likes()->where(['tmdb_id' => $tmdb_id, 'type' => $type]);
            $like->delete();
            return redirect()->back();
        }
    }
}
