<template>
    <div>
        <nav class="flex w-full items-center justify-between px-6 h-16 bg-white text-gray-700 border-b border-gray-200 z-10">

            <img src="https://dawjavi.insjoaquimmir.cat/agarcia/LiberLogin/resources/js/img/Liber.png" alt="Logo" class="h-auto w-24" />


            <div v-if="this.$store.state.auth" class="flex justify-end">
                <button v-if="this.$store.state.user" class="mr-2 bg-blue-200" aria-label="Open Menu" @click="drawer">{{this.$store.state.user.name}}</button>
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

            <aside class="transform top-0 right-0 w-3/4 sm:w-4/12 xl:w-1/5 bg-blue-100 fixed h-full overflow-auto ease-in-out transition-all duration-300 z-30" :class="isOpen ? 'translate-x-0' : 'translate-x-full'">
                <span @click="isOpen = false">Home</span>
                <span @click="editUser">Trending Globally</span>
                <span>Wishlist</span>
                <span>Contact</span>
            </aside>
        </nav>

        <div class="container mx-auto">
            <div class="flex flex-row">
                <div v-if="this.$store.state.auth" class="flex flex-row">
                    <button @click.prevent="logout">Logout</button>
                    <p v-if="this.$store.state.user" class="text-center">{{this.$store.state.user.name}}</p>
                </div>

            </div>
        </div>

	</div>
</template>

<script>
// import menuuser from './SideMenu.vue'
export default {
    name: 'headervue',
    components:{
        // menuuser
    },
    data(){
        return{
            currentUser:{},
            token: localStorage.getItem('token'),
            isOpen: false
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
            axios.post('api/logout').then((response) => {
                localStorage.removeItem('token');
                this.$store.commit("SET_USER", null)
                this.$router.push('/agarcia/LiberLogin/public/login')
            }).catch((errors) =>{
                console.log(errors)
            })
        },
        editUser(){
            axios.post('api/editUser/' + this.$store.state.user.id, 'toni').then((respon) => {
                console.log(respon.data[0])
            })
        }
    },
    mounted() {
        document.addEventListener("keydown", e => {
            if (e.keyCode == 27 && this.isOpen) this.isOpen = false;
        });
    },
    created(){
        if(!this.$store.state.auth && this.token != null){
            window.axios.defaults.headers.common['Authorization'] = `Bearer ${this.token}`
            axios.get('/api/user').then((res) => {
                this.$store.commit("SET_USER", res.data)
            }).catch(() => {
                this.$store.commit("SET_USER", null)
            })
        }
    }
}



</script>

<style scoped>

</style>
