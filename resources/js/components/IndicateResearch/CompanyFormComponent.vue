<template>
    <div>
        <div class="form-group">
            <label for="customers-min">Nombre de clients</label>
            <div class="form-row">
                <div class="col">
                    <input type="number" name="customer-min" id="customer-min" class="form-control" placeholder="Minimum"/>
                </div>
                <div class="col">
                    <input type="number" name="customer-max" id="customer-max" class="form-control" placeholder="Maximum"/>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="customers-min">Chiffre d'affaire mensuel moyen</label>
            <div class="form-row">
                <div class="col">
                    <input type="number" name="average-turnover-min" id="average-turnover-min" class="form-control" placeholder="Minimum"/>
                </div>
                <div class="col">
                    <input type="number" name="average-turnover-max" id="average-turnover-max" class="form-control" placeholder="Maximum"/>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>BFR</label>
            <div class="form-check">
                <input type="radio" name="bfr" id="bfr-positive" />
                <label for="bfr-positive">Positif</label>
            </div>
            <div class="form-check">
                <input type="radio" name="bfr" id="bfr-negative" />
                <label for="bfr-negative">Négatif</label>
            </div>
        </div>
        <div class="form-group">
            <div class="form-check">
                <input type="checkbox" name="looking-investors" id="looking-investors" v-model="lookingForInvestors"/>
                <label for="looking-investors">Recherche de financement</label>
            </div>
            <div class="form-row" v-if="lookingForInvestors">
                <div class="col">
                    <input type="number" name="looked-investment-min" id="looked-investment-min" class="form-control" placeholder="Minimum"/>
                </div>
                <div class="col">
                    <input type="number" name="looked-investment-max" id="looked-investment-max" class="form-control" placeholder="Maximum"/>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data () {
        return {
            lookingForInvestors: false,
        }
    }
}
</script>