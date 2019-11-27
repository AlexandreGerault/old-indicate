@extends('layouts.app')

@section('title', ucfirst(trans('structure.results')))

@section('content')
    <div class="py-5">
        <div class="container">

            <!-- Page header -->
            <div class="row">
                <div class="col-12">
                    <h1 class="mb-3 border-bottom border-light">{{ ucfirst(trans('structure.results')) }}</h1>
                </div>
            </div>

            <!-- Search results -->

            @if (isset($data) && count($data) > 0)
            <div id="indicate-search-results" class="d-flex flex-wrap p-2">
                @foreach($data as $item)
                <div class="card m-3">
                    <div class="card-body">
                        <h4>
                            {!! $item->structure->verified ? '<i class="fas fa-check-circle text-primary"></i>' : '' !!}
                            <a href="{{ route('structure.show', ['structure' => $item->structure]) }}">
                                {{ $item->structure->name }}
                            </a>
                        </h4>
                        <p class="badge badge-secondary">{{ ucfirst(trans('structure.type.' . $item->structure->data_type)) }}</p>
                        <p>{{ $item->structure->comment }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            {{ $data->links() }}
            @else
                <p>Aucun résultats</p>
            @endif
        </div>


    </div>
@endsection
