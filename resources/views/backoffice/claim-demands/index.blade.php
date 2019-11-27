@extends('layouts.backoffice')

@section('title', ucfirst(trans('structure.claimdemands.index')))

@section('content')
    <h1 class="mb-5">{{ ucfirst(trans('structure.claimdemands.index')) }}</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>{{ ucfirst(trans('user.user')) }}</th>
                <th>{{ ucfirst(trans('structure.info.name')) }}</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($claimdemands as $demand)
            <tr>
                <td>
                    <a href="{{ route('user.show', ['user' => $demand->user]) }}">
                        {{ $demand->user->firstname . ' ' . $demand->user->lastname }}
                    </a>
                </td>
                <td>
                    <a href="{{ route('structure.show', ['structure' => $demand->structure]) }}">
                        {{ $demand->structure->name }}
                    </a>
                </td>
                <td>
                    <a class="btn btn-primary" href="{{ route('backoffice.claim-demands.validates', [
                    'user_id' => $demand->user->id,
                    'structure_id' => $demand->structure->id]) }}">
                        {{ ucfirst(trans('structure.claimdemands.validates')) }}
                    </a>
                    <a class="btn btn-primary" href="{{ route('backoffice.claim-demands.rejects', [
                    'user_id' => $demand->user->id,
                    'structure_id' => $demand->structure->id]) }}">
                        {{ ucfirst(trans('structure.claimdemands.rejects')) }}
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $claimdemands->links() }}
@endsection
