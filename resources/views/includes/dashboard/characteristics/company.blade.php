<h2>Company information</h2>
<form action="{{ route('structure.dashboard.characteristics.update.company', auth()->user()->userStructure->structure) }}" method="POST">
    @csrf
    <div class="row">
            <div class="col m-3 card">
                <div class="card-body">
                    <h3 class="mb-5">General information</h3>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" value="{{ $structure->name }}" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="comment" class="col-sm-2 col-form-label">Comment</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="comment" name="comment" value="{{ $structure->comment }}" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="address" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="address" name="address" value="{{ $structure->address }}" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone-number" class="col-sm-2 col-form-label">Phone number</label>
                        <div class="col-sm-10">
                            <input type="tel" class="form-control" id="phone_number" name="phone_number" value="{{ $structure->phone_number }}" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="siren" class="col-sm-2 col-form-label">Siren</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="siren" name="siren" value="{{ $structure->siren }}" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="siret" class="col-sm-2 col-form-label">Siret</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="siret" name="siret" value="{{ $structure->siret }}" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="created_at" class="col-sm-2 col-form-label">Creation date</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="created_at" name="created_at"  value="{{ $structure->created_at->toDateString() }}"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="share_capital" class="col-sm-2 col-form-label">Share capital</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="share_capital" name="share_capital" value="{{ $structure->data->share_capital }}"/>
                        </div>
                    </div>
                </div>
            </div>
    </div>


        <div class="row">
            <div class="col m-3 card">
                <div class="card-body">
                    <h3 class="mb-5">Detailed information</h3>
                    <div class="form-check">
                        <input type="checkbox" name="partnership" id="partnership" value="1" {{ $structure->data->partnership ? 'checked' : '' }}/>
                        <label for="partnership">Partnership</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="accept_offers" id="accept_offers" value="1" {{ $structure->data->accept_offers ? 'checked' : '' }} />
                        <label for="accept_offers">Accept offers</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="bank_funding" id="bank_funding" value="1" {{ $structure->data->bank_funding ? 'checked' : '' }}/>
                        <label for="bank-funding">Bank funding</label>
                    </div>
                    <div class="form-group row">
                        <label for="turnover_projection" class="col-sm-2 col-form-label">Turnover projection</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="turnover_projection" name="turnover_projection" value="{{ $structure->data->turnover_projection }}"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ebitda" class="col-sm-2 col-form-label">EBITDA</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="ebitda" name="ebitda" value="{{ $structure->data->ebitda }}" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="clients_number" class="col-sm-2 col-form-label">Clients</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="clients_number" name="clients_number" value="{{ $structure->data->clients_number }}" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="average_monthly_turnover" class="col-sm-2 col-form-label">Average monthly turnover</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="average_monthly_turnover" name="average_monthly_turnover" value="{{ $structure->data->average_monthly_turnover }}" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="gross_margin" class="col-sm-2 col-form-label">Gross margin</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="gross_margin" name="gross_margin" value="{{ $structure->data->gross_margin }}"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="logistic_cost" class="col-sm-2 col-form-label">Logistic cost</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="logistic_cost" name="logistic_cost" value="{{ $structure->data->logistic_cost }}" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="marketing_cost" class="col-sm-2 col-form-label">Marketing cost</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="marketing_cost" name="marketing_cost" value="{{ $structure->data->marketing_cost }}" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="investment_sought" class="col-sm-2 col-form-label">Investment sought</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="investment_sought" name="investment_sought" value="{{ $structure->data->investment_sought }}" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <input class="btn btn-primary mb-3 ml-3" type="submit" value="Submit">
</form>
