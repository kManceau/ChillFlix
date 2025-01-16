<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController
{
    public function editUser(Request $request, User $user, ImageService $imageService)
    {
        $request->validate([
            'name' => 'required',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg,webp,avif',
        ]);
        $user = Auth::user();
        $hash = $user->id . $user->name;
        $avatarName = hash('sha512', $hash);
        $imageService->uploadImages($request->file('avatar'), $avatarName, 'avatar');
        $user->name = $request->get('name');
        $user->avatar = $avatarName;
        $user->update();
        return back()->with('success', "Le compte a bien été modifié.");
    }
}

