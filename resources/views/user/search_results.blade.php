@extends('layouts.app')

@section('title', 'Search result')

@section('content')
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="mb-3 border-bottom border-light">@lang('Résultat de la recherche')</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @if (count($structures) > 0)
                <h2>@lang('structures')</h2>
                <div class="row">
                    <div class="col-md-6">
                        @foreach($structures as $structure)
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title"><b>{{ $structure->name }}</b></h5>
                                <h6 class="card-subtitle my-2 text-muted"><span class="badge badge-secondary">@lang('structure.type.' . $structure->data_type)</span></h6>
                                <p class="card-text">{{ $structure->comment }}</p>
                                <a href="{{ route('structure.profile.show', ['id' => $structure->id]) }}" class="btn btn-primary">{{ __('Voir le profil') }}</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                @if (count($users) > 0)
                <h2>@lang('users')</h2>
                <div class="row">
                    <div class="col-md-6">
                        @foreach($users as $user)
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title"><b>{{ $user->firstname }} {{ $user->lastname }}</b></h5>
                                <a href="{{ route('user.profile.show', ['id' => $user->id]) }}" class="btn btn-primary">{{ __('Voir le profil') }}</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
