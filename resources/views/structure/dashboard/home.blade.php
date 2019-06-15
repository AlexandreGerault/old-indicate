@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
    <h1>Dashboard</h1>

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
                            <p>Membres</p>
                            <p>{{ $members }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md">
                <div class="card text-center">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <i class="p-2 fas fa-newspaper fa-3x"></i>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p>News</p>
                                    <p>{{ $news }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
        <div class="col-md">
            <div class="card text-center">
                <div class="card-body">
                    <p>Abonnés</p>
                    <p>{{ $followers }}</p>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="card text-center">
                <div class="card-body">
                    <p>Abonnements</p>
                    <p>{{ $following }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection