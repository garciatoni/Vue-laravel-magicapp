<template>
    <div class="bg-gray-300">

    <!-- Componente Header -->
        <headervue id="Header" class="z-10 sticky top-0"></headervue>
        <router-view id="Content" class="z-0 container mx-auto"></router-view>
        <footervue id="Footer" class="z-0"></footervue>

    </div>
</template>

<script>

import headervue from './components/StaticSections/Header.vue'
import footervue from './components/StaticSections/Footer.vue'

export default {
    components: {
        headervue,
        footervue,
    },
    name: 'app',
    created(){
            if(!this.$store.state.auth && localStorage.getItem('token') != null){
                this.$store.commit("login", this.$store.state.token)
            }else if(localStorage.getItem('token') == null){
                // console.log('ok')
            }
        }
    }



</script>

<style>

    #Content{
        min-height: calc(100vh - 13em - 4em);
    }
</style>
