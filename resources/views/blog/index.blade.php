@extends('layouts.blog')

@section('title', 'Indicate, le blog : La boussole du développement')

@section('content')
<div class="row">

  <!-- Blog Entries Column -->
  <div class="col-md-12">
<!-- Search Widget -->
    <div class="my-4">
    @isset($validator)
    <div class="alert alert-danger" role="alert">
    @foreach($validator as $error)
        <p>{{ $error }}</p>
    @endforeach
    </div>
    @endisset
    <form action=" {{ route('blog.search') }}" method="get">
    <div class="input-group">
          <input type="text" class="form-control mx-2" placeholder="Chercher un article..." name="title">
          <span class="input-group-btn">
            <button class="btn btn-secondary" type="submit"><i class="fas fa-search"></i></button>
          </span>
      </div>
    </form>
    </div>

    <h1 class="my-4">{!! $title !!}</h1>

    <!-- Blog Post -->
    @foreach ($posts as $post)
    <div class="card mb-4 post-preview">
      <div class="card-body">
        <h2 class="card-title">{{ $post->title }}</h2>
        <div class="card-text post-preview-content">{!! substr($post->content, 0, 255) . "..." !!}</div>
        <p class="card-text">
          <a href="/read/{{ $post->id }}/{{ str_slug($post->title) }}" class="btn btn-primary">Read More &rarr;</a>
          @blogger
          <a class="btn btn-sm btn-warning" href="{{ route('blog.edit', ['id' => $post->id]) }}"><i class="fas fa-pencil-alt"></i></a>
          <a class="btn btn-sm btn-danger text-white" href="{{ route('blog.delete', ['id' => $post->id]) }}"><i class="fas fa-trash"></i></a>
          @endblogger
        </p>
      </div>
      <div class="card-footer text-muted">
        Posté le {!! $post->created_at->format('l j F Y') !!} à {!! $post->created_at->format('G:i') !!} par <a href="#">{{ $post->author->name }}</a>
      </div>
    </div>
    @endforeach

    <!-- Pagination -->
    <ul class="pagination justify-content-center mb-4">
      {!! $posts->links() !!}
    </ul>
  </div>
@endsection

@section('scripts')
<script>
var deleteButtons = document.querySelectorAll('.btn-danger');
deleteButtons.forEach(element => {
    element.addEventListener('click', function(event) {
        if(!confirm('Voulez-vous vraiment supprimer cet article ?'))
            event.preventDefault();

        return false;
    });
});
</script>
@endsection