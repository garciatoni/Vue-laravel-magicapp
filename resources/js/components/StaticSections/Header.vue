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
                    <button class="bg-blue-900 hover:bg-blue-200 px-3 py-1 rounded">
                        <p class="text-white font-bold hover:text-black">Login</p>
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

                    <div class="border-b-2 pb-2 mx-2">
                        <div class="flex flex-row justify-between">
                            <div class="pt-4 pl-2 font-bold align-bottom">Bienvenido {{vuex.user.name}}!</div>
                            <div class="mx-1 my-2">
                                <button class="focus:outline-none" @click="isOpen = false">
                                    <i class="far fa-times-circle fa-2x"></i>
                                </button>
                            </div>
                        </div>
                        <div class="flex flex-row">
                            <router-link class="has-tooltip" :to="{ name: 'home' }">
                                <i class="fas pl-2 fa-2x fa-home"></i>
                                <span class="tooltip bg-white border border-black ">Home</span>
                            </router-link>
                            <div class="flex justify-between flex-row pl-7">
                                <button class="has-tooltip" @click="logout" >
                                   <i class="fas fa-2x fa-sign-out-alt"></i>
                                   <span class="tooltip bg-white border border-black ">Desconectarse</span>
                                </button>
                            </div>
                        </div>
                    </div>


                    <router-link class="my-2 text-center border-gray-800 focus:outline-none mx-5 bg-white p-2 border hover:border-black hover:bg-gray-300"
                    :to="{ name: 'edicion' }">
                        <span class="font-bold">Editar Perfil de Usuario</span>
                    </router-link>

                    <router-link class="my-2 text-center border-gray-800 focus:outline-none mx-5 bg-white p-2 border hover:border-black hover:bg-gray-300"
                    :to="{ name: 'wish' }">
                        <span class="font-bold">Ver lista de libros favoritos.</span>
                    </router-link>



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

    .tooltip{
        visibility: hidden;
        position: absolute;
    }
    .has-tooltip:hover .tooltip {
        visibility: visible;
        z-index: 100;
    }

</style>
