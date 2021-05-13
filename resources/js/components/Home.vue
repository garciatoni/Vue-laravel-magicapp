<template>

<div>
      <!-- <form @submit.prevent="SearchBooks">
        <input
          type="text"
          v-model="preSearch"
          name="search"
          placeholder="Busca un libro"
        />
        <button type="submit" id="search_button">Buscar</button>
      </form> -->

    <div class="lg:container lg:mx-auto py-5">
      <div class="w-5/6 mx-auto">
        <carousel class="my-4 z-0 hidden sm:flex" :margin="30" :merge="true" :autoplay="true" :loop="true" :dots="false" :items=5 :nav="false" :autoplayTimeout="10000" :autoplayHoverPause="true">
          <div v-for="a of 6" :key="a" :id="a">
            <img class="px-1 w-10"  :src="books[a-1].cover" @click="BookInformation(books[a-1].isbn)">
          </div>
        </carousel>
      </div>

      <div>
          <router-link :to="{ name: 'Terror' }">Terror</router-link>
      </div>

      <ul class="grid grid-cols-1 mx-10 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-3 sm:mx-2">
        <li v-for="b in booksFilter" :key="b.isbn" :id="b.isbn" class="flex flex-col border border-blue-900 bg-white bg-opacity-25 rounded-lg h-auto">
          
          <div class="flex items-center h-full justify-center relative">
            <img id="portada" @click="BookInformation(b.isbn)" class="w-40 py-6 border-blue-900 cursor-pointer border-b-2" :src="b.cover"/>
            <button class="opacity-0 hover:opacity-100  absolute bg-gray-300 bottom-4  py-2 w-full font-bold focus:outline-none" @click="BookInformation(b.isbn)">Ver en detalle</button>
          </div>

          <div id="titulo" class="w-full h-1/5 py-1">
            <p @click="BookInformation(b.isbn)" class="font-sants font-bold cursor-pointer sm:text-base lg:text-xl px-2 text-center" >{{ b.title }}</p>
          </div>
          
        </li>
    </ul>

    </div>
</div>
</template>
<script>
import StarRating from "vue-star-rating";
import carousel from 'vue-owl-carousel'

export default {
    name: 'home',
    components: {
        carousel,
        StarRating
    },
  data() {
    return {
      preSearch: "",
      postSearch: "",
      books: [],
    };
  },
  computed: {
    destacadosLength: function(){
        return parseInt(this.books.length, 10);
    },
    booksFilter: function () {
      let search = this.postSearch.toLowerCase();
      return this.books.filter(
        (b) =>
          b.title.toLowerCase().includes(search)
        //   b.author.toLowerCase().includes(search)
      );
    },
  },

  mounted() {
    axios.get("api/books").then((response) => {
      this.books = response.data;

    });
  },
  methods: {
    SearchBooks() {
      this.postSearch = this.preSearch;
    },
    BookInformation(isbn) {
      this.$router.push('/agarcia/LiberLogin/public/book/' + isbn);
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


</style>
