<template>
<div class="pt-5">
    <form @submit.prevent="EditUser">
        <div class="mx-auto max-w-lg " v-if="vuex.auth" >
            <h2 class="flex justify-center pb-6 font-bold text-xl">Editar datos</h2>
            <div class="py-1">
                <input v-model="formData.name" name="name" aria-label="nombre" :placeholder="vuex.user.name" type="text" class="focus:placeholder-gray-300 shadow-md border-b border-blue-400 focus:outline-none block w-full py-2 px-4">
                <p class="text-red-500" v-text="errors.name"></p>
            </div>
            <div class="py-1">
                <input v-model="vuex.user.email" placeholder="Email" disabled class="focus:placeholder-gray-300 shadow-md border-b border-blue-400 focus:outline-none block w-full py-2 px-4">
            </div>
            <div class="py-1">
                <input  v-model="formData.password" aria-label="contraseña" placeholder="Contraseña" type="password" class="focus:placeholder-gray-300 shadow-md border-b border-blue-400 focus:outline-none block w-full py-2 px-4">
                <p class="text-red-500" v-text="errors.password"></p>
            </div>
            <div class="py-1">
                <input  v-model="formData.newPassword" placeholder="Nueva contraseña" aria-label="nueva contraseña" type="password" class="focus:placeholder-gray-300 shadow-md border-b border-blue-400 focus:outline-none block w-full py-2 px-4">
                <p class="text-red-500" v-text="errors.newPassword"></p>
            </div>
            <div class="py-1">
                <input v-model="formData.password_confirmation" placeholder="Confirmar nueva contraseña" aria-label="Confirmar nueva contraseña" type="password" class="focus:placeholder-gray-300 shadow-md border-b border-blue-400 focus:outline-none block w-full py-2 px-4">
                <p class="text-red-500" v-text="errors.password_confirmation"></p>
            </div>
            <!-- <input type="text" class="hidden" :value="this.$store.state.user.name"> -->
            <button class="hover:bg-blue-400 shadow-md border border-blue-400 bg-blue-200 focus:outline-none block w-full py-2 px-4">
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
            //Data del formulario
            formData: {
                'name': '',
                'password': '',
                'newPassword': '',
                'password_confirmation': ''
            },
            //Errores del formulario
            errors:{},
            vuex: this.$store.state,
        }
    },

    methods: {
        //Metodo para cambiar los datos del usuario.
        EditUser(){
            let vuestore = this.$store.state
            console.log(vuestore.user.id)
            axios.post('api/editUser/' + vuestore.user.id, this.formData).then((response) =>{
                this.$store.commit("login", localStorage.getItem('token'))
            }).catch((errors) =>{
                this.errors = errors.response.data.errors
            })
        }
    },
}

</script>

<style scoped>
</style>
