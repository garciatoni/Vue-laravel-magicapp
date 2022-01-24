<template>
<div>

    <div v-if="loading" class="loader w-full mx-auto"></div>

    <div v-if="Carta.layout == 'normal' || Carta.layout == 'split'  " v-bind:style="{ 'background-image': 'url(' + Carta.image_uris.art_crop + ')' }" class="z-0">

        <CartaInformation id="informacion" :Informacion="Carta" />

    </div>

    <div v-if="Carta.card_faces != undefined || Carta.image_uris != undefined" v-bind:style="{ 'background-image': 'url(' + Carta.card_faces[0].image_uris.art_crop + ')' }" class="z-0">

        <CartaInformation id="informacion" :Informacion="Carta" />

    </div>


</div>
</template>

<script>

import Carta from '../components/Cartas/CartaNormal.vue'
import CartaTransform from '../components/Cartas/CartaTransform.vue'
import CartaInformation from '../components/Cartas/CartaInformation.vue'

export default {
    components: {
        CartaTransform,
        Carta,
        CartaInformation
    },
    data() {
        return {
            // vuex: this.$store.state,
            Carta: '',
            loading: false,
        };
    },
    methods: {
        // this.$route.params.id
    },
    created(){
        this.loading = true;
        const url = new URL('https://api.scryfall.com/cards/' + this.$route.params.id);
        url.search = new URLSearchParams().toString();
        fetch(url).then(data => data.json())
        .then(carta => {
            console.log(carta)
            this.Carta = carta;
            this.loading = false;
        });
    }
}
</script>

<style scoped>




    .z-0{
        background-repeat: no-repeat;
        background-size: cover;
        margin: 0;
        height: 100%;
        display: flex;
        flex-direction: column;
        min-height: calc(100vh - 110px);
        background-position: center;


    }

    #informacion{
        backdrop-filter: blur(10px);
        height: 100%;
        flex: 1;
    }




    /*

    #Content{
        min-height: calc(100vh - 110px);

        position: relative;
    }



    background-image: url("https://c1.scryfall.com/file/scryfall-cards/art_crop/front/c/8/c8817585-0d32-4d56-9142-0d29512e86a9.jpg?1598304029");
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    margin: 0;
    filter: blur(10px);
    -webkit-filter: blur(8px);
    height: 100%;

    */


 /* <div v-if="Carta.card_faces != undefined || Carta.image_uris != undefined">
                    <div v-if="Carta.layout == 'transform' || Carta.layout == 'modal_dfc'">
                        <CartaTransform :front="Carta.card_faces[0].image_uris.png" :back="Carta.card_faces[1].image_uris.png"/>
                    </div>
                    <Carta v-else :imagen="Carta.image_uris.png" class="shadow-xl w-10/12" />
                </div> */




</style>
