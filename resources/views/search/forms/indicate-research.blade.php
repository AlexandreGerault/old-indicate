@extends('layouts.app')

@section('title', __('Search for a structure'))

@section('content')
<div class="py-5">
    <div class="container">

        <!-- Page header -->
        <div class="row">
            <div class="col-12">
                <h1 class="mb-3 border-bottom border-light">@lang('ui.structure.search')</h1>
            </div>
        </div>

        <!-- Search results -->
        <div id="indicate-search-form">
            <indicate-search-form action="{{ route('research.results') }}" />
        </div>
    </div>

</div>
@endsection
