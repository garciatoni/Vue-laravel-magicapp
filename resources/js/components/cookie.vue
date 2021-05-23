<template>
    <div v-if="!ocultar" class=" mx-1 lg:mx-2 fixed bottom-0 lg:bottom-2 p-4 border-2 border-blue-300 bg-opacity-90 border-opacity-30 bg-gray-100 shadow-inner">
        <h2 class="text-lg lg:text-xl mb-4 block font-bold leading-tight text-black">Politica de cookies</h2>
        <div class="lg:flex lg:space-x-5">
            <p class="mb-5 text-lg font-medium text-black">
                Con su acuerdo, en Liber usamos cookies o tecnologías similares para almacenar, acceder y procesar datos personales como su visita en este sitio web.
            </p>
            <button
            class="w-full py-5  lg:w-48 px-2 lg:py-1 bg-blue-700 bg-opacity-70 focus:outline-none hover:text-white hover:bg-opacity-100 hover:bg-blue-900 hover:text-xl text-black uppercase text-xs font-bold shadow-md" @click="aceptar">
                Acepto
            </button>
        </div>
    </div>
</template>

<script>

export default {
    name: 'cookie',
    data(){
        return{
            ocultar: false,
        }
    },
    methods:{
        aceptar(){
            localStorage.setItem('politica', 'aceptada');
            this.ocultar = true;
        }
    },




    mounted(){
    }
}

</script>

<style scoped>

</style>
