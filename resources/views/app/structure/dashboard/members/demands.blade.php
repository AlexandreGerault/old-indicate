@extends('layouts.dashboard')

@section('title', 'Dashboard > Utilisateurs > Demandes')

@section('content')
    <h1>Demandes d'adhésions en attente</h1>
    @if(count($demands) > 0)
        <table class="table table-stripped">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Prénom</th>
                <th scope="col">Nom</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($demands as $demand)
                <tr>
                    <th scope="row">{{ $demand->user->id }}</th>
                    <td>{{ $demand->user->firstname}}</td>
                    <td>{{ $demand->user->lastname }}</td>
                    <td>
                        <a href="{{ route('demands.accepts', [
            'structure' => $demand->structure,
            'id' => $demand->id
            ])}}" class="btn btn-outline-secondary">Accepter</a>
                        <a href="{{ route('demands.refuses', [
            'structure' => $demand->structure,
            'id' => $demand->id
            ])}}" class="btn btn-outline-secondary">Refuser</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p class="lead">Aucune demande en attente</p>

    @endif
@endsection
