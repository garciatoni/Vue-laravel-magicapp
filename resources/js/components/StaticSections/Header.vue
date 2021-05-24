<template>
  <div aria-label="Header">
    <nav class="flex w-full items-center justify-between px-6 h-16 bg-white text-gray-700 border-b border-gray-200 z-10">
      <router-link :to="{ name: 'home' }" class="" aria-label="pagina principal">
        <div class="flex flex-row">
          <img src="https://dawjavi.insjoaquimmir.cat/agarcia/LiberLogin/resources/js/img/Logo.png" alt="Logo" class="hidden sm:flex h-16 w-44 sm:pl-4 py-1" />
          <img src="https://dawjavi.insjoaquimmir.cat/agarcia/LiberLogin/resources/js/img/Favicon.png" alt="LogoMobile" class="flex sm:hidden w-12" />
        </div>
      </router-link>

      <div class="hidden lg:flex divide-solid divide-x-2 divide-blue-400 md:text-lg xl:text-xl">
        <router-link class="px-1 focus:text-blue-500 focus:outline-none" :to="{ name: 'Terror' }">Terror</router-link>
        <router-link class="px-1 focus:text-blue-500 focus:outline-none" :to="{ name: 'Romance' }">Romance</router-link>
        <router-link class="px-1 focus:text-blue-500 focus:outline-none" :to="{ name: 'Fantasia' }">Fantasia</router-link>
        <router-link class="px-1 focus:text-blue-500 focus:outline-none" :to="{ name: 'cifi' }">Ciencia ficción</router-link>
        <router-link class="px-1 focus:text-blue-500 focus:outline-none" :to="{ name: 'Aventura' }">Aventura</router-link>
      </div>

      <div v-if="vuex.auth" class="flex justify-end">
        <button v-if="vuex.user" class="flex flex-row focus:opacity-50 focus:outline-none hover:text-blue-300" aria-label="Open Menu" @click="drawer">
          <avatar :fullname="vuex.user.name" :size="50"></avatar>
          <!-- <p class="font-bold text-xl">{{vuex.user.name}}</p> -->
        </button>
      </div>
      <div v-else class="space-x-2 flex flex-row justify-end">
        <router-link :to="{ name: 'login' }" class="focus:text-blue-500 focus:outline-none">
          <p class="hover:text-blue-400">Regístrate/Identifícate</p>
        </router-link>
      </div>

      <transition enter-class="opacity-0" enter-active-class="ease-out transition-medium" enter-to-class="opacity-100" leave-class="opacity-100" leave-active-class="ease-out transition-medium" leave-to-class="opacity-0">
        <div @keydown.esc="isOpen = false" v-show="isOpen" class="z-10 fixed inset-0 transition-opacity">
          <div @click="isOpen = false" class="absolute inset-0 bg-black opacity-50" tabindex="0"></div>
        </div>
      </transition>

      <aside v-if="vuex.auth" class="text-xl transform top-0 right-0 w-3/4 sm:w-5/12 xl:w-80 fixed h-full overflow-auto ease-in-out transition-all duration-300 z-30" :class="isOpen ? 'translate-x-0' : 'translate-x-full'" aria-label="menu usuario">
        <div class="flex flex-col">
          <div class="border-b-2 pb-2 mx-2">
            <div class="flex flex-row justify-between cursor-default">
              <div class="pt-4 pl-2 font-bold align-bottom">
                Bienvenido {{ vuex.user.name }}!
              </div>
              <div class="mx-1 my-2">
                <button class="focus:opacity-50 focus:outline-none pr-2" @click="isOpen = false" aria-label="cerrar menú">
                  <i class="far fa-times-circle fa-2x"></i>
                </button>
              </div>
            </div>
            <div class="flex flex-row">
              <div class="has-tooltip focus:opacity-50 focus:outline-none cursor-pointer" @click="asideButton('')" aria-label="pagina principal">
                <i class="fas pl-2 fa-2x fa-home"></i>
                <span class="tooltip bg-white border border-black px-2">Home</span>
              </div>
              <div class="flex justify-between flex-row pl-7 has-tooltip relative">
                <button class="focus:opacity-50 focus:outline-none" @click="logout" aria-label="desconectarse">
                  <i class="fas fa-2x fa-sign-out-alt"></i>
                </button>
                <span class="tooltip bg-white border border-black px-1">Desconectarse</span>
              </div>
            </div>
          </div>


          <div class="cursor-pointer mb-2 mt-6 text-center border-gray-800 focus:bg-blue-300 focus:outline-none mx-5 bg-white p-2 border hover:border-blue-700 hover:text-black hover:bg-blue-300" @click="asideButton('edicion')" aria-label="editar perfil">
            <span class="md:font-bold">Editar Perfil</span>
          </div>

          <div class="mt-2 mb-6 text-center border-gray-800 focus:bg-blue-300 focus:outline-none mx-5 bg-white p-2 border hover:border-blue-700 hover:text-black hover:bg-blue-300 cursor-pointer" @click="asideButton('wish')" aria-label="libros deseados">
            <span class="md:font-bold">Libros deseados</span>
          </div>

          <p class="flex lg:hidden justify-center border-t mx-2 pt-2 pb-2">
            Generos literarios
          </p>

          <div class="lg:hidden my-1 text-center border-gray-800 focus:bg-blue-300 focus:outline-none mx-5 bg-white p-2 border hover:border-blue-700 hover:text-black hover:bg-blue-300 cursor-pointer" @click="asideButton('Genero/Terror')" aria-label="terror">
            <span class="md:font-bold">Terror</span>
          </div>

          <div class="lg:hidden my-1 text-center border-gray-800 focus:bg-blue-300 focus:outline-none mx-5 bg-white p-2 border hover:border-blue-700 hover:text-black hover:bg-blue-300 cursor-pointer" @click="asideButton('Genero/Romance')" aria-label="romance">
            <span class="md:font-bold">Romance</span>
          </div>

          <div class="lg:hidden my-1 text-center border-gray-800 focus:bg-blue-300 focus:outline-none mx-5 bg-white p-2 border hover:border-blue-700 hover:text-black hover:bg-blue-300 cursor-pointer" @click="asideButton('Genero/Fantasia')" aria-label="fanstasía">
            <span class="md:font-bold">Fantasia</span>
          </div>

          <div class="lg:hidden my-1 text-center border-gray-800 focus:bg-blue-300 focus:outline-none mx-5 bg-white p-2 border hover:border-blue-700 hover:text-black hover:bg-blue-300 cursor-pointer" @click="asideButton('Genero/cifi')" aria-label="ciencia ficción">
            <span class="md:font-bold">Ciencia ficción</span>
          </div>

          <div class="lg:hidden my-1 text-center border-gray-800 focus:bg-blue-300 focus:outline-none mx-5 bg-white p-2 border hover:border-blue-700 hover:text-black hover:bg-blue-300 cursor-pointer" @click="asideButton('Genero/Aventura')" aria-label="aventura">
            <span class="md:font-bold">Aventura</span>
          </div>
        </div>
      </aside>
    </nav>
  </div>
</template>
<script>
import Avatar from "vue-avatar-component";
export default {
  name: "headervue",
  components: {
    Avatar,
  },
  data() {
    return {
      currentUser: {},
      isOpen: false,
      vuex: this.$store.state,
    };
  },
  watch: {
    isOpen: {
      immediate: true,
      handler(isOpen) {
        if (process.client) {
          if (isOpen) document.body.style.setProperty("overflow", "hidden");
          else document.body.style.removeProperty("overflow");
        }
      },
    },
  },
  methods: {
    drawer() {
      this.isOpen = !this.isOpen;
    },
    logout() {
      axios
        .post("api/logout")
        .then(() => {
          this.$store.commit("SET_USER", null, false);
          sessionStorage.removeItem("token");

        if(localStorage.getItem('token') != null){
          localStorage.removeItem("token");
        }

          this.$router.push("/agarcia/LiberLogin/public/");
          this.$swal( {
            toast: true,
            position: 'center',
            showConfirmButton: false,
            timer: 2000,
            title: 'Te echaremos de menos',
          });

        })
        .catch((errors) => {
          this.$swal( {
            toast: true,
            position: 'center',
            showConfirmButton: false,
            timer: 2000,
            title: 'Algo salió mal.',
            icon: 'error',
          });

        });
      this.isOpen = false;
    },
    UserEdition() {
      this.$router.push("/agarcia/LiberLogin/public/edicion/");
    },
    asideButton(address){
      this.$router.push("/agarcia/LiberLogin/public/" + address);
      this.isOpen = false;
    }
  },
  mounted() {
    document.addEventListener("keydown", (e) => {
      if (e.keyCode == 27 && this.isOpen) this.isOpen = false;
    });
  },
};
</script>

<style scoped>
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
aside {
  background: rgb(0, 100, 237);
  background: linear-gradient(
    340deg,
    rgba(0, 100, 237, 1) 15%,
    rgba(118, 172, 245, 1) 33%,
    rgba(127, 177, 246, 1) 33%,
    rgba(192, 217, 250, 1) 50%,
    rgba(222, 235, 252, 1) 55%,
    rgba(233, 242, 253, 1) 55%,
    rgba(244, 248, 254, 1) 78%,
    rgba(255, 255, 255, 1) 100%
  );
}
</style>
