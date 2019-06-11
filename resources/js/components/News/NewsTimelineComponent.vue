<template>
    <div>
        <div v-for="(item, $index) in newsFeed" :key="$index">
            <news-item :news="item"
                :update-route="baseUpdateRoute + item.id"
                :delete-route="baseDeleteRoute + item.id"
                :user-route="baseUserRoute + item.author.id"
                :structure-route="baseStructureRoute + item.structure.id"
            ></news-item>
        </div>

        <infinite-loading @infinite="infiniteHandler">
            <div slot="no-results">
                <i class="far fa-times-circle fa-2x"></i>
            </div>
        </infinite-loading>
    </div>
</template>

<script>
import NewsItemComponent from './NewsItemComponent.vue';

export default {
    components: {
        'news-item': NewsItemComponent,
    },
    data () {
        return {
            page: 1,
            newsFeed: [],
        };
    },
    props: ['getRoute', 'baseUpdateRoute', 'baseDeleteRoute', 'baseUserRoute', 'baseStructureRoute'],
    methods: {
        infiniteHandler ($state) {
            let vm = this;
            axios.get(
                vm.getRoute, {
                    params: {
                        page: vm.page,
                    },
                }
            ).then((response) => {
                console.log(response.data)
                if (response.data.length) {
                    vm.page += 1;
                    vm.newsFeed.push(...response.data);
                    $state.complete();
                } else {
                    $state.complete();
                }
            });
        },
    }
}
</script>