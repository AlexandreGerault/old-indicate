@extends('layouts.app')

@section('title', 'Profil de '. $structure->name)

@section('content')
<div class="py-5">
    <div class="container">
        <div class="row shadow-none border-light">
            <div class="col-4 col-md-2">
                <img class="img-fluid d-block" src="/storage/structures/avatars/{{ $structure->avatar }}">
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
                Note moyenne : {{ $structure->averageRating() }}
            </div>
        </div>
        <div class="row my-3 bg-light">
            <ul class="nav navbar">
                <li class="nav-item">
                    <a class="nav-link" href="#">@lang('ui.structure.characteristics')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">@lang('ui.structure.rating_tab')</a>
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
