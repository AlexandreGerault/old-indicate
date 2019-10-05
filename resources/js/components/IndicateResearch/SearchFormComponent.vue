<template>
    <form id="indicate-search" method="GET" :action="this.action">
        <div class="form-group">
            <!-- Name or keywords/tags -->
            <input class="form-control" type="text" placeholder="Nom ou mots clés" aria-label="Search">
        </div>

        <div class="form-group">
            <label for="data_type">Type de structure recherchése</label>
            <select name="data_type" id="data_type" v-model="type" class="custom-select">
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
            <consulting-form-component />
        </div>
        <div v-else-if="type === 'investor'">
            <investor-form-component />
        </div>

        <input type="submit" value="Rechercher" class="btn btn-primary" />
   </form>
</template>

<script>
import CompanyFormComponent from './CompanyFormComponent'
import InvestorFormComponent from './InvestorFormComponent'
import ConsultingFormComponent from './ConsultingFormComponent'

export default {
    props: [
        'action'
    ],
    components: {
        CompanyFormComponent,
        InvestorFormComponent,
        ConsultingFormComponent
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
