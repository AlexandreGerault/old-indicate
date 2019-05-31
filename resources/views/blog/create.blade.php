@extends('layouts.blog')

@section('title', 'Écriture d\'un nouvel article')

@section('content')
  @isset($validator)
    <div class="alert alert-danger" role="alert">
    @foreach($validator as $error)
        <p>{{ $error }}</p>
    @endforeach
    </div>
  @endisset
<h1>Création d'un article</h1>
<div class="row">
    <div class="col-lg-8">
        <form id="write_post_form" action="{{ route('blog.store') }}" method="post">
        @csrf
            <div class="form-group">
                <label for="">Titre de l'article</label>
                <input type="text" class="form-control" name="title" id="title">
            </div>
            <div class="form-group">
                <input type="hidden" name="content" id="content"/>
                <div class="form-control" name="" id="editor"></div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Valider</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
if(editor != null) {
    quill = new Quill(editor, {
        modules: {
            toolbar: toolbarOptions
          },  
        theme: 'snow'
    });

    var form = document.querySelector('#write_post_form');

    form.onsubmit = function() {
        var content = document.querySelector('input[name=content]');
        content.value = quill.root.innerHTML;
    }
}
</script>
@endsection