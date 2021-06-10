<template>
    <div>
         <input type="text" v-model="q" class="form-control mb-3" placeholder="Rechercher...">
        <div class="alert alert-secondary" v-if="this.q && getFilteredPosts.length >= 1">
            {{ getFilteredPosts.length }} articles trouvés
        </div>
        <div class="alert alert-secondary" v-if="this.q && getFilteredPosts.length === 0">
            Aucun article trouvé
        </div>
        <div class="loader" v-if="this.loading"></div>
        
        <div class="row">
            <div v-for="adress in getFilteredPosts" v-bind:key="adress.data" class="col-sm-3">
            <!-- <div v-for="adress in this.posts" v-bind:key="adress.data"> -->
                <div class="card w-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ adress.adresse_nom_voie }}</h5>
                        <a v-bind:href="homeRoute+'/'+adress.adresse_nom_voie">afficher les DVF de cette rue</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
    export default {
        props: ['homeRoute'],


        data() {
            return {
                posts: [],
                q: '',
                loading: true
            }
        },
        methods: {
            fetchPosts() {
                axios.get("http://127.0.0.1:8000/api/posts/"+this.homeRoute.split('/')[5])
                .then((response) => {
                    this.posts = response.data;
                    console.log(this.posts[0].adresse_nom_voie);
                    console.log(this.homeRoute.split('/')[5])
                    this.loading = false;
                    })
                .catch(function (error) {
                        console.log(error);
                })
            }
        },
        computed: {
            
            getFilteredPosts() {
                return this.posts.filter(
                   post => {
                       return post.adresse_nom_voie.toLowerCase().includes(this.q.toLowerCase());
                   }
                );
            }
        },
        mounted() {
            this.fetchPosts();
        }
    }
</script>

<style scoped>
.loader {
  border: 16px solid #eeeeee; /* Light grey */
  border-top: 16px solid #3498db; /* Blue */
  border-radius: 50%;
  margin: 0 auto;
  width: 120px;
  height: 120px;
  animation: spin 3s linear infinite;
}
@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
