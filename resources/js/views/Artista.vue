<template>
    <div id="Artistas" class="container mx-auto">
        <ul class="grid grid-cols-5 gap-x-2 gap-y-2">
            <li @click="CartaInformation(c.id)" v-for="c in Cartas" v-bind:key="c.id" class="shadow-md bg-gray-100 text-center  flex justify-center min-h-full content-between items-center flex-col p-2 font-bold">
                <h3 class="text-lg">{{c.name}}</h3>
                <div class="text-white w-10/12">
                   <img class="" :src="c.imageURL" alt="">
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    props: ['id'],
    components: {

    },
    data() {
        return {
            vuex: this.$store.state,
            Cartas: [],
        };
    },
    methods: {
        CartaInformation(id) {
            this.$router.push('/Carta/' + id);
        },
    },
    created(){
        axios.get('/api/GetArtistaCartas/'+ this.$route.params.id).then((response) => {
            this.Cartas = response.data;
        })
    }
}
</script>

<style>

</style>
