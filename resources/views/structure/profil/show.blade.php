@extends('layouts.app')

@section('title', 'Profil de '. $structure->name)

@section('content')
<div class="py-5">
    <div class="container">
        <div class="row shadow-none border-light">
            <div class="col-md-4"><img class="img-fluid d-block"
                    src="https://static.pingendo.com/img-placeholder-3.svg">
            </div>
            <div class="col-md-8 shadow-none">
                <h1 class="">{{ $structure->name }}</h1>
                <p class="">{{ $structure->comment }}</p>
            </div>
        </div>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
            <div class="pr-3" style="border-right: 3px solid black;">
                <div class="card mb-5">
                    <div class="card-body">
                        <h5 class="card-title"><b>Alexandre Gérault &gt; Indicate</b></h5>
                        <h6 class="card-subtitle my-2 text-muted">Un petit message</h6>
                        <p class="card-text">Juste un petit message pour vérifier que le réseau social fonctionne</p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><b>Title</b></h5>
                        <h6 class="card-subtitle my-2 text-muted">Subtitle</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>
            </div>
            </div>
            <div class="col-md-3 card px-3 pb-3 pt-3">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <h3 class="">Suggestions</h3>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-4"><img class="img-fluid d-block rounded-circle"
                            src="https://static.pingendo.com/img-placeholder-3.svg"></div>
                    <div class="col-md-8">
                        <h4 class="">Indicate</h4><a class="label" href="#">Button</a>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-4"><img class="img-fluid d-block rounded-circle"
                            src="https://static.pingendo.com/img-placeholder-3.svg"></div>
                    <div class="col-md-8">
                        <h4 class="">WarpZone</h4><a class="label" href="#">Button</a>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-4"><img class="img-fluid d-block rounded-circle"
                            src="https://static.pingendo.com/img-placeholder-3.svg"></div>
                    <div class="col-md-8">
                        <h4 class="">Incubateur</h4><a class="label" href="#">Button</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
