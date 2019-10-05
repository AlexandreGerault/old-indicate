@extends('layouts.app')

@section('title', 'Fil d\'actualité')

@section('content')
<div class="py-5">
    <div class="container">

        <!-- Page header -->
        <div class="row">
            <div class="col-12">
                
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-md-3">
                PROFIL ENTREPRISE
            </div>
            
            <div class="col-md-6 pt-3 pt-md-0" id="news">
                <news-timeline
                    get-route="/structure/{{ Auth::user()->userStructure->structure->id }}/timeline"
                    base-update-route="/news/update/"
                    base-delete-route="/news/delete/"
                    base-user-route="/user/profile/"
                    base-structure-route="/structure/profile/"></news-timeline>
            </div>

            <div class="col-md-3 pt-3 pt-md-0">
                <div id="simple-search-form">
                    <simple-search-form search-url="search/ajax" />
                </div>
            </div>
        </div>

</div>
@endsection