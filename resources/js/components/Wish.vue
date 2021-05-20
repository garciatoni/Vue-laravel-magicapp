<template>
<div class="container mx-auto">
    <div class="w-full md:w-2/3 mx-auto flex justify-center text-center py-5 flex-col">
        <h1 class="text-3xl md:text-4xl font-bold">LIBROS DESEADOS</h1>
        <p class="px-5">Guarda aqui todos aquellos libros que tienes pensado leer!</p>
    </div>
    <div class="space-y-2">
        <ul v-for="b in books" :key="b.isbn" class="flex justify-center px-2 pt-5 space-y-1 p md:px-0">
            <li class="flex flex-col md:flex-row space-x-2 sm:w-9/12 md:w-11/12 lg:w-3/4  border border-blue-300 bg-white p-1 bg-opacity-30" :id="b.isbn">
                <div class="flex md:hidden justify-end">
                    <button class="pr-3 focus:outline-none" @click="DeleteWish(b.isbn)"><i class="fas fa-times fa-3x text-red-600">
                    </i></button>
                </div>
                <div class="flex justify-center md:w-2/12 cursor-pointer ">
                    <img class="w-1/2 md:w-full" @click="BookInformation(b.isbn)" v-bind:src="b.cover" :alt="b.title">
                </div>
                <div class="md:w-10/12 flex-col flex justify-between">
                    <div class="flex flex-row justify-between">
                        <div @click="BookInformation(b.isbn)" class="flex flex-col cursor-pointer pl-2 pt-2 md:pt-0 ">
                            <h1 class="text-2xl font-bold">{{b.title}}</h1>
                            <h2 class="text-xl">{{b.author}}</h2>
                            <p class="sinopsis text-justify mr-2">{{b.sinopsis}}</p>
                        </div>
                        <div class="hidden md:flex items-start">
                            <button class="pr-3 focus:outline-none focus:opacity-50" @click="DeleteWish(b.isbn)" aria-label="Eliminar libro deseado"><i class="fas fa-times fa-3x text-red-600">
                            </i></button>
                        </div>
                    </div>
                    <a class="w-full px-1 md:px-0 md:pr-2 focus:opacity-50 focus:outline-none" :href="b.link" target="_blank" rel="noopener noreferrer">
                        <div id="amazonButton" class="my-1 text-xl border border-yellow-200 hover:border-yellow-800 flex flex-row items-center">
                            <i class="fa-2x p-1 fab fa-amazon flex justify-start"></i>
                            <div class="w-full">
                                <p class="flex justify-center py-2 font-bold cursor-pointer">Comprar en Amazon</p>
                            </div>
                        </div>
                    </a>
                </div>
            </li>
        </ul>
    </div>
</div>

</template>

<script>

export default {
    name: 'wish',
    data(){
        return{
            vuex: this.$store.state,
            books: [],
        }
    },
    methods:{
        BookInformation(isbn) {
            this.$router.push('/agarcia/LiberLogin/public/book/' + isbn);
        },
        DeleteWish(id){
            let vuestore = this.$store.state
            let id_libro = { 'id': id}
            axios.post('api/DeleteWish/' + vuestore.user.id, id_libro).then(()=>{
                for(var i=0; i<(this.books).length; i++){
                    if(this.books[i].isbn == id){
                        (this.books).splice( i, 1 );
                    }
                }
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
                    title: 'Eliminado!'
                })
            }).catch((errors)=>{

            })
        },
    },




    mounted(){
        window.axios.defaults.headers.common['Authorization'] = `Bearer ${this.$store.state.token}`
        axios.get('/api/user').then((res) => {
            var userId = res.data.id;
            axios.post('api/GetWish/' + userId).then((response) => {
                ((response.data).libros).forEach(element => {
                    (this.books).push(element[0])
                });
                console.log(this.books)

            }).catch((errors) =>{

            })

        })


    }
}

</script>

<style scoped>
    .tooltip{
        visibility: hidden;
        position: absolute;
        cursor: default;
    }
    .has-tooltip:hover .tooltip {
        visibility: visible;
        z-index: 100;
        left: 75px;
    }
    .sinopsis {
        display: -webkit-box;
        -webkit-line-clamp: 4;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
