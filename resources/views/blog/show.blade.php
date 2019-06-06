@extends('layouts.blog')

@section('title', $post->title)

@section('content')
<div class="row">
    <div class="col-lg-8">
        <h1>{{ $post->title }}</h1>
        <p class="lead">écrit par {{ $post->author->name }}</p>
        <hr>
        <p>Posté le {{ $post->created_at }}</p>
        <hr>
        <p>
            {!! $post->content !!}
        </p>
    </div>
</div>
@endsection