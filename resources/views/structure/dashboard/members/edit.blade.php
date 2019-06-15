@extends('layouts.dashboard')

@section('title', 'Édition de ' . $user->firstname . ' ' . $user->lastname)

@section('content')
<h1>Éditer le profil membre de {{ $user->firstname . ' ' . $user->lastname }}</h1>

<div class="row">
    <div class="col-lg mb-3">
        <div class="card card-body">
                <h2>Informations générales</h2>
                <div class="row">
                    <div class="col">
                        <form action="{{ route('structure.dashboard.members.update', ['id' => $user->userStructure->id]) }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="staticFirstname" class="col-sm-2 col-form-label">@lang('Firstname')</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" id="staticFirstname" value="{{ $user->firstname }}">
                                </div>
                            </div>
        
                            <div class="form-group row">
                                <label for="staticLastname" class="col-sm-2 col-form-label">@lang('Lastname')</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" id="staticLastname" value="{{ $user->lastname }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="staticLastname" class="col-sm-2 col-form-label">@lang('Jobname')</label>
                                <div class="col-sm-10">
                                    <input type="text" id="jobname-input" name="jobname" value="{{ $user->userStructure->jobname }}">
                                </div>
                            </div>

                            <input type="submit" value="@lang('Update')">
                        </form>
                    </div>
                </div>
        </div>
        
        
    </div>
    <div class="col-lg">
        <div class="card card-body">
            <h2>Permissions</h2>
            <div class="row">
                <div class="col">
                    <form action="{{ route('structure.dashboard.members.authorizations.update', ['id' => $user->authorizations->id]) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            @foreach ($user->authorizations->attributesToArray() as $key => $item)
                            <div class="row">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="{{ $key }}" {{ $item == true ? 'checked' : '' }} name="{{ $key }}" value="1" />
                                    <label class="form-check-label" for="{{ $key }}">@lang(formatColumnName($key))</label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <input type="submit" value="@lang('Update')">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection