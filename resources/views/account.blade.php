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
            <button class="btn account-btn">Se déconnecter</button>
        </form>
        <div class="account-form-container">
            <form method="POST" action="{{ route('edit_account') }}">
                @csrf
                <div class="form-group">
                    <label for="name" class="form-label">Nom d'utilisateur :</label>
                    <input type="text" class="form-control account-item" value="{{ Auth::user()->name }}" name="name" autocomplete="name">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary account-btn">Modifier mon profil</button>
                </div>
            </form>
        </div>
    </section>
@endsection
