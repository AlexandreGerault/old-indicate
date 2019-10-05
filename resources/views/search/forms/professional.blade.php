@extends('layouts.app')

@section('title', __('Search for a professional'))

@section('content')
    <div class="py-5">
        <div class="container">
            <!-- Page header -->
            <div class="row">
                <div class="col-12">
                    <h1 class="mb-3 border-bottom border-light">@lang('Search for a professional')</h1>
                </div>
            </div>

            <section class="py-5" style="min-height: calc(100vh - 300px);">
            <div class="my-5">
                <form class="form-inline md-form form-sm mt-0" action="{{ route('search.professional.results') }}">
                    <i class="fas fa-search" aria-hidden="true"></i>
                    <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search for a professional"
                           aria-label="Search">
                    <input type="submit" />
                </form>
            </div>
            </section>
        </div>
    </div>
@endsection
