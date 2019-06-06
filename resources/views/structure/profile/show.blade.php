@extends('layouts.app')

@section('title', 'Profil de '. $structure->name)

@section('content')
<div class="py-5">
    <div class="container">
        <div class="row shadow-none border-light">
            <div class="col-sm-2"><img class="img-fluid d-block"
                    src="https://static.pingendo.com/img-placeholder-3.svg">
            </div>
            <div class="col-sm-8 shadow-none">
                <h1>{{ $structure->name }} <span class="badge badge-secondary">{{ $structure->typename() }}</span></h1>
                <p class="lead">{{ $structure->comment }}</p>
            </div>
        </div>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="row">

            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Caractéristiques</h4>
                        <ul>
                            @if(isset($structure->data()[0]))
                            @foreach ($structure->data()[0] as $key => $data)
                            <li><b>{{ $key }}</b> : {{ $data }}</li>
                            @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div id="news">
                    @auth @if (Auth::user()->isRelatedToStructure() && Auth::user()->isRelatedTo($structure)) 
                    @can('create', App\Models\App\News::class)
                    <form class="card mb-5" method="post" action="{{ route('news.store') }}">
                    @csrf
                        <div class="card-body">
                            <h4 class="mb-4 card-title">{{ __('Écrire une news') }}</h4>
                            <input type="text" name="title" id="title" placeholder="{{__('(Optionnel)') . ' ' . __('Titre de la news')}}" class="form-control" />
                            <div class="md-form">
                                <label for="content"></label>
                                <textarea id="content" name="content" class="md-textarea form-control" rows="3" placeholder="{{ __('Contenu de la news') }}"></textarea>
                            </div>
                            <input type="submit" class="btn btn-primary mt-4" value="Publier" />
                        </div>
                    </form>
                    @endcan
                    @endif @endauth
                    <news-feed
                        get-route="/news"
                        base-update-route="/news/update/"
                        base-delete-route="/news/delete/"
                        base-user-route="/user/profile/"
                        base-structure-route="/structure/profile/"
                    >
                    </news-feed>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-4 card-title">Connexions</h4>
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <img class="img-fluid d-block rounded-circle" src="https://static.pingendo.com/img-placeholder-3.svg">
                            </div>
                            <div class="col-md-8">
                                <h5 class="">Indicate</h5><a class="label" href="#">Button</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="application/javascript" src="{{ asset('js/delete_news_ajax.js') }}"></script>
@endsection