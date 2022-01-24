<template>
<div class="w-full flex items-center">
    <div id="Login" class=" mx-2 space-y-3 py-7 w-full">
        <h2 class="flex justify-center pt-2 font-bold text-xl uppercase text-white">Iniciar sesión</h2>
        <form @submit.prevent="login" class="text-center px-5 pb-5 space-y-4 self-center flex justify-center flex-col" aria-label="Iniciar Sesión">
            <div class="">
                <input v-model="formDataLogin.email" type="email" class="text-white placeholder-white focus:placeholder-gray-400 bg-gray-700 border-b focus:outline-none py-2 px-4 rounded-sm w-full " placeholder="Email" aria-label="email"/>
                <span v-if="errorslogin.email" class="text-red-500 font-bold">{{errorslogin.email[0]}}</span>
            </div>
            <div class="">
                <input v-model="formDataLogin.contraseña" type="password" class="text-white placeholder-white focus:placeholder-gray-400 bg-gray-700  border-b focus:outline-none py-2 px-4 rounded-sm w-full" placeholder="Contraseña" aria-label="constraseña"/>
                <span v-if="errorslogin.contraseña" class="text-red-500 font-bold">{{errorslogin.contraseña[0]}}</span>
            </div>
            <div class="flex items-center flex-row-reverse md:flex-row w-full">
                <input class="form-checkbox h-5 w-5 focus:bg-gray-400" type="checkbox" id="remember" name="remember" v-model="checked">
                <label for="remember" class="px-2 text-lg text-white">Recuérdame</label>
            </div>
            <div class="w-full">
                <button type="submit" class="hover:bg-black text-white focus:bg-black hover:border-gray-500 focus:border-gray-500 shadow-md border w-full focus:outline-none block py-2 px-4 rounded-sm">
                    <p class="font-bold uppercase ">Iniciar sesión</p>
                </button>
            </div>
        </form>
    </div>
</div>
</template>

<script>
export default {
    data(){
        return{
            formDataLogin: {
                email: '',
                contraseña: '',
                device_name: 'browser'
            },
            errorslogin: {},
            checked: false,
        }
    },
        methods: {
        login(){
            console.log(this.checked)
            axios.post('api/login', this.formDataLogin).then((response) => {
                this.$store.commit("login", response.data);
                this.$router.push('/');
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
    },
    mounted() {
        window.scrollTo(0,0);
    }
}
</script>

<style scoped>

</style>
