<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function home()
    {
        if(Auth::user()->role == 'admin'){
            return view('admin/home');
        } else{
            return redirect()->route('home')->with('error', 'Vous n\'avez accès à cette page !');
        }
    }

    public function user()
    {
        if(Auth::user()->role == 'admin'){
            $users = User::orderBy('name', 'asc')->paginate(20);
            return view('admin/user', compact('users'));
        } else{
            return redirect()->route('home')->with('error', 'Vous n\'avez accès à cette page !');
        }
    }

    public function editUser($userId)
    {
        if(Auth::user()->role == 'admin'){
            $user = User::find($userId);
            return view('admin/edit_user', compact('user'));
        } else{
            return redirect()->route('home')->with('error', 'Vous n\'avez accès à cette page !');
        }
    }

    public function updateUser(Request $request, ImageService $imageService, $userId)
    {
        if(Auth::user()->role == 'admin'){
            $request->validate([
                'name' => 'required',
                'avatar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp,avif'],
            ]);
            $user = User::find($userId);
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
            return redirect()->back()->with('success', 'Utilisateur modifié');
        } else{
            return redirect()->route('home')->with('error', 'Vous n\'avez accès à cette page !');
        }
    }

    public function adminDeleteAvatar(ImageService $imageService, $userId)
    {
        $user = User::find($userId);
        $imageService->deleteImages($user->avatar, 'avatar');
        $user->avatar = null;
        $user->update();
        return back()->with('success', "L'avatar a bien été supprimé.");
    }

    public function adminDeleteUser($userId, ImageService $imageService)
    {
        $user = User::find($userId);
        $imageService->deleteImages($user->avatar, 'avatar');
        $user->delete();
        return back()->with('success', "L'utilisateur a bien été supprimé.");
    }
}
