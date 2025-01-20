@extends('layouts.app')

@section('styles')
    @vite('resources/sass/admin.scss')
@endsection

@section('content')
    <section id="admin-home" class="container-fluid">
        <h2>Administration</h2>
        <div class="admin-menu">
                <a href="{{route('admin_users')}}" class="btn">Gérer les utilisateurs</a>
                <a href="#" class="btn">Gérer les commentaires</a>
                <a href="#" class="btn">Commentaires signalés (X)</a>
        </div>
    </section>
@endsection
