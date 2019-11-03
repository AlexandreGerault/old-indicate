<form action="{{ route('structure.dashboard.profile.update.consulting', auth()->user()->userStructure->structure) }}" method="POST">
    @csrf
    <div class="row">
        <div class="col m-3 card">
            <div class="card-body">
                <h3 class="mb-5">@lang('ui.structure.characteristics')</h3>
                <div class="form-check">
                    <input type="checkbox" name="funding_help" id="funding_help" value="1" {{ $structure->data->funding_help ? 'checked' : '' }}/>
                    <label for="funding_help">@lang('structure/data.consulting.funding_help')</label>
                </div>
                <div class="form-group row">
                    <label for="five_years_survival_rate" class="col-sm-2 col-form-label">@lang('structure/data.consulting.five_years_survival_rate')</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="five_years_survival_rate" name="five_years_survival_rate" value="{{ $structure->data->five_years_survival_rate }}" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="consulting_type" class="col-sm-2 col-form-label">@lang('structure/data.consulting.consulting_type')</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="consulting_type" name="consulting_type" value="{{ $structure->data->consulting_type }}" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="consulting_type" class="col-sm-2 col-form-label">@lang('structure/data.consulting.consulting_type')</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="consulting_type" name="consulting_type" value="{{ $structure->data->consulting_type }}" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="company_type" class="col-sm-2 col-form-label">@lang('structure/data.consulting.company_type')</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="company_type" name="company_type" value="{{ $structure->data->company_type }}" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="consulting_domain" class="col-sm-2 col-form-label">@lang('structure/data.consulting.consulting_domain')</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="consulting_domain" name="consulting_domain" value="{{ $structure->data->consulting_domain }}" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="seeking_location" class="col-sm-2 col-form-label">@lang('structure/data.consulting.seeking_location')</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="seeking_location" name="seeking_location" value="{{ $structure->data->seeking_location }}" />
                    </div>
                </div>

                <input type="submit" class="btn btn-primary"/>
            </div>

        </div>
    </div>
</form>
