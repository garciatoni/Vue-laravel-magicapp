<template>
<div>
    <div class="lg:w-7/12 lg:mx-auto py-10">
        <div v-if="loading == true" class="loader w-full mx-auto"></div>

        <div v-else>
            <div v-if="Cartas == undefined">
                <h1>No se han encontrado cartas</h1>
            </div>
            <ul v-else class="grid grid-cols-4 gap-1">
                <li v-for="c in Cartas" v-bind:key="c.id" class=" flex justify-center items-end z-0 hover:z-10">
                    <CartaTransform :clickable="true" v-if="c.layout == 'transform' || c.layout == 'modal_dfc'" :front="c.card_faces[0].image_uris.normal" :back="c.card_faces[1].image_uris.normal" :id="c.id"/>
                    <Carta v-else :clickable="true" :imagen="c.image_uris.normal" :id="c.id" />
                </li>
            </ul>
        </div>
    </div>
</div>
</template>

<script>
import Carta from './Cartas/CartaNormal.vue'
import CartaTransform from './Cartas/CartaTransform.vue'

export default {
name: 'search',
props: ['campo'],
components: {
    Carta,
    CartaTransform
},
    data() {
        return {
            vuex: this.$store.state,
            Cartas: {},
            loading: false,

        };
    },
    methods: {
        CartaInformation(id) {
            this.$router.push('/Carta/' + id);
        },

        getResults() {
            this.loading = true;
            const url = new URL('https://api.scryfall.com/cards/search');
            const params = {
                q: this.$route.params.campo,
            }
            url.search = new URLSearchParams(params).toString();
            fetch(url).then(data => data.json())
            .then(cartas => {
                this.Cartas = cartas.data;
                this.loading = false;
            });
        },
    },
    watch:{
        $route (to){
            this.show = false;
            this.getResults();
        }
    },
    mounted(){
        this.getResults();
        window.scrollTo(0,0);
    },

};
</script>

<style scoped>


</style>
