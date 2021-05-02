<template>
    <div class="bg-blue-700">
        <div class="container mx-auto">
            <div class="flex flex-row">
                <div v-if="this.token">
                    <button @click.prevent="logout">Logout</button>
                    <p v-if="this.$store.state.user" class="text-center">{{this.$store.state.user.name}}</p>
                </div>

                <div v-else class="flex flex-row">
                    <router-link class="text-right" :to="{ name: 'login' }">login</router-link> |
                    <router-link class="text-right" :to="{ name: 'register' }"> Registro</router-link>
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
            open: false,
        }
    },
    methods:{
		toggle() {
			this.open = !this.open;
		},
        logout(){
            axios.post('api/logout').then((response) => {
                localStorage.removeItem('token');
                this.$store.commit("SET_USER", null)
                this.$router.push('/login')
            }).catch((errors) =>{
                console.log(errors)
            })
        }
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
