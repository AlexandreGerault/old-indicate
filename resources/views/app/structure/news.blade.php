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
                <h3 class="text-center">{{ ucfirst(trans('structure.info.address')) }}</h3>
                <p>{!! $structure->address->house_number . ' ' . $structure->address->road . '<br />' . $structure->address->postcode . ' ' . $structure->address->city !!}</p>
            </div>

            <div class="col-lg-6">
                <h3 class="text-center">{{ ucfirst(trans('structure.news_tab')) }}</h3>
                @can('create', [App\Models\App\News::class, $structure])
                    <div class="card mb-5">
                        <div class="card-body">
                            <h4 class="mb-3">{{ ucfirst(trans('news.create')) }}</h4>
                            @include('includes.forms.structure.news.create')
                        </div>
                    </div>
                @endcan
                <div id="news">
                    <news-timeline get-route="{{ route('structure.news', ['structure' => $structure]) }}"></news-timeline>
                </div>
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
