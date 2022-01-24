<template>
  <div aria-label="Header">
    <nav id="navbar" class="flex w-full items-center justify-between px-2 h-16 text-white shadow-lg z-10">
      <router-link :to="{ name: 'home' }" class="" aria-label="pagina principal">
        <div class="flex flex-row">
          <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3f/Magicthegathering-logo.svg/1280px-Magicthegathering-logo.svg.png" alt="Logo" class="hidden sm:flex h-16 sm:pl-2 py-1" />
          <img src="https://cdn-cardmavin.mavin.io/wp-content/uploads/2019/12/Unsanctioned-MTG-set-symbol-150x146.png" alt="LogoMobile" class="flex sm:hidden w-12" />
        </div>
      </router-link>

      <BarraBusqueda></BarraBusqueda>

      <div v-if="vuex.auth" class="flex justify-end">
        <button v-if="vuex.user" class="flex flex-row focus:opacity-50 focus:outline-none hover:text-blue-300" aria-label="Open Menu" @click="drawer">
          <avatar :fullname="vuex.user.name" :size="50"></avatar>
          <!-- <p class="font-bold text-xl">{{vuex.user.name}}</p> -->
        </button>
      </div>

      <div v-else class="space-x-2 flex flex-row justify-end">
        <router-link :to="{ name: 'login' }" class=" focus:outline-none">
          <p class="hover:text-blue-400">Regístrate/Identifícate</p>
        </router-link>
      </div>

      <transition enter-class="opacity-0" enter-active-class="ease-out transition-medium" enter-to-class="opacity-90" leave-class="opacity-100" leave-active-class="ease-out transition-medium" leave-to-class="opacity-0">
        <div @keydown.esc="isOpen = false" v-show="isOpen" class="z-10 fixed inset-0 transition-opacity">
          <div @click="isOpen = false" class="absolute inset-0 bg-black opacity-30" tabindex="0"></div>
        </div>
      </transition>

      <aside v-if="vuex.auth" class="text-xl transform top-0 right-0 w-3/4 sm:w-5/12 xl:w-[23rem] fixed h-full overflow-auto ease-in-out transition-all duration-300 z-30" :class="isOpen ? 'translate-x-0' : 'translate-x-full'" aria-label="menu usuario">
        <div class="flex flex-col">
          <div class="border-b-2 pb-2 mx-2">
            <div class="flex flex-row justify-between cursor-default">
              <div class="pt-4 pl-2 font-bold align-bottom">
                Bienvenid@ {{ vuex.user.name }} !
              </div>
              <div class="mx-1 my-2">
                <button class="focus:opacity-50 focus:outline-none pr-2" @click="isOpen = false" aria-label="cerrar menú">
                  <i class="far fa-times-circle fa-2x"></i>
                </button>
              </div>
            </div>
            <div class="flex flex-row space-x-3">

              <button class="has-tooltip focus:opacity-50 focus:outline-none cursor-pointer" @click="asideButton('')" aria-label="pagina principal">
                <i class="fas pl-2 fa-2x fa-home"></i>
                <span class="tooltip bg-white border text-black border-black px-2">Home</span>
              </button>

              <button class="has-tooltip focus:opacity-50 focus:outline-none cursor-pointer" @click="asideButton('edicion')" aria-label="pagina principal">
                <i class="fas fa-2x fa-cog"></i>
                <span class="tooltip bg-white border text-black border-black px-1">Editar perfil</span>
              </button>

              <button class="has-tooltip focus:opacity-50 focus:outline-none cursor-pointer" @click="logout()" aria-label="pagina principal">
                <i class="fas fa-2x fa-sign-out-alt"></i>
                <span class="tooltip bg-white border text-black border-black px-1">Desconectarse</span>
              </button>


            </div>
          </div>

            <div class="space-y-1 mt-2">
                <div @click="asideButton('deck/add')" class="group text-left hover:text-xl focus:outline-none hover:text-withe hover:bg-gray-700 cursor-pointer flex items-center space-x-4" aria-label="Crear baraja">
                  <span class="bg-[#00FFFF] max-h-max text-[#00FFFF] px-1 py-2 visible group-hover:invisible">i</span>
                  <span class="ml-5 text-withe group-hover:text-2xl group-hover:text-[#00FFFF]">Crear baraja</span>
                </div>

                <div @click="asideButton('My_decks')" class="group text-left hover:text-xl focus:outline-none hover:text-withe hover:bg-gray-700 cursor-pointer flex items-center space-x-4" aria-label="libros deseados">
                  <span class="bg-green-500 max-h-max text-green-500 px-1 py-2 invisible group-hover:visible">I</span>
                  <span class="text-withe group-hover:text-2xl">Ver tus barajas</span>
                </div>

                <div @click="asideButton('Wants/add')" class="group text-left hover:text-xl focus:outline-none hover:text-withe hover:bg-gray-700 cursor-pointer flex items-center space-x-4" aria-label="libros deseados">
                  <span class="bg-yellow-500 max-h-max text-yellow-500 px-1 py-2 invisible group-hover:visible">I</span>
                  <span class="text-withe group-hover:text-2xl">Crear lista de Wants</span>
                </div>

                <div @click="asideButton('Wants')" class="group text-left hover:text-xl focus:outline-none hover:text-withe hover:bg-gray-700 cursor-pointer flex items-center space-x-4" aria-label="libros deseados">
                  <span class="bg-orange-500 max-h-max text-orange-500 px-1 py-2 invisible group-hover:visible">I</span>
                  <span class="text-withe group-hover:text-2xl">Ver Wants</span>
                </div>
            </div>

        </div>
      </aside>
    </nav>

  </div>
</template>
<script>

import Avatar from "vue-avatar-component";
import BarraBusqueda from "../BarraDeBusquedas.vue"
import DeckBuilder from "../DeckAddModal.vue"

export default {
  name: "headervue",
  components: {
    Avatar,
    BarraBusqueda,
    DeckBuilder

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
      axios.post("api/logout").then(() => {
          this.$store.commit("SET_USER", null, false);
          sessionStorage.removeItem("token");

        if(localStorage.getItem('token') != null){
          localStorage.removeItem("token");
        }
          this.$router.push("/");
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
      this.$router.push("/edicion");
    },
    asideButton(address){
      this.$router.push("/" + address);
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
  left: 25px;
  top: 20px;
}
aside {
  background: rgb(7, 3, 17);
  opacity: 90%;
}

#navbar{
    background: rgba(26, 2, 78, 0.9);
}

</style>
