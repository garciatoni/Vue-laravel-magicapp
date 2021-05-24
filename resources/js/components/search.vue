<template>
  <div class="lg:container lg:mx-auto py-5">

    <div class="px-2">
      <form @submit.prevent="searched(formData.search)" class="w-full flex justify-center" aria-label="Buscar libro">
        <input class="w-full sm:w-1/2 focus:placeholder-gray-300 focus:border-blue-500 placeholder-gray-600 focus:outline-none py-2 px-10 border border-blue-200" type="text" v-model="formData.search" name="search" placeholder="Encuentra tu siguiente lectura." aria-label="buscar libro"/>
        <button class="bg-gray-200 py-2 px-2 focus:outline-none focus:bg-blue-400 border border-blue-200 hover:bg-blue-100" type="submit" id="search_button">Buscar</button>
      </form>
    </div>

    <div v-if="loading" class="loader w-full mx-auto"></div>

    <ul v-for="b in books" :key="b.isbn" class="flex justify-center px-2 pt-5 space-y-1 p md:px-0">

        <li class="flex flex-col md:flex-row space-x-2 sm:w-9/12 md:w-11/12 lg:w-3/4  border border-blue-300 bg-white p-1 bg-opacity-30" :id="b.isbn">
            <div class="flex justify-center md:w-2/12 cursor-pointer ">
                <img v-if="b.cover != null" class="w-1/2 md:w-full" @click="BookInformation(b.isbn)" v-bind:src="b.cover" :alt="b.title">
                <img v-else class="w-1/2 md:w-full" @click="BookInformation(b.isbn)" v-bind:src="b.image" :alt="b.title">
            </div>
            <div class="md:w-10/12 flex-col flex justify-between">
                <div class="flex flex-row justify-between">
                    <div @click="BookInformation(b.isbn)" class="flex flex-col cursor-pointer pl-2 pt-2 md:pt-0 ">
                        <h1 class="text-2xl font-bold">{{b.title}}</h1>
                        <h2 v-if="b.author != null" class="text-xl">{{b.author}}</h2>
                        <p v-if="b.sinopsis != null" class="sinopsis text-justify mr-2">{{b.sinopsis}}</p>
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
            },
            loading: false
        };
    },
    methods: {
        searched(search){
            this.$router.push("/agarcia/LiberLogin/public/search/" + search.toLowerCase());
            const data = {
                search: (this.$route.params.campo).toLowerCase()
            }


            axios.post("api/search", data).then((response) => {
                var info = response.data;
                this.loading = true;

                const url = new URL('https://api.rainforestapi.com/request');
                const params = {
                    api_key: "F5FA69E2271C49858CDC658BA456FB1C",
                    type: "search",
                    amazon_domain: "amazon.es",
                    search_term: data.search,
                    language: "es_ES",
                    associate_id: "liber0e-21",
                    include_html: "false",
                    category_id: "599365031",
                    output: "json"
                }
                url.search = new URLSearchParams(params).toString();
                fetch(url).then(data => data.json())
                    .then(books => {
                        const infoApi = books.search_results
                        // console.log(books.search_results)
                        books.search_results.forEach(book => {
                            const bookData = {
                                title: book.title,
                                title_search: (book.title).toLowerCase(),
                                cover: book.image,
                                asin: book.asin,
                                link: book.link,
                            }
                            axios.post('/api/newBook', bookData).then((resp)=>{
                            })
                        })
                        const busqueda = info.concat(infoApi);
                        console.log(busqueda)
                        this.books = busqueda;
                        this.loading = false;
                    });

            });

        },
        BookInformation(isbn) {
            this.$router.push("/agarcia/LiberLogin/public/book/" + isbn);
        },

    },
    created(){
        this.searched(this.$route.params.campo);

        window.scrollTo(0,0);
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

.loader {
  border: 16px solid #f3f3f3;
  border-top: 16px solid #3498db;
  border-radius: 50%;
  width: 100px;
  height: 100px;
  animation: spin 2s linear infinite;
}

@keyframes spin {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
</style>
