@extends('layouts.dashboard')

@section('title', 'Dashboard - Utilisateurs')

@section('content')
<h1>@lang('ui.dashboard_words.members')</h1>
<table class="table table-stripped">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Prénom</th>
            <th scope="col">Nom</th>
            <th scope="col">Nom de poste</th>
            <th scope="col">Depuis</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($members as $user)
    <tr>
        <th scope="row">{{ $user->id }}</th>
        <td>{{ $user->firstname}}</td>
        <td>{{ $user->lastname }}</td>
        <td>{{ $user->userStructure->jobname }}</td>
        <td>{{ $user->userStructure->created_at }}</td>
        <td>
            <a href="" class="btn btn-outline-primary">Voir</a>
            @can('manage-users', $user->userStructure->structure)
            <a href="{{ route('structure.dashboard.members.edit', [
            'structure' => $user->userStructure->structure,
            'id' => $user->id ]) }}" class="btn btn-outline-primary">
                Éditer
            </a>
            <a href="{{ route('demands.refuses', [
            'structure' => $user->userStructure->structure,
            'id' => $user->userStructure->id])}}" class="btn btn-outline-primary">
                Bannir
            </a>
            @endcan</td>
    </tr>
    @endforeach
    </tbody>
</table>
@endsection
