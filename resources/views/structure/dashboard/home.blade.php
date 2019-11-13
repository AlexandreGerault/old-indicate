@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
    <h1>{{ ucfirst(trans('ui.dashboard')) }}</h1>

    <!-- Display some cards with cool information about structure -->
    <div class="row">
        <div class="col-md">
            <div class="card text-center">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <i class="p-2 fas fa-users fa-3x"></i>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p>{{ ucfirst(trans('ui.dashboard_words.members')) }}</p>
                            <p>{{ $members }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--<div class="col-md">
            <div class="card text-center">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <i class="p-2 fas fa-newspaper fa-3x"></i>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p>{{ ucfirst(trans('ui.dashboard_words.news')) }}</p>
                            <p>{{ $news }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
        <div class="col-md">
            <div class="card text-center">
                <div class="card-body">
                    <p>{{ ucfirst(trans('structure.followers')) }}</p>
                    <p>{{ $followers }}</p>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="card text-center">
                <div class="card-body">
                    <p>{{ ucfirst(trans('structure.followings')) }}</p>
                    <p>{{ $following }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
