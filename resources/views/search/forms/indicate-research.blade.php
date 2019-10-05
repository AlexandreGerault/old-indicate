@extends('layouts.app')

@section('title', __('Search for a structure'))

@section('content')
<div class="py-5">
    <div class="container">

        <!-- Page header -->
        <div class="row">
            <div class="col-12">
                <h1 class="mb-3 border-bottom border-light">@lang('Search for a structure')</h1>
            </div>
        </div>

        <!-- Search results -->
        <div id="indicate-search-form">
            <div class="card p-3">
                <indicate-search-form action="{{ route('research.results') }}" />
            </div>
        </div>

        <div class="my-3">
            <a class="btn btn-primary" href="{{ route('research.results') }}">@lang('results page')</a>
        </div>
    </div>

</div>
@endsection
