<div class="card mb-5">
    <div class="card-body">
        @if ($news->title)
        <h5 class="card-title font-weight-bold">{{ $news->title }}</h5>
        @endif
        <h6 class="card-subtitle my-2 text-muted">Utilisateur: <a href="{{ route('user.profile.show', ['id' => $news->author->id]) }}">{{ $news->author->firstname . ' ' . $news->author->lastname}}</a> &gt; <a href="{{ route('structure.profile.show', ['id' => $news->structure->id]) }}">{{ $news->structure->name }}</a></h6>
        <p class="card-text">{{ $slot }}</p>
        @can('delete', $news)
        <button class="btn btn-danger" data-id="{{ $news->id }}" data-action="delete"><i class="fas fa-trash-alt"></i></button>
        @endif
    </div>
</div>