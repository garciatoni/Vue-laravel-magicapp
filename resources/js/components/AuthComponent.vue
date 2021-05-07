<template>
    <div class="w-9/12 mt-10">
        <div class="flex flex-row justify-center">
            <div class="flex flex-col border-l w-64 ">
                <img class="h-full" src="https://besthqwallpapers.com/Uploads/7-4-2020/127856/thumb2-blue-black-wave-abstract-wave-background-creative-blue-black-background-waves-background-black-blue-background.jpg" alt="">
            </div>

            <div class="flex flex-col border-r">
                <button @click="ventana(1)" class="px-3 py-6 bg-white hover:bg-blue-300 focus:outline-none focus:bg-blue-500 focus:text-white font-bold">
                    <i class="fas fa-user-circle fa-lg pb-2"></i><p>LOGIN</p>
                </button>
                <button @click="ventana(2)" class="px-3 py-6 bg-white hover:bg-blue-300 focus:outline-none focus:bg-blue-500 focus:text-white font-bold">
                <i class="fas fa-pencil-alt fa-lg pb-2"></i><p>REGISTRO</p>
                </button>
                <button @click="ventana(0)" class="px-3 py-6 bg-white hover:bg-blue-300 focus:outline-none focus:bg-blue-500 focus:text-white font-bold">
                    <i class="fas fa-lock fa-lg pb-2 sm:hidden"></i><p>OLVIDASTE LA CONTRASEÑA?</p>
                </button>
            </div>

            <div class="ml-2 w-6/12 flex items-center">
                <div v-if="ventanaActiva === 1" id="login" class="w-full">
                    <form @submit.prevent="login" class="text-center p-5 self-center">

                        <div class="py-2 text-left">
                            <input v-model="formDataLogin.email" type="email" class="shadow-md border-b border-blue-400 focus:outline-none block w-full py-2 px-4" placeholder="Email" />

                            <span class="text-red-500" v-text="errorslogin.email"></span>
                        </div>
                        <div class="py-2 text-left">
                            <input v-model="formDataLogin.password" type="password" class="shadow-md border-b border-blue-400 focus:outline-none block w-full py-2 px-4" placeholder="Password" />

                            <span class="text-red-500" v-text="errorslogin.password"></span>
                        </div>
                        <div class="py-2">
                            <button type="submit" class="hover:bg-blue-400 shadow-md border border-blue-400 bg-blue-200 focus:outline-none block w-full py-2 px-4">
                                <p class="font-bold">Login</p>
                            </button>
                        </div>
                    </form>
                </div>

                <div v-if="ventanaActiva === 2" id="register" class="w-full">
                    <form @submit.prevent="registerUser" class="text-center p-5 self-center">

                            <div class="py-2 text-left">
                                <input v-model="formDataRegister.name" placeholder="Username" type="text" class="shadow-md border-b border-blue-400 focus:outline-none block w-full py-2 px-4">
                                <span class="text-red-500" v-text="errorsregister.name"></span>
                            </div>

                            <div class="py-1">
                                <input v-model="formDataRegister.email" placeholder="Email" type="email" class="shadow-md border-b border-blue-400 focus:outline-none block w-full py-2 px-4">
                                <span class="text-red-500" v-text="errorsregister.email"></span>
                            </div>

                            <div class="py-1">
                                <input  v-model="formDataRegister.password" placeholder="Password" type="password" class="shadow-md border-b border-blue-400 focus:outline-none block w-full py-2 px-4">
                                <span class="text-red-500" v-text="errorsregister.password"></span>
                            </div>

                            <div class="py-1">
                                <input v-model="formDataRegister.password_confirmation" placeholder="Password Confirm" type="password" class="shadow-md border-b border-blue-400 focus:outline-none block w-full py-2 px-4">
                                <span class="text-red-500" v-text="errorsregister.password_confirm"></span>
                            </div>

                            <button class="hover:bg-blue-400 shadow-md border border-blue-400 bg-blue-200 focus:outline-none block w-full py-2 px-4">
                                <p class="font-bold">Registrarse</p>
                            </button>

                    </form>
                </div>

                <div v-if="ventanaActiva === 0" id="RecuperarContraseña" class="w-full">

                    <form @submit.prevent="RecuperarContraseña" class="text-center p-5 self-center">
                        <div class="py-2 text-left">
                            <input v-model="formDataEmail.email" type="email" class="shadow-md border-b border-blue-400 focus:outline-none block w-full py-2 px-4" placeholder="Email" />
                            <span class="text-red-500" v-text="errorsemail.email"></span>
                        </div>
                        <div class="py-2">
                            <button type="submit" class="hover:bg-blue-400 shadow-md border border-blue-400 bg-blue-200 focus:outline-none block w-full py-2 px-4">
                                <p class="font-bold">Enviar correo</p>
                            </button>
                        </div>
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
                password: '',
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
        }
    },

    methods: {
        login(){
            axios.post('api/login', this.formDataLogin).then((response) => {
                this.$store.commit("login", response.data)
                this.$router.push('/agarcia/LiberLogin/public/');
            }).catch((errors) => {
                console.log(errors.response.data.errors);
                this.errorslogin = errors.response.data.errors
            })
        },
        registerUser(){
            axios.post('/api/register', this.formDataRegister).then((response)=>{
                this.formDataRegister.name = this.formDataRegister.email = this.formDataRegister.password = this.formDataRegister.password_confirmation = ''
                this.errorsregister = {}
                this.$router.push('/agarcia/LiberLogin/public/login')
            }).catch((errors)=>{
                this.errorsregister = errors.response.data.errors
            })
        },
        RecuperarContraseña(){
            console.log('hol<');
        },
        ventana(x){
            if(x == 1){
                this.ventanaActiva = 1
            }else if(x == 2){
                this.ventanaActiva = 2
            }else{
                this.ventanaActiva = 0
            }
        }
    }
}



</script>

<style scoped>

</style>
