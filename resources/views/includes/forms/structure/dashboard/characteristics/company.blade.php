<form
    action="{{ route('structure.dashboard.profile.update.company', auth()->user()->userStructure->structure) }}"
    method="POST">

    @csrf
    <div class="row">
        <div class="col m-3 card">
            <div class="card-body">
                <h3 class="mb-5">
                    {{ ucfirst(trans('structure.characteristics')) }}
                </h3>
                <div class="form-check">
                    <input type="checkbox" name="partnership" id="partnership" value="1"
                        {{ $structure->data->partnership ? 'checked' : '' }}/>
                    <label for="partnership">
                        {{ ucfirst(trans('structure.data.company.partnership')) }}
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="accept_offers" id="accept_offers" value="1"
                        {{ $structure->data->accept_offers ? 'checked' : '' }} />
                    <label for="accept_offers">
                        {{ ucfirst(trans('structure.data.company.accept_offers')) }}
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="bank_funding" id="bank_funding" value="1"
                        {{ $structure->data->bank_funding ? 'checked' : '' }}/>
                    <label for="bank-funding">
                        {{ ucfirst(trans('structure.data.company.bank_funding')) }}
                    </label>
                </div>
                <div class="form-group row">
                    <label for="turnover_projection" class="col-sm-2 col-form-label">
                        {{ ucfirst(trans('structure.data.company.turnover_projection')) }}
                    </label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="turnover_projection"
                               name="turnover_projection" value="{{ $structure->data->turnover_projection }}"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="ebitda" class="col-sm-2 col-form-label">
                        {{ ucfirst(trans('structure.data.company.ebitda')) }}
                    </label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="ebitda"
                               name="ebitda" value="{{ $structure->data->ebitda }}" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="clients_number" class="col-sm-2 col-form-label">
                        {{ ucfirst(trans('structure.data.company.clients_number')) }}
                    </label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="clients_number"
                               name="clients_number" value="{{ $structure->data->clients_number }}" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="average_monthly_turnover" class="col-sm-2 col-form-label">
                        {{ ucfirst(trans('structure.data.company.average_monthly_turnover')) }}
                    </label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="average_monthly_turnover"
                               name="average_monthly_turnover"
                               value="{{ $structure->data->average_monthly_turnover }}" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="gross_margin" class="col-sm-2 col-form-label">
                        {{ ucfirst(trans('structure.data.company.gross_margin')) }}
                    </label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="gross_margin"
                               name="gross_margin" value="{{ $structure->data->gross_margin }}"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="logistic_cost" class="col-sm-2 col-form-label">
                        {{ ucfirst(trans('structure.data.company.logistic_cost')) }}
                    </label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="logistic_cost"
                               name="logistic_cost" value="{{ $structure->data->logistic_cost }}" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="marketing_cost" class="col-sm-2 col-form-label">
                        {{ ucfirst(trans('structure.data.company.marketing_cost')) }}
                    </label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="marketing_cost"
                               name="marketing_cost" value="{{ $structure->data->marketing_cost }}" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="investment_sought" class="col-sm-2 col-form-label">
                        {{ ucfirst(trans('structure.data.company.invesment_sought')) }}
                    </label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="investment_sought"
                               name="investment_sought" value="{{ $structure->data->investment_sought }}" />
                    </div>
                </div>
                <input type="submit" class="btn btn-primary"/>
            </div>

        </div>
    </div>
</form>
