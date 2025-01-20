@extends('layouts.app')

@section('styles')
    @vite('resources/sass/admin.scss')
@endsection

@section('content')
    <section id="admin-home" class="container-fluid">
        <h2>Gestion des Utilisateurs</h2>
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Nombre de commentaires</th>
                <th scope="col">Editer</th>
                <th scope="col">Supprimer</th>
            </tr>
            </thead>
            <tbody>

            @foreach($users as $user)
                <tr>
                    <th scope="row">{{$user->name}}</th>
                    <td>{{$user->comment->count()}}</td>
                    <td><a href="{{route('admin_user_edit', $user->id)}}" class="link-light">Editer</a></td>
                    <td><a href="{{route('admin_delete_user', $user->id)}}" class="link-light">Supprimer</a></td>
                </tr>
            @endforeach

            </tbody>
        </table>

        <div class="paginator">
            {{ $users->links() }}
        </div>
        <a href="{{route('admin_home')}}" class="btn">Retour</a>
    </section>
@endsection
