@extends('layouts.app')

@section('styles')
    @vite('resources/sass/login.scss')
@endsection

@section('content')
    <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="btn btn-primary">Se déconnecter</button>
    </form>
@endsection
