@extends('layouts.blog')

@section('title', 'Édition d\'un nouvel article')

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
        <form id="edit_post_form" action="{{ route('blog.update', ['id' => $post->id]) }}" method="post">
        @csrf
            <div class="form-group">
                <label for="">Titre de l'article</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ $post->title }}">
            </div>
            <div class="form-group">
                <input type="hidden" name="content" id="content" value="{!! $post->content !!}" />
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

    console.log(editor) 
    var quill = new Quill(editor, {
        modules: {
            toolbar: toolbarOptions
          },  
        theme: 'snow'
    });

    var form = document.querySelector('#edit_post_form');
    var content = document.querySelector('input[name=content]');
    quill.root.innerHTML = content.value;

    form.onsubmit = function() {
        var content = document.querySelector('input[name=content]');
        content.value = quill.root.innerHTML;
    }
}
</script>
@endsection