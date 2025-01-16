@extends('layouts.app')

@section('styles')
    @vite('resources/sass/login.scss')
@endsection

@section('content')
    <section id="login" class="container-fluid">
        <div class="login-text-container">
            <h2>Se connecter : </h2>
            <p>Vous n'avez pas de compte ? Vous pouvez en créer un ici :</p>
            <a href="{{route('register')}}" class="btn login-btn">S'inscrire</a>
        </div>
        <div class="login-form-container">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="email" class="form-label">Adresse email : </label>
                    <input type="email" class="form-control login-item" placeholder="email@email.com" name="email" required autocomplete="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">Mot de passe : </label>
                    <input type="password" class="form-control login-item" placeholder="***********" name="password" required autocomplete="password">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary login-btn">Se connecter</button>
                </div>
            </form>
        </div>
    </section>
@endsection
