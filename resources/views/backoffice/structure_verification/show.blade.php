@extends('layouts.backoffice')

@section('title', ucfirst(trans('structure.validation.show', ['name' => $structure->name])))

@section('content')
    <h1 class="mb-5">{{ ucfirst(trans('structure.validation.show', ['name' => $structure->name])) }}</h1>

    <div class="py-5">
        <div class="card">
            <div class="card-body">
                <h3 class="mb-4">{{ $structure->name }}</h3>
                <div class="d-flex flex-wrap">
                    <div class="p-2">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-4">
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
                    <div class="p-2">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-4">
                                    {{ trans('structure.info.legal') }}
                                </h4>
                                <ul>
                                    <li>
                                        <b>{{ ucfirst(trans('structure.info.siren')) }} : </b>
                                        {{ $structure->siren }}
                                    </li>
                                    <li>
                                        <b>{{ ucfirst(trans('structure.info.siret')) }} : </b>
                                        {{ $structure->siret }}
                                    </li>
                                    <li>
                                        <b>{{ ucfirst(trans('structure.info.address')) }} : </b>
                                        {{  $structure->address->house_number . ' ' . $structure->address->road }}
                                    </li>
                                    <li>
                                        <b>{{ ucfirst(trans('structure.info.city')) }} : </b>
                                        {{ $structure->address->postcode . ' ' . $structure->address->city  }}
                                    </li>
                                    <li>
                                        <b>{{ ucfirst(trans('structure.info.county')) }} :</b>
                                        {{ $structure->address->county }}
                                    </li>
                                    <li>
                                        <b>{{ ucfirst(trans('structure.info.country')) }} :</b>
                                        {{ $structure->address->country }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="p-2">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-4">
                                    {{ ucfirst(trans('structure.info.contact')) }}
                                </h4>
                                <ul>
                                    <li>
                                        <b>{{ ucfirst(trans('structure.info.email')) }} :</b>
                                        {{ $structure->contact->email }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
