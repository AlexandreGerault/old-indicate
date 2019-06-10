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

        <infinite-loading @infinite="infiniteHandler"></infinite-loading>
    </div>
</template>

<script>
export default {
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
                if (response.data.data.length) {
                    vm.page += 1;
                    vm.newsFeed.push(...response.data.data);
                    $state.loaded();
                } else {
                    $state.complete();
                }
            });
        },
    }
}
</script>