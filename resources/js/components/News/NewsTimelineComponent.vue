<template>
    <div>
        <div v-for="(item, $index) in newsFeed" :key="$index">
            <news-item :news="item"
                :update-route="'/news/' + item.id"
                :delete-route="'/news/' + item.id"
                :user-route="'/user/' + item.author.id"
                :structure-route="'/structure/' + item.structure.id"
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
    props: ['getRoute'],
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
                if (response.data.data.length) {
                    vm.page += 1;
                    vm.newsFeed.push(...response.data.data);
                    $state.complete();
                } else {
                    $state.complete();
                }
            });
        },
    }
}
</script>
