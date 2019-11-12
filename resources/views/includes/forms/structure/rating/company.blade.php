<form method="post" action="{{ route('rating.store', ['structure' => $structure]) }}">
    @csrf
    <div class="form-group">
        <label for="comment">@lang('structure/rating.comment')</label>
        <textarea class="form-control" name="comment" id="comment"></textarea>
    </div>
    <div class="form-group">
        <label for="skills">@lang('structure/rating.skills')</label>
        <input class="form-control" type="number" min="0" max="5" name="skills" id="skills" />
    </div>
    <div class="form-group">
        <label for="expertise">@lang('structure/rating.expertise')</label>
        <input class="form-control" type="number" min="0" max="5" name="expertise" id="expertise" />
    </div>
    <div class="form-group">
        <label for="market">@lang('structure/rating.market')</label>
        <input class="form-control" type="number" min="0" max="5" name="market" id="market" />
    </div>
    <div class="form-group">
        <label for="advantage_designed">@lang('structure/rating.advantage_designed')</label>
        <input class="form-control" type="number" min="0" max="5" name="advantage_designed" id="advantage_designed" />
    </div>
    <div class="form-group">
        <label for="team">@lang('structure/rating.team')</label>
        <input class="form-control" type="number" min="0" max="5" name="team" id="team" />
    </div>
    <div class="form-group">
        <label for="shareholding_created">@lang('structure/rating.shareholding_created')</label>
        <input class="form-control" type="number" min="0" max="5" name="shareholding_created" id="shareholding_created" />
    </div>
    <div class="form-group">
        <label for="input_barrier">@lang('structure/rating.input_barrier')</label>
        <input class="form-control" type="number" min="0" max="5" name="input_barrier" id="input_barrier" />
    </div>
    <div class="form-group">
        <label for="value_creation">@lang('structure/rating.value_creation')</label>
        <input class="form-control" type="number" min="0" max="5" name="value_creation" id="value_creation" />
    </div>

    <input type="submit" class="btn btn-primary">

</form>
