<template>
<div>
    <form @submit.prevent="EditUser" class="mt-8">
        <div class="mx-auto max-w-lg " v-if="vuex.auth" >
            <div class="py-1">
                <input v-model="formData.name" name="name" :placeholder="vuex.user.name" type="text" class="text-md block px-3 py-2  w-full bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                <p class="text-red-500" v-text="errors.name"></p>

            </div>
            <div class="py-1">
                <input v-model="vuex.user.email" placeholder="Email" disabled class="text-md block px-3 py-2 w-full bg-white border-2 border-gray-300 bg-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none disabled:opacity-50 ">
                <!-- cursor-not-allowed -->

                <p class="text-red-500" v-text="errors.email"></p>
            </div>
            <div class="py-1">
                <input  v-model="formData.password" placeholder="Contraseña" type="password" class="text-md block px-3 py-2 w-full bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                <p class="text-red-500" v-text="errors.password"></p>
            </div>
            <div class="py-1">
                <input  v-model="formData.newPassword" placeholder="Nueva contraseña (Campo opcional)" type="password" class="text-md block px-3 py-2 w-full bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                <p class="text-red-500" v-text="errors.password"></p>
            </div>
            <div class="py-1">
                <input v-model="formData.password_confirmation" placeholder="Confirmar nueva contraseña (Campo opcional)" type="password" class="text-md block px-3 py-2 w-full bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                <p class="text-red-500" v-text="errors.password_confirm"></p>
            </div>
            <!-- <input type="text" class="hidden" :value="this.$store.state.user.name"> -->
            <button class="mt-3 text-lg font-semibold bg-gray-800 w-full text-white rounded-lg px-6 py-3 block shadow-xl hover:text-black hover:bg-white">
                Editar
            </button>
        </div>
    </form>

</div>

</template>

<script>
import axios from 'axios';
axios.defaults.baseURL = '/agarcia/LiberLogin/public';
export default {

    data(){

        return{
            formData: {
                'name': '',
                'password': '',
                'newPassword': '',
                'password_confirmation': ''
            },
            errors:{},
            vuex: this.$store.state,
        }
    },

    methods: {

        EditUser(){
            let vuestore = this.$store.state
            console.log(vuestore.user.id)
            // console.log(this.formData)
            axios.post('api/editUser/' + vuestore.user.id, this.formData).then((response) =>{
                console.log(response.data);
            }).catch((errors) =>{
                console.log(errors)
            })
        }
    },


}

</script>

<style scoped>
</style>
