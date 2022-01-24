<template>
<div class="pt-5">
    <!-- <button @click="set(num)" class="bg-black text-white p-10">Siguiente set {{num}}</button> -->


    <!-- <div id="Coleciones" class="container mx-auto">
        <ul class="grid grid-cols-7 gap-x-2 gap-y-2">
            <li v-for="c in Coleciones" v-bind:key="c.id" @click="EdicionInformation(c.id)" class="cursor-pointer shadow-md bg-gray-100 text-center  flex justify-center min-h-full content-between items-center flex-col p-2 font-bold">
                <h3 class="text-lg">{{c.name}}</h3>
                <p>Cartas {{c.NumCartas}} </p>
                <div class="text-white w-6/12">
                   <img class="" :src="c.logo" alt="">
                </div>
                <p>{{c.releaseDate}}</p>
            </li>
        </ul>
    </div> -->

    <!-- <div id="Artistas" class="container mx-auto">
        <ul class="grid grid-cols-7 gap-x-2 gap-y-2">
            <li v-for="a in Artistas" v-bind:key="a.id" @click="ArtistaInformation(a.id)" class="cursor-pointer shadow-md bg-gray-100 text-center  flex justify-center min-h-full content-between items-center flex-col p-2 font-bold">
                <h3 class="text-lg">{{a.name}}</h3>
            </li>
        </ul>
    </div> -->
    <h1>hola</h1>


</div>
</template>
<script>

export default {
  name: "home",
  components: {

  },
  data() {
    return {
       num: 0,
       Coleciones:[],
       Artistas: []
    };
  },
  computed: {

  },
  created() {
    window.scrollTo(0,0);

    axios.get('/api/GetColeciones').then((response) =>{

        this.Coleciones = response.data;
    })

    axios.get('/api/GetArtistas').then((response) =>{
        console.log(response.data)
        this.Artistas = response.data;
    })














    // const url = new URL('https://api.magicthegathering.io/v1/sets');
    // const params = {
    //     page: 2,
    // }
    // url.search = new URLSearchParams(params).toString();
    // fetch(url).then(data => data.json())
    // .then(coleciones => {
    //     coleciones.sets.forEach(colecion => {
    //         const Colection = {
    //             code: colecion.code,
    //             name: colecion.name,
    //             type: colecion.type	,
    //             block: colecion.block,
    //             releaseDate: colecion.releaseDate,
    //             nameSearch: (colecion.name).toLowerCase(),
    //         }
    //         axios.post('/api/SetColecion', Colection).then((response) =>{
    //             console.log(response.data)
    //         })

    //     });
    // });

  },

  methods: {


    EdicionInformation(id) {
        this.$router.push('/Colecion/' + id);
    },
    ArtistaInformation(id) {
        this.$router.push('/Artista/' + id);
    },

    //   set(num){
    //       axios.get('/api/GetColecion/' + num).then((response) =>{
    //           response.data[0].code
    //     const url = new URL('https://api.scryfall.com/sets/' + response.data[0].code);
    //     url.search = new URLSearchParams().toString();
    //     fetch(url).then(data => data.json())
    //         .then(coleciones => {
    //             if(coleciones.icon_svg_uri != undefined){
    //                 const Colection = {
    //                     code: coleciones.code,
    //                     logo: coleciones.icon_svg_uri,
    //                     NumCartas: coleciones.card_count,
    //                 }
    //                 axios.post('/api/SetColecion', Colection).then((response) =>{
    //                     console.log(response.data)
    //                     this.num++;
    //                     console.log('Inyectando el set ' + this.num)
    //                     this.set(this.num)

    //                 })
    //             }else{
    //                 const Colection = {
    //                     code: coleciones.code,
    //                     NumCartas: coleciones.card_count,
    //                 }
    //                 axios.post('/api/SetColecion', Colection).then((response) =>{
    //                     console.log(response.data)
    //                     this.num++;
    //                     console.log('Inyectando el set ' + this.num)
    //                     this.set(this.num)

    //                 })
    //             }
    //         });
    //     });
    // }

    //   AñadirCartas(num){
        //       console.log('Inyectando la pagina ' + this.num)
    //       var cuenta = 0;
    //     const url = new URL('https://api.magicthegathering.io/v1/cards');
    //     const params = {
    //         page: num,
    //     }
    //     url.search = new URLSearchParams(params).toString();
    //     fetch(url).then(data => data.json())
    //     .then(cartas => {
    //         cartas.cards.forEach(carta => {
    //             var legalidad = [];
    //             var legal = () =>{
    //                 if(carta.legalities !=  undefined){
    //                     carta.legalities.forEach(element => {
    //                         legalidad.push(element.format)
    //                     });
    //                 }
    //             }
    //             legal();
    //             const Card = {
    //                 name: carta.name,
    //                 manaCost: carta.manaCost,
    //                 cmc: carta.cmc,
    //                 color: carta.colors,
    //                 colorIdentity: carta.colorIdentity,
    //                 supertypes: carta.supertypes,
    //                 types: carta.types,
    //                 subtypes: carta.subtypes,
    //                 rarity: carta.rarity,
    //                 set_id: carta.set,
    //                 text: carta.text,
    //                 originalText: carta.originalText,
    //                 flavor: carta.flavor,
    //                 artist_id: carta.artist,
    //                 number: carta.number,
    //                 power: carta.power,
    //                 toughness: carta.toughness,
    //                 layout: carta.layout,
    //                 multiverse_id: carta.multiverse_id,
    //                 imageURL: carta.imageUrl,
    //                 id_carta: carta.id,
    //                 legalities: legalidad,
    //                 nameSearch: (carta.name).toLowerCase(),
    //             }
    //             axios.post('/api/SetCarta', Card).then((response) =>{
    //                 console.log(cuenta + ' primeros')
    //                 cuenta ++;



    //                 if(response.data[0].artist_id != null){


    //                 const Artist = {
    //                     name: response.data[0].artist_id,
    //                     nameSearch: (response.data[0].artist_id).toLowerCase(),
    //                 }


    //                 axios.post('/api/SetArtista', Artist).then((respons) =>{
    //                     console.log(cuenta + ' segundos')
    //                     cuenta ++;
    //                     const ArtistCard = {
    //                         ArtistaID:  respons.data[0].id,
    //                         CartaID: response.data[0].id,
    //                     }
    //                     axios.post('/api/SetArtistaCarta', ArtistCard).then(() =>{
    //                         console.log(cuenta + ' Cuartos')
    //                         cuenta++;
    //                         if(cuenta>=400 && this.num<583){
    //                             this.num++;
    //                             console.log('Inyectando la pagina ' + this.num)
    //                             this.AñadirCartas(this.num)

    //                         }
    //                     })
    //                 })
    //                 }else{
    //                     cuenta++;
    //                     cuenta++;
    //                 }
    //                 const ColecionCarta = {
    //                     CartaID: response.data[0].id,
    //                     ColecionID: response.data[0].set_id,
    //                 }
    //                 axios.post('/api/SetColecionCarta', ColecionCarta).then((resa) =>{
    //                     console.log(cuenta + ' terceros')
    //                     cuenta++;
    //                 })
    //             })
    //         });
    //     })




    //     //   document.title = 'aun no'
    //     // const url = new URL('https://api.magicthegathering.io/v1/cards');
    //     // const params = {
    //     //     page: num,
    //     // }
    //     // url.search = new URLSearchParams(params).toString();
    //     // fetch(url).then(data => data.json())
    //     // .then(cartas => {
    //     //     cartas.cards.forEach(carta => {
    //     //         var legalidad = [];
    //     //         var legal = () =>{
    //     //             carta.legalities.forEach(element => {
    //     //                 legalidad.push(element.format)
    //     //             });
    //     //         }
    //     //         legal();
    //     //         const Card = {
    //     //             name: carta.name,
    //     //             manaCost: carta.manaCost,
    //     //             cmc: carta.cmc,
    //     //             color: carta.colors,
    //     //             colorIdentity: carta.colorIdentity,
    //     //             supertypes: carta.supertypes,
    //     //             types: carta.types,
    //     //             subtypes: carta.subtypes,
    //     //             rarity: carta.rarity,
    //     //             set_id: carta.set,
    //     //             text: carta.text,
    //     //             originalText: carta.originalText,
    //     //             flavor: carta.flavor,
    //     //             artist_id: carta.artist,
    //     //             number: carta.number,
    //     //             power: carta.power,
    //     //             toughness: carta.toughness,
    //     //             layout: carta.layout,
    //     //             multiverse_id: carta.multiverse_id,
    //     //             imageURL: carta.imageUrl,
    //     //             id_carta: carta.id,
    //     //             legalities: legalidad,
    //     //             nameSearch: (carta.name).toLowerCase(),
    //     //         }

    //     //         // (response.data.split(" "))
    //     //         axios.post('/api/SetCarta', Card).then((response) =>{
    //     //             console.log('k')
    //     //             const Artist = {
    //     //                 name: response.data[0].artist_id,
    //     //                 nameSearch: (response.data[0].artist_id).toLowerCase(),
    //     //             }
    //     //             axios.post('/api/SetArtista', Artist).then((respons) =>{
    //     //                 console.log(respons.data)
    //     //                 const ArtistCard = {
    //     //                     ArtistaID:  respons.data[0].id,
    //     //                     CartaID: response.data[0].id,
    //     //                 }
    //     //                 axios.post('/api/SetArtistaCarta', ArtistCard).then(() =>{
    //     //                     console.log('3')
    //     //                     document.title = num
    //     //                 })
    //     //             })
    //     //             const ColecionCarta = {
    //     //                 CartaID: response.data[0].id,
    //     //                 ColecionID: response.data[0].set_id,
    //     //             }
    //     //             axios.post('/api/SetColecionCarta', ColecionCarta).then((resa) =>{
    //     //                 console.log(resa)
    //     //             })

    //     //         })
    //     //     });
    //     // })
    //     // this.num ++;
    //     // console.log(this.num)
    //   }

  },
};
</script>
<style scoped>

    #Coleciones{
        direction: rtl;
    }

</style>
