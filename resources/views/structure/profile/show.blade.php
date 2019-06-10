@extends('layouts.app')

@section('title', 'Profil de '. $structure->name)

@section('content')
<div class="py-5">
    <div class="container">
        <div class="row shadow-none border-light">
            <div class="col-4 col-md-2">
                <img class="img-fluid d-block" src="https://static.pingendo.com/img-placeholder-3.svg">
            </div>
            <div class="col-8 col-md-10 shadow-none">
                <h1>{{ $structure->name }} <span class="badge badge-secondary">{{ $structure->typename() }}</span></h1>
                <p class="lead">{{ $structure->comment }}</p>
                @if( ! Auth::user()->structure->follows($structure) && Auth::user()->structure->id !== $structure->id )
                <a href="{{ route('structure.follows', ['id' => $structure->id]) }}" class="btn btn-primary">Suivre</a>
                @elseif (Auth::user()->structure->follows($structure) && Auth::user()->structure->id !== $structure->id)
                <a href="{{ route('structure.unfollows', ['id' => $structure->id]) }}" class="btn btn-primary">Ne plus suivre</a>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="row">
        </div>
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

            <div class="col-md-6 pt-3 pt-md-0">
                <div id="app">
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
                        get-route="/structure/{{ $structure->id }}/news"
                        base-update-route="/news/update/"
                        base-delete-route="/news/delete/"
                        base-user-route="/user/profile/"
                        base-structure-route="/structure/profile/"
                    >
                    </news-feed>
                </div>
            </div>

            <div class="col-md-3 px-3 pb-3 pt-3 pt-md-0">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center mb-0">Connexions</h3>
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach ($structure->followed as $followed)
                        <li class="list-group-item text-center">
                            <span class="h4"><a href="{{ route('structure.profile.show', ['id' => $followed->id]) }}">{{ $followed->name }}</a></span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="application/javascript" src="{{ asset('js/delete_news_ajax.js') }}"></script>
@endsection