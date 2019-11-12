<div class="card">
    <header class="card-header">
        <h5 class="my-1"><a href="{{ route('user.show', ['user' => $rating->author]) }}">{{ $rating->author->firstname . ' ' . $rating->author->lastname}}</a></h5>
    </header>
    <div class="card-body">
        <p>
            {{$rating->comment}}
        </p>
        <ul>
            @foreach($rating->rating->makeHidden(['id', 'created_at', 'updated_at'])->attributesToArray() as $key => $value)
                <li><b>@lang('structure/rating.' . $key) :</b> {{ $value }} /5</li>
            @endforeach
        </ul>
    </div>
    <div class="card-footer">
        <p class="p-0 m-0">{{ $rating->created_at }}</p>
    </div>
</div>
