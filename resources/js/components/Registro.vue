<template>
<div class="w-full flex items-center">
    <div id="Registro" class=" mx-2 space-y-3 py-7 w-full">
        <h2 class="flex justify-center pt-2 font-bold text-xl uppercase text-white">Registro</h2>
        <form @submit.prevent="registerUser" class="text-center px-5 pb-5 space-y-4 self-center flex justify-center flex-col" aria-label="Registro">
            <div class="">
                <input v-model="formDataRegister.name" placeholder="Nombre de usuario" type="text" class="text-white placeholder-white focus:placeholder-gray-400 bg-gray-700 border-b focus:outline-none py-2 px-4 rounded-sm w-full " aria-label="nombre">
                <span v-if="errorsregister.name" class="text-red-500 font-bold">{{errorsregister.name[0]}}</span>
            </div>
            <div class="">
                <input v-model="formDataRegister.email" placeholder="Email" type="email" class="text-white placeholder-white focus:placeholder-gray-400 bg-gray-700 border-b focus:outline-none py-2 px-4 rounded-sm w-full " aria-label="email">
                <span v-if="errorsregister.email" class="text-red-500 font-bold">{{errorsregister.email[0]}}</span>
            </div>
            <div class="">
                <input  v-model="formDataRegister.password" placeholder="Contraseña" type="password" class="text-white placeholder-white focus:placeholder-gray-400 bg-gray-700 border-b focus:outline-none py-2 px-4 rounded-sm w-full " aria-label="contraseña">
                <span v-if="errorsregister.password" class="text-red-500 font-bold">{{errorsregister.password[0]}}</span>
            </div>
            <div class="">
                <input v-model="formDataRegister.password_confirmation" placeholder="Confirmar contraseña" type="password" class="text-white placeholder-white focus:placeholder-gray-400 bg-gray-700 border-b focus:outline-none py-2 px-4 rounded-sm w-full " aria-label="confirmar contraseña">
                <span v-if="errorsregister.password_confirm" class="text-red-500 font-bold">{{errorsregister.password_confirm[0]}}</span>
            </div>
            <div class="w-full">
                <button type="submit" class="hover:bg-black text-white focus:bg-black hover:border-gray-500 focus:border-gray-500 shadow-md border w-full focus:outline-none block py-2 px-4 rounded-sm">
                    <p class="font-bold uppercase ">Registrarse</p>
                </button>
            </div>
        </form>
    </div>
</div>
</template>

<script>
export default {
    name: 'Registro',
    data(){
        return{
            formDataRegister: {
                'name': '',
                'email': '',
                'password': '',
                'password_confirmation': ''
            },
            errorsregister:{},
        }
    },
    methods: {
        registerUser(){
            console.log(this.formDataRegister)
            axios.post('/api/register', this.formDataRegister).then((response)=>{
                console.log(response.data)
                this.formDataRegister.name = this.formDataRegister.email = this.formDataRegister.password = this.formDataRegister.password_confirmation = ''
                this.errorsregister = {}
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
    },

}
</script>

<style>

</style>
