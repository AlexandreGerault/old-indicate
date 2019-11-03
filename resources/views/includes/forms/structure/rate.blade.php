<form method="post" action="{{ route('structure.rate') }}">
    @csrf
    <div class="form-group">
        <input type="number" min="0" max="5" class="form-control" placeholder="{{ __('Compréhension de la problématique de l\'entreprise')}}" id="problematicRate" name="problematicRate" required="required" value="{{ old('problematicRate') }}">
    </div>
    <div class="form-group">
        <input type="number" min="0" max="5" class="form-control" placeholder="{{ __('Qualité du processus de collaboration')}}" id="collabRate" name="collabRate" required="required" value="{{ old('collabRate') }}">
    </div>
    <div class="form-group">
        <input type="number" min="0" max="5" class="form-control" placeholder="{{ __('Pertinence de la méthodologie utilisée')}}" id="methodRate" name="methodRate" required="required" value="{{ old('methodRate') }}">
    </div>
    <div class="form-group">
        <input type="number" min="0" max="5" class="form-control" placeholder="{{ __('Qualité des livrables')}}" id="problematicRate" name="problematicRate" required="required" value="{{ old('problematicRate') }}">
    </div>
    <div class="form-group">
        <input type="number" min="0" max="5" class="form-control" placeholder="{{ __('Compréhension de la problématique de l\'entreprise')}}" id="problematicRate" name="problematicRate" required="required" value="{{ old('problematicRate') }}">
    </div>
    <div class="form-group mb-3">
        <input type="number" class="form-control" placeholder="{{ __('Numéro Siret') }}" id="siret" name="siret" required="required" value="{{ old('siret') }}">
    </div>
    <div class="form-group">
        <label for="data_type"></label><select class="form-control" id="data_type" name="data_type">
            <option value="investor">{{ __('Investisseur') }}</option>
            <option value="company">{{ __('Entreprise') }}</option>
            <option value="consulting">{{ __('Structure de conseil') }}</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
