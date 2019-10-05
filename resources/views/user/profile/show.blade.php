@extends('layouts.app')

@section('title', 'Profil de '. $user->firstname . ' ' . $user->lastname)

@section('content')
<div class="py-5">
    <div class="container">
        @if (session('flash'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('flash') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="row shadow-none border-light">
            <div class="col-4 col-md-2">
                <img class="img-fluid d-block" src="/storage/users/avatars/{{ $user->avatar }}">
            </div>
            <div class="col-8 col-md-10 shadow-none">
                <h1>{{ $user->firstname }} {{ $user->lastname }}</h1>

                @if ($user->hasStructure())

                    @switch($user->userStructure->status)

                        @case(config('enums.structure_membership_request_status.PENDING'))
                            <p class="lead">{{ __('Demande d\'affiliation en cours...') }}</p>
                            @break

                        @case(config('enums.structure_membership_request_status.ACCEPTED'))
                            <p class="lead"><a href="{{ route('structure.show', ['id' => $user->userStructure->structure->id]) }}">{{ $user->userStructure->structure->name }}</a></p>
                            @break

                        @default
                            @if (Auth::user()->id === $user->id)
                            <p class="lead">{{ __('Votre requête rencontre un problème. Veuillez contacter le support') }}</p>
                            @endif

                    @endswitch

                @else
                    @if (auth()->id() === $user->id)
                    <p class="lead">Veuillez effectuer une des actions suivantes</p>
                    <a class="btn btn-primary" href="{{ route('structure.index') }}">Rejoindre une structure</a> ou <a class="btn btn-primary" href="{{ route('structure.create') }}">Créer une structure</a>
                    @else
                    <p class="lead">{{ $user->firstname . ' ' . $user->lastname . __(' n\'est encore affilié à aucune structure')}}</p>
                    @endif
                @endif

                <a href="{{ route('search.professional') }}" class="btn btn-primary">{{ __('Rechercher un professionnel') }}</a>
            </div>
        </div>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>

            <div class="col-md-6">
                <div id="news">
                    <news-timeline
                        get-route="/user/{{ $user->id }}/news"
                    />
                </div>
            </div>

            <div class="col-md-3 px-3 pb-3 pt-3 pt-md-0">
                <div class="card">
                    <div class="card-header">
                        <h3 class="">Suggestions</h3>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-4">
                                    <img class="img-fluid d-block rounded-circle" src="https://static.pingendo.com/img-placeholder-3.svg" />
                                </div>
                                <div class="col-8">
                                    <span class="h4">Indicate</span>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-4">
                                    <img class="img-fluid d-block rounded-circle" src="https://static.pingendo.com/img-placeholder-3.svg" />
                                </div>
                                <div class="col-8">
                                    <span class="h4">Indicate</span>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-4">
                                    <img class="img-fluid d-block rounded-circle" src="https://static.pingendo.com/img-placeholder-3.svg" />
                                </div>
                                <div class="col-8">
                                    <span class="h4">Indicate</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
