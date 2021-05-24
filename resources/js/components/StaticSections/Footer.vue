<template>

<div class="h-55 text-white bg-blue-600 border-t border-black text-center" aria-label="Footer">

  <div class="flex flex-col-reverse">
    <router-link :to="{ name: 'home' }" class="nav-link" aria-label="pagina principal">
      <img class="mx-auto" src="https://dawjavi.insjoaquimmir.cat//agarcia/LiberLogin/resources/js/img/Logo_White.png" alt="Logo Liber en blanco" />
    </router-link>

    <div class="flex justify-center text-lg">
      <div>
        <a href="https://github.com/garciatoni/LiberLogin" target="_blanck" class="focus:opacity-50 focus:outline-none" aria-label="github"><i class="fab fa-github fa-2x m-4" alt="Logo Github"></i></a>
      </div>
      <div>
        <a href="" target="_blanck" class="focus:opacity-50 focus:outline-none" aria-label="twitter"><i class="fab fa-twitter fa-2x m-4" alt="Logo Twitter"></i></a>
      </div>
      <div>
        <a href="" target="_blanck" class="focus:opacity-50 focus:outline-none" aria-label="instagram"><i class="fab fa-instagram fa-2x m-4" alt="Logo Instagram"></i></a>
      </div>
      <div>
        <a href="" target="_blanck" class="focus:opacity-50 focus:outline-none" aria-label="facebook"><i class="fab fa-facebook-f fa-2x m-4" alt="Logo Facebook"></i></a>
      </div>
    </div> 
  </div>
    <p>
      Hecha por Toni García y David Hernández. Todos los derechos reservados.
    </p>
</div>
</template>

<script>
export default {

}
</script>

<style>

</style>
