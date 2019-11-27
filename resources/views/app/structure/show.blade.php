@extends('layouts.app')

@section('title', 'Profil de '. $structure->name)

@section('content')
@include('includes.structure.profile.header')

@include('includes.structure.profile.navbar')

<div class="py-5">
    <div class="container">
        <div class="row">

            <div class="col-lg-3 border-right border-secondary">
                <h3 class="text-center">{{ ucfirst(trans('structure.info.address')) }}</h3>
                <p>{!! $structure->address->house_number . ' ' . $structure->address->road . '<br />' . $structure->address->postcode . ' ' . $structure->address->city !!}</p>
            </div>

            <div class="col-lg-6">
                <h3 class="text-center">{{ ucfirst(trans('structure.characteristics')) }}</h3>
                @if($structure->shouldDisplayCharacteristics())
                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">{{ ucfirst(trans('structure.data.name')) }}</th>
                        <th scope="col">{{ ucfirst(trans('structure.data.value')) }}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($structure->data
                        ->makeHidden(['id', 'created_at', 'updated_at'])->toArray() as $key => $value)
                            @if ($value !== null)
                            <tr>
                                <td>{{ ucfirst(trans('structure.data.' . $structure->data_type . '.' . $key)) }}</td>
                                @if($key == 'wcr')
                                    <td>{{ $value ? 'Positif' : 'Négatif'}}</td>
                                @elseif(Schema::getColumnType($structure->data_type, $key) == 'boolean')
                                    <td>{{ $value ? ucfirst('oui') : ucfirst('non') }}</td>
                                @else
                                    <td>{{ $value }}</td>
                                @endif
                            </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
                @else
                    <p>{{ ucfirst(trans('structure.data.not_available')) }}</p>
                @endif
            </div>

            <div class="col-lg-3  border-left border-secondary">
                <h3 class="text-center">{{ ucfirst(trans('structure.info.contact')) }}</h3>
                <ul>
                    <li><b>Email : </b> {{ $structure->contact->email }}</li>
                    <li><b>Tel : </b> {{ $structure->contact->phone_number }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="application/javascript" src="{{ asset('js/delete_news_ajax.js') }}"></script>
@endsection
