<template>
<div class="py-5">
    <form @submit.prevent="EditUser" aria-label="editar datos del usuario">
        <div class="mx-auto max-w-lg " v-if="vuex.auth" >
            <h2 class="flex justify-center pb-6 font-bold text-xl">Editar datos</h2>
            <div class="space-y-5 bg-blue-600 bg-opacity-30 shadow-md p-8">
            <div class="py-1">
                <input v-model="formData.name" name="name" aria-label="nombre" :placeholder="vuex.user.name" type="text" class="focus:placeholder-gray-300 shadow-md border-b border-blue-400 focus:outline-none block w-full py-2 px-4">
                <span v-if="errors.name" class="text-red-500">*{{errors.name[0]}}</span>
            </div>
            <div class="">
                <input v-model="vuex.user.email" placeholder="Email" disabled class="focus:placeholder-gray-300 shadow-md border-b border-blue-400 focus:outline-none block w-full py-2 px-4">
            </div>
            <div class="">
                <input  v-model="formData.password" aria-label="contraseña" placeholder="Contraseña" type="password" class="focus:placeholder-gray-300 shadow-md border-b border-blue-400 focus:outline-none block w-full py-2 px-4">
                <span v-if="errors.password" class="text-red-500">*{{errors.password[0]}}</span>
            </div>
            <div class="">
                <input  v-model="formData.newPassword" placeholder="Nueva contraseña" aria-label="nueva contraseña" type="password" class="focus:placeholder-gray-300 shadow-md border-b border-blue-400 focus:outline-none block w-full py-2 px-4">
                <span v-if="errors.newPassword" class="text-red-500">*{{errors.password[0]}}</span>
            </div>
            <div class="">
                <input v-model="formData.password_confirmation" placeholder="Confirmar nueva contraseña" aria-label="Confirmar nueva contraseña" type="password" class="focus:placeholder-gray-300 shadow-md border-b border-blue-400 focus:outline-none block w-full py-2 px-4">
                <!-- <span v-if="errors.password_confirmation" class="text-red-500">*{{errors.password_confirmation[0]}}</span> -->
            </div>
            <!-- <input type="text" class="hidden" :value="this.$store.state.user.name"> -->
            <button class="hover:bg-blue-400 focus:bg-blue-400 shadow-md border border-blue-400 bg-blue-200 focus:outline-none block w-full py-2 px-4">
                Editar
            </button>
            </div>
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
            axios.post('api/editUser/' + vuestore.user.id, this.formData).then((response) =>{
                this.$store.commit("login", localStorage.getItem('token'))
                this.$swal( {
                    toast: true,
                    position: 'center',
                    showConfirmButton: false,
                    timer: 2000,
                    title: 'Datos modificados correctamente.',
                    icon: 'success',
                });
            }).catch((errors) =>{
                this.errors = errors.response.data.errors
                this.$swal( {
                    toast: true,
                    position: 'center',
                    showConfirmButton: false,
                    timer: 2000,
                    title: 'Algo salió mal.',
                    icon: 'error',
                });
            })
        }
    },
}

</script>

<style scoped>
</style>
