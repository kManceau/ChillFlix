@extends('layouts.app')

@section('styles')
    @vite('resources/sass/account.scss')
@endsection

@section('content')
    <section id="account" class="account-container container-fluid">
        <div class="account-text-container">
            <h2>Gérer l'utilisateur :</h2>
        </div>
        <div class="account-form-container">
            @if($user->avatar)
                <picture>
                    <source srcset="{{ asset('storage/avatar/'.$user->avatar.'.avif') }}" type="image/avif">
                    <source srcset="{{ asset('storage/avatar/'.$user->avatar.'.webp') }}" type="image/webp">
                    <img src="{{ asset('storage/avatar/'.$user->avatar.'.jpg') }}" alt="Picture of {{$user->name}}" class="img-fluid avatar" loading="lazy" />
                </picture>
            @endif
            <form method="POST" action="{{ route('admin_update_user', $user->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name" class="form-label">Nom d'utilisateur :</label>
                    <input type="text" class="form-control account-item" value="{{ $user->name }}" name="name" autocomplete="name">
                </div>
                <div class="form-group">
                    <label for="avatar" class="form-label">Avatar :</label>
                    <input type="file" class="form-control account-item" name="avatar">
                </div>
                <div class="form-group button-group">
                    <button class="btn btn-primary account-btn">Modifier le profil</button>
                    <a href="{{ route('admin_delete_avatar', $user->id) }}" class="btn">Supprimer l'avatar</a>
                    <a href="{{route('admin_users')}}" class="btn">Retour</a>
                </div>
            </form>
        </div>
    </section>
@endsection
