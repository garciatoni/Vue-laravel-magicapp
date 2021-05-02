<template>
    <div>
        <!-- Componente Header con los componentes:  -->
        <!-- <headervue></headervue> -->

        <router-view></router-view>

    </div>

</template>

<script>

// import headervue from './components/header.vue'

export default {
    components: {
        // headervue
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
