@extends('layouts.dashboard')

@section('title', 'Gestion des permissions')

@section('content')
<h1>{{ ucfirst(trans('structure.permissions.overview')) }}</h1>
<table class="table table-stripped">
    <thead class="thead-dark">
        <tr>
            <th>{{ ucfirst(trans('structure.member')) }}</th>
        @foreach ($columns as $column)
            <th class="text-center">{{ ucfirst(trans('structure.permissions.' . $column)) }}</th>
        @endforeach
        </tr>
    </thead>

    <tbody>
        @foreach($members as $user)
        <tr>
        <td>{{ $user->firstname . ' ' . $user->lastname }}</td>
        @foreach ($user->authorizations->attributesToArray() as $key => $item)
        <td class="text-center">
            {!! $item == true ?
                '<i class="fa fa-check" aria-hidden="true"></i>'
                : '<i class="fa fa-times" aria-hidden="true"></i>'
            !!}
        </td>
        @endforeach
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
