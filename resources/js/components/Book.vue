<template>
  <div class="">

        <div :id="book.isbn" class=" flex flex-row">
            <div class="w-full sm:w-4/12">
                <img class="w-full" :src="book.cover" :alt="book.title">
            </div>
            <div>
                <h1>{{book.title}}</h1>
            </div>


            <h2>{{book.author}}</h2>
            <button v-if="vuex.auth" @click="SetFavorito">Añadir a favoritos.</button>

            <a target="_blank" href="https://amzn.to/2RnKxOw">COMPRAR</a>
        </div>



        <div v-if="vuex.auth" id="Comentario">
            <form @submit.prevent="SendComentario">
                <div>
                    <input v-model="formData.texto_reseña" class="border" type="text" name="Comentario" id="ComentarioInput">
                </div>
                <button>Enviar</button>
            </form>
        </div>

        <div v-else id="Comentarios">
            <p>Si quieres participar en la maravillosa comunidad de Liber, primero debes <router-link :to="{ name: 'login' }">registrarte,</router-link> si ya lo estas, <router-link :to="{ name: 'login' }">identificate :)</router-link></p>
        </div>
        <div v-for="coment in comentarios" :key="coment.id" >{{coment.texto_reseña}}  Escrito por: {{coment.name}}</div>


    <!-- <star-rating v-if="this.$store.state.auth" v-model="rating" v-bind:rating="rating" v-bind:show-rating="false"></star-rating> -->
  </div>
</template>

<script>
import StarRating from "vue-star-rating";


export default {

    props: ['isbn'],
    data() {
        return {
            vuex: this.$store.state,
            rating: 0,
            book: {},
            comentarios:{},
            formData:{
                'id_libro': '',
                'texto_reseña': '',
            },
            id_libro:{
                'id_libro': '',
            },
        };
    },
    methods: {
        SendComentario(){
            let vuestore = this.$store.state;
            axios.post('api/setComentario/' + vuestore.user.id, this.formData).then(() => {
               axios.post('api/getComentario/' + this.$route.params.isbn).then((response) => {
                    this.comentarios = response.data
                })
            }).catch((errors) => {
                console.log(errors)
            })
            this.formData.texto_reseña  = "";
        },

        SetFavorito(){
            let vuestore = this.$store.state;
            axios.post('api/SetWish/' + vuestore.user.id, this.id_libro).then((response)=>{
                console.log(response)
            });
        },
    },
    created(){
        axios.post('api/libro/' + this.$route.params.isbn).then((response) => {
            this.book = response.data.book[0];
            this.comentarios = response.data.comentarios;
            this.formData.id_libro = response.data.book[0].isbn;
            this.id_libro.id_libro = response.data.book[0].isbn;
        }).catch((errors) =>{
            console.log(errors)
        })
    },

};
</script>

<style>
</style>
