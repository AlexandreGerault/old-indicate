@extends('layouts.dashboard')

@section('title', __('Gestion des caractéristiques'))

@section('content')
<h1>Profil de la structure</h1>
@include('includes.forms.structure.dashboard.editGeneral')
@include('includes.forms.structure.dashboard.editContact')
@include('includes.forms.structure.dashboard.characteristics.' . $structure->data_type)
@endsection
