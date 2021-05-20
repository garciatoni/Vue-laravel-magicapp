<template>
<div class="py-5">
    <form @submit.prevent="EditUser" aria-label="editar datos del usuario">
        <div class="mx-auto max-w-lg" v-if="vuex.auth" >
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

    <div class="border-t-2 mx-auto max-w-lg mt-5">
        <h2 class="flex justify-center pb-6 font-bold text-xl py-5">Eliminar cuenta</h2>
        <div class="space-y-5 bg-blue-600 bg-opacity-30 shadow-md p-8 flex justify-center items-center">
            <button @click="eliminarCuenta" class="py-3 px-5 bg-red-500">Eliminar</button>
        </div>

    </div>
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
                this.$store.commit("login", sessionStorage.getItem('token'))
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
        },
        eliminarCuenta(){
            let vuestore = this.$store.state
            this.$swal({
                title: '¿Estas seguro?',
                text: "¡No podras revertir esta acción!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, elimina la cuenta'
            }).then((result) => {
                if (result.isConfirmed){
                    this.$swal({
                        title: 'Introduce tu contraseña',
                        input: 'password',
                        inputLabel: 'Contraseña',
                        inputPlaceholder: 'Introduce tu contraseña',
                        showCloseButton: true,
                    }).then((results) => {
                        const password = {
                            password: results.value,
                        }
                        const id = vuestore.user.id
                        axios.post('api/DeleteUser/' + id, password).then((response) =>{
                            this.$store.commit("SET_USER", null, false);
                            sessionStorage.removeItem("token");
                            if(localStorage.getItem('token') != null){
                                localStorage.removeItem("token");
                            }
                            this.$router.push("/agarcia/LiberLogin/public/");
                            this.$swal( {
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 2000,
                                title: 'Cuenta eliminada.',
                                icon: 'success',
                            });
                        })
                        .catch(() =>{
                            this.$swal( {
                                toast: true,
                                position: 'center',
                                showConfirmButton: false,
                                timer: 2000,
                                title: 'Algo salió mal.',
                                icon: 'error',
                            });
                        })

                    })
                }
            })
        }
    },
}

</script>

<style scoped>
</style>
