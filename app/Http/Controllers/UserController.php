<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController
{
    public function editUser(Request $request, User $user)
    {
        $user = Auth::user();
        $user->update($request->all());
        return back()->with('success', "Le compte a bien été modifié.");
    }
}
