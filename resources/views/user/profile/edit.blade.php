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
                </div>
            </div>
        </div>
    </div>
    <div class="py-5">
        <div class="container">
            <div class="row">
                <form method="post" action="{{ route('user.update', ['user' => $user->]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group row">
                        <label for="firstname">@lang('firstname')</label>
                        <input type="text" name="firstname" id="firstname" class="form-control" placeholder="@lang('firstname')" value="{{ $user->firstname }}"/>
                    </div>
                    <div class="form-group row">
                        <label for="lastname">@lang('lastname')</label>
                        <input type="text" name="lastname" id="lastname" class="form-control" placeholder="@lang('lastname')" value="{{ $user->lastname }}"/>
                    </div>
                    <div class="form-group row">
                        <label for="email">@lang('email')</label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="@lang('email')" value="{{ $user->email }}"/>
                    </div>
                    <div class="form-group row">
                        <label for="avatar">{{ __('Veuillez choisir une photo de profil') }}</label>
                        <input type="file" class="form-control-file" name="avatar" id="avatar" aria-describedby="fileHelp">
                        <small id="fileHelp" class="form-text text-muted">{{ __('Choisissez un fichier valide : la taille de l\'image ne doit pas dépasser 2Mo.')}}</small>
                    </div>

                    <button type="submit" class="btn mt-4 btn-block btn-outline-dark p-2">
                        <b>@lang('profile_edit_submit')</b>
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
