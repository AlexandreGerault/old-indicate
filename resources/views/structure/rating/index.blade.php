@extends('layouts.app')

@section('title', 'Profil de '. $structure->name)

@section('content')
    @include('includes.structure.profile.header')

    @include('includes.structure.profile.navbar')

    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h3>Notes</h3>
                    @can('create', [App\Models\App\Rating::class, $structure])
                    <p><a class="btn btn-primary" href="{{ route('rating.create', ['structure' => $structure]) }}">Noter cette structure</a></p>
                    @endcan
                    @foreach($ratings as $rating)
                        @ratingcard(['rating' => $rating])
                        @endratingcard
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
