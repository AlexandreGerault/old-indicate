<form action="{{ route('structure.update', auth()->user()->userStructure->structure) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('patch')
    <div class="row">
        <div class="col m-3 card">
            <div class="card-body">
                <h3 class="mb-5">General information</h3>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">
                        {{ ucfirst(trans('structure.info.name')) }}
                    </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name"
                               name="name" value="{{ $structure->name }}" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="comment" class="col-sm-2 col-form-label">
                        {{ ucfirst(trans('structure.info.comment')) }}
                    </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="comment"
                               name="comment" value="{{ $structure->comment }}" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="siren" class="col-sm-2 col-form-label">
                        {{ ucfirst(trans('structure.info.siren')) }}
                    </label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="siren"
                               name="siren" value="{{ $structure->siren }}" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="siret" class="col-sm-2 col-form-label">
                        {{ ucfirst(trans('structure.info.siret')) }}
                    </label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="siret"
                               name="siret" value="{{ $structure->siret }}" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="avatar">
                        {{ ucfirst(trans('structure.info.upload.avatar')) }}
                    </label>
                    <div class="custom-file col-sm-10">
                        <input type="file" class="custom-file-input"
                               name="avatar" id="avatar" aria-describedby="fileHelp">
                        <label class="custom-file-label" for="avatar">
                            {{ ucfirst(trans('structure.info.avatar.upload')) }}
                        </label>
                        <small id="fileHelp"
                               class="form-text text-muted">{{ ucfirst(trans('structure.info.avatar.upload.help')) }}
                        </small>
                    </div>
                </div>

                <input type="submit" class="btn btn-primary"/>
            </div>
        </div>
    </div>
</form>
