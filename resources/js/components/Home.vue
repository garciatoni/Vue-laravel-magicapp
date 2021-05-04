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

    <div id="books_searched">
        <ul class="grid grid-cols-1 lg:grid-cols-5 md:grid-cols-2 mt-3 gap-3">
            <li v-for="b in booksFilter" :key="b.isbn" id="b.isbn" class="border">
                <div @click="BookInformation(b.isbn)" class="">
                    <h1>Titulo: {{ b.title }}</h1>
                    <p>Autor: {{ b.author }}</p>
                    <img v-bind:src="b.cover"/>
                    <star-rating v-model="b.rating" v-bind:rating="b.rating" v-bind:read-only="true" v-bind:show-rating="false"></star-rating>
                </div>
            </li>
        </ul>
    </div>
</div>

</template>

<script>
import StarRating from "vue-star-rating";

export default {
  data() {
    return {
      preSearch: "",
      postSearch: "",
      books: [],
    };
  },
  computed: {
    booksFilter: function () {
      let search = this.postSearch.toLowerCase();

      return this.books.filter(
        (b) =>
          b.title.toLowerCase().includes(search) ||
          b.author.toLowerCase().includes(search)
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
