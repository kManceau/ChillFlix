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
            'avatar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp,avif'],
        ]);
        $user = Auth::user();
        if($request->file('avatar')) {
            if($user->avatar){
                $imageService->deleteImages($user->avatar, 'avatar');
            }
            $hash = $user->id . $user->name;
            $avatarName = hash('sha512', $hash);
            $imageService->uploadImages($request->file('avatar'), $avatarName, 'avatar');
            $user->avatar = $avatarName;
        }
        $user->name = $request->get('name');
        $user->update();
        return back()->with('success', "Le compte a bien été modifié.");
    }

    public function deleteAvatar(ImageService $imageService)
    {
        $imageService->deleteImages(Auth::user()->avatar, 'avatar');
        Auth::user()->avatar = null;
        Auth::user()->update();
        return back()->with('success', "L'avatar a bien été supprimé.");
    }
}

