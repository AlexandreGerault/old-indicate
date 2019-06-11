<template>  
<div class="card">
    <div class="card-header">
        <h3 class="text-center m-0">Recherche</h3>
    </div>
    <div class="card-body">
        <form class="form-inline" action="" method="GET" @submit.prevent="search">
            <div class="input-group mb-4">
                <input class="form-control" type="text" placeholder="Chercher une structure" name="search" id="search-input" v-model="query" />
                <div class="input-group-append">
                    <button class="btn btn-secondary" type="submit"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
        <h4 class="mb-3" v-if="results.structures.length">{{ results.structures.length > 1 ? 'Structures' : 'Structure'}}</h4>
        <div class="">
            <p class="text-center mb-2" v-for="(item, $index) in results.structures" :key="$index">
                {{ item.name }}
            </p>
        </div>
        <h4 class="mb-3" v-if="results.users.length">{{ results.users.length > 1 ? 'Utilisateurs' : 'Utilisateur'}}</h4>
        <div class="">
            <p class="text-center mb-2" v-for="(item, $index) in results.users" :key="$index">
                {{ item.firstname + ' ' + item.lastname }}
            </p>
        </div>
    </div>
</div>
</template>

<script>
export default {
    data () {
        return {
            results: {
                structures: {},
                users: {}
            },
            query: ''
        }
    },
    props: ['searchUrl'],
    methods: {
        search: function (query) {
            let vm = this;

            axios.get(
                vm.searchUrl, {
                    params: {
                        search: vm.query,
                    },
                }
            ).then((response) => {
                console.log(response.data)
                if (response.data.structures.length || response.data.users.length) {
                    vm.results.structures = response.data.structures;
                    vm.results.users = response.data.users;
                }
            });
        }
    }
}
</script>