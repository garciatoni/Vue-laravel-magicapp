<template>
<div>
    <div>
        <h1>LISTA DE LIBROS DESEADOS</h1>
    </div>
    <div>
        <div v-for="b in books" :key="b.isbn">
            <div class="cursor-pointer " @click="BookInformation(b.isbn)" :id="b.isbn">  
                <p>{{b.title}}</p>
                <h2 >{{b.author}}</h2>
                <img width="100" v-bind:src="b.cover" :alt="b.title">
                
            </div>
            <button class="p-3 bg-red-400" @click="DeleteWish(b.isbn)">Borrar</button>
        </div>
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
            }).catch((errors)=>{
                console.log(errors);
            })
        },
    },




    mounted(){
        window.axios.defaults.headers.common['Authorization'] = `Bearer ${this.$store.state.token}`
        axios.get('/api/user').then((res) => {
            var userId = res.data.id;
            axios.post('api/GetWish/' + userId).then((response) => {
                // console.log(response.data.wish);
                ((response.data).libros).forEach(element => {
                    (this.books).push(element[0])
                });
            }).catch((errors) =>{
                console.log(errors);
            })

        })


    }
}

</script>

<style scoped>

</style>
