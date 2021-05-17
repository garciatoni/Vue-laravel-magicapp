<template>
    <div>
        <nav class=" flex w-full items-center justify-between px-6 h-16 bg-white text-gray-700 border-b border-gray-200 z-10">
            <router-link :to="{ name: 'home' }">
                <div class="flex flex-row">
                    <img src="https://dawjavi.insjoaquimmir.cat/agarcia/LiberLogin/resources/js/img/Logo.png" alt="Logo" class="hidden sm:flex h-16 w-44 sm:pl-4 py-1"/>
                    <img src="https://dawjavi.insjoaquimmir.cat/agarcia/LiberLogin/resources/js/img/Favicon.png" alt="LogoMobile" class="flex sm:hidden w-12">
                </div>
            </router-link>

            <div class="hidden md:flex divide-solid divide-x-2 divide-blue-400 md:text-lg xl:text-xl">
                <router-link class="px-1" :to="{ name: 'Terror' }">Terror</router-link>
                <router-link class="px-1" :to="{ name: 'Romance' }">Romance</router-link>
                <router-link class="px-1" :to="{ name: 'Fantasia' }">Fantasia</router-link>
                <router-link class="px-1" :to="{ name: 'cifi' }">Ciencia ficción</router-link>
                <router-link class="px-1" :to="{ name: 'Aventura' }">Aventura</router-link>
            </div>

            <div v-if="vuex.auth" class="flex justify-end">
                <button v-if="vuex.user" class="flex flex-row focus:outline-none hover:text-blue-300 " aria-label="Open Menu" @click="drawer">
                    <avatar :fullname="vuex.user.name" :size="50"></avatar>
                    <!-- <p class="font-bold text-xl">{{vuex.user.name}}</p> -->
                </button>
            </div>
            <div v-else class="space-x-2 flex flex-row justify-end">
                <router-link :to="{ name: 'login' }">
                    <p class="hover:text-blue-400">Registrate/Identificate</p>
                </router-link>
            </div>

            <transition enter-class="opacity-0" enter-active-class="ease-out transition-medium" enter-to-class="opacity-100" leave-class="opacity-100" leave-active-class="ease-out transition-medium" leave-to-class="opacity-0">
                <div @keydown.esc="isOpen = false" v-show="isOpen" class="z-10 fixed inset-0 transition-opacity">
                    <div @click="isOpen = false" class="absolute inset-0 bg-black opacity-50" tabindex="0"></div>
                </div>
            </transition>

            <aside v-if="vuex.auth" class="text-xl transform top-0 right-0 w-3/4 sm:w-5/12 xl:w-80 fixed h-full overflow-auto ease-in-out transition-all duration-300 z-30" :class="isOpen ? 'translate-x-0' : 'translate-x-full'">

                <div class="flex flex-col">

                    <div class="border-b-2 pb-2 mx-2">
                        <div class="flex flex-row justify-between cursor-default">
                            <div class="pt-4 pl-2 font-bold align-bottom">Bienvenido {{vuex.user.name}}!</div>
                            <div class="mx-1 my-2">
                                <button class="focus:outline-none pr-2" @click="isOpen = false">
                                    <i class="far fa-times-circle fa-2x"></i>
                                </button>
                            </div>
                        </div>
                        <div class="flex flex-row">
                            <router-link class="has-tooltip" :to="{ name: 'home' }">
                                <i class="fas pl-2 fa-2x fa-home"></i>
                                <span class="tooltip bg-white border border-black px-2">Home</span>
                            </router-link>
                            <div class="flex justify-between flex-row pl-7 has-tooltip relative">
                                <button class="" @click="logout" >
                                   <i class="fas fa-2x fa-sign-out-alt"></i>
                                </button>
                                 <span class="tooltip bg-white border border-black px-1">Desconectarse</span>
                            </div>
                        </div>
                    </div>


                    <router-link class="mb-2 mt-6 text-center border-gray-800 focus:outline-none mx-5 bg-white p-2 border hover:border-blue-700 hover:text-black hover:bg-blue-300"
                    :to="{ name: 'edicion' }">
                        <span class="md:font-bold">Editar Perfil</span>
                    </router-link>

                    <router-link class="mt-2 mb-6 text-center border-gray-800 focus:outline-none mx-5 bg-white p-2 border hover:border-blue-700 hover:text-black hover:bg-blue-300"
                    :to="{ name: 'wish' }">
                        <span class="md:font-bold">Libros deseados</span>
                    </router-link>

                    <p class="flex md:hidden justify-center border-t mx-2 pt-2 pb-2">Generos literarios</p>

                    <router-link class="md:hidden my-1 text-center border-gray-800 focus:outline-none mx-5 bg-white p-2 border hover:border-blue-700 hover:text-black hover:bg-blue-300"
                    :to="{ name: 'Terror' }">
                        <span class="md:font-bold">Terror</span>
                    </router-link>

                    <router-link class="md:hidden my-1 text-center border-gray-800 focus:outline-none mx-5 bg-white p-2 border hover:border-blue-700 hover:text-black hover:bg-blue-300"
                    :to="{ name: 'Romance' }">
                        <span class="md:font-bold">Romance</span>
                    </router-link>

                    <router-link class="md:hidden my-1 text-center border-gray-800 focus:outline-none mx-5 bg-white p-2 border hover:border-blue-700 hover:text-black hover:bg-blue-300"
                    :to="{ name: 'Fantasia' }">
                        <span class="md:font-bold">Fantasia</span>
                    </router-link>

                    <router-link class="md:hidden my-1 text-center border-gray-800 focus:outline-none mx-5 bg-white p-2 border hover:border-blue-700 hover:text-black hover:bg-blue-300"
                    :to="{ name: 'cifi' }">
                        <span class="md:font-bold">Ciencia ficción</span>
                    </router-link>

                    <router-link class="md:hidden my-1 text-center border-gray-800 focus:outline-none mx-5 bg-white p-2 border hover:border-blue-700 hover:text-black hover:bg-blue-300"
                    :to="{ name: 'Aventura' }">
                        <span class="md:font-bold">Aventura</span>
                    </router-link>


                </div>

            </aside>
        </nav>
	</div>
</template>
<script>
import Avatar from 'vue-avatar-component'
export default {
    name: 'headervue',
    components:{
        Avatar
    },
    data(){
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
        cursor: default;
    }
    .has-tooltip:hover .tooltip {
        visibility: visible;
        z-index: 100;
        left: 75px;
    }
    aside{
        background: rgb(0,100,237);
        background: linear-gradient(340deg, rgba(0,100,237,1) 15%, rgba(118,172,245,1) 33%, rgba(127,177,246,1) 33%, rgba(192,217,250,1) 50%, rgba(222,235,252,1) 55%, rgba(233,242,253,1) 55%, rgba(244,248,254,1) 78%, rgba(255,255,255,1) 100%);
    }

</style>
