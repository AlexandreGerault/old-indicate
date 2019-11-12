@extends('layouts.app')

@section('title', 'Noter '. $structure->name)

@section('content')
    @include('includes.structure.profile.header')

    @include('includes.structure.profile.navbar')

    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="my-3">Noter cette structure</h3>
                            @include('includes.forms.structure.rating.' . $structure->data_type)
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
