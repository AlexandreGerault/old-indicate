@extends('layouts.app')

@section('title', ucfirst(trans('structure.create')))

@section('content')
<div class="py-5 h-100 align-items-center d-flex">
    <div class="container">
        <div class="mx-auto">
            <h1 class="mb-4">
                {{ ucfirst(trans('structure.create')) }}
            </h1>

            @include('includes.forms.structure.create')
        </div>
    </div>
</div>
@endsection
