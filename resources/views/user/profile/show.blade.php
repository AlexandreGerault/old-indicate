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
                <p><img class="img-fluid d-block" src="/storage/users/avatars/{{ $user->avatar }}"></p>
                @if(auth()->id() === $user->id)
                <p class="small"><a href="{{ route('user.edit', ['user' => auth()->user()]) }}">Mettre à jour mon profil</a></p>
                @endif
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

                @endif

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
            </div>
        </div>
    </div>
</div>
@endsection
