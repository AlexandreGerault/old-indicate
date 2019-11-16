@extends('layouts.backoffice')

@section('title', ucfirst(trans('structure.validation.show', ['name' => $structure->name])))

@section('content')
    <h1 class="mb-5">{{ ucfirst(trans('structure.validation.show', ['name' => $structure->name])) }}</h1>

    <div class="py-5">
        <div class="card">
            <div class="card-body">
                <h3 class="mb-4">{{ $structure->name }}</h3>
                <div class="d-flex">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="my-3">
                                {{ trans('structure.info.general') }}
                            </h4>
                            <ul>
                                <li>
                                    <b>{{ ucfirst(trans('structure.info.name')) }} : </b>
                                    {{ $structure->name }}
                                </li>
                                <li>
                                    <b>{{ ucfirst(trans('structure.info.type')) }} : </b>
                                    {{ ucfirst(trans('structure.type.' . $structure->data_type)) }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
