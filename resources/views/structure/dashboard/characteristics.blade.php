@extends('layouts.dashboard')

@section('title', __('Gestion des caractéristiques'))

@section('content')
<h1>Caractéristiques de la structure</h1>
{{ $structure->data_type }}
@include('includes.dashboard.characteristics.' . $structure->data_type)
@endsection
