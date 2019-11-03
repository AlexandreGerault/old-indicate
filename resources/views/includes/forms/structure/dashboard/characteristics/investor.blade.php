<form action="{{ route('structure.dashboard.profile.update.investor', auth()->user()->userStructure->structure) }}" method="POST">
    @csrf
    <div class="row">
        <div class="col m-3 card">
            <div class="card-body">
                <h3 class="mb-5">@lang('ui.structure.characteristics')</h3>
                <div class="form-check">
                    <input type="checkbox" name="provide_consulting" id="provide_consulting" value="1" {{ $structure->data->provide_consulting ? 'checked' : '' }}/>
                    <label for="provide_consulting">@lang('structure/data.investor.provide_consulting')</label>
                </div>
                <div class="form-group row">
                    <label for="funding_min" class="col-sm-2 col-form-label">@lang('structure/data.investor.funding_min')</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="funding_min" name="funding_min" value="{{ $structure->data->funding_min }}" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="funding_max" class="col-sm-2 col-form-label">@lang('structure/data.investor.funding_max')</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="funding_max" name="funding_max" value="{{ $structure->data->funding_max }}" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="funding_domain" class="col-sm-2 col-form-label">@lang('structure/data.investor.funding_domain')</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="funding_domain" name="funding_domain" value="{{ $structure->data->funding_domain }}" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="company_type" class="col-sm-2 col-form-label">@lang('structure/data.investor.company_type')</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="company_type" name="company_type" value="{{ $structure->data->company_type }}" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="funding_location" class="col-sm-2 col-form-label">@lang('structure/data.investor.funding_location')</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="funding_location" name="funding_location" value="{{ $structure->data->funding_location }}" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="funding_way" class="col-sm-2 col-form-label">@lang('structure/data.investor.funding_way')</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="funding_way" name="funding_way" value="{{ $structure->data->funding_way }}" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="funding_step" class="col-sm-2 col-form-label">@lang('structure/data.investor.funding_step')</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="funding_step" name="funding_step" value="{{ $structure->data->funding_step }}" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="financial_means" class="col-sm-2 col-form-label">@lang('structure/data.investor.financial_means')</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="financial_means" name="financial_means" value="{{ $structure->data->financial_means }}" />
                    </div>
                </div>

                <input type="submit" class="btn btn-primary"/>
            </div>

        </div>
    </div>
</form>
