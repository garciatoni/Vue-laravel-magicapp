<template>
    <div class="w-full md:w-11/12 lg:w-9/12 xl:w-8/12 sm:items-center sm:flex container mx-auto">
        <div class="flex flex-col sm:flex-row justify-center w-full sm:h-96 shadow-lg border-1 border-gray-800">

            <div class="flex flex-row sm:flex-col sm:border-r w-full sm:w-5/12 lg:w-4/12 divide-solid divide-x-2 sm:divide-y-2 sm:divide-x-0">
                <button @click="ventana(0)" class="w-2/6 sm:h-2/6 sm:w-full sm:px-3 sm:py-6 bg-white hover:bg-blue-300 focus:outline-none focus:bg-blue-500 focus:text-white font-bold" aria-label="recuperar contraseña">
                    <i class="fas fa-lock fa-lg pb-2"></i><p class="sm:block hidden">Olvidaste tu contraseña?</p>
                </button>
                <button @click="ventana(2)" class="w-2/6 sm:h-2/6 sm:w-full sm:px-3 py-2 sm:py-6 bg-white hover:bg-blue-300 focus:outline-none focus:bg-blue-500 focus:text-white font-bold border-r-l" aria-label="registro">
                    <i class="fas fa-pencil-alt fa-lg pb-2"></i><p class="sm:block hidden">Registro</p>
                </button>
                <button @click="ventana(1)" class="w-2/6 sm:h-2/6 sm:w-full sm:px-3 sm:py-6 bg-white hover:bg-blue-300 focus:outline-none focus:bg-blue-500 focus:text-white font-bold" aria-label="iniciar sesión">
                    <i class="fas fa-user-circle fa-lg pb-2"></i><p class="sm:block hidden">Iniciar sesión</p>
                </button>
            </div>

            <div class="w-full flex items-center min-h-full bg-gray-700">
                <Login v-if="ventanaActiva == 1"></Login>

                <Registro v-if="ventanaActiva == 2"></Registro>

                <div v-if="ventanaActiva == 0" id="RecuperarContraseña" class="w-full">
                    <h2 class="flex justify-center pt-6 font-bold text-xl">Olvidaste tu contraseña?</h2>
                    <form @submit.prevent="recuperar" class="text-center p-5 space-y-2 self-center" aria-label="cambiar contraseña">
                        <div class="text-left">
                            <input v-model="formDataEmail.email" name="email" type="email" class="shadow-md border-b border-blue-400 focus:outline-none block w-full py-2 px-4 focus:placeholder-gray-300" placeholder="Email" aria-label="email"/>
                            <span v-if="errorsemail.email" class="text-red-500 font-bold">{{errorsemail.email[0]}}</span>
                        </div>
                        <button class="hover:bg-blue-400  shadow-md border border-blue-400 bg-blue-200 focus:outline-none block w-full py-2 px-4 focus:placeholder-gray-300" aria-label="enviar correo">
                            <p class="font-bold">Enviar correo</p>
                        </button>
                    </form>
                </div>

            </div>

        </div>
    </div>
</template>

<script>
import axios from 'axios';
import Login from '../components/Login.vue';
import Registro from '../components/Registro'




axios.defaults.withCredentials = true;
export default {
    name: 'login',
    components: {
        Login,
        Registro

    },
    data(){
        return{
            formDataEmail:{
                'email': '',
            },

            errorsemail:{},
            ventanaActiva: 1,
        }
    },
    methods: {
        recuperar(){
            axios.post('/api/forgotPassword', this.formDataEmail).then((response)=>{
                this.$swal( {
                    icon: 'success',
                    title: '¡Enviado!',
                    text: 'Sa ha enviado un correo para reestablecer su contraseña.',
                    confirmButtonText: '¡Vale!'
                });
            }).catch((errors)=>{
                this.errorsemail = errors.response.data.errors;
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

        ventana(x){
            if(x == 1){
                this.ventanaActiva = 1
                this.errorsregister = {};
                this.errorsemail = {};
            }else if(x == 2){
                this.ventanaActiva = 2
                this.errorslogin = {};
                this.errorsemail = {};
            }else{
                this.ventanaActiva = 0
                this.errorslogin = {};
                this.errorsregister = {};
            }
        }
    },
    mounted() {
        window.scrollTo(0,0);
    }
}
</script>

<style scoped>

</style>
