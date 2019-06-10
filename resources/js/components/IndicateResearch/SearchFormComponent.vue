<template>
    <form id="indicate-search" @submit.prevent="submitHandler">
        <div class="form-group">
            <label for="type">Type de structure recherchée</label>
            <select name="type" id="type" v-model="type" class="custom-select">
                <option value="company">Entreprise</option>
                <option value="investor">Investisseur</option>
                <option value="consulting">Structure de conseil</option>
            </select>
        </div>

        <div v-if="type === 'company'">
            <div class="form-group">
                <company-form-component />
            </div>
        </div>
        <div v-else-if="type === 'consulting'">
            FILTRES POUR CONSULTANTS
        </div>
        <div v-else-if="type === 'investor'">
            FILTRES POUR INVESTISSEURS
        </div>

        <input type="submit" value="Rechercher" class="btn btn-primary" />
   </form>
</template>

<script>
import CompanyFormComponent from './CompanyFormComponent'

export default {
    components: {
        CompanyFormComponent,
    },
    data () {
        return {
            type: '',
        }
    },
    mounted () {
        this.type = 'company';
    }
}
</script>