<form method="post" action="{{ route('rating.store', ['structure' => $structure]) }}">
    @csrf
    <div class="form-group">
        <label for="comment">@lang('structure/rating.comment')</label>
        <textarea class="form-control" name="comment" id="comment"></textarea>
    </div>
    <div class="form-group">
        <label for="support_quality">@lang('structure/rating.support_quality')</label>
        <input class="form-control" name="support_quality" id="support_quality" type="number" min="0" max="5"/>
    </div>
    <div class="form-group">
        <label for="procedure_simplicity">@lang('structure/rating.procedure_simplicity')</label>
        <input class="form-control" name="procedure_simplicity" id="procedure_simplicity" type="number" min="0" max="5"/>
    </div>
    <div class="form-group">
        <label for="procedure_speed">@lang('structure/rating.procedure_speed')</label>
        <input class="form-control" name="procedure_speed" id="procedure_speed" type="number" min="0" max="5"/>
    </div>
    <div class="form-group">
        <label for="global_rating">@lang('structure/rating.global_rating')</label>
        <input class="form-control" name="global_rating" id="global_rating" type="number" min="0" max="5"/>
    </div>

    <input type="submit" class="btn btn-primary">

</form>
