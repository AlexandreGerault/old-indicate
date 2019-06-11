<template>
    <article class="card mb-5" v-if="! isDeleted && ! editing">
        <div class="card-body">
            <h6 class="card-subtitle my-2 mb-3 text-muted">
                Utilisateur: <a :href="this.userRoute">{{ authorFullname }}</a> 
                &gt; 
                <a :href="this.structureRoute">{{ news.structure.name }}</a>
            </h6>
            <h5 class="card-title font-weight-bold" v-if="localTitle">{{ localTitle }}</h5>
            <p class="card-text">{{ localContent }}</p>
            <template v-if="news.canDelete || news.canEdit">
                <a role="button" class="text-primary card-link" v-if="news.canEdit" v-on:click.prevent="toggleEdit">Éditer</a>
                <a role="button" class="text-primary card-link" v-if="news.canDelete" v-on:click.prevent="deleteNews">Supprimer</a>
            </template>
        </div>
        
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
                editing: false,
                isDeleted: false,
                localTitle: this.news.title,
                localContent: this.news.content
            }
        },
        mounted () {
            console.log(this.news);
        },
        computed: {
            authorFullname: function () {
                    return this.news.author.firstname + ' ' + this.news.author.lastname
            }
        },
        props: ['news', 'updateRoute', 'deleteRoute', 'userRoute', 'structureRoute'],
        methods: {
            toggleEdit: function(event) {
                this.editing = !this.editing

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
