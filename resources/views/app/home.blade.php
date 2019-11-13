@extends('layouts.app')

@section('title', 'Indicate - La boussole du développement')

@section('content')
<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="p-5 col-md-7 d-flex flex-column justify-content-center">
                <h3 class="display-4 mb-3 text-primary">Indicate</h3>
                <p class="mb-4 lead">Indicate, ou comment renouveler l’approche du développement. Une nouvelle
                    plateforme où vous trouverez des aides au développement, des témoignages, des startups
                    stories…<br><br>Par la suite, un outil novateur de mise en relation qui permettra aux startups,
                    entreprises, structures d’accompagnement et investisseurs de travailler en synergie. La finalité de
                    ce projet est de créer un écosystème favorable au développement.</p>
            </div>
            <div class="p-5 col-md-5">
                <h3 class="mb-3">Inscription</h3>
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="firstname">{{ ucfirst(trans('user.firstname')) }}</label>
                                <input id="firstname" type="text" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname" value="{{ old('firstname') }}" required autofocus>

                                @if ($errors->has('firstname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label for="lastname">{{ ucfirst(trans('user.lastname')) }}</label>
                                <input id="lastname" type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" value="{{ old('lastname') }}" required>

                                @if ($errors->has('lastname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email">{{ ucfirst(trans('user.email')) }}</label>
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group row">
                        <label for="password">{{ ucfirst(trans('user.password')) }}</label>
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm">{{ ucfirst(trans('user.password.confirm')) }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>

                    <div class="form-group row">
                        <label for="avatar">{{ ucfirst(trans('user.avatar.choose')) }}</label>
                        <input type="file" class="form-control-file" name="avatar" id="avatar" aria-describedby="fileHelp">
                        <small id="fileHelp" class="form-text text-muted">{{ ucfirst(trans('user.avatar.help')) }}</small>
                    </div>

                    <button type="submit" class="btn mt-4 btn-block btn-outline-dark p-2">
                        <b>{{ __('S\'inscrire') }}</b>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-2 mx-auto p-3">
                <img class="img-fluid d-block rounded-circle" src="img/romain_wahl.jpg"
                    alt="Photo de profil de Romain Wahl">
            </div>
            <div class="p-3 col-md-8">
                <div class="blockquote mb-0">
                    <p>"Attiré très tôt par l’entreprenariat, je me suis intéressé et investi dans ce secteur dès mon
                        entrée dans les études supérieures. Après quelques ébauches de projet, l’idée de créer Indicate
                        me vint à l’esprit au sortir de quelques mois au sein d’un fond d’investissement."</p>
                    <div class="blockquote-footer">
                        <b>Romain WAHL</b>, CEO at Indicate Inc.
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-2 mx-auto p-3">
                <img class="img-fluid d-block rounded-circle" src="img/gregoire_heissat.jpg"
                    alt="Photo de profil de Gregoire HEÏSSAT" />
            </div>
            <div class="p-3 col-md-8">
                <div class="blockquote mb-0">
                    <p>"J'ai rejoint l’aventure Indicate après l'obtention de mon diplôme en communication. D’abord
                        orienté vers les métiers du journalisme, un premier pas dans une structure d’accompagnement
                        changea ma trajectoire. Une deuxième expérience dans une PME m’a aidé à me familiariser avec le
                        secteur du développement."</p>
                    <div class="blockquote-footer">
                        <b>Grégoire HEÏSSAT</b>, CEO at Indicate Inc.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
