<template>
  <div class="pt-5">
    <form v-if="!vuex.auth" @submit.prevent="resetPassword" aria-label="Reestablecer contraseña">
      <div class="mx-auto max-w-lg">

        <h2 class="flex justify-center pb-6 font-bold text-xl">Reestablece tu contraseña</h2>

        <div class="space-y-5 bg-blue-600 bg-opacity-30 shadow-md p-8">
          <div class="">
            <input placeholder="Email" type="email" id="email" v-model="email" class=" focus:placeholder-gray-300 shadow-md border-b border-blue-400 focus:outline-none block w-full py-2 px-4" aria-label="email"/>
            <span v-if="errors.email" class="text-red-500 font-bold">*{{errors.email[0]}}</span>
          </div>

          <div class="">
            <input placeholder="Contraseña" type="password" id="password" v-model="password" class="focus:placeholder-gray-300 shadow-md border-b border-blue-400 focus:outline-none block w-full py-2 px-4" aria-label="contraseña"/>
            <span v-if="errors.password" class="text-red-500 font-bold">*{{errors.password[0]}}</span> 
          </div>

          <div class="">
            <input placeholder="Confirmar contraseña" type="password" id="password-confirm" v-model="passwordConfirm" class="focus:placeholder-gray-300 shadow-md border-b border-blue-400 focus:outline-none block w-full py-2 px-4" aria-label="confirmar contraseña"/>
          </div>

          <button class="hover:bg-blue-400 focus:bg-blue-400 shadow-md border border-blue-400 bg-blue-200 focus:outline-none block w-full py-2 px-4 font-bold">Enviar</button>
        </div>

      </div>
    </form>

  </div>
</template>
          <!-- metaInfo () {
            return { title: this.$t('reset_password') }
          }, -->
<script>
import AuthService from "../service/AuthService.js";

export default {
  name: "ResetPassword",
  data() {
    return {
      email: null,
      password: null,
      passwordConfirm: null,
      
      vuex: this.$store.state,
      errors:{},

    };
  },
  methods: {
    resetPassword() {
      const payload = {
        email: this.email,
        password: this.password,
        password_confirmation: this.passwordConfirm,
        token: this.$route.query.token,
      };
      AuthService.resetPassword(payload).then((response) => (
        
        this.$swal( {
          title: '!Contraseña reestablecida!',
          showConfirmButton: true,
          icon: 'success',
        }),
        this.$router.push("/agarcia/LiberLogin/public/auth")

      )).catch((error) => (
        this.errors = error.response.data.errors,
        this.$swal( {
          title: 'Ooops...',
          text: 'Algo salió mal.',
          showConfirmButton: false,
          timer: 2000,
          toast: false,
          icon: 'error',
        })
      ));
    },
  },

  mounted() {
    window.scrollTo(0,0);
  }
};
</script>