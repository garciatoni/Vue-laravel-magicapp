<template>

  <div class="lg:container  lg:mx-auto px-2 lg:px-0 py-5 space-y-2">
        <div class="h-10 w-full place-items-center md:flex flex-row hidden" id="breadcrumbs">
            <router-link class="px-1 focus:text-blue-500 focus:outline-none flex align-middle" :to="{ name: 'home' }">Página Principal</router-link>
            <i class="fas fa-caret-right fa-2x m-4" alt="Flecha" />
            <p>Libro</p>
            <i class="fas fa-caret-right fa-2x m-4" alt="Flecha" />
            <p>{{book.title}}</p>
        </div>

        <div :id="book.isbn" class="flex flex-col-reverse md:flex-row bg-white bg-opacity-25 md:border md:border-blue-200 md:p-1">
            <div class="w-full md:w-4/12 lg:w-3/12  flex flex-col-reverse md:flex-col items-center md:items-start">
                <img class="w-2/3 md:w-full pb-1 md:pb-0" :src="book.cover" :alt="book.title">
                <a class="w-full px-2 md:px-0 focus:opacity-50 focus:outline-none" :href="book.link" target="_blank" rel="noopener noreferrer">
                    <div id="amazonButton" class="my-1 text-xl border border-yellow-200 hover:border-yellow-800 flex flex-row items-center">
                        <i class="fa-2x p-1 fab fa-amazon flex justify-start"></i>
                        <div class="w-full">
                            <p class="flex justify-center py-2 font-bold cursor-pointer">Comprar en Amazon</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="w-full md:w-8/12 lg:w-9/12 px-2 pt-2 flex flex-col space-y-5">
                <div class="flex  flex-col space-y-2">
                    <h1 class="text-4xl font-bold">{{book.title}}</h1>
                    <h2 class="text-2xl">{{book.author}}</h2>
                </div>
                <p class="text-xl text-justify">{{book.sinopsis}}</p>
            </div>
        </div>
    

        <div class="flex flex-col bg-white bg-opacity-25 border border-blue-200 p-1 space-y-2">
            <div class="w-full flex flex-col md:flex-row md:justify-between">
                <button class="w-full md:w-4/12 lg:w-3/12 bg-blue-600 text-white p-2 border hover:bg-yellow-100 hover:text-black hover:border-black focus:outline-none focus:bg-yellow-100 focus:text-black focus:border-black" v-if="vuex.auth" @click="SetFavorito" aria-label="añadir a deseados"><i class="fas fa-star p-1"></i>Añadir a deseados</button>

                <p v-if="puntuacion != 0" class="text-xl text-center flex items-center">{{puntuacion}}/5 según la comunidad de Liber.</p>
                
                <p v-else class="text-xl text-center flex items-center">{{book.rating}}/5 según la comunidad de Liber.</p>
                
                <star-rating v-if="puntuacion == 0 && this.$store.state.auth" @rating-selected ="setRating" class="flex justify-center" :star-size="40" :read-only="false" v-bind:show-rating="false"></star-rating>

                <star-rating v-if="this.$store.state.auth && puntuacion != 0" @rating-selected ="setRating" class="flex justify-center" :star-size="40" :read-only="true" v-model="rating.puntos" v-bind:show-rating="false"></star-rating>         
            </div>

            <div v-if="vuex.auth" id="Comentario">
                <form @submit.prevent="SendComentario" class="flex flex-row w-full">
                    <input aria-label="Escribe tu comentario" class=" w-full focus:placeholder-gray-300 focus:border-blue-500 focus:outline-none placeholder-gray-600  py-2 px-10 border border-blue-500" type="text" v-model="formData.texto_reseña" name="Comentario" id="ComentarioInput" placeholder="Comparte tu experiencia!"/>
                    <button class="font-bold bg-blue-200 py-2 px-2 focus:outline-none focus:bg-blue-800 focus:text-white border border-blue-500 hover:bg-blue-100" type="submit" id="search_button">Enviar</button>
                </form>
            </div>


            <div v-else id="Comentarios">
                <p class="pl-1" > Si quieres participar en la maravillosa comunidad de Liber primero debes <router-link class="font-bold" :to="{ name: 'login' }">iniciar sesión.</router-link></p>
            </div>

            <ul id="ComentaryList" class="space-y-3">
                <li v-for="coment in comentarios" :key="coment.id" class="bg-opacity-70 bg-white my-1 border border-blue-500" :id="coment.id">
                    <div class="flex flex-row justify-between py-2 font-bold bg-blue-300">
                        <p class="px-3 ">{{coment.name}}</p>
                    </div>
                    <div class="">
                        <p class="px-3 py-1 text-justify">{{coment.texto_reseña}}</p>    
                    </div>  
                </li>
            </ul>
        </div>
  </div>
</template>

<script>
import StarRating from "vue-star-rating";

export default {
    props: ['isbn'],
    components: {
        StarRating
    },
    data() {
        return {
            vuex: this.$store.state,
            rating: {
                'puntos': 0,
                'id_libro': ''
            },
            book: {},
            comentarios:{},
            formData:{
                'id_libro': '',
                'texto_reseña': '',
            },
            id_libro:{
                'id_libro': '',
            },
            puntuacion: 0,
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
                
            })
            this.formData.texto_reseña  = "";
        },
        setRating: function(rating){
            let vuestore = this.$store.state;
            (this.rating).puntos= rating;
            axios.post('api/SetPuntos/' + vuestore.user.id, this.rating).then((response) => {
                
                this.puntuacion = response.data.media;
                if(response.data.existe != undefined){
                    this.puntuacion = response.data.existe;
                    
                    this.rating.puntos = this.puntuacion;
                }else{
                    this.puntuacion = response.data.media;
                    
                    this.rating.puntos = response.data.media;
                }
                
                
            }).catch((errors) => {
                
            })
        },

        SetFavorito(){
            let vuestore = this.$store.state;
            axios.post('api/SetWish/' + vuestore.user.id, this.id_libro).then((response)=>{
                console.log(response)
                if(response.data == 'ya esta'){
                    this.$swal( {
                        toast: true,
                        position: 'center',
                        showConfirmButton: false,
                        timer: 2000,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        },
                        icon: 'info',
                        title: '¡Ya se encuentra en tu lista!'
                    })
                }else{
                    this.$swal( {
                        toast: true,
                        position: 'center',
                        showConfirmButton: false,
                        timer: 2000,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        },
                        icon: 'success',
                        title: '¡Guardado!'
                    })
                }
            });
        },
    },
    created(){
        window.scrollTo(0,0);
        window.axios.defaults.headers.common['Authorization'] = `Bearer ${this.$store.state.token}`
        axios.get('/api/user').then((res) => {   
            var userId = res.data.id;
            let request = {
                'id_libro': this.$route.params.isbn,
            }
            axios.post('api/GetPuntos/' + userId, request).then((response) => {
                if(response.data != undefined && response.data != 0){
                    this.rating.puntos = response.data.puntosUser;
                    this.puntuacion = response.data.rating;
                }
            })
        }),
        axios.post('api/libro/' + this.$route.params.isbn).then((response) => {
            const informacion = response.data.book[0];
            this.comentarios = response.data.comentarios;
            this.formData.id_libro = response.data.book[0].isbn;
            this.id_libro.id_libro = response.data.book[0].isbn;
            this.rating.id_libro = response.data.book[0].isbn;

            if(informacion.author == null && informacion.sinopsis == null){
                const url = new URL('https://api.rainforestapi.com/request');

                const params = {
                    api_key: "F5FA69E2271C49858CDC658BA456FB1C",
                    type: "product",
                    amazon_domain: "amazon.es",
                    asin: informacion.asin,
                    language: "es_ES",
                    output: "json",
                    include_html: "false",
                    associate_id: "liber0e-21"
                }

                url.search = new URLSearchParams(params).toString();

                fetch(url)
                    .then(data => data.json())
                    .then(book => {
                     
                        const product = book.product;

                        const bookData = {
                            title: product.title,
                            title_search: (product.title).toLowerCase(),
                            cover: product.main_image.link,
                            asin: product.asin,
                            link: product.link,
                            author: product.authors[0].name,
                            sinopsis: product.book_description
                        }

                        axios.post('/api/newBook', bookData).then((resp)=>{
                            this.book = resp.data[0];
                         
                        })
                    });

            } else {
                this.book = informacion;
            }
        }).catch((errors) =>{
            console.log(errors)
        })
    
    }
};
</script>

<style>

#amazonButton{
    background: rgb(255,158,0);
    background: linear-gradient(0deg, rgba(255,158,0,1) 21%, rgba(247,255,79,1) 100%);
}
</style>
