@extends('layouts.dashboard')

@section('title', __('Gestion des caractéristiques'))

@section('content')
<h1>Caractéristiques de la structure</h1>
@include('includes.dashboard.characteristics.' . $structure->data_type)
@endsection
