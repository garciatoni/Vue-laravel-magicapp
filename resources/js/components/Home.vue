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

    <div class="container mx-auto" id="books_searched">

        <!-- <carousel class="mt-4 z-0" :autoplay="true" :loop="true" :dots="false" :items=5 :nav="false" :autoplayTimeout="1000" :autoplayHoverPause="true">
            <img v-for="a of 6" :key="a" :id="a" :src="books[a-1].cover" @click="BookInformation(books[a-1].isbn)">
        </carousel> -->


        <ul class="grid grid-cols-2 md:grid-cols-5 lg:grid-cols-7 mt-3 gap-3">
            <li v-for="b in booksFilter" :key="b.isbn" :id="b.isbn" class="border">
                <div @click="BookInformation(b.isbn)" class="">
                    <h1>{{ b.title }}</h1>
                    <p>{{ b.author }}</p>
                    <div class="flex items-end">
                        <img :src="b.cover"/>
                    </div>

                <!-- <star-rating v-model="b.rating" v-bind:rating="b.rating" v-bind:read-only="true" v-bind:show-rating="false"></star-rating> -->
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

</style>
