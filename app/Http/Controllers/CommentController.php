<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function addComment(Request $request)
    {
        $user = Auth::user();
        $comment = new Comment([
            'tmdb_id' => $request->get('tmdb_id'),
            'type' => $request->get('type'),
            'comment' => $request->get('comment'),
        ]);
        $user->comment()->save($comment);
        return redirect()->back()->with('success', 'Commentaire ajouté.');
    }

    public function deleteComment($commentId, Request $request)
    {
        $comment = Comment::find($commentId);
        if(Auth::user() == $comment->user || Auth::user()->role == 'admin') {
            $comment->delete();
            return redirect()->back()->with('success', 'Commentaire supprimé.');
        } else{
            return redirect()->back()->with('error', 'Vous ne pouvez pas supprimer le commentaire.');
        }
    }
}
