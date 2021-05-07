<template>
    <div>
        <!-- Componente Header -->
        <headervue class="z-10 container mx-auto sticky top-0"></headervue>
        <router-view class="z-0 container mx-auto"></router-view>
    </div>

</template>

<script>

import headervue from './components/header.vue'

export default {
    components: {
        headervue,
        token: localStorage.getItem('token'),
    },
    name: 'app',
    mounted(){
            if(!this.$store.state.auth && localStorage.getItem('token') != null){
                this.$store.commit("login", this.$store.state.token)
            }else if(localStorage.getItem('token') == null){
                // console.log('ok')
            }
        }
    }



</script>

<style scoped>
</style>
