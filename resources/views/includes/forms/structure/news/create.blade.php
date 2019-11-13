<form action="{{ route('news.store', ['structure' => $structure]) }}" method="POST">
    @csrf
    <label for="title">{{ ucfirst(trans('news.title')) }}</label>
    <input class="form-control" type="text" name="title"  id="title" />
    <textarea class="form-control my-2" name="content"></textarea>
    <input type="submit" class="btn btn-primary" />
</form>
