<template>
    <article class="card mb-5" v-if="! isDeleted && ! editing">
        <div class="card-header">
            <h6 class="card-subtitle my-2 text-muted">
                Utilisateur: <a :href="userRoute">{{ userName }}</a> 
                &gt; 
                <a :href="structureRoute">{{ structureName }}</a>
            </h6>
        </div>
        <div class="card-body">
            <h5 class="card-title font-weight-bold" v-if="localTitle">{{ localTitle }}</h5>
            <p class="card-text">{{ localContent }}</p>
        </div>
        <template v-if="canDelete || canEdit">
            <div class="card-footer">
                <a role="button" class="text-primary card-link" v-if="canEdit" v-on:click.prevent="toggleEdit">Éditer</a>
                <a role="button" class="text-primary card-link" v-if="canDelete" v-on:click.prevent="deleteNews">Supprimer</a>
            </div>
        </template>
    </article>

    <div v-else-if="! isDeleted && editing">
        <form class="card mb-5" method="post" :action="updateRoute" v-on:submit.prevent="updateNews">
            <input name="_method" type="hidden" value="PATCH">
            <div class="card-body">
                <h4 class="mb-4 card-title">Éditer la news</h4>
                <input type="text" name="title" id="title" placeholder="(Optionnel) Titre de la news" class="form-control" v-model="localTitle" />
                <div class="md-form">
                    <label for="content"></label>
                    <textarea id="content" name="content" class="md-textarea form-control" rows="3" placeholder="Contenu de la news" v-model="localContent"></textarea>
                </div>
                <input type="submit" class="btn btn-primary mt-4" value="Publier"/>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                editing: '',
                isDeleted: '',
                localTitle: this.title,
                localContent: this.textContent
            }
        },
        props: [
            'title',
            'newsId',
            'userId',
            'userName',
            'structureId',
            'structureName',
            'textContent',
            'canEdit',
            'canDelete',
            'updateRoute',
            'deleteRoute',
            'userRoute',
            'structureRoute'],
        mounted() {
            this.isDeleted = false
            this.editing = false
        },
        methods: {
            toggleEdit: function(event) {
                console.log('BEFORE TOGGLE: ' + this.editing)
                this.editing = !this.editing
                console.log('AFTER TOGGLE: ' + this.editing)

            },
            updateNews: function(event) {
                let current = this
                axios.patch(this.updateRoute, {
                    title: current.localTitle,
                    content: current.localContent,
                }).then(function (response) {
                    console.log('[RESPONSE] ', response)
                    if(response.status === 200)
                    current.toggleEdit()
                }).catch(function (error) {
                    console.log('[ERROR] ', error)
                });
            },
            deleteNews: function(event) {
                axios.delete(this.deleteRoute).then(function (response) {
                    console.log(response)
                }).catch(function (error) {
                    console.log(error)
                })
                this.isDeleted = true
            },
        }
    }
</script>
