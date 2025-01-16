@extends('layouts.app')

@section('styles')
    @vite('resources/sass/account.scss')
@endsection

@section('content')
    <section id="register" class="account-container container-fluid">
        <div class="account-text-container">
            <h2>S'inscrire : </h2>
        </div>
        <div class="account-form-container">
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name" class="form-label">Nom d'utilisateur :</label>
                    <input type="text" class="form-control account-item" placeholder="Nom d'utilisateur" name="name" required autocomplete="name">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email" class="form-label">Adresse email : </label>
                    <input type="email" class="form-control account-item" placeholder="email@email.com" name="email" required autocomplete="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">Mot de passe : </label>
                    <input type="password" class="form-control account-item @error('password') is-invalid @enderror" placeholder="***********" name="password" required autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Mot de passe : </label>
                    <input type="password" class="form-control account-item" placeholder="***********" name="password_confirmation" required autocomplete="new-password">
                </div>
                <div class="form-group">
                    <label for="avatar" class="form-label">Avatar :</label>
                    <input type="file" class="form-control account-item" name="avatar">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary account-btn">S'inscrire</button>
                </div>
            </form>
        </div>
    </section>
@endsection
