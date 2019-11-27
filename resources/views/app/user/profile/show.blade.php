@extends('layouts.app')

@section('title', 'Profil de '. $user->firstname . ' ' . $user->lastname)

@section('content')

@include('includes.user.profile.header')

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>

            <div class="col-md-6">
                <div id="news">
                    <news-timeline get-route="/user/{{ $user->id }}/news">
                    </news-timeline>
                </div>
            </div>

            <div class="col-md-3 px-3 pb-3 pt-3 pt-md-0">
            </div>
        </div>
    </div>
</div>
@endsection
