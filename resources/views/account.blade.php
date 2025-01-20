@extends('layouts.app')

@section('styles')
    @vite('resources/sass/account.scss')
@endsection

@section('content')
    <section id="account" class="account-container container-fluid">
        <div class="account-text-container">
            <h2>Gérer mon compte :</h2>
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn">Se déconnecter</button>
        </form>
        <div class="account-form-container">
            @if(Auth::user()->avatar)
                <picture>
                    <source srcset="{{ asset('storage/avatar/'.Auth::user()->avatar.'.avif') }}" type="image/avif">
                    <source srcset="{{ asset('storage/avatar/'.Auth::user()->avatar.'.webp') }}" type="image/webp">
                    <img src="{{ asset('storage/avatar/'.Auth::user()->avatar.'.jpg') }}" alt="Picture of {{Auth::user()->name}}" class="img-fluid avatar" loading="lazy" />
                </picture>
            @endif
            <form method="POST" action="{{ route('edit_account') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name" class="form-label">Nom d'utilisateur :</label>
                    <input type="text" class="form-control account-item" value="{{ Auth::user()->name }}" name="name" autocomplete="name">
                </div>
                <div class="form-group">
                    <label for="avatar" class="form-label">Avatar :</label>
                    <input type="file" class="form-control account-item" name="avatar">
                </div>
                <div class="form-group button-group">
                    <button class="btn btn-primary account-btn">Modifier mon profil</button>
                    <a href="{{ route('delete_avatar') }}" class="btn">Supprimer l'avatar</a>
                </div>
            </form>
        </div>
    </section>
@endsection
