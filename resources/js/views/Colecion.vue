<template>
<div class="pt-5 container mx-auto">
    <div class="my-2 border-2 p-2 border-black bg-gray-600">
        <ul class="flex flex-row space-x-2">
            <li><img class="w-20 cursor-pointer shadow-inner" src="https://c2.scryfall.com/file/scryfall-symbols/card-symbols/W.svg" alt="Plain Symbol"></li>
            <li><img class="w-20 cursor-pointer shadow-inner" src="https://c2.scryfall.com/file/scryfall-symbols/card-symbols/U.svg" alt="Island Symbol"></li>
            <li><img class="w-20 cursor-pointer shadow-inner" src="https://c2.scryfall.com/file/scryfall-symbols/card-symbols/B.svg" alt="Swamp Symbol"></li>
            <li><img class="w-20 cursor-pointer shadow-inner" src="https://c2.scryfall.com/file/scryfall-symbols/card-symbols/R.svg" alt="Mountain Symbol"></li>
            <li><img class="w-20 cursor-pointer shadow-inner" src="https://c2.scryfall.com/file/scryfall-symbols/card-symbols/G.svg" alt="Forest Symbol"></li>
            <li><img class="w-20 cursor-pointer shadow-inner" src="https://c2.scryfall.com/file/scryfall-symbols/card-symbols/C.svg" alt="Colorless Symbol"></li>
            <li><img class="w-20 cursor-pointer shadow-inner" src="https://gamepedia.cursecdn.com/mtgsalvation_gamepedia/9/97/Dfc-land.svg?version=e15d0ed813ef3285976a048dc5d5068b" alt="Colorless Symbol"></li>
        </ul>
    </div>
    <div id="Coleciones" class="">
        <ul class="grid grid-cols-5 gap-x-2 gap-y-2">
            <li @click="CartaInformation(c.id)" v-for="c in Cartas" v-bind:key="c.id" class="shadow-md bg-gray-100 text-center  flex justify-center min-h-full content-between items-center flex-col p-2 font-bold">
                <p>{{c.name}}</p>
                <img class="" :src="c.imageURL" alt="">
            </li>
        </ul>
    </div>
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
        axios.get('/api/GetColecionCartas/'+ this.$route.params.id).then((response) => {
            this.Cartas = response.data;
        })
    }


}
</script>

<style>

</style>
