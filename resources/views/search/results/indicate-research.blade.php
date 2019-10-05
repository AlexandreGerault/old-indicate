@extends('layouts.app')

@section('title', __('Results'))

@section('content')
    <div class="py-5">
        <div class="container">

            <!-- Page header -->
            <div class="row">
                <div class="col-12">
                    <h1 class="mb-3 border-bottom border-light">@lang('Matching structures')</h1>
                </div>
            </div>

            <!-- Search results -->
            <div id="indicate-search-results" class="d-flex flex-wrap p-2">
                @foreach($data as $item)
                <div class="card m-3">
                    <div class="card-body">
                        <h4>{{ $item->structure->name }}</h4>
                        <p class="badge badge-secondary">{{ $item->structure->data_type }}</p>
                        <p>{{ $item->structure->comment }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>


    </div>
@endsection
