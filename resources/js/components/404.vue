<template>
  <div class="pb-5 container mx-auto flex items-center justify-center">
    <router-link :to="{ name: 'home' }">
      <div class="w-full">
        <h1 class="text-center font-bold text-5xl">ERROR 404</h1>
        <p class="text-center text-xl pb-5">Página no encontrada.</p>
        <img class="mx-auto" src="https://dawjavi.insjoaquimmir.cat/dhernandez/ProyectoFinal/liber/Liber/resources/js/img/YouShallNotPass.png" alt="404"/>
        <p class="text-center pt-5 sm:text-xl text-xl">¡Un Balrog se ha apoderado de esta página, corred insensatos!</p>
      </div>
    </router-link >
  </div>
</template>

<script>

export default {

};
</script>

<style>
</style>
