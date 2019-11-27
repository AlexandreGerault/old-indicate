@extends('layouts.dashboard')

@section('title', __('Gestion des caractéristiques'))

@section('content')
<h1>{{ ucfirst(trans('structure.profile')) }}</h1>
@include('includes.forms.structure.dashboard.editGeneral')
@include('includes.forms.structure.dashboard.editContact')
@include('includes.forms.structure.dashboard.characteristics.' . preg_replace('/_data$/', '', $structure->data_type))
@endsection
