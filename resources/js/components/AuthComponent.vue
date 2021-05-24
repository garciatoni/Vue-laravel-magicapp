<template>
    <div class="w-full md:w-11/12 lg:w-9/12 xl:w-8/12 sm:items-center sm:flex container mx-auto">
        <div class="flex flex-col sm:flex-row justify-center w-full sm:h-96">
            <div id="Marcobg" class="hidden lg:flex lg:w-5/12 flex flex-col items-center h-full">
                <div class="justify-end flex my-10">
                    <img src="https://dawjavi.insjoaquimmir.cat/agarcia/LiberLogin/resources/js/img/Logo.png" alt="Logo" class="hidden sm:flex h-16 w-44 sm:pl-4 py-1">
                </div>
                <p class="px-5 font-bold my-10 text-center">Únete a la web número 1 en crítica literaria!</p>
            </div>
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
            <div class="w-full flex items-center bg-blue-300 bg-opacity-40">

                <div v-if="ventanaActiva === 1" id="login" class="w-full">
                    <h2 class="flex justify-center pt-2 font-bold text-xl">Iniciar sesión</h2>
                    <form @submit.prevent="login" class="text-center p-5 space-y-2 self-center" aria-label="Iniciar Sesión">
                        <div class="text-left">
                            <input v-model="formDataLogin.email" type="email" class="focus:placeholder-gray-300 shadow-md border-b border-blue-400 focus:outline-none block w-full py-2 px-4" placeholder="Email" aria-label="email"/>
                            <span v-if="errorslogin.email" class="text-red-500 font-bold">{{errorslogin.email[0]}}</span>
                        </div>
                        <div class="text-left">
                            <input v-model="formDataLogin.contraseña" type="password" class="focus:placeholder-gray-300 shadow-md border-b border-blue-400 focus:outline-none block w-full py-2 px-4" placeholder="Contraseña" aria-label="constraseña"/>
                            <span v-if="errorslogin.contraseña" class="text-red-500 font-bold">{{errorslogin.contraseña[0]}}</span>
                        </div>
                        <div class="flex items-center flex-row-reverse justify-start md:flex-row">
                            <input class="form-checkbox h-6 w-6" type="checkbox" id="remember" name="remember" v-model="checked">
                            <label for="remember" class="px-2 text-lg">Recuérdame</label>
                        </div>
                        <div class="">
                            <button type="submit" class="hover:bg-blue-400 focus:bg-blue-400 shadow-md border border-blue-400 bg-blue-200 focus:outline-none block w-full py-2 px-4">
                                <p class="font-bold">Login</p>
                            </button>
                        </div>
                    </form>
                </div>

                <div v-if="ventanaActiva === 2" id="register" class="w-full">
                    <h2 class="flex justify-center pt-2 font-bold text-xl">Registro</h2>
                    <form @submit.prevent="registerUser" class="text-center p-5 self-cente space-y-2" aria-label="Registro">
                        <div class="text-left">
                            <input v-model="formDataRegister.name" placeholder="Nombre de usuario" type="text" class="shadow-md border-b border-blue-400 focus:outline-none block w-full py-2 px-4 focus:placeholder-gray-300" aria-label="nombre">
                            <span v-if="errorsregister.name" class="text-red-500 font-bold">{{errorsregister.name[0]}}</span>
                        </div>
                        <div class="text-left">
                            <input v-model="formDataRegister.email" placeholder="Email" type="email" class="shadow-md border-b border-blue-400 focus:outline-none block w-full py-2 px-4 focus:placeholder-gray-300" aria-label="email">
                            <span v-if="errorsregister.email" class="text-red-500 font-bold">{{errorsregister.email[0]}}</span>
                        </div>
                        <div class="text-left">
                            <input  v-model="formDataRegister.password" placeholder="Contraseña" type="password" class="shadow-md border-b border-blue-400 focus:outline-none block w-full py-2 px-4 focus:placeholder-gray-300" aria-label="contraseña">
                            <span v-if="errorsregister.password" class="text-red-500 font-bold">{{errorsregister.password[0]}}</span>
                        </div>
                        <div class="text-left">
                            <input v-model="formDataRegister.password_confirmation" placeholder="Confirmar contraseña" type="password" class="shadow-md border-b border-blue-400 focus:outline-none block w-full py-2 px-4 focus:placeholder-gray-300" aria-label="confirmar contraseña">
                            <span v-if="errorsregister.password_confirm" class="text-red-500 font-bold">{{errorsregister.password_confirm[0]}}</span>
                        </div>
                        <button class=" hover:bg-blue-400 focus:bg-blue-400 shadow-md border border-blue-400 bg-blue-200 focus:outline-none block w-full py-2 px-4 focus:placeholder-gray-300" aria-label="registrarse">
                            <p class="font-bold">Registrarse</p>
                        </button>
                    </form>
                </div>

                <div v-if="ventanaActiva === 0" id="RecuperarContraseña" class="w-full">
                    <h2 class="flex justify-center pt-6 font-bold text-xl">Olvidaste tu contraseña?</h2>
                    <form @submit.prevent="recuperar" class="text-center p-5 space-y-2 self-center" aria-label="cambiar contraseña">
                        <div class="text-left">
                            <input v-model="formDataEmail.email" name="email" type="email" class="shadow-md border-b border-blue-400 focus:outline-none block w-full py-2 px-4 focus:placeholder-gray-300" placeholder="Email" aria-label="email"/>
                            <span v-if="errorsemail.email" class="text-red-500 font-bold">{{errorsemail.email[0]}}</span>
                        </div>
                        <button class="hover:bg-blue-400 focus:bg-blue-400 shadow-md border border-blue-400 bg-blue-200 focus:outline-none block w-full py-2 px-4 focus:placeholder-gray-300" aria-label="enviar correo">
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
axios.defaults.withCredentials = true;
axios.defaults.baseURL = '/agarcia/LiberLogin/public';
export default {
    name: 'login',
    data(){
        return{
            formDataLogin: {
                email: '',
                contraseña: '',
                device_name: 'browser'
            },
            errorslogin: {},
            formDataRegister: {
                'name': '',
                'email': '',
                'password': '',
                'password_confirmation': ''
            },
            errorsregister:{},
            formDataEmail:{
                'email': '',
            },

            errorsemail:{},
            ventanaActiva: 1,
            checked: false,
        }
    },
    methods: {
        login(){
            console.log(this.checked)
            axios.post('api/login', this.formDataLogin).then((response) => {
                this.$store.commit("login", response.data);
                this.$router.push('/agarcia/LiberLogin/public');
                if (this.checked){
                    localStorage.setItem('token', response.data);
                }
                this.$swal( {
                    toast: true,
                    position: 'center',
                    showConfirmButton: false,
                    timer: 2000,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    },
                    title: '¡Bienvenido!',
                    icon: 'success',
                })
            }).catch((errors) => {
                this.errorslogin = errors.response.data.errors
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

        registerUser(){
            axios.post('/api/register', this.formDataRegister).then((response)=>{
                this.formDataRegister.name = this.formDataRegister.email = this.formDataRegister.password = this.formDataRegister.password_confirmation = ''
                this.errorsregister = {}
                this.ventanaActiva = 1
                this.$swal( {
                    title: '¡Registrado!',
                    showConfirmButton: false,
                    timer: 1500,
                    toast: true,
                    icon: 'success',
                });
            }).catch((errors)=>{
                this.errorsregister = errors.response.data.errors
                this.formDataRegister
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
    #Marcobg{
        background: rgb(0,100,237);
        background: linear-gradient(340deg, rgba(0,100,237,1) 15%, rgba(118,172,245,1) 33%, rgba(127,177,246,1) 33%, rgba(192,217,250,1) 50%, rgba(222,235,252,1) 55%, rgba(233,242,253,1) 55%, rgba(244,248,254,1) 78%, rgba(255,255,255,1) 100%);
    }
</style>
