@extends('layouts.app')

@section('title', 'Profil de '. $structure->name)

@section('content')
@include('includes.structure.profile.header')

@include('includes.structure.profile.navbar')

<div class="mt-5">
    <div class="container">
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="row">

            <div class="col-lg-3 border-right border-secondary">
                <h3 class="text-center">@lang('ui.structure.address')</h3>
                <p>{!! $structure->address->house_number . ' ' . $structure->address->road . '<br />' . $structure->address->postcode . ' ' . $structure->address->city !!}</p>
            </div>

            <div class="col-lg-6">
                <h3 class="text-center">@lang('ui.structure.characteristics')</h3>
                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">@lang('structure/data.name')</th>
                        <th scope="col">@lang('structure/data.value')</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($structure->data->makeHidden(['id', 'created_at', 'updated_at'])->toArray() as $key => $value)
                        @if ($value !== null)
                        <tr>
                            <td>@lang('structure/data.' . $structure->data_type . '.' . $key)</td>
                            <td>{{ $value }}</td>
                        </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-lg-3  border-left border-secondary">
                <h3 class="text-center">@lang('ui.structure.contact')</h3>
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
