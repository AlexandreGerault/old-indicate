<template>
    <div>
        <div class="form-group">
            <label for="customers-min">Taux de survie à 5 ans</label>
            <input type="number" name="survival-rate" id="survival-rate" class="form-control" placeholder="Pourcentage"/>
        </div>
        <div class="form-group">
            <label for="investment-type">Type de conseil</label>
            <select name="consulting-type" id="investment-type" v-model="type" class="custom-select">
                <option value="value">Une des options</option>
            </select>
        </div>
        <div class="form-group">
            <div class="form-check">
                <input type="checkbox" name="funding-help" id="funding-help" />
                <label for="funding-help">Propose de l'aide financière ?</label>
            </div>
        </div>
        <div class="form-group">
            <label for="company-type">Quel type d'entreprise conseillée ?</label>
            <input type="text" name="company-type" id="company-type" class="form-control" placeholder="PME"/>
        </div>
        <div class="form-group">
            <label for="consulting-domain">Dans quel domaine de conseil ?</label>
            <input type="text" name="consulting-domain" id="consulting-domain" class="form-control" placeholder="Deeptech"/>
        </div>
        <div class="form-group">
            <label for="seeking-location">Dans quelle localisation ?</label>
            <input type="text" name="seeking-location" id="seeking-location" class="form-control" placeholder="Deeptech"/>
        </div>
    </div>
</template>

<script>
export default {

}
</script>
