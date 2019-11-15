@extends('layouts.dashboard')

@section('title', 'Édition de ' . $user->firstname . ' ' . $user->lastname)

@section('content')

<h1>{{ ucfirst(trans('user.profile.edit', ['firstname' => $user->firstname, 'lastname' => $user->lastname])) }}</h1>

<div class="row">
    <div class="col-lg mb-3">
        <div class="card card-body">
                <h2>Informations générales</h2>
                <div class="row">
                    <div class="col">
                        <form action="{{ route('structure.dashboard.members.update', [
                        'id' => $user->userStructure->id,
                        'structure' => $user->userStructure->structure ]) }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="staticFirstname" class="col-sm-2 col-form-label">
                                    {{ ucfirst(trans('user.firstname')) }}
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext"
                                           id="staticFirstname" value="{{ $user->firstname }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="staticLastname" class="col-sm-2 col-form-label">
                                    {{ ucfirst(trans('user.lastname')) }}
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext"
                                           id="staticLastname" value="{{ $user->lastname }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="staticLastname" class="col-sm-2 col-form-label">
                                    {{ ucfirst(trans('user.jobname')) }}
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" id="jobname-input" class="form-control"
                                           name="jobname" value="{{ $user->userStructure->jobname }}">
                                </div>
                            </div>

                            <input class="btn btn-primary" type="submit" />
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
                    <form action="{{ route('structure.dashboard.members.authorizations.update', [
                    'structure' => $user->userStructure->structure,
                    'id' => $user->authorizations->id]) }}"
                          method="POST">

                        @csrf
                        <div class="form-group">
                            @foreach ($user->authorizations->attributesToArray() as $key => $item)
                            <div class="row">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox"
                                           id="{{ $key }}" {{ $item == true ? 'checked' : '' }}
                                           name="{{ $key }}" value="1" />
                                    <label class="form-check-label" for="{{ $key }}">
                                        {{ ucfirst(trans('structure.permissions.' . $key)) }}
                                    </label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <input class="btn btn-primary" type="submit" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
