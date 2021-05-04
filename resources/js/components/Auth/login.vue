<template>
    <div>
        <section class="min-h-screen flex flex-col">
            <div class="flex flex-1 items-center justify-center">
                <div class="rounded-lg sm:border-2 px-4 lg:px-24 py-16 lg:max-w-xl sm:max-w-md w-full text-center">
                    <form @submit.prevent="login" class="text-center">
                        <h1 class="font-bold tracking-wider text-3xl mb-8 w-full text-gray-600">
                            Login
                            <h1></h1>
                        </h1>
                        <div class="py-2 text-left">
                            <input v-model="formData.email" type="email" class="bg-gray-200 border-2 border-gray-100 focus:outline-none block w-full py-2 px-4 rounded-lg focus:border-gray-700 " placeholder="Email" />
                            <p class="text-red-500" v-text="errors.email"></p>
                        </div>
                        <div class="py-2 text-left">
                            <input v-model="formData.password" type="password" class="bg-gray-200 border-2 border-gray-100 focus:outline-none block w-full py-2 px-4 rounded-lg focus:border-gray-700 " placeholder="Password" />
                            <p class="text-red-500" v-text="errors.password"></p>
                        </div>
                        <div class="py-2">
                            <button type="submit" class="border-2 border-gray-100 focus:outline-none bg-purple-600 text-white font-bold tracking-wider block w-full p-2 rounded-lg focus:border-gray-700 hover:bg-purple-700">
                                Sign In
                            </button>
                        </div>
                    </form>
                    <div class="text-center">
                        <a href="" class="hover:underline">Forgot password?</a>
                    </div>
                    <div class="text-center mt-12">
                        <router-link class="text-md text-indigo-600 underline font-semibold hover:text-indigo-800" to="/register">Crea una!</router-link>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import axios from 'axios';
axios.defaults.withCredentials = true;
axios.defaults.baseURL = '/agarcia/LiberLogin/public';

export default {
    name: 'login',
    data(){
        return{
            formData: {
                email: '',
                password: '',
                device_name: 'browser'
            },
            errors: {}
        }
    },

    methods: {
        login(){
            axios.post('api/login', this.formData).then((response) => {
                localStorage.setItem('token', response.data);
                window.axios.defaults.headers.common['Authorization'] = `Bearer ${response.data}`
                axios.get('/api/user').then((res) => {
                    this.$store.commit("SET_USER", res.data)
                }).catch(() => {
                    this.$store.commit("SET_USER", null)
                })
                this.$router.push('/agarcia/LiberLogin/public/');
            }).catch((errors) => {
                this.errors = errors.response.data.errors
            })
        },


    }
}



</script>

<style scoped>
</style>
