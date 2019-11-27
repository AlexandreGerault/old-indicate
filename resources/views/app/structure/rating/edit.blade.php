@extends('layouts.app')

@section('title', 'Noter '. $structure->name)

@section('content')
    @include('includes.structure.profile.header')

    @include('includes.structure.profile.navbar')

    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    @include('forms.structure.rating.edit')
                </div>
            </div>
        </div>
    </div>
@endsection
