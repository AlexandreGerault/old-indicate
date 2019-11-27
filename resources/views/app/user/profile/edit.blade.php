@extends('layouts.app')

@section('title', 'Profil de '. $user->firstname . ' ' . $user->lastname)

@section('content')
    <div class="container">
        @include('includes.user.profile.header')

        <div class="py-5">
            <div class="container">
                @include('includes.forms.user.edit')
            </div>
        </div>
    </div>
@endsection
