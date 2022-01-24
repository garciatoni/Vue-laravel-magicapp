<template>
  <div class="drop-shadow-xl ">
    <img id="zoom" class="rounded-[13px] cursor-pointer" v-if="clickable == true" @click="CartaInformation(id)" :src="imagen" :alt="id">
    <img class="" v-else :src="imagen" :alt="id">
  </div>
</template>

<script>
export default {
props: {
    imagen:{
        type: String
    },
    id:{
        type: String
    },
    clickable:{
        type: Boolean
    }
},

data() {
  return {
    image: this.imagen
  }
},
methods: {
    CartaInformation(id) {
        this.$router.push('/Carta/' + id);
    },
}
}
</script>

<style scoped>


#zoom {
    transition: transform .2s;
}


#zoom:hover {
    transform: scale(1.16);

}

</style>
