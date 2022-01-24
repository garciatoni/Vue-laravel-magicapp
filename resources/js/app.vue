<template>
    <div class="contenedor">
    <headervue id="Header" class="z-10 sticky top-0"></headervue>


    <router-view id="fondo" class="z-0"></router-view>
    <cookie v-if="!politica" class="z-10"></cookie>
    <go-top :bottom="20" :right="20"  bg-color="#1A024E" class="focus:opacity-50 focus:outline-none"></go-top>
    <footervue id="Footer" class="z-0"></footervue>

    </div>
</template>

<script>

import headervue from './components/StaticSections/Header.vue'
import footervue from './components/StaticSections/Footer.vue'
import cookie from './components/cookie.vue'
import GoTop from '@inotom/vue-go-top';

export default {
    name: 'app',
    components: {
        headervue,
        footervue,
        cookie,
        GoTop
    },
    data(){
        return{
            politica: true,
        }
    },

    created(){
        if(!this.$store.state.auth && sessionStorage.getItem('token') != null){
            this.$store.commit("login", this.$store.state.token)

        }else if(localStorage.getItem('token') != null){
            this.$store.commit("login", localStorage.getItem('token'))
        }

        if(localStorage.getItem('politica') == null){
            this.politica = false;

        }

    },
    methods: {

    }
}

</script>

<style>




    #fondo{
        min-height: calc(100vh - 110px);

        /* position: relative; */
    }
    /* #Footer {


        bottom: 0;
        width: 100%;
        height: 40px;
        color: white;
    }


    .contenedor{
        background: rgba(23, 22, 44, 0.746);
    } */

::-webkit-scrollbar{
    width: 10px;
    background: rgba(23, 22, 44, 0.746);
}
::-webkit-scrollbar-track{
    background: rgba(23, 22, 44, 0.746);
}
::-webkit-scrollbar-thumb{
    background-color: rgb(60, 0, 255);
    border-radius: 1rem;
}
::-webkit-scrollbar-thumb:hover{
    background-color: rgb(0, 255, 21);
}


.loader {
  border: 16px solid #f3f3f3;
  border-top: 16px solid #0c0029;
  border-radius: 50%;
  width: 100px;
  height: 100px;
  animation: spin 2s linear infinite;
}

@keyframes spin {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
</style>
