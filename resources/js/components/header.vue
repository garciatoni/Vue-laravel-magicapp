<template>
    <div>
        <nav class=" flex w-full items-center justify-between px-6 h-16 bg-white text-gray-700 border-b border-gray-200 z-10">
            <router-link :to="{ name: 'home' }">
                <div class="flex flex-row">
                    <img src="https://dawjavi.insjoaquimmir.cat/agarcia/LiberLogin/resources/js/img/Liber.png" alt="Logo" class="h-10 w-10" />
                    <p class="flex items-end pl-2">iber</p>
                </div>
            </router-link>

            <div v-if="vuex.auth" class="flex justify-end">
                <button v-if="vuex.user" class="flex flex-row" aria-label="Open Menu" @click="drawer">
                    <p class="font-bold">{{vuex.user.name}}</p>
                    <p>X</p>
                </button>
            </div>

            <div v-else class="space-x-2 flex flex-row justify-end">
                <router-link :to="{ name: 'login' }">
                    <button class="bg-blue-700 hover:bg-blue-200 px-3 py-1 rounded">
                        <p class="text-white font-bold hover:text-black">Login</p>
                    </button>
                </router-link>

                <router-link :to="{ name: 'register' }">
                    <button class="bg-blue-700 hover:bg-blue-200 px-3 py-1 rounded">
                        <p class="text-white font-bold hover:text-black">Registrate</p>
                    </button>
                </router-link>
            </div>

            <transition enter-class="opacity-0" enter-active-class="ease-out transition-medium" enter-to-class="opacity-100" leave-class="opacity-100" leave-active-class="ease-out transition-medium" leave-to-class="opacity-0">
                <div @keydown.esc="isOpen = false" v-show="isOpen" class="z-10 fixed inset-0 transition-opacity">
                    <div @click="isOpen = false" class="absolute inset-0 bg-black opacity-50" tabindex="0"></div>
                </div>
            </transition>

            <aside v-if="vuex.auth" class="border-2 border-opacity-50 border-light-blue-400 text-xl transform top-0 right-0 w-3/4 sm:w-5/12 xl:w-80 bg-gradient-to-t from-blue-200 via-blue-100 to-white fixed h-full overflow-auto ease-in-out transition-all duration-300 z-30" :class="isOpen ? 'translate-x-0' : 'translate-x-full'">

                <div class="flex flex-col">
                    <div class="px-3 pt-3">
                        <div class="border-b-2 pb-3 border-black">
                            <p>{{vuex.user.email}}</p>
                            <div class="flex justify-between flex-row pt-2">
                                <p class="">{{vuex.user.name}}</p>
                                <button class="" @click="logout" >Logout</button>
                            </div>
                        </div>
                    </div>
                    <button class="mt-3 border-gray-300 focus:outline-none mx-8 rounded-full p-3 font-bold border hover:border-black
                    hover:bg-gray-300" @click="isOpen = false">
                        Cerrar
                    </button>

                    <router-link :to="{ name: 'edicion' }">test</router-link>
                        <button @click="UserEdition" class="mt-3 border-gray-300 focus:outline-none mx-8 rounded-full p-3  border hover:border-black
                        hover:bg-gray-300">
                            <span class="font-bold">Editar Perfil de Usuario</span>
                        </button>
                    <button>
                        <span class="focus:border-0">Trending Globally</span>
                    </button>
                </div>

            </aside>
        </nav>
	</div>
</template>

<script>
// import menuuser from './SideMenu.vue'
export default {
    name: 'headervue',
    components:{

    },

    data(){
        // var store = this.$store;
        // console.log(store.user)
        return{
            currentUser:{},
            isOpen: false,
            vuex: this.$store.state,
        }
    },
    watch: {
        isOpen: {
            immediate: true,
            handler(isOpen) {
                if (process.client) {
                if (isOpen) document.body.style.setProperty("overflow", "hidden");
                else document.body.style.removeProperty("overflow");
                }
            }
        }
    },
    methods:{
		drawer() {
            this.isOpen = !this.isOpen;
        },
        logout(){
            axios.post('api/logout', ).then(() => {
                console.log(localStorage.getItem('token'));
                this.$store.commit("SET_USER", null, false)
                localStorage.removeItem('token');
                this.$router.push('/agarcia/LiberLogin/public/')
            }).catch((errors) =>{
                console.log(errors)
            });
            this.isOpen = false;
        },
        UserEdition() {
            this.$router.push('/agarcia/LiberLogin/public/edicion/');
        },
    },
    mounted() {
        document.addEventListener("keydown", e => {
            if (e.keyCode == 27 && this.isOpen) this.isOpen = false;
        });
    },

}



</script>

<style scoped>

</style>
