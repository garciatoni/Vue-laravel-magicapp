<template>
    <div class="container mx-auto py-5 space-y-5">
        <h1 class="px-2 text-xl font-bold flex justify-center text-center text-3xl">!Lo más vendido en Amazon!</h1>

      <ul class="grid grid-cols-1 mx-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-2 sm:mx-2">
        {{moreSeller[10].title}}
        <li v-for="a of 50" :key="a" :id="a" class="relative flex flex-col border hover:border-blue-900 border-white hover:bg-opacity-30 bg-white shadow-md bg-opacity-50 h-80  ">
          <div class="flex items-center h-full px-1 justify-center has-tooltip">
            <!-- <img id="portada" @click="BookInformation(b.isbn)" class="w-40 py-6 cursor-pointer max-h-72" :alt="b.title" :src="b.cover" :aria-label="'más información de' + b.title"/> -->

            <a class="opacity-60 md:opacity-0 hover:opacity-100 absolute -top-1 w-full focus:outline-none focus:opacity-100" target="_blank" rel="noopener noreferrer">
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
            <p class="text-center justify-self-center hover:font-bold font-sants cursor-pointer sm:text-base lg:text-lg px-2 pl-2">
              {{a}}
            </p>
          </div>
        </li>
      </ul>

    </div>
</template>

<script>
export default {
    name: "bestseller",
    data() {
        return {
            moreSeller: JSON.parse(sessionStorage.getItem('mostview'))
        };
    },
    mounted(){
      this.moreSeller = JSON.parse(sessionStorage.getItem('mostview'));
    },

    // mounted(){
    //   window.scrollTo(0,0);
    // },
    methods:{
        BookInformation(isbn) {
            this.$router.push("/agarcia/LiberLogin/public/book/" + isbn);
        },
    }

}
</script>

<style>

</style>