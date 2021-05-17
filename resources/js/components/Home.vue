<template>
<div>
    <div class="pt-2">
        <form @submit.prevent="SearchBooks" class="w-full flex justify-center">
            <input class="w-full sm:w-1/2 focus:placeholder-gray-300 focus:border-blue-500  placeholder-gray-600 focus:outline-none py-2 px-10 border border-blue-200 " type="text" v-model="preSearch" name="search" placeholder="Buscar"/>

            <button class="bg-gray-200 py-2 px-2 focus:outline-none border border-blue-200 hover:bg-blue-100" type="submit" id="search_button">Buscar</button>
        </form>
    </div>

    <div class="lg:container lg:mx-auto py-5">

        <!-- <div class="w-5/6 mx-auto">
          <carousel class="my-4 z-0 hidden sm:flex" :margin="30" :merge="true" :autoplay="true" :loop="true" :dots="false" :items=5 :nav="false" :autoplayTimeout="10000" :autoplayHoverPause="true">
          <div v-for="a of 6" :key="a" :id="a">
              <img class="px-1 w-10"  :src="books.data[a-1].cover" @click="BookInformation(books.data[a-1].isbn)">
          </div>
          </carousel>
        </div> -->

          <tailable-pagination :limit="3" :data="books" @page-changed="getResults" :showNumbers="true" :hide-when-empty="true">

          </tailable-pagination>

        <ul class="grid grid-cols-1 mx-4 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-3 sm:mx-2">
            <li v-for="b in booksFilter" :key="b.isbn" :id="b.isbn" class="flex flex-col border border-blue-900 bg-white bg-opacity-25 rounded-lg h-auto">
                <div class="flex items-center h-full justify-center relative">
                    <img id="portada" @click="BookInformation(b.isbn)" class="w-40 py-6 border-blue-900 cursor-pointer border-b-2" :src="b.cover"/>

                    <a  class="opacity-60 md:opacity-0 hover:opacity-100  absolute bottom-4 w-full focus:outline-none" :href="b.link" target="_blank" rel="noopener noreferrer">
                        <div id="amazonButton" class="mt-1 border flex flex-row items-center">
                            <i class=" p-1 fab fa-amazon flex justify-start"></i>
                            <div class="w-full">
                                <p class="flex justify-center py-2 cursor-pointer font-bold">Comprar en Amazon</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div id="titulo" class="w-full h-1/5 py-1">
                    <p @click="BookInformation(b.isbn)" 
                    class="font-sants font-bold cursor-pointer sm:text-base lg:text-xl px-2 text-center">
                    {{ b.title }}
                    </p>
                </div>
            </li>
        </ul>

    </div>
</div>
</template>
<script>
import StarRating from "vue-star-rating";
import carousel from 'vue-owl-carousel';


export default {
    name: 'home',
    components: {
        carousel,
        StarRating,
        

        
    },
  data() {
    return {
      preSearch: "",
      postSearch: "",
      books: {},
    };
  },
  computed: {
    // destacadosLength: function(){
    //     return parseInt(this.books.length, 10);
    // },
    booksFilter: function () {
      let search = this.postSearch.toLowerCase();
      return (this.books).data.filter(
        (b) =>
          b.title.toLowerCase().includes(search)
        //b.author.toLowerCase().includes(search)
      );
    },
  },

  mounted() {
    this.getResults();
    // axios.get("api/books").then((response) => {
    //   this.books = response.data;
    //   console.log(this.books)
    // });
  },
  methods: {
    SearchBooks() {
      this.postSearch = this.preSearch;
    },
    BookInformation(isbn) {
      this.$router.push('/agarcia/LiberLogin/public/book/' + isbn);
    },
    getResults(page = 1) {
			axios.get('/api/books?page=' + page)
				.then(response => {
					this.books = response.data;
				});
		},


  },
};
</script>
<style>

@media (max-width: 640px) and (min-width: 0px){
    #titulo{
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
}

#titulo{
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
#icono{
    color: rgb(192, 240, 255);
}

#amazonButton{
    background: rgb(255,158,0);
    background: linear-gradient(0deg, rgba(255,158,0,1) 21%, rgba(247,255,79,1) 100%);
}
.mb3{
  display: none;
}
</style>
