<form action="{{ route('structure.dashboard.profile.update.contact', auth()->user()->userStructure->structure) }}" method="POST">
    @csrf
    <div class="row">
        <div class="col m-3 card">
            <div class="card-body">
                <h3 class="mb-5">
                    {{ ucfirst(trans('structure.info.contact')) }}
                </h3>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">
                        {{ ucfirst(trans('structure.info.email')) }}
                    </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="email"
                               name="email" value="{{ $structure->contact->email }}" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="phone_number" class="col-sm-2 col-form-label">
                        {{ ucfirst(trans('structure.info.phone')) }}
                    </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="phone_number"
                               name="phone_number" value="{{ $structure->contact->phone_number }}" />
                    </div>
                </div>
                <input type="submit" class="btn btn-primary"/>
            </div>
        </div>
    </div>
</form>
