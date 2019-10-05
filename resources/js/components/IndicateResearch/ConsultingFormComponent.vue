<template>
    <div>
        <div class="form-group">
            <label for="customers-min">Taux de survie à 5 ans</label>
            <input type="number" name="survival(rate" id="survival-rate" class="form-control" placeholder="Pourcentage"/>
        </div>
        <div class="form-group">
            <label for="type">Type d'investissement</label>
            <select name="type" id="type" v-model="type" class="custom-select">
                <option value="major">Majoritaire</option>
                <option value="minor">Minoritaire</option>
                <option value="indifferent">Indifférent</option>
            </select>
        </div>
        <div class="form-group">
            <label for="type">Stade d'investissement</label>
            <select name="type" id="type" v-model="type" class="custom-select">
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
            <label for="customers-min">Montant de l'investissement</label>
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