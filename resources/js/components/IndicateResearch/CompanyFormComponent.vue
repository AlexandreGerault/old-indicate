<template>
    <div>
        <div class="form-group">
            <label for="customer-min">Nombre de clients</label>
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
            <label for="ebitda-min">EBITDA</label>
            <div class="form-row">
                <div class="col">
                    <input type="number" name="ebitda-min" id="ebitda-min" class="form-control" placeholder="Minimum"/>
                </div>
                <div class="col">
                    <input type="number" name="ebitda-max" id="ebitda-max" class="form-control" placeholder="Maximum"/>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="valued-turnover-min">Projection du chiffre d'affaire</label>
            <div class="form-row">
                <div class="col">
                    <input type="number" name="valued-turnover-min" id="valued-turnover-min" class="form-control" placeholder="Minimum"/>
                </div>
                <div class="col">
                    <input type="number" name="valued-turnover-max" id="valued-turnover-max" class="form-control" placeholder="Maximum"/>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="average-turnover-min">Chiffre d'affaire mensuel moyen</label>
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
        <div class="form-group">
            <div class="form-check">
                <input type="checkbox" name="looking-partnership" id="looking-partnership" />
                <label for="looking-investors">Partenariat</label>
            </div>
            <div class="form-check">
                <input type="checkbox" name="looking-shareholding" id="looking-shareholding" />
                <label for="looking-investors">Actionnariat</label>
            </div>
            <div class="form-check">
                <input type="checkbox" name="looking-bank-funding" id="looking-bank-funding" />
                <label for="looking-investors">Financement bancaire</label>
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
