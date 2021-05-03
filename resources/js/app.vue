<template>
    <div>
        <!-- Componente Header con los componentes:  -->
        <headervue class="container mx-auto sticky top-0"></headervue>
        <router-view class="container mx-auto"></router-view>


    </div>

</template>

<script>

import headervue from './components/header.vue'

export default {
    components: {
        headervue
    },
    name: 'app',
    data(){
        return{

        }
    },

    mounted(){

    }
}



</script>

<style scoped>
</style>
