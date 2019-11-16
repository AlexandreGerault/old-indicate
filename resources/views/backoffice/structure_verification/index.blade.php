@extends('layouts.backoffice')

@section('title', ucfirst(trans('structure.validation.index')))

@section('content')
    <h1 class="mb-5">{{ ucfirst(trans('structure.validation.index')) }}</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>{{ ucfirst(trans('structure.info.name')) }}</th>
            <th>actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($structures as $structure)
            <tr>
                <td>
                    <a href="{{ route('structure.show', ['structure' => $structure]) }}">
                        {{ $structure->name }}
                    </a>
                </td>
                <td>
                    <a class="btn btn-primary" href="{{ route('structure-validation.validates', [
                    'structure' => $structure]) }}">
                        {{ ucfirst(trans('structure.validation.validates')) }}
                    </a>
                    <a class="btn btn-primary" href="{{ route('structure-validation.show', [
                    'structure' => $structure]) }}">
                        {{ ucfirst(trans('structure.validation.showshort')) }}
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $structures->links() }}
@endsection
