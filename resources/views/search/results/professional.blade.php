@extends('layouts.app')

@section('title', __('Search results for professionals'))

@section('content')
    <div class="py-5">
        <div class="container">
            <!-- Page header -->
            <div class="row">
                <div class="col-12">
                    <h1 class="mb-3 border-bottom border-light">@lang('Matching professionals')</h1>
                </div>
            </div>

            <div class="mb-5">
                <div class="d-flex flex-wrap align-content-center align-items-center">
                    @for ($i = 0; $i<15; $i++)
                    <div class="card m-2" style="width: 18rem;">
                        <img src="https://via.placeholder.com/150" class="card-img-top" alt="Company logo">
                        <div class="card-body">
                            <h5 class="card-title">Matching enterprise</h5>
                            <p class="card-text">Some structure description.</p>
                            <a href="#" class="btn btn-primary">@lang('Display contact information')</a>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
@endsection
