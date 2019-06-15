@extends('layouts.app')

@section('title', 'Rejoindre une structure')

@section('content')
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="mb-3 border-bottom border-light">{{ __('Rejoindre une structure') }}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @if (count($structures) > 0)
                <h2>Structures</h2>
                <div class="row">
                    <div class="col-md-6">
                        @foreach($structures as $structure)
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title"><b>{{ $structure->name }}</b></h5>
                                <h6 class="card-subtitle my-2 text-muted"><span class="badge badge-secondary">{{ $structure->typename() }}</span></h6>
                                <p class="card-text">{{ $structure->comment }}</p>
                                @can('join', ['App\User', $structure])
                                <a href="{{ route('structure.join', ['id' => $structure->id]) }}" class="btn btn-primary">{{ __('Rejoindre cette structure')}}</a>
                                @endcan
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection