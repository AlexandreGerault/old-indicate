<template>
    <div>
        <div class="form-group">
            <label for="investment-type">Type d'investissement</label>
            <select name="investment-type" id="investment-type" v-model="type" class="custom-select">
                <option value="major">Majoritaire</option>
                <option value="minor">Minoritaire</option>
                <option value="indifferent">Indifférent</option>
            </select>
        </div>
        <div class="form-group">
            <label for="investment-step">Stade d'investissement</label>
            <select name="investment-step" id="investment-step" v-model="type" class="custom-select">
                <option value="priming">Amorçage</option>
                <option value="capital-risk">Capital risque</option>
                <option value="development-capital">Capital développement</option>
                <option value="transmission">Transmission</option>
                <option value="mezzanine">Mezzanine</option>
                <option value="turnaround">Retournement</option>
                <option value="development-capital">Capital développement</option>
                <option value="indifferent">Indifférent</option>
            </select>
        </div>
        <div class="form-group">
            <label for="investment-min">Montant de l'investissement</label>
            <div class="form-row">
                <div class="col">
                    <input type="number" name="investment-min" id="investment-min" class="form-control" placeholder="Minimum"/>
                </div>
                <div class="col">
                    <input type="number" name="investment-max" id="investment-max" class="form-control" placeholder="Maximum"/>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {

}
</script>
