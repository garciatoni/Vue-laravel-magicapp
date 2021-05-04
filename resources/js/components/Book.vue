<template>
  <div>
      <div class="container mx-auto">
          <div :id="book.isbn">
            <h1>{{book.title}}</h1>
            <h2>{{book.author}}</h2>
            <img v-bind:src="book.cover" :alt="book.title">
            <a target="_blank" href="https://amzn.to/2RnKxOw">COMPRAR</a>
          </div>
      </div>
    <star-rating v-if="this.$store.state.auth" v-model="rating" v-bind:rating="rating" v-bind:show-rating="false"></star-rating>
  </div>
</template>

<script>
import StarRating from "vue-star-rating";


export default {
    props: ['isbn'],
    data() {
        return {
            rating: 0,
            book: {},
        };
    },
    created(){
        axios.post('api/libro/' + this.$route.params.isbn).then((response) => {
            // console.log(response.data.id);
            this.book = response.data.book[0];
            console.log(this.book);

        }).catch((errors) =>{
            console.log(errors)
        })
    }
};
</script>

<style>
</style>
