<template>
<div>
<div class="flex flex-row p-5 pt-5 lg:w-8/12 lg:mx-auto">

     <div v-if="Informacion.card_faces != undefined || Informacion.image_uris != undefined">
        <div v-if="Informacion.layout == 'transform' || Informacion.layout == 'modal_dfc'">
            <CartaTransform :aviso="Voltear" :front="Informacion.card_faces[0].image_uris.png" :back="Informacion.card_faces[1].image_uris.png" class="w-10/12"/>
        </div>
        <Carta v-else :imagen="Informacion.image_uris.png" class="w-10/12" />
    </div>


    <div class="w-full flex flex-col px-4 bg-white rounded-lg opacity-80">
        <div class="flex align-center">

        <div id="name" class="">
            <div v-if="Informacion.card_faces != null">
                <h1 v-if="volteado == true">{{Informacion.card_faces[0].name}}</h1>
                <h1 v-else >{{Informacion.card_faces[1].name}}</h1>
            </div>
            <h1 v-else >{{Informacion.name}}</h1>
        </div>


        <div id="cmc" class="flex">
            <div v-if="Informacion.card_faces != null">

                <div class="flex" v-if="volteado == true">
                    <div v-for="simbolo in cmc" v-bind:key="simbolo.cmc" class="flex align-center">
                        <img class="w-5" :src="simbolo" alt="">
                    </div>
                </div>

                <div class="flex" v-else>
                    <div v-for="simbolo in cmc2" v-bind:key="simbolo.cmc2" class="flex align-center">
                        <img class="w-5" :src="simbolo" alt="">
                    </div>
                </div>

                <!-- <h1 v-else >{{Informacion.card_faces[1].mana_cost}}</h1> -->

            </div>

            <div v-else class="flex">
                <div v-for="simbolo in cmc" v-bind:key="simbolo.cmc" class="flex align-center">
                    <img class="w-5" :src="simbolo" alt="">
                </div>
            </div>

        </div>

        </div>




        <p>{{Informacion.type_line}}</p>
        <p>{{Informacion.oracle_text}}</p>

        <a v-if="Informacion.purchase_uris.cardmarket != null" target="_blanck" :href="Informacion.purchase_uris.cardmarket">Comprala en MKM</a>

        <div id="artist" class="">
            <div v-if="Informacion.card_faces != null">
                <h1 v-if="volteado == true">{{Informacion.card_faces[0].artist}}</h1>
                <h1 v-else >{{Informacion.card_faces[1].artist}}</h1>
            </div>
            <h1 v-else >{{Informacion.artist}}</h1>
        </div>
    </div>
</div>
</div>
</template>

<script>

import Carta from './CartaNormal.vue'
import CartaTransform from './CartaTransform.vue'

export default {
    components: {
        CartaTransform,
        Carta,
    },
    props: {
        Informacion:{

        }
    },

    data() {
        return {
            volteado: true,
            cmc: [],
            cmc2:[],
            cmc3: [],
            simbolos: [],

        }
    },
    methods: {
        Voltear(respuesta){
            this.volteado = respuesta;
            this.CalcularManaCaraOculta()
        },

        CalcularManaCaraOculta(){
            if(this.cmc2.length == 0 && this.Informacion.card_faces[1].mana_cost != ""){
                let simbolo = ""
                let cartas = this.Informacion.card_faces[1].mana_cost;
                for(let a = 0; a < cartas.length; a++){
                    if( cartas[a] == '{' ){
                        simbolo = cartas[a];
                    }else if (cartas[a] != '}' ){
                        simbolo = simbolo + cartas[a];
                    }else if(cartas[a] == '}'){
                        simbolo = simbolo + cartas[a];
                        this.simbolos.forEach(element => {
                            if(simbolo == element[0]){
                                this.cmc2.push(element[1])
                            }
                        });
                        simbolo = ""
                    }
                }
            }
            console.log(this.cmc2)
        }

    },
    mounted(){
        let simbolo = "";

        const url = new URL('https://api.scryfall.com/symbology');
            url.search = new URLSearchParams().toString();
            fetch(url).then(data => data.json())
            .then(simbolos => {
                simbolos.data.forEach(simbolo => {
                    this.simbolos.push([simbolo.symbol, simbolo.svg_uri])
                });

                if(this.Informacion.mana_cost != null){
                    var cartas = this.Informacion.mana_cost;
                }else{
                    var cartas = this.Informacion.card_faces[0].mana_cost;
                }
                
                for(let a = 0; a < cartas.length; a++){

                    if( cartas[a] == '{' ){
                        simbolo = cartas[a];
                    }else if (cartas[a] != '}' ){
                        simbolo = simbolo + cartas[a];
                    }else if(cartas[a] == '}'){
                        simbolo = simbolo + cartas[a];

                        this.simbolos.forEach(element => {

                            if(simbolo == element[0]){
                                this.cmc.push(element[1])
                            }
                        });
                        simbolo = ""
                    }
                }
            });
    }
}

</script>

<style>

</style>
