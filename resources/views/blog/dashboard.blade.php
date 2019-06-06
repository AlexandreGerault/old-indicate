@extends('layouts.blog')

@section('title', 'Tableau de bord')

@section('content')
<h1>Tableau de bord</h1>
<a href="{{ route('blog.create') }}" class="btn btn-success my-3">Créer un article</a>
<div class="row">
    <table class="table">
        <thead>
            <th scope="col">id</th>
            <th scope="col">Titre</th>
            <th scope="col">Créé le</th>
            <th scope="col">Auteur</th>
            <th scope="col">Actions</th>
        </thead>
        @foreach($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->created_at }}</td>
            <td>{{ $post->author->name }}</td>
            <td>
                <a class="btn btn-sm btn-warning" href="{{ route('blog.edit', ['id' => $post->id]) }}"><i class="fas fa-pencil-alt"></i></a>
                <a class="btn btn-sm btn-danger text-white" href="{{ route('blog.delete', ['id' => $post->id]) }}"><i class="fas fa-trash"></i></a>
            </td>
        </tr>
    @endforeach
    </table>

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