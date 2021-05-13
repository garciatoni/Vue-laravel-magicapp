<template>
    <div class="">

    <!-- Componente Header -->
        <headervue id="Header" class="z-10 sticky top-0"></headervue>
        <div id="contentbg">
            <router-view id="Content" class="z-0"></router-view>
        </div>

        <footervue id="Footer" class="z-0"></footervue>

    </div>
</template>

<script>

import headervue from './components/StaticSections/Header.vue'
import footervue from './components/StaticSections/Footer.vue'

export default {
    components: {
        headervue,
        footervue,
    },
    name: 'app',
    created(){
        if(!this.$store.state.auth && localStorage.getItem('token') != null){
            this.$store.commit("login", this.$store.state.token)
        }else if(localStorage.getItem('token') == null){
            // console.log('ok')
        }
        var test = {
            "bestsellers": [
                {
                "title": "El Humor De Mi Vida",
                "asin": "8491396209",
                "link": "https://www.amazon.es/El-Humor-Vida-Paz-Padilla/dp/8491396209/ref=zg_mw_books_1?_encoding=UTF8&psc=1&refRID=EZ70KCXWC30319DW2N4N",
                "image": "https://images-na.ssl-images-amazon.com/images/I/61kesI-1wdL._AC_UL200_SR200,200_.jpg",
                },
                {
                "title": "El mundo de la Antigüedad tardía: De Marco Aurelio a Mahoma (Clásicos Radicales)",
                "asin": "843062340X",
                "link": "https://www.amazon.es/El-mundo-Antig%C3%BCedad-tard%C3%ADa-Radicales/dp/843062340X/ref=zg_mw_books_2?_encoding=UTF8&psc=1&refRID=EZ70KCXWC30319DW2N4N",
                "image": "https://images-na.ssl-images-amazon.com/images/I/81EIENUzjpL._AC_UL200_SR200,200_.jpg",
                },
                {
                "title": "Cuentos molones para educar en positivo (Emociones, valores y hábitos)",
                "asin": "8448857747",
                "link": "https://www.amazon.es/Cuentos-molones-positivo-Emociones-valores/dp/8448857747/ref=zg_mw_books_3?_encoding=UTF8&psc=1&refRID=EZ70KCXWC30319DW2N4N",
                "image": "https://images-na.ssl-images-amazon.com/images/I/61sAg3WDE7S._AC_UL200_SR200,200_.jpg",
                },
                {
                "title": "El arte de engañar al karma (SUMA)",
                "asin": "8491291938",
                "link": "https://www.amazon.es/El-arte-enga%C3%B1ar-karma-SUMA/dp/8491291938/ref=zg_mw_books_4?_encoding=UTF8&psc=1&refRID=EZ70KCXWC30319DW2N4N",
                "image": "https://images-na.ssl-images-amazon.com/images/I/91tsnPGROUL._AC_UL200_SR200,200_.jpg",
                }
            ],
        }
        console.log(test.bestsellers)

    }
}





</script>

<style>
    #Content{
        min-height: calc(100vh - 13em - 4em);
    }

    #contentbg{
        /* background: rgb(0,100,237);
        background: linear-gradient(340deg, rgba(0,100,237,1) 15%, rgba(118,172,245,1) 33%, rgba(127,177,246,1) 33%, rgba(192,217,250,1) 50%, rgba(222,235,252,1) 55%, rgba(233,242,253,1) 55%, rgba(244,248,254,1) 78%, rgba(255,255,255,1) 100%); */
        background: rgb(0,106,255);
background: linear-gradient(340deg, rgba(0,106,255,1) 0%, rgba(94,161,255,1) 16%, rgba(116,174,255,1) 17%, rgba(150,195,255,1) 33%, rgba(150,195,255,1) 33%, rgba(164,203,255,1) 34%, rgba(213,231,255,1) 47%, rgba(219,234,255,1) 47%, rgba(235,243,255,1) 55%, rgba(236,243,255,1) 55%, rgba(244,248,254,1) 78%, rgba(255,255,255,1) 100%);
    }
    #Footer{
        background: rgb(0,100,237);
    }
</style>
