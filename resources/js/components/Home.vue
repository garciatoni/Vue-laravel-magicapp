<template>
  <div class="pt-5">
    <div class="mx-2">
      <form @submit.prevent="SearchBooks(search)" class="w-full flex justify-center" aria-label="Buscar libro">
        <input class="w-full sm:w-1/2 focus:placeholder-gray-300 focus:border-blue-500 placeholder-gray-600 focus:outline-none py-2 px-10 border border-blue-200" type="text" v-model="search" name="search" placeholder="Encuentra tu siguiente lectura." aria-label="buscar libro"/>
        <button class="bg-gray-200 py-2 px-2 focus:outline-none focus:bg-blue-400 border border-blue-200 hover:bg-blue-100" type="submit" id="search_button">Buscar</button>
      </form>
    </div>

    <div class="lg:container lg:mx-auto py-5">

      <div class=" px-4 mb-5">
        <h1 class="mx-2 text-xl hidden sm:flex bg-blue-400 bg-opacity-30">Libros más valorados por la comunidad</h1>

        <carousel class="my-4 z-0 hidden sm:flex" :merge="true" :autoplay="true" :loop="true" :dots="true" :items=6 :nav="false" :autoplayTimeout="4000" :autoplayHoverPause="true" :responsive = "{640:{items:3},768:{items:4},1024:{items:5},	1280:{items:6}}">

        <div class="content-between border shadow-md mx-1 bg-blue-100 bg-opacity-30 flex-col items-center border-blue-900 h-80 md:h-80 2xl:h-96 flex p-2" v-for="a of 20" :key="a" :id="a">
            <img class="px-1 w-10 max-h-72 my-auto flex items-center cursor-pointer"  :src="moreRating[a-1].cover" @dblclick="BookInformation(moreRating[a-1].isbn)">
            <p id="tituloCarousel" class="">{{moreRating[a-1].title}}</p>
            <star-rating  class="flex justify-center" :star-size="30" :read-only="true" v-model="moreRating[a-1].rating" v-bind:show-rating="false"></star-rating>
        </div>
        </carousel>
      </div>

      <tailable-pagination :limit="1" :data="books" @page-changed="getResults" :showNumbers="true" :hide-when-empty="true"></tailable-pagination>

      <ul class="grid grid-cols-1 mx-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-2 sm:mx-2">
        <li v-for="b in books.data" :key="b.isbn" :id="b.isbn" class="relative flex flex-col border hover:border-blue-900 border-white hover:bg-opacity-30 bg-white shadow-md bg-opacity-50 h-80  ">
          <div class="flex items-center h-full px-1 justify-center has-tooltip">
            <img id="portada" @click="BookInformation(b.isbn)" class="w-40 py-6 cursor-pointer max-h-72" :src="b.cover" :aria-label="'más información de' + b.title"/>

            <a class="opacity-60 md:opacity-0 hover:opacity-100 absolute -top-1 w-full focus:outline-none focus:opacity-100" :href="b.link" target="_blank" rel="noopener noreferrer">
              <div id="amazonButton" class="mt-1 border flex flex-row items-center">
                <i class="p-1 fab fa-amazon flex justify-start"></i>
                <div class="w-full">
                  <p class="flex justify-center py-2 cursor-pointer font-bold">
                    Comprar en Amazon
                  </p>
                </div>
              </div>
            </a>

          </div>
          <div id="titulo" class="w-full h-1/5 py-1 border-t border-blue-900 bg-blue-300 bg-opacity-40">
            <p @click="BookInformation(b.isbn)" class="text-center justify-self-center hover:font-bold font-sants cursor-pointer sm:text-base lg:text-lg px-2 pl-2" :aria-label="'más información de' + b.title">
              {{ b.title }}
            </p>
          </div>
        </li>
      </ul>
      <tailable-pagination class="bg-white bg-opacity-50 flex sm:hidden mt-3 justify-center" :limit="1" :data="books" @page-changed="getResults" :showNumbers="true" :hide-when-empty="true"></tailable-pagination>
    </div>
  </div>
</template>
<script>
import StarRating from "vue-star-rating";
import carousel from "vue-owl-carousel";

export default {
  name: "home",
  components: {
    carousel,
    StarRating,
  },
  data() {
    return {
      search: '',
      books: {},
      moreRating: {},
    };
  },
  computed: {
    // destacadosLength: function(){
    //     return parseInt(this.books.length, 10);
    // },
    // booksFilter: function () {
    //   let search = this.postSearch.toLowerCase();
    //   return this.books.data.filter(
    //     (b) => b.title.toLowerCase().includes(search)
    //     //b.author.toLowerCase().includes(search)
    //   );
    // },
  },

  mounted() {
    //Lista de libros paginada
    this.getResults();
    //lista de 20 libros mejor valorados
    axios.get("api/moreRating").then((response) => {
        this.moreRating = response.data;
    });
  },
  methods: {
    // SearchBooks() {
    //   this.postSearch = this.preSearch;
    // },
    SearchBooks(campo) {
      this.$router.push("/agarcia/LiberLogin/public/search/" + campo);
    },
    BookInformation(isbn) {
      this.$router.push("/agarcia/LiberLogin/public/book/" + isbn);
    },
    getResults(page = 1) {
      axios.get("/api/books?page=" + page).then((response) => {
        this.books = response.data;
      });
    },
  },
};
</script>
<style>
@media (max-width: 640px) and (min-width: 0px) {
  #titulo {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }
}

#titulo {
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}
#tituloCarousel{
  display: -webkit-box;
  -webkit-line-clamp: 1;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

#icono {
  color: rgb(192, 240, 255);
}

#amazonButton {
  background: rgb(255, 158, 0);
  background: linear-gradient(
    0deg,
    rgba(255, 158, 0, 1) 21%,
    rgba(247, 255, 79, 1) 100%
  );
}
.tooltip {
  visibility: hidden;
  position: absolute;
  cursor: default;
}
.has-tooltip:hover .tooltip {
  visibility: visible;
  z-index: 100;
  left: 75px;
}

.owl-dot:focus  {
  opacity: 30%;
  outline: none;
}
</style>
