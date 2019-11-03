@extends('layouts.app')

@section('title', __('ui.structure.create'))

@section('content')
<div class="py-5 h-100 align-items-center d-flex">
    <div class="container">
        <div class="row">
            <div class="mx-auto">
                <h1 class="mb-4">@lang('ui.structure.create')</h1>

                @if(count($errors) > 0)
                <div class="alert alert-danger">
                    @if ($errors->has('name'))
                    <strong>{{ $errors->first('name') }}</strong>
                    @endif

                    @if ($errors->has('comment'))
                    <strong>{{ $errors->first('comment') }}</strong>
                    @endif

                    @if ($errors->has('siren'))
                    <strong>{{ $errors->first('siren') }}</strong>
                    @endif

                    @if ($errors->has('siret'))
                    <strong>{{ $errors->first('siret') }}</strong>
                    @endif

                    @if ($errors->has('data_type'))
                    <strong>{{ $errors->first('data_type') }}</strong>
                    @endif
                </div>
                @endif
                @include('includes.forms.structure.create')
            </div>
        </div>
    </div>
</div>
@endsection
