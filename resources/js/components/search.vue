<template>
  <div class="lg:container lg:mx-auto py-5">

    <div class="px-2">
      <form @submit.prevent="searched" class="w-full flex justify-center" aria-label="Buscar libro">
        <input class="w-full sm:w-1/2 focus:placeholder-gray-300 focus:border-blue-500 placeholder-gray-600 focus:outline-none py-2 px-10 border border-blue-200" type="text" v-model="formData.search" name="search" placeholder="Encuentra tu siguiente lectura." aria-label="buscar libro"/>
        <button class="bg-gray-200 py-2 px-2 focus:outline-none focus:bg-blue-400 border border-blue-200 hover:bg-blue-100" type="submit" id="search_button">Buscar</button>
      </form>
    </div>

    <ul v-for="b in books" :key="b.isbn" class="flex justify-center px-2 pt-5 space-y-1 p md:px-0">
        <li class="flex flex-col md:flex-row space-x-2 sm:w-9/12 md:w-11/12 lg:w-3/4  border border-blue-300 bg-white p-1 bg-opacity-30" :id="b.isbn">
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
</template>

<script>
export default {
name: 'search',
props: ['campo'],
    components: {

    },
    data() {
        return {
            vuex: this.$store.state,
            books: {},
            formData:{
                search: '',
            }
        };
    },
    methods: {
        searched(){
            this.formData.search = (this.formData.search).toLowerCase()
            axios.post("api/search", this.formData).then((response) => {
                this.books = response.data;
            });
        },
        BookInformation(isbn) {
            this.$router.push("/agarcia/LiberLogin/public/book/" + isbn);
        },

    },
    created(){
        const data = {
            search: (this.$route.params.campo).toLowerCase()
        }
        axios.post("api/search", data).then((response) => {
            this.books = response.data;
        });
    }
};
</script>

<style scoped>

.sinopsis {
  display: -webkit-box;
  -webkit-line-clamp: 4;
  -webkit-box-orient: vertical;
  overflow: hidden;
}
</style>
