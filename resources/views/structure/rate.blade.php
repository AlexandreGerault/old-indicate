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
                    <h1>{{ $structure->name }} <span class="badge badge-secondary">{{ __($structure->type) }}</span></h1>
                    <p class="lead">{{ $structure->comment }}</p>
                    @can('follow', $structure)
                        @follow(['structure_id' => $structure->id]) @endfollow
                    @endcan
                    @if (auth()->user()->hasStructure() && auth()->user()->userStructure->structure->follows($structure) && auth()->user()->userStructure->structure->id !== $structure->id)
                        @unfollow(['structure_id' => $structure->id]) @endunfollow
                    @endif
                    @can('join', $structure)
                        <a href="{{ route('structure.join', [ 'structure' => $structure ]) }}" class="btn btn-primary">
                            @lang('join')
                        </a>
                    @endcan
                    @can('claim', $structure)
                        <a href="{{ route('structure.claim', [ 'structure' => $structure ]) }}" class="btn btn-primary">
                            @lang('claim')
                        </a>
                    @endcan
                    @can('rate', $structure)
                        <a href="{{ route('structure.rate', [ 'structure' => $structure ]) }}" class="btn btn-primary">
                            @lang('rate')
                        </a>
                    @endcan
                    Note moyenne : {{ $structure->averageRating() }}
                </div>
            </div>
            <div class="row my-3 bg-light">
                <ul class="nav navbar">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">@lang('news-feed')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">@lang('information')</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <div class="container">

        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">@lang('characteristics')</h4>
                            <ul>
                                @foreach ($structure->data->toArray() as $key => $data)
                                    <li><b>{{ __(snakeToString($key)) }}</b> : {{ $data }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 pt-3 pt-md-0">
                    <div id="news">
                        @auth
                            @can('create', [App\Models\App\News::class, $structure])
                                <form class="card mb-5" method="post" action="{{ route('news.store') }}">
                                    @csrf
                                    <div class="card-body">
                                        <h4 class="mb-4 card-title">@lang('write-news')</h4>
                                        <input type="hidden" hidden="hidden" value="{{ $structure->id }}" name="structure_id" />
                                        <input type="text" name="title" id="title" placeholder="@lang('optional') @lang('news-title')" class="form-control" />
                                        <div class="md-form">
                                            <label for="content"></label>
                                            <textarea id="content" name="content" class="md-textarea form-control" rows="3" placeholder="@lang('news-content')"></textarea>
                                        </div>
                                        <input type="submit" class="btn btn-primary mt-4" value="@lang('publish')" />
                                    </div>
                                </form>
                            @endcan
                        @endauth
                        <news-timeline
                            get-route="/structure/{{ $structure->id }}/news"
                            base-update-route="/news/update/"
                            base-delete-route="/news/delete/"
                            base-user-route="/user/profile/"
                            base-structure-route="/structure/profile/"></news-timeline>
                    </div>
                </div>

                <div class="col-md-3 px-3 py-3 pt-md-0">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title m-0">@lang('connections')</h3>
                        </div>
                        <ul class="list-group list-group-flush">
                            @foreach ($structure->following as $followed)
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
