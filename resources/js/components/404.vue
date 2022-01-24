<template>
  <div class="pb-5 container mx-auto flex items-center justify-center">
    <router-link :to="{ name: 'home' }">
      <div class="w-full">
        <h1 class="text-center font-bold text-5xl">ERROR 404</h1>
        <p class="text-center text-xl pb-5">Página no encontrada.</p>
        <img class="mx-auto bg-cover" src="https://c4.wallpaperflare.com/wallpaper/878/32/883/artwork-magic-the-gathering-damnation-wallpaper-preview.jpg" alt="404"/>
        <p class="text-center pt-5 sm:text-xl text-xl">¡Una damnation ha barrido la pagina que estas buscando!</p>
      </div>
    </router-link >
  </div>
</template>+


<script>

export default {

};
</script>


<style scoped>

p, h1{
    color: white;
}






</style>
