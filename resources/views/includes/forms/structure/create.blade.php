<form method="post" action="{{ route('structure.store') }}" enctype="multipart/form-data">
    @csrf
    <h3 class="text-left h4">Informations générales</h3>
    <div class="form-group mb-3">
        <label for="name">@lang('ui.structure.name')</label>
        <input type="text" class="form-control" placeholder="Sherlock Holmes & Co" id="name" name="name" required="required" value="{{ old('name') }}">
    </div>
    <div class="form-group mb-3">
        <label for="name">@lang('ui.structure.comment')</label>
        <input type="text" class="form-control" placeholder="Elementary, my dear Watson!" id="comment" name="comment" required="required" value="{{ old('comment') }}">
    </div>
    <div class="form-group mb-3">
        <label for="name">@lang('ui.structure.siren')</label>
        <input type="number" class="form-control" placeholder="123456789" id="siren" name="siren" required="required" value="{{ old('siren') }}">
    </div>
    <div class="form-group mb-3">
        <label for="name">@lang('ui.structure.siret')</label>
        <input type="number" class="form-control" placeholder="12345678900010" id="siret" name="siret" required="required" value="{{ old('siret') }}">
    </div>
    <div class="form-group mb-3">
        <label for="data_type">@lang('ui.structure.type')</label>
        <select class="form-control" id="data_type" name="data_type">
            <option value="investor">@lang('ui.structure.investor')</option>
            <option value="company">@lang('ui.structure.company')</option>
            <option value="consulting">@lang('ui.structure.consulting')</option>
        </select>
    </div>
    <div class="form-group mb-3">
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="avatar" id="avatar" aria-describedby="fileHelp">
            <label class="custom-file-label" for="avatar">@lang('ui.structure.upload.avatar')</label>
            <small id="fileHelp" class="form-text text-muted">{{ __('Choisissez un fichier valide : la taille de l\'image ne doit pas dépasser 2Mo.')}}</small>
        </div>
    </div>

    <h3 class="text-left h4">Moyens de contact</h3>
    <div class="form-group mb-3">
        <label for="name">@lang('ui.structure.phone')</label>
        <input type="tel" class="form-control" placeholder="0354897454" id="phone_number" name="phone_number" required="required" value="{{ old('phone_number') }}">
    </div>
    <div class="form-group mb-3">
        <label for="email">@lang('ui.structure.email')</label>
        <input type="email" class="form-control" placeholder="sherlock@holmes.co.uk" id="email" name="email" required="required" value="{{ old('email') }}">
    </div>
    <p class="small">L'adresse postale renseignée sera utilisée par défaut.<br />Si vous désirez utiliser une adresse postale différente du siègle social, il vous faudra revendiquer la structure.</p>

    <h3 class="text-left h4">Adresse du siège social</h3>
    <div class="form-group mb-3">
        <label for="road">@lang('ui.structure.road')</label>
        <input type="text" class="form-control" placeholder="Baker Street" id="road" name="road" required="required" value="{{ old('road') }}">
    </div>
    <div class="form-group mb-3">
        <label for="house_number">@lang('ui.structure.house_number')</label>
        <input type="number" class="form-control" placeholder="221" id="house_number" name="house_number" required="required" value="{{ old('house_number') }}">
    </div>
    <div class="form-group mb-3">
        <label for="city">@lang('ui.structure.city')</label>
        <input type="text" class="form-control" placeholder="Londres" id="city" name="city" required="required" value="{{ old('city') }}">
    </div>
    <div class="form-group mb-3">
        <label for="postcode">@lang('ui.structure.postcode')</label>
        <input type="number" class="form-control" placeholder="NW1" id="postcode" name="postcode" required="required" value="{{ old('postcode') }}">
    </div>
    <div class="form-group mb-3">
        <label for="county">@lang('ui.structure.county')</label>
        <input type="text" class="form-control" placeholder="Westminter" id="county" name="county" required="required" value="{{ old('county') }}">
    </div>
    <div class="form-group mb-3">
        <label for="country">@lang('ui.structure.country')</label>
        <input type="text" class="form-control" placeholder="England" id="country" name="country" required="required" value="{{ old('country') }}">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
