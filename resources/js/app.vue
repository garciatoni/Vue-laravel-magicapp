<template>
    <div class="contenedor">

    <!-- Componente Header -->
        <headervue id="Header" class="z-10 sticky top-0"></headervue>
        <div id="contentbg">
            <router-view id="Content" class="z-0"></router-view>
            <cookie v-if="!politica" class="z-10"></cookie>
        </div>

        <footervue id="Footer" class="z-0"></footervue>

    </div>
</template>

<script>

import headervue from './components/StaticSections/Header.vue'
import footervue from './components/StaticSections/Footer.vue'
import cookie from './components/cookie.vue'

export default {
    name: 'app',
    components: {
        headervue,
        footervue,
        cookie
    },
    data(){
        return{
            politica: true,
        }
    },

    created(){
        if(!this.$store.state.auth && localStorage.getItem('token') != null){
            this.$store.commit("login", this.$store.state.token)
        }else if(localStorage.getItem('token') == null){
        }

        if(localStorage.getItem('politica') == null){
            this.politica = false;
        }

    },
    updated() {

    },
}





</script>

<style>
    #Content{
        min-height: calc(100vh - 4em - 4em);
    }

    #contentbg{
        background: rgb(0,106,255);
        background: linear-gradient(340deg, rgba(0,106,255,1) 0%, rgba(94,161,255,1) 16%, rgba(116,174,255,1) 17%, rgba(150,195,255,1) 33%, rgba(150,195,255,1) 33%, rgba(164,203,255,1) 34%, rgba(213,231,255,1) 47%, rgba(219,234,255,1) 47%, rgba(235,243,255,1) 55%, rgba(236,243,255,1) 55%, rgba(244,248,254,1) 78%, rgba(255,255,255,1) 100%);
    }
    ::-webkit-scrollbar {
        width: 8px;
        background: rgba(255, 255, 255, 0);

    }
    ::-webkit-scrollbar-track{
        background: rgba(255, 255, 255, 0);
    }
    ::-webkit-scrollbar-thumb {
        border-radius: 10px;
        background: rgba(0, 99, 237, 0.301);
    }
</style>
