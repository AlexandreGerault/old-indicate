@extends('layouts.min')

@section('title', 'Créer un compte pour une structure')

@section('content')
<div class="py-5 text-center h-100 align-items-center d-flex"
    style="height: 100vh !important; background-image: url('https://static.pingendo.com/cover-bubble-dark.svg');background-size:cover;">
    <div class="container">
        <div class="row">
            <div class="mx-auto col-md-6 col-10 bg-white p-5">
                <h1 class="mb-4">{{ __('Créer une structure') }}</h1>
                
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
                <form method="post" action="{{ route('structure.store') }}">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="{{ __('Nom de la structure')}}" id="name" name="name" required="required" value="{{ old('name') }}">
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" placeholder="{{ __('Slogan de la structure') }}" id="comment" name="comment" required="required" value="{{ old('comment') }}">
                    </div>
                    <div class="form-group mb-3">
                        <input type="tel" class="form-control" placeholder="@lang('phone_number')" id="phone_number" name="phone_number" required="required" value="{{ old('phone_number') }}">
                    </div>
                    <div class="form-group mb-3">
                        <input type="tel" class="form-control" placeholder="@lang('address')" id="address" name="address" required="required" value="{{ old('address') }}">
                    </div>
                    <div class="form-group mb-3">
                        <input type="number" class="form-control" placeholder="{{ __('Numéro Siren') }}" id="siren" name="siren" required="required" value="{{ old('siren') }}">
                    </div>
                    <div class="form-group mb-3">
                        <input type="number" class="form-control" placeholder="{{ __('Numéro Siret') }}" id="siret" name="siret" required="required" value="{{ old('siret') }}">
                    </div>
                    <div class="form-group">
                        <label for="data_type"></label><select class="form-control" id="data_type" name="data_type">
                            <option value="investor">{{ __('Investisseur') }}</option>
                            <option value="company">{{ __('Entreprise') }}</option>
                            <option value="consulting">{{ __('Structure de conseil') }}</option>
                        </select>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
