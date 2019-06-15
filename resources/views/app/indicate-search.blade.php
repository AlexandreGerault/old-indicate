@extends('layouts.app')

@section('title', __('Résultat de la recherche approfondie'))

@section('content')
<div class="py-5">
    <div class="container">

        <!-- Page header -->
        <div class="row">
            <div class="col-12">
                <h1 class="mb-3 border-bottom border-light">@lang('Résultat de la recherche')</h1>
            </div>
        </div>

        <!-- Search results -->
        <div id="indicate-search-form">
            <div class="offset-md-8 col-md-4">
                <div class="card">
                    <h3 class="text-center card-header">Indicate search</h3>
                    <div class="card-body">
                        <indicate-search-form />
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection