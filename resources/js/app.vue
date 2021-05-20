<template>
    <div class="contenedor">

    <!-- Componente Header -->
        <headervue id="Header" class="z-10 sticky top-0"></headervue>
        <div id="contentbg">
            <router-view id="Content" class="z-0"></router-view>
            <cookie v-if="!politica" class="z-10"></cookie>
        </div>

        <footervue id="Footer" class="z-0"></footervue>

    </div>
</template>

<script>

import headervue from './components/StaticSections/Header.vue'
import footervue from './components/StaticSections/Footer.vue'
import cookie from './components/cookie.vue'

export default {
    name: 'app',
    components: {
        headervue,
        footervue,
        cookie
    },
    data(){
        return{
            politica: true,
        }
    },

    created(){
        if(!this.$store.state.auth && sessionStorage.getItem('token') != null){
            this.$store.commit("login", this.$store.state.token)

        }else if(localStorage.getItem('token') != null){
            this.$store.commit("login", localStorage.getItem('token'))
        }

        if(localStorage.getItem('politica') == null){
            this.politica = false;
        }

        const json = {
                "request_info": {
                    "success": true,
                    "credits_used": 1,
                    "credits_used_this_request": 1,
                    "credits_remaining": 499,
                    "credits_reset_at": "2021-06-18T03:10:14.000Z"
                },

                "request_metadata": {
                    "created_at": "2021-05-19T23:51:01.319Z",
                    "processed_at": "2021-05-19T23:51:04.062Z",
                    "total_time_taken": 2.74,
                    "amazon_url": "https://www.amazon.es/gp/bestsellers/books?language=es_ES"
                },

                "request_parameters": {
                    "type": "bestsellers",
                    "url": "https://www.amazon.es/gp/bestsellers/books",
                    "associate_id": "liber0e-21",
                    "language": "es_ES",
                    "include_html": "true",
                    "output": "json"
                },

                "bestsellers": [
                    {
                    "rank": 1,
                    "position": 1,
                    "title": "El Humor De Mi Vida",
                    "asin": "8491396209",
                    "link": "https://www.amazon.es/El-Humor-Vida-Paz-Padilla/dp/8491396209/ref=zg_bs_books_1?_encoding=UTF8&psc=1&refRID=KCRY7BS6TREZRWHMJ63F&tag=liber0e-21",
                    "variant": "Tapa dura",
                    "image": "https://images-na.ssl-images-amazon.com/images/I/61kesI-1wdL._AC_UL200_SR200,200_.jpg",
                    "rating": 4.4,
                    "ratings_total": 572,
                    "price_lower": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 18.9,
                        "raw": "€18,90"
                    },
                    "price_upper": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 18.9,
                        "raw": "18,90€"
                    },
                    "price": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 18.9,
                        "raw": "€18,90 - 18,90€"
                    },
                    "current_category": {
                        "name": "Libros",
                        "link": "https://www.amazon.es/gp/bestsellers/books",
                        "id": "books"
                    },
                    "parent_category": {
                        "name": "Cualquier departamento",
                        "link": "https://www.amazon.es/gp/bestsellers/ref=zg_bs_unv_b_0_b_1",
                        "id": "bestsellers"
                    }
                    },
                    {
                    "rank": 2,
                    "position": 2,
                    "title": "Boulevard: 1",
                    "asin": "9807909066",
                    "link": "https://www.amazon.es/Boulevard-1-Flor-M-Salvador/dp/9807909066/ref=zg_bs_books_2?_encoding=UTF8&psc=1&refRID=KCRY7BS6TREZRWHMJ63F&tag=liber0e-21",
                    "variant": "Tapa blanda",
                    "image": "https://images-na.ssl-images-amazon.com/images/I/61rArrCpGvL._AC_UL200_SR200,200_.jpg",
                    "rating": 4.7,
                    "ratings_total": 1569,
                    "price_lower": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 14.53,
                        "raw": "€14,53"
                    },
                    "price_upper": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 14.53,
                        "raw": "14,53€"
                    },
                    "price": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 14.53,
                        "raw": "€14,53 - 14,53€"
                    },
                    "current_category": {
                        "name": "Libros",
                        "link": "https://www.amazon.es/gp/bestsellers/books",
                        "id": "books"
                    },
                    "parent_category": {
                        "name": "Cualquier departamento",
                        "link": "https://www.amazon.es/gp/bestsellers/ref=zg_bs_unv_b_0_b_1",
                        "id": "bestsellers"
                    }
                    },
                    {
                    "rank": 3,
                    "position": 3,
                    "title": "SIRA (Autores Españoles e Iberoamericanos)",
                    "asin": "8408241915",
                    "link": "https://www.amazon.es/Autores-Espa%C3%B1oles-Iberoamericanos-Mar%C3%ADa-Due%C3%B1as/dp/8408241915/ref=zg_bs_books_3?_encoding=UTF8&psc=1&refRID=KCRY7BS6TREZRWHMJ63F&tag=liber0e-21",
                    "variant": "Tapa dura",
                    "image": "https://images-na.ssl-images-amazon.com/images/I/91iDWaWNk0L._AC_UL200_SR200,200_.jpg",
                    "rating": 4.3,
                    "ratings_total": 1063,
                    "price_lower": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 21.75,
                        "raw": "€21,75"
                    },
                    "price_upper": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 21.75,
                        "raw": "21,75€"
                    },
                    "price": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 21.75,
                        "raw": "€21,75 - 21,75€"
                    },
                    "current_category": {
                        "name": "Libros",
                        "link": "https://www.amazon.es/gp/bestsellers/books",
                        "id": "books"
                    },
                    "parent_category": {
                        "name": "Cualquier departamento",
                        "link": "https://www.amazon.es/gp/bestsellers/ref=zg_bs_unv_b_0_b_1",
                        "id": "bestsellers"
                    }
                    },
                    {
                    "rank": 4,
                    "position": 4,
                    "title": "Ley de Educación versión Martina: Ley Orgánica 2/2006, de 3 de mayo. Texto legal",
                    "asin": "8430982043",
                    "link": "https://www.amazon.es/Ley-Educaci%C3%B3n-versi%C3%B3n-Martina-Org%C3%A1nica/dp/8430982043/ref=zg_bs_books_4?_encoding=UTF8&psc=1&refRID=KCRY7BS6TREZRWHMJ63F&tag=liber0e-21",
                    "variant": "Tapa blanda",
                    "image": "https://images-na.ssl-images-amazon.com/images/I/71Yp0O5IXzL._AC_UL200_SR200,200_.jpg",
                    "price_lower": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 17.57,
                        "raw": "€17,57"
                    },
                    "price_upper": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 17.57,
                        "raw": "17,57€"
                    },
                    "price": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 17.57,
                        "raw": "€17,57 - 17,57€"
                    },
                    "current_category": {
                        "name": "Libros",
                        "link": "https://www.amazon.es/gp/bestsellers/books",
                        "id": "books"
                    },
                    "parent_category": {
                        "name": "Cualquier departamento",
                        "link": "https://www.amazon.es/gp/bestsellers/ref=zg_bs_unv_b_0_b_1",
                        "id": "bestsellers"
                    }
                    },
                    {
                    "rank": 5,
                    "position": 5,
                    "title": "Las recetas verdes de MasterChef (F. COLECCION)",
                    "asin": "8467062177",
                    "link": "https://www.amazon.es/Las-recetas-verdes-MasterChef-COLECCION/dp/8467062177/ref=zg_bs_books_5?_encoding=UTF8&psc=1&refRID=KCRY7BS6TREZRWHMJ63F&tag=liber0e-21",
                    "variant": "Tapa dura",
                    "image": "https://images-na.ssl-images-amazon.com/images/I/91IMX4qBJzL._AC_UL200_SR200,200_.jpg",
                    "rating": 4.2,
                    "ratings_total": 26,
                    "price_lower": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 20.8,
                        "raw": "€20,80"
                    },
                    "price_upper": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 20.8,
                        "raw": "20,80€"
                    },
                    "price": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 20.8,
                        "raw": "€20,80 - 20,80€"
                    },
                    "current_category": {
                        "name": "Libros",
                        "link": "https://www.amazon.es/gp/bestsellers/books",
                        "id": "books"
                    },
                    "parent_category": {
                        "name": "Cualquier departamento",
                        "link": "https://www.amazon.es/gp/bestsellers/ref=zg_bs_unv_b_0_b_1",
                        "id": "bestsellers"
                    }
                    },
                    {
                    "rank": 6,
                    "position": 6,
                    "title": "Dragon Ball Super nº 10 (Manga Shonen)",
                    "asin": "8413416175",
                    "link": "https://www.amazon.es/Dragon-Ball-Super-Manga-Shonen/dp/8413416175/ref=zg_bs_books_6?_encoding=UTF8&psc=1&refRID=KCRY7BS6TREZRWHMJ63F&tag=liber0e-21",
                    "variant": "Tapa blanda",
                    "image": "https://images-na.ssl-images-amazon.com/images/I/81VT6dQkVYL._AC_UL200_SR200,200_.jpg",
                    "price_lower": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 7.55,
                        "raw": "€7,55"
                    },
                    "price_upper": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 7.55,
                        "raw": "7,55€"
                    },
                    "price": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 7.55,
                        "raw": "€7,55 - 7,55€"
                    },
                    "current_category": {
                        "name": "Libros",
                        "link": "https://www.amazon.es/gp/bestsellers/books",
                        "id": "books"
                    },
                    "parent_category": {
                        "name": "Cualquier departamento",
                        "link": "https://www.amazon.es/gp/bestsellers/ref=zg_bs_unv_b_0_b_1",
                        "id": "bestsellers"
                    }
                    },
                    {
                    "rank": 7,
                    "position": 7,
                    "title": "A través de mi ventana (Sin límites)",
                    "asin": "8420451916",
                    "link": "https://www.amazon.es/trav%C3%A9s-ventana-Sin-l%C3%ADmites/dp/8420451916/ref=zg_bs_books_7?_encoding=UTF8&psc=1&refRID=KCRY7BS6TREZRWHMJ63F&tag=liber0e-21",
                    "variant": "Tapa blanda",
                    "image": "https://images-na.ssl-images-amazon.com/images/I/915XYLyY%2BSL._AC_UL200_SR200,200_.jpg",
                    "rating": 4.6,
                    "ratings_total": 488,
                    "price_lower": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 18,
                        "raw": "€18,00"
                    },
                    "price_upper": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 18,
                        "raw": "18,00€"
                    },
                    "price": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 18,
                        "raw": "€18,00 - 18,00€"
                    },
                    "current_category": {
                        "name": "Libros",
                        "link": "https://www.amazon.es/gp/bestsellers/books",
                        "id": "books"
                    },
                    "parent_category": {
                        "name": "Cualquier departamento",
                        "link": "https://www.amazon.es/gp/bestsellers/ref=zg_bs_unv_b_0_b_1",
                        "id": "bestsellers"
                    }
                    },
                    {
                    "rank": 8,
                    "position": 8,
                    "title": "Consecuencias de decir te quiero: 1 (Didot)",
                    "asin": "8418290781",
                    "link": "https://www.amazon.es/Consecuencias-decir-quiero-Manu-Erena/dp/8418290781/ref=zg_bs_books_8?_encoding=UTF8&psc=1&refRID=KCRY7BS6TREZRWHMJ63F&tag=liber0e-21",
                    "variant": "Tapa blanda",
                    "image": "https://images-na.ssl-images-amazon.com/images/I/51x5Lp9IdHL._AC_UL200_SR200,200_.jpg",
                    "rating": 4.6,
                    "ratings_total": 249,
                    "price_lower": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 11.4,
                        "raw": "€11,40"
                    },
                    "price_upper": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 11.4,
                        "raw": "11,40€"
                    },
                    "price": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 11.4,
                        "raw": "€11,40 - 11,40€"
                    },
                    "current_category": {
                        "name": "Libros",
                        "link": "https://www.amazon.es/gp/bestsellers/books",
                        "id": "books"
                    },
                    "parent_category": {
                        "name": "Cualquier departamento",
                        "link": "https://www.amazon.es/gp/bestsellers/ref=zg_bs_unv_b_0_b_1",
                        "id": "bestsellers"
                    }
                    },
                    {
                    "rank": 9,
                    "position": 9,
                    "title": "El juego del alma (SUMA)",
                    "asin": "849129354X",
                    "link": "https://www.amazon.es/El-juego-del-alma-SUMA/dp/849129354X/ref=zg_bs_books_9?_encoding=UTF8&psc=1&refRID=KCRY7BS6TREZRWHMJ63F&tag=liber0e-21",
                    "variant": "Tapa blanda",
                    "image": "https://images-na.ssl-images-amazon.com/images/I/817iOAFEQzL._AC_UL200_SR200,200_.jpg",
                    "rating": 4.6,
                    "ratings_total": 1178,
                    "price_lower": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 17.95,
                        "raw": "€17,95"
                    },
                    "price_upper": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 17.95,
                        "raw": "17,95€"
                    },
                    "price": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 17.95,
                        "raw": "€17,95 - 17,95€"
                    },
                    "current_category": {
                        "name": "Libros",
                        "link": "https://www.amazon.es/gp/bestsellers/books",
                        "id": "books"
                    },
                    "parent_category": {
                        "name": "Cualquier departamento",
                        "link": "https://www.amazon.es/gp/bestsellers/ref=zg_bs_unv_b_0_b_1",
                        "id": "bestsellers"
                    }
                    },
                    {
                    "rank": 10,
                    "position": 10,
                    "title": "Un trozo de cielo azul: La verdad sobre cómo lo perdí todo, salvo la esperanza (No Ficción)",
                    "asin": "840824227X",
                    "link": "https://www.amazon.es/trozo-cielo-azul-esperanza-Ficci%C3%B3n/dp/840824227X/ref=zg_bs_books_10?_encoding=UTF8&psc=1&refRID=KCRY7BS6TREZRWHMJ63F&tag=liber0e-21",
                    "variant": "Tapa blanda",
                    "image": "https://images-na.ssl-images-amazon.com/images/I/719KU8oaHhS._AC_UL200_SR200,200_.jpg",
                    "rating": 4.6,
                    "ratings_total": 14,
                    "price_lower": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 17.57,
                        "raw": "€17,57"
                    },
                    "price_upper": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 17.57,
                        "raw": "17,57€"
                    },
                    "price": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 17.57,
                        "raw": "€17,57 - 17,57€"
                    },
                    "current_category": {
                        "name": "Libros",
                        "link": "https://www.amazon.es/gp/bestsellers/books",
                        "id": "books"
                    },
                    "parent_category": {
                        "name": "Cualquier departamento",
                        "link": "https://www.amazon.es/gp/bestsellers/ref=zg_bs_unv_b_0_b_1",
                        "id": "bestsellers"
                    }
                    },
                    {
                    "rank": 11,
                    "position": 11,
                    "title": "La guía definitiva de caligrafía moderna y lettering a mano para principiantes: Aprende a dibujar letras: un cuaderno de…",
                    "asin": "1646081536",
                    "link": "https://www.amazon.es/definitiva-caligraf%C3%ADa-moderna-lettering-principiantes/dp/1646081536/ref=zg_bs_books_11?_encoding=UTF8&psc=1&refRID=KCRY7BS6TREZRWHMJ63F&tag=liber0e-21",
                    "variant": "Tapa blanda",
                    "image": "https://images-na.ssl-images-amazon.com/images/I/71kVlpyzn-L._AC_UL200_SR200,200_.jpg",
                    "rating": 4.6,
                    "ratings_total": 2203,
                    "price_lower": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 7.99,
                        "raw": "€7,99"
                    },
                    "price_upper": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 7.99,
                        "raw": "7,99€"
                    },
                    "price": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 7.99,
                        "raw": "€7,99 - 7,99€"
                    },
                    "current_category": {
                        "name": "Libros",
                        "link": "https://www.amazon.es/gp/bestsellers/books",
                        "id": "books"
                    },
                    "parent_category": {
                        "name": "Cualquier departamento",
                        "link": "https://www.amazon.es/gp/bestsellers/ref=zg_bs_unv_b_0_b_1",
                        "id": "bestsellers"
                    }
                    },
                    {
                    "rank": 12,
                    "position": 12,
                    "title": "My Hero Academia nº 27 (Manga Shonen)",
                    "asin": "8413416205",
                    "link": "https://www.amazon.es/My-Hero-Academia-Manga-Shonen/dp/8413416205/ref=zg_bs_books_12?_encoding=UTF8&psc=1&refRID=KCRY7BS6TREZRWHMJ63F&tag=liber0e-21",
                    "variant": "Tapa blanda",
                    "image": "https://images-na.ssl-images-amazon.com/images/I/81GWty8Jm2L._AC_UL200_SR200,200_.jpg",
                    "price_lower": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 6.6,
                        "raw": "€6,60"
                    },
                    "price_upper": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 6.6,
                        "raw": "6,60€"
                    },
                    "price": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 6.6,
                        "raw": "€6,60 - 6,60€"
                    },
                    "current_category": {
                        "name": "Libros",
                        "link": "https://www.amazon.es/gp/bestsellers/books",
                        "id": "books"
                    },
                    "parent_category": {
                        "name": "Cualquier departamento",
                        "link": "https://www.amazon.es/gp/bestsellers/ref=zg_bs_unv_b_0_b_1",
                        "id": "bestsellers"
                    }
                    },
                    {
                    "rank": 13,
                    "position": 13,
                    "title": "El arte de engañar al karma (SUMA)",
                    "asin": "8491291938",
                    "link": "https://www.amazon.es/El-arte-enga%C3%B1ar-karma-SUMA/dp/8491291938/ref=zg_bs_books_13?_encoding=UTF8&psc=1&refRID=KCRY7BS6TREZRWHMJ63F&tag=liber0e-21",
                    "variant": "Tapa blanda",
                    "image": "https://images-na.ssl-images-amazon.com/images/I/91tsnPGROUL._AC_UL200_SR200,200_.jpg",
                    "rating": 4.4,
                    "ratings_total": 979,
                    "price_lower": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 17.95,
                        "raw": "€17,95"
                    },
                    "price_upper": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 17.95,
                        "raw": "17,95€"
                    },
                    "price": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 17.95,
                        "raw": "€17,95 - 17,95€"
                    },
                    "current_category": {
                        "name": "Libros",
                        "link": "https://www.amazon.es/gp/bestsellers/books",
                        "id": "books"
                    },
                    "parent_category": {
                        "name": "Cualquier departamento",
                        "link": "https://www.amazon.es/gp/bestsellers/ref=zg_bs_unv_b_0_b_1",
                        "id": "bestsellers"
                    }
                    },
                    {
                    "rank": 14,
                    "position": 14,
                    "title": "Epic Battle: El día que los youtubers salvaron el mundo (4You2)",
                    "asin": "8427048378",
                    "link": "https://www.amazon.es/Epic-Battle-youtubers-salvaron-mundo/dp/8427048378/ref=zg_bs_books_14?_encoding=UTF8&psc=1&refRID=KCRY7BS6TREZRWHMJ63F&tag=liber0e-21",
                    "variant": "Tapa blanda",
                    "image": "https://images-na.ssl-images-amazon.com/images/I/91%2BDgD31NNL._AC_UL200_SR200,200_.jpg",
                    "rating": 4.4,
                    "ratings_total": 24,
                    "price_lower": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 13.2,
                        "raw": "€13,20"
                    },
                    "price_upper": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 13.2,
                        "raw": "13,20€"
                    },
                    "price": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 13.2,
                        "raw": "€13,20 - 13,20€"
                    },
                    "current_category": {
                        "name": "Libros",
                        "link": "https://www.amazon.es/gp/bestsellers/books",
                        "id": "books"
                    },
                    "parent_category": {
                        "name": "Cualquier departamento",
                        "link": "https://www.amazon.es/gp/bestsellers/ref=zg_bs_unv_b_0_b_1",
                        "id": "bestsellers"
                    }
                    },
                    {
                    "rank": 15,
                    "position": 15,
                    "title": "My Hero Academia nº 01 (Manga Shonen)",
                    "asin": "8416693501",
                    "link": "https://www.amazon.es/My-Hero-Academia-Manga-Shonen/dp/8416693501/ref=zg_bs_books_15?_encoding=UTF8&psc=1&refRID=KCRY7BS6TREZRWHMJ63F&tag=liber0e-21",
                    "variant": "Tapa blanda",
                    "image": "https://images-na.ssl-images-amazon.com/images/I/912mJf7tsUL._AC_UL200_SR200,200_.jpg",
                    "rating": 4.8,
                    "ratings_total": 475,
                    "price_lower": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 6.6,
                        "raw": "€6,60"
                    },
                    "price_upper": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 6.6,
                        "raw": "6,60€"
                    },
                    "price": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 6.6,
                        "raw": "€6,60 - 6,60€"
                    },
                    "current_category": {
                        "name": "Libros",
                        "link": "https://www.amazon.es/gp/bestsellers/books",
                        "id": "books"
                    },
                    "parent_category": {
                        "name": "Cualquier departamento",
                        "link": "https://www.amazon.es/gp/bestsellers/ref=zg_bs_unv_b_0_b_1",
                        "id": "bestsellers"
                    }
                    },
                    {
                    "rank": 16,
                    "position": 16,
                    "title": "España invertebrada (Contemporánea)",
                    "asin": "8467037547",
                    "link": "https://www.amazon.es/Espa%C3%B1a-invertebrada-Contempor%C3%A1nea-Ortega-Gasset/dp/8467037547/ref=zg_bs_books_16?_encoding=UTF8&psc=1&refRID=KCRY7BS6TREZRWHMJ63F&tag=liber0e-21",
                    "variant": "Tapa blanda",
                    "image": "https://images-na.ssl-images-amazon.com/images/I/81BbpL%2BRsOL._AC_UL200_SR200,200_.jpg",
                    "rating": 4.7,
                    "ratings_total": 75,
                    "price_lower": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 7.55,
                        "raw": "€7,55"
                    },
                    "price_upper": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 7.55,
                        "raw": "7,55€"
                    },
                    "price": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 7.55,
                        "raw": "€7,55 - 7,55€"
                    },
                    "current_category": {
                        "name": "Libros",
                        "link": "https://www.amazon.es/gp/bestsellers/books",
                        "id": "books"
                    },
                    "parent_category": {
                        "name": "Cualquier departamento",
                        "link": "https://www.amazon.es/gp/bestsellers/ref=zg_bs_unv_b_0_b_1",
                        "id": "bestsellers"
                    }
                    },
                    {
                    "rank": 17,
                    "position": 17,
                    "title": "Padre Rico, padre Pobre: Qué les enseñan los ricos a sus hijos acerca del dinero, ¡que los pobres y la clase media no!",
                    "asin": "846633212X",
                    "link": "https://www.amazon.es/Padre-Rico-padre-Pobre-ense%C3%B1an/dp/846633212X/ref=zg_bs_books_17?_encoding=UTF8&psc=1&refRID=KCRY7BS6TREZRWHMJ63F&tag=liber0e-21",
                    "variant": "Libro de bolsillo",
                    "image": "https://images-na.ssl-images-amazon.com/images/I/81iEKRLmvlS._AC_UL200_SR200,200_.jpg",
                    "rating": 4.6,
                    "ratings_total": 6585,
                    "price_lower": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 9.44,
                        "raw": "€9,44"
                    },
                    "price_upper": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 9.44,
                        "raw": "9,44€"
                    },
                    "price": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 9.44,
                        "raw": "€9,44 - 9,44€"
                    },
                    "current_category": {
                        "name": "Libros",
                        "link": "https://www.amazon.es/gp/bestsellers/books",
                        "id": "books"
                    },
                    "parent_category": {
                        "name": "Cualquier departamento",
                        "link": "https://www.amazon.es/gp/bestsellers/ref=zg_bs_unv_b_0_b_1",
                        "id": "bestsellers"
                    }
                    },
                    {
                    "rank": 18,
                    "position": 18,
                    "title": "¿Puedo mirar tu pañal? (Libros de cartón)",
                    "asin": "8467530693",
                    "link": "https://www.amazon.es/%C2%BFPuedo-mirar-pa%C3%B1al-Libros-cart%C3%B3n/dp/8467530693/ref=zg_bs_books_18?_encoding=UTF8&psc=1&refRID=KCRY7BS6TREZRWHMJ63F&tag=liber0e-21",
                    "variant": "Tapa dura",
                    "image": "https://images-na.ssl-images-amazon.com/images/I/810cDZ9CGPL._AC_UL200_SR200,200_.jpg",
                    "rating": 4.8,
                    "ratings_total": 2029,
                    "price_lower": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 11.35,
                        "raw": "€11,35"
                    },
                    "price_upper": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 11.35,
                        "raw": "11,35€"
                    },
                    "price": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 11.35,
                        "raw": "€11,35 - 11,35€"
                    },
                    "current_category": {
                        "name": "Libros",
                        "link": "https://www.amazon.es/gp/bestsellers/books",
                        "id": "books"
                    },
                    "parent_category": {
                        "name": "Cualquier departamento",
                        "link": "https://www.amazon.es/gp/bestsellers/ref=zg_bs_unv_b_0_b_1",
                        "id": "bestsellers"
                    }
                    },
                    {
                    "rank": 19,
                    "position": 19,
                    "title": "No me tires: El libro que evitará que desperdicies comida",
                    "asin": "8441543852",
                    "link": "https://www.amazon.es/No-tires-evitar%C3%A1-desperdicies-comida/dp/8441543852/ref=zg_bs_books_19?_encoding=UTF8&psc=1&refRID=KCRY7BS6TREZRWHMJ63F&tag=liber0e-21",
                    "variant": "Tapa dura",
                    "image": "https://images-na.ssl-images-amazon.com/images/I/61K4tLzWveL._AC_UL200_SR200,200_.jpg",
                    "price_lower": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 19.9,
                        "raw": "€19,90"
                    },
                    "price_upper": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 19.9,
                        "raw": "19,90€"
                    },
                    "price": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 19.9,
                        "raw": "€19,90 - 19,90€"
                    },
                    "current_category": {
                        "name": "Libros",
                        "link": "https://www.amazon.es/gp/bestsellers/books",
                        "id": "books"
                    },
                    "parent_category": {
                        "name": "Cualquier departamento",
                        "link": "https://www.amazon.es/gp/bestsellers/ref=zg_bs_unv_b_0_b_1",
                        "id": "bestsellers"
                    }
                    },
                    {
                    "rank": 20,
                    "position": 20,
                    "title": "My Hero Academia nº 02 (Manga Shonen)",
                    "asin": "841669351X",
                    "link": "https://www.amazon.es/My-Hero-Academia-Manga-Shonen/dp/841669351X/ref=zg_bs_books_20?_encoding=UTF8&psc=1&refRID=KCRY7BS6TREZRWHMJ63F&tag=liber0e-21",
                    "variant": "Tapa blanda",
                    "image": "https://images-na.ssl-images-amazon.com/images/I/91DTEUBZsgL._AC_UL200_SR200,200_.jpg",
                    "rating": 4.8,
                    "ratings_total": 1461,
                    "price_lower": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 6.6,
                        "raw": "€6,60"
                    },
                    "price_upper": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 6.6,
                        "raw": "6,60€"
                    },
                    "price": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 6.6,
                        "raw": "€6,60 - 6,60€"
                    },
                    "current_category": {
                        "name": "Libros",
                        "link": "https://www.amazon.es/gp/bestsellers/books",
                        "id": "books"
                    },
                    "parent_category": {
                        "name": "Cualquier departamento",
                        "link": "https://www.amazon.es/gp/bestsellers/ref=zg_bs_unv_b_0_b_1",
                        "id": "bestsellers"
                    }
                    },
                    {
                    "rank": 21,
                    "position": 21,
                    "title": "Busca Dinosaurios",
                    "asin": "8430537813",
                    "link": "https://www.amazon.es/Busca-Dinosaurios-Susaeta-Ediciones-S/dp/8430537813/ref=zg_bs_books_21?_encoding=UTF8&psc=1&refRID=KCRY7BS6TREZRWHMJ63F&tag=liber0e-21",
                    "variant": "Tapa dura",
                    "image": "https://images-na.ssl-images-amazon.com/images/I/81bbDyiX2NL._AC_UL200_SR200,200_.jpg",
                    "rating": 4.6,
                    "ratings_total": 2067,
                    "price_lower": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 4.7,
                        "raw": "€4,70"
                    },
                    "price_upper": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 4.7,
                        "raw": "4,70€"
                    },
                    "price": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 4.7,
                        "raw": "€4,70 - 4,70€"
                    },
                    "current_category": {
                        "name": "Libros",
                        "link": "https://www.amazon.es/gp/bestsellers/books",
                        "id": "books"
                    },
                    "parent_category": {
                        "name": "Cualquier departamento",
                        "link": "https://www.amazon.es/gp/bestsellers/ref=zg_bs_unv_b_0_b_1",
                        "id": "bestsellers"
                    }
                    },
                    {
                    "rank": 22,
                    "position": 22,
                    "title": "El gran libro de Lucía, mi pediatra: La guía más completa y actualizada sobre la salud de tu hijo desde el nacimiento a…",
                    "asin": "8408226789",
                    "link": "https://www.amazon.es/gran-libro-Luc%C3%ADa-pediatra-adolescencia/dp/8408226789/ref=zg_bs_books_22?_encoding=UTF8&psc=1&refRID=KCRY7BS6TREZRWHMJ63F&tag=liber0e-21",
                    "variant": "Tapa dura",
                    "image": "https://images-na.ssl-images-amazon.com/images/I/81cHVQqafZL._AC_UL200_SR200,200_.jpg",
                    "rating": 4.7,
                    "ratings_total": 782,
                    "price_lower": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 21.75,
                        "raw": "€21,75"
                    },
                    "price_upper": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 21.75,
                        "raw": "21,75€"
                    },
                    "price": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 21.75,
                        "raw": "€21,75 - 21,75€"
                    },
                    "current_category": {
                        "name": "Libros",
                        "link": "https://www.amazon.es/gp/bestsellers/books",
                        "id": "books"
                    },
                    "parent_category": {
                        "name": "Cualquier departamento",
                        "link": "https://www.amazon.es/gp/bestsellers/ref=zg_bs_unv_b_0_b_1",
                        "id": "bestsellers"
                    }
                    },
                    {
                    "rank": 23,
                    "position": 23,
                    "title": "Los cuatro acuerdos: Un libro de sabiduría tolteca (Crecimiento personal)",
                    "asin": "847953253X",
                    "link": "https://www.amazon.es/Los-cuatro-acuerdos-sabidur%C3%ADa-Crecimiento/dp/847953253X/ref=zg_bs_books_23?_encoding=UTF8&psc=1&refRID=KCRY7BS6TREZRWHMJ63F&tag=liber0e-21",
                    "variant": "Tapa blanda",
                    "image": "https://images-na.ssl-images-amazon.com/images/I/71mVri6PDWL._AC_UL200_SR200,200_.jpg",
                    "rating": 4.6,
                    "ratings_total": 6005,
                    "price_lower": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 9.97,
                        "raw": "€9,97"
                    },
                    "price_upper": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 9.97,
                        "raw": "9,97€"
                    },
                    "price": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 9.97,
                        "raw": "€9,97 - 9,97€"
                    },
                    "current_category": {
                        "name": "Libros",
                        "link": "https://www.amazon.es/gp/bestsellers/books",
                        "id": "books"
                    },
                    "parent_category": {
                        "name": "Cualquier departamento",
                        "link": "https://www.amazon.es/gp/bestsellers/ref=zg_bs_unv_b_0_b_1",
                        "id": "bestsellers"
                    }
                    },
                    {
                    "rank": 24,
                    "position": 24,
                    "title": "La guía para principiantes de caligrafía moderna y lettering a mano para niños: Un divertido cuaderno de actividades con…",
                    "asin": "1646081803",
                    "link": "https://www.amazon.es/principiantes-caligraf%C3%ADa-moderna-lettering-ni%C3%B1os/dp/1646081803/ref=zg_bs_books_24?_encoding=UTF8&psc=1&refRID=KCRY7BS6TREZRWHMJ63F&tag=liber0e-21",
                    "variant": "Tapa blanda",
                    "image": "https://images-na.ssl-images-amazon.com/images/I/61pVyb6urtL._AC_UL200_SR200,200_.jpg",
                    "rating": 4.6,
                    "ratings_total": 2203,
                    "price_lower": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 6.99,
                        "raw": "€6,99"
                    },
                    "price_upper": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 6.99,
                        "raw": "6,99€"
                    },
                    "price": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 6.99,
                        "raw": "€6,99 - 6,99€"
                    },
                    "current_category": {
                        "name": "Libros",
                        "link": "https://www.amazon.es/gp/bestsellers/books",
                        "id": "books"
                    },
                    "parent_category": {
                        "name": "Cualquier departamento",
                        "link": "https://www.amazon.es/gp/bestsellers/ref=zg_bs_unv_b_0_b_1",
                        "id": "bestsellers"
                    }
                    },
                    {
                    "rank": 25,
                    "position": 25,
                    "title": "El Principito (Infantil)",
                    "asin": "8498381495",
                    "link": "https://www.amazon.es/Principito-Antoine-Saint-Exup%C3%A9ry-Saint-Exupery/dp/8498381495/ref=zg_bs_books_25?_encoding=UTF8&psc=1&refRID=KCRY7BS6TREZRWHMJ63F&tag=liber0e-21",
                    "variant": "Tapa blanda",
                    "image": "https://images-na.ssl-images-amazon.com/images/I/71WzzmBVvJL._AC_UL200_SR200,200_.jpg",
                    "rating": 4.7,
                    "ratings_total": 3043,
                    "price_lower": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 6.6,
                        "raw": "€6,60"
                    },
                    "price_upper": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 6.6,
                        "raw": "6,60€"
                    },
                    "price": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 6.6,
                        "raw": "€6,60 - 6,60€"
                    },
                    "current_category": {
                        "name": "Libros",
                        "link": "https://www.amazon.es/gp/bestsellers/books",
                        "id": "books"
                    },
                    "parent_category": {
                        "name": "Cualquier departamento",
                        "link": "https://www.amazon.es/gp/bestsellers/ref=zg_bs_unv_b_0_b_1",
                        "id": "bestsellers"
                    }
                    },
                    {
                    "rank": 26,
                    "position": 26,
                    "title": "Los Compas y el diamantito legendario (nueva presentación) (4You2)",
                    "asin": "8427047940",
                    "link": "https://www.amazon.es/Compas-diamantito-legendario-nueva-presentaci%C3%B3n/dp/8427047940/ref=zg_bs_books_26?_encoding=UTF8&psc=1&refRID=KCRY7BS6TREZRWHMJ63F&tag=liber0e-21",
                    "variant": "Tapa dura",
                    "image": "https://images-na.ssl-images-amazon.com/images/I/81%2BOpapnDaL._AC_UL200_SR200,200_.jpg",
                    "rating": 4.7,
                    "ratings_total": 2324,
                    "price_lower": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 15.1,
                        "raw": "€15,10"
                    },
                    "price_upper": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 15.1,
                        "raw": "15,10€"
                    },
                    "price": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 15.1,
                        "raw": "€15,10 - 15,10€"
                    },
                    "current_category": {
                        "name": "Libros",
                        "link": "https://www.amazon.es/gp/bestsellers/books",
                        "id": "books"
                    },
                    "parent_category": {
                        "name": "Cualquier departamento",
                        "link": "https://www.amazon.es/gp/bestsellers/ref=zg_bs_unv_b_0_b_1",
                        "id": "bestsellers"
                    }
                    },
                    {
                    "rank": 27,
                    "position": 27,
                    "title": "Diario de una adolescente (Tendencias)",
                    "asin": "8418318813",
                    "link": "https://www.amazon.es/Diario-adolescente-Tendencias-Andrea-Palaz%C3%B3n/dp/8418318813/ref=zg_bs_books_27?_encoding=UTF8&psc=1&refRID=KCRY7BS6TREZRWHMJ63F&tag=liber0e-21",
                    "variant": "Tapa dura",
                    "image": "https://images-na.ssl-images-amazon.com/images/I/81dfmMQV%2BPS._AC_UL200_SR200,200_.jpg",
                    "price_lower": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 15.15,
                        "raw": "€15,15"
                    },
                    "price_upper": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 15.15,
                        "raw": "15,15€"
                    },
                    "price": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 15.15,
                        "raw": "€15,15 - 15,15€"
                    },
                    "current_category": {
                        "name": "Libros",
                        "link": "https://www.amazon.es/gp/bestsellers/books",
                        "id": "books"
                    },
                    "parent_category": {
                        "name": "Cualquier departamento",
                        "link": "https://www.amazon.es/gp/bestsellers/ref=zg_bs_unv_b_0_b_1",
                        "id": "bestsellers"
                    }
                    },
                    {
                    "rank": 28,
                    "position": 28,
                    "title": "Dime qué comes y te diré qué bacterias tienes: El intestino, nuestro segundo cerebro (Vivir mejor) (Alimentación…",
                    "asin": "8417752927",
                    "link": "https://www.amazon.es/Dime-comes-dir%C3%A9-bacterias-tienes/dp/8417752927/ref=zg_bs_books_28?_encoding=UTF8&psc=1&refRID=KCRY7BS6TREZRWHMJ63F&tag=liber0e-21",
                    "variant": "Tapa blanda",
                    "image": "https://images-na.ssl-images-amazon.com/images/I/81LsJ%2BYnNhL._AC_UL200_SR200,200_.jpg",
                    "rating": 4.6,
                    "ratings_total": 1537,
                    "price_lower": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 18.9,
                        "raw": "€18,90"
                    },
                    "price_upper": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 18.9,
                        "raw": "18,90€"
                    },
                    "price": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 18.9,
                        "raw": "€18,90 - 18,90€"
                    },
                    "current_category": {
                        "name": "Libros",
                        "link": "https://www.amazon.es/gp/bestsellers/books",
                        "id": "books"
                    },
                    "parent_category": {
                        "name": "Cualquier departamento",
                        "link": "https://www.amazon.es/gp/bestsellers/ref=zg_bs_unv_b_0_b_1",
                        "id": "bestsellers"
                    }
                    },
                    {
                    "rank": 29,
                    "position": 29,
                    "title": "El Pequeño Larousse ilustrado (Larousse - Lengua Española - Diccionarios Enciclopédicos)",
                    "asin": "8417720340",
                    "link": "https://www.amazon.es/Peque%C3%B1o-Larousse-ilustrado-Diccionarios-Enciclop%C3%A9dicos/dp/8417720340/ref=zg_bs_books_29?_encoding=UTF8&psc=1&refRID=KCRY7BS6TREZRWHMJ63F&tag=liber0e-21",
                    "variant": "Tapa dura",
                    "image": "https://images-na.ssl-images-amazon.com/images/I/71xqREvgAEL._AC_UL200_SR200,200_.jpg",
                    "rating": 4.7,
                    "ratings_total": 122,
                    "price_lower": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 9.45,
                        "raw": "€9,45"
                    },
                    "price_upper": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 9.45,
                        "raw": "9,45€"
                    },
                    "price": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 9.45,
                        "raw": "€9,45 - 9,45€"
                    },
                    "current_category": {
                        "name": "Libros",
                        "link": "https://www.amazon.es/gp/bestsellers/books",
                        "id": "books"
                    },
                    "parent_category": {
                        "name": "Cualquier departamento",
                        "link": "https://www.amazon.es/gp/bestsellers/ref=zg_bs_unv_b_0_b_1",
                        "id": "bestsellers"
                    }
                    },
                    {
                    "rank": 30,
                    "position": 30,
                    "title": "El cerebro del niño explicado a los padres (Plataforma Actual)",
                    "asin": "8416429561",
                    "link": "https://www.amazon.es/Cerebro-Explicado-Padres-Plataforma-Actual/dp/8416429561/ref=zg_bs_books_30?_encoding=UTF8&psc=1&refRID=KCRY7BS6TREZRWHMJ63F&tag=liber0e-21",
                    "variant": "Tapa blanda",
                    "image": "https://images-na.ssl-images-amazon.com/images/I/81-j6E3V2WL._AC_UL200_SR200,200_.jpg",
                    "rating": 4.8,
                    "ratings_total": 2957,
                    "price_lower": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 17.1,
                        "raw": "€17,10"
                    },
                    "price_upper": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 17.1,
                        "raw": "17,10€"
                    },
                    "price": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 17.1,
                        "raw": "€17,10 - 17,10€"
                    },
                    "current_category": {
                        "name": "Libros",
                        "link": "https://www.amazon.es/gp/bestsellers/books",
                        "id": "books"
                    },
                    "parent_category": {
                        "name": "Cualquier departamento",
                        "link": "https://www.amazon.es/gp/bestsellers/ref=zg_bs_unv_b_0_b_1",
                        "id": "bestsellers"
                    }
                    },
                    {
                    "rank": 31,
                    "position": 31,
                    "title": "Dragon Ball Serie Roja nº 263 (Manga Shonen)",
                    "asin": "8413416086",
                    "link": "https://www.amazon.es/Dragon-Ball-Serie-Manga-Shonen/dp/8413416086/ref=zg_bs_books_31?_encoding=UTF8&psc=1&refRID=KCRY7BS6TREZRWHMJ63F&tag=liber0e-21",
                    "variant": "Tapa blanda",
                    "image": "https://images-na.ssl-images-amazon.com/images/I/81839ebNoHL._AC_UL200_SR200,200_.jpg",
                    "price_lower": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 2.8,
                        "raw": "€2,80"
                    },
                    "price_upper": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 2.8,
                        "raw": "2,80€"
                    },
                    "price": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 2.8,
                        "raw": "€2,80 - 2,80€"
                    },
                    "current_category": {
                        "name": "Libros",
                        "link": "https://www.amazon.es/gp/bestsellers/books",
                        "id": "books"
                    },
                    "parent_category": {
                        "name": "Cualquier departamento",
                        "link": "https://www.amazon.es/gp/bestsellers/ref=zg_bs_unv_b_0_b_1",
                        "id": "bestsellers"
                    }
                    },
                    {
                    "rank": 32,
                    "position": 32,
                    "title": "Dragon Ball Serie Roja nº 262 (Manga Shonen)",
                    "asin": "8413416078",
                    "link": "https://www.amazon.es/Dragon-Ball-Serie-Manga-Shonen/dp/8413416078/ref=zg_bs_books_32?_encoding=UTF8&psc=1&refRID=KCRY7BS6TREZRWHMJ63F&tag=liber0e-21",
                    "variant": "Tapa blanda",
                    "image": "https://images-na.ssl-images-amazon.com/images/I/914MV-QISCL._AC_UL200_SR200,200_.jpg",
                    "price_lower": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 2.8,
                        "raw": "€2,80"
                    },
                    "price_upper": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 2.8,
                        "raw": "2,80€"
                    },
                    "price": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 2.8,
                        "raw": "€2,80 - 2,80€"
                    },
                    "current_category": {
                        "name": "Libros",
                        "link": "https://www.amazon.es/gp/bestsellers/books",
                        "id": "books"
                    },
                    "parent_category": {
                        "name": "Cualquier departamento",
                        "link": "https://www.amazon.es/gp/bestsellers/ref=zg_bs_unv_b_0_b_1",
                        "id": "bestsellers"
                    }
                    },
                    {
                    "rank": 33,
                    "position": 33,
                    "title": "Los Compas perdidos en el espacio (4You2)",
                    "asin": "8427048343",
                    "link": "https://www.amazon.es/Los-Compas-perdidos-espacio-4You2/dp/8427048343/ref=zg_bs_books_33?_encoding=UTF8&psc=1&refRID=KCRY7BS6TREZRWHMJ63F&tag=liber0e-21",
                    "variant": "Tapa dura",
                    "image": "https://images-na.ssl-images-amazon.com/images/I/91yPNzXuN5L._AC_UL200_SR200,200_.jpg",
                    "price_lower": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 18.9,
                        "raw": "€18,90"
                    },
                    "price_upper": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 18.9,
                        "raw": "18,90€"
                    },
                    "price": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 18.9,
                        "raw": "€18,90 - 18,90€"
                    },
                    "current_category": {
                        "name": "Libros",
                        "link": "https://www.amazon.es/gp/bestsellers/books",
                        "id": "books"
                    },
                    "parent_category": {
                        "name": "Cualquier departamento",
                        "link": "https://www.amazon.es/gp/bestsellers/ref=zg_bs_unv_b_0_b_1",
                        "id": "bestsellers"
                    }
                    },
                    {
                    "rank": 34,
                    "position": 34,
                    "title": "Los Futbolísimos 19: El misterio de las brujas futbolistas",
                    "asin": "8413921597",
                    "link": "https://www.amazon.es/Los-Futbol%C3%ADsimos-19-misterio-futbolistas/dp/8413921597/ref=zg_bs_books_34?_encoding=UTF8&psc=1&refRID=KCRY7BS6TREZRWHMJ63F&tag=liber0e-21",
                    "variant": "Tapa blanda",
                    "image": "https://images-na.ssl-images-amazon.com/images/I/91NTHfZGyCS._AC_UL200_SR200,200_.jpg",
                    "price_lower": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 11.35,
                        "raw": "€11,35"
                    },
                    "price_upper": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 11.35,
                        "raw": "11,35€"
                    },
                    "price": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 11.35,
                        "raw": "€11,35 - 11,35€"
                    },
                    "current_category": {
                        "name": "Libros",
                        "link": "https://www.amazon.es/gp/bestsellers/books",
                        "id": "books"
                    },
                    "parent_category": {
                        "name": "Cualquier departamento",
                        "link": "https://www.amazon.es/gp/bestsellers/ref=zg_bs_unv_b_0_b_1",
                        "id": "bestsellers"
                    }
                    },
                    {
                    "rank": 35,
                    "position": 35,
                    "title": "Culpa mía (Culpables 1)",
                    "asin": "8413142016",
                    "link": "https://www.amazon.es/Culpa-m%C3%ADa-Culpables-Mercedes-Ron/dp/8413142016/ref=zg_bs_books_35?_encoding=UTF8&psc=1&refRID=KCRY7BS6TREZRWHMJ63F&tag=liber0e-21",
                    "variant": "Libro de bolsillo",
                    "image": "https://images-na.ssl-images-amazon.com/images/I/71zP8bc3AnS._AC_UL200_SR200,200_.jpg",
                    "rating": 4.7,
                    "ratings_total": 693,
                    "price_lower": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 8.5,
                        "raw": "€8,50"
                    },
                    "price_upper": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 8.5,
                        "raw": "8,50€"
                    },
                    "price": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 8.5,
                        "raw": "€8,50 - 8,50€"
                    },
                    "current_category": {
                        "name": "Libros",
                        "link": "https://www.amazon.es/gp/bestsellers/books",
                        "id": "books"
                    },
                    "parent_category": {
                        "name": "Cualquier departamento",
                        "link": "https://www.amazon.es/gp/bestsellers/ref=zg_bs_unv_b_0_b_1",
                        "id": "bestsellers"
                    }
                    },
                    {
                    "rank": 36,
                    "position": 36,
                    "title": "Los Compas y la cámara del tiempo (4You2)",
                    "asin": "8427047371",
                    "link": "https://www.amazon.es/Los-Compas-c%C3%A1mara-tiempo-4You2/dp/8427047371/ref=zg_bs_books_36?_encoding=UTF8&psc=1&refRID=KCRY7BS6TREZRWHMJ63F&tag=liber0e-21",
                    "variant": "Tapa dura",
                    "image": "https://images-na.ssl-images-amazon.com/images/I/91HxZQTLEOL._AC_UL200_SR200,200_.jpg",
                    "rating": 4.8,
                    "ratings_total": 1185,
                    "price_lower": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 15.1,
                        "raw": "€15,10"
                    },
                    "price_upper": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 15.1,
                        "raw": "15,10€"
                    },
                    "price": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 15.1,
                        "raw": "€15,10 - 15,10€"
                    },
                    "current_category": {
                        "name": "Libros",
                        "link": "https://www.amazon.es/gp/bestsellers/books",
                        "id": "books"
                    },
                    "parent_category": {
                        "name": "Cualquier departamento",
                        "link": "https://www.amazon.es/gp/bestsellers/ref=zg_bs_unv_b_0_b_1",
                        "id": "bestsellers"
                    }
                    },
                    {
                    "rank": 37,
                    "position": 37,
                    "title": "Heist: Cazar o ser cazado (Wattpad)",
                    "asin": "841831883X",
                    "link": "https://www.amazon.es/Heist-Cazar-ser-cazado-Wattpad/dp/841831883X/ref=zg_bs_books_37?_encoding=UTF8&psc=1&refRID=KCRY7BS6TREZRWHMJ63F&tag=liber0e-21",
                    "variant": "Tapa blanda",
                    "image": "https://images-na.ssl-images-amazon.com/images/I/91mtPR6lxwL._AC_UL200_SR200,200_.jpg",
                    "rating": 4.6,
                    "ratings_total": 23,
                    "price_lower": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 17.05,
                        "raw": "€17,05"
                    },
                    "price_upper": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 17.05,
                        "raw": "17,05€"
                    },
                    "price": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 17.05,
                        "raw": "€17,05 - 17,05€"
                    },
                    "current_category": {
                        "name": "Libros",
                        "link": "https://www.amazon.es/gp/bestsellers/books",
                        "id": "books"
                    },
                    "parent_category": {
                        "name": "Cualquier departamento",
                        "link": "https://www.amazon.es/gp/bestsellers/ref=zg_bs_unv_b_0_b_1",
                        "id": "bestsellers"
                    }
                    },
                    {
                    "rank": 38,
                    "position": 38,
                    "title": "Letra impresa",
                    "asin": "B094L79K9D",
                    "link": "https://www.amazon.es/Letra-impresa-Varios-Autores/dp/B094L79K9D/ref=zg_bs_books_38?_encoding=UTF8&psc=1&refRID=KCRY7BS6TREZRWHMJ63F&tag=liber0e-21",
                    "variant": "Tapa blanda",
                    "image": "https://images-na.ssl-images-amazon.com/images/I/51ZIIOCtdyS._AC_UL200_SR200,200_.jpg",
                    "price_lower": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 23,
                        "raw": "€23,00"
                    },
                    "price_upper": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 23,
                        "raw": "23,00€"
                    },
                    "price": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 23,
                        "raw": "€23,00 - 23,00€"
                    },
                    "current_category": {
                        "name": "Libros",
                        "link": "https://www.amazon.es/gp/bestsellers/books",
                        "id": "books"
                    },
                    "parent_category": {
                        "name": "Cualquier departamento",
                        "link": "https://www.amazon.es/gp/bestsellers/ref=zg_bs_unv_b_0_b_1",
                        "id": "bestsellers"
                    }
                    },
                    {
                    "rank": 39,
                    "position": 39,
                    "title": "El poder del ahora: una guía para la iluminación espiritual (Perenne)",
                    "asin": "8484452069",
                    "link": "https://www.amazon.es/poder-del-ahora-iluminaci%C3%B3n-espiritual/dp/8484452069/ref=zg_bs_books_39?_encoding=UTF8&psc=1&refRID=KCRY7BS6TREZRWHMJ63F&tag=liber0e-21",
                    "variant": "Tapa blanda",
                    "image": "https://images-na.ssl-images-amazon.com/images/I/71hHAjSYR3L._AC_UL200_SR200,200_.jpg",
                    "rating": 4.4,
                    "ratings_total": 4857,
                    "price_lower": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 9.5,
                        "raw": "€9,50"
                    },
                    "price_upper": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 9.5,
                        "raw": "9,50€"
                    },
                    "price": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 9.5,
                        "raw": "€9,50 - 9,50€"
                    },
                    "current_category": {
                        "name": "Libros",
                        "link": "https://www.amazon.es/gp/bestsellers/books",
                        "id": "books"
                    },
                    "parent_category": {
                        "name": "Cualquier departamento",
                        "link": "https://www.amazon.es/gp/bestsellers/ref=zg_bs_unv_b_0_b_1",
                        "id": "bestsellers"
                    }
                    },
                    {
                    "rank": 40,
                    "position": 40,
                    "title": "El monje que vendió su Ferrari: Una fábula espiritual (Clave)",
                    "asin": "8499087124",
                    "link": "https://www.amazon.es/monje-que-vendi%C3%B3-Ferrari-CLAVE/dp/8499087124/ref=zg_bs_books_40?_encoding=UTF8&psc=1&refRID=KCRY7BS6TREZRWHMJ63F&tag=liber0e-21",
                    "variant": "Libro de bolsillo",
                    "image": "https://images-na.ssl-images-amazon.com/images/I/81aII%2BgLegL._AC_UL200_SR200,200_.jpg",
                    "rating": 4.6,
                    "ratings_total": 3205,
                    "price_lower": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 8.5,
                        "raw": "€8,50"
                    },
                    "price_upper": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 8.5,
                        "raw": "8,50€"
                    },
                    "price": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 8.5,
                        "raw": "€8,50 - 8,50€"
                    },
                    "current_category": {
                        "name": "Libros",
                        "link": "https://www.amazon.es/gp/bestsellers/books",
                        "id": "books"
                    },
                    "parent_category": {
                        "name": "Cualquier departamento",
                        "link": "https://www.amazon.es/gp/bestsellers/ref=zg_bs_unv_b_0_b_1",
                        "id": "bestsellers"
                    }
                    },
                    {
                    "rank": 41,
                    "position": 41,
                    "title": "Destroza este diario. Ahora a todo color (Libros Singulares)",
                    "asin": "8449333733",
                    "link": "https://www.amazon.es/Destroza-diario-Ahora-Libros-Singulares/dp/8449333733/ref=zg_bs_books_41?_encoding=UTF8&psc=1&refRID=KCRY7BS6TREZRWHMJ63F&tag=liber0e-21",
                    "variant": "Tapa blanda",
                    "image": "https://images-na.ssl-images-amazon.com/images/I/91W-zMfhy6L._AC_UL200_SR200,200_.jpg",
                    "rating": 4.7,
                    "ratings_total": 1738,
                    "price_lower": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 10.4,
                        "raw": "€10,40"
                    },
                    "price_upper": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 10.4,
                        "raw": "10,40€"
                    },
                    "price": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 10.4,
                        "raw": "€10,40 - 10,40€"
                    },
                    "current_category": {
                        "name": "Libros",
                        "link": "https://www.amazon.es/gp/bestsellers/books",
                        "id": "books"
                    },
                    "parent_category": {
                        "name": "Cualquier departamento",
                        "link": "https://www.amazon.es/gp/bestsellers/ref=zg_bs_unv_b_0_b_1",
                        "id": "bestsellers"
                    }
                    },
                    {
                    "rank": 42,
                    "position": 42,
                    "title": "ESTUCHE DEJA QUE OCURRA (ALICE KELLEN) (Novela)",
                    "asin": "8408231197",
                    "link": "https://www.amazon.es/ESTUCHE-OCURRA-ALICE-KELLEN-Novela/dp/8408231197/ref=zg_bs_books_42?_encoding=UTF8&psc=1&refRID=KCRY7BS6TREZRWHMJ63F&tag=liber0e-21",
                    "variant": "Tapa blanda",
                    "image": "https://images-na.ssl-images-amazon.com/images/I/81HGJhHRQGL._AC_UL200_SR200,200_.jpg",
                    "rating": 4.7,
                    "ratings_total": 260,
                    "price_lower": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 17,
                        "raw": "€17,00"
                    },
                    "price_upper": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 17,
                        "raw": "17,00€"
                    },
                    "price": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 17,
                        "raw": "€17,00 - 17,00€"
                    },
                    "current_category": {
                        "name": "Libros",
                        "link": "https://www.amazon.es/gp/bestsellers/books",
                        "id": "books"
                    },
                    "parent_category": {
                        "name": "Cualquier departamento",
                        "link": "https://www.amazon.es/gp/bestsellers/ref=zg_bs_unv_b_0_b_1",
                        "id": "bestsellers"
                    }
                    },
                    {
                    "rank": 43,
                    "position": 43,
                    "title": "Territorios improbables: Historias sobre lugares que (casi) no sabías que existían (Kailas No Ficción)",
                    "asin": "841724882X",
                    "link": "https://www.amazon.es/Territorios-improbables-Historias-lugares-exist%C3%ADan/dp/841724882X/ref=zg_bs_books_43?_encoding=UTF8&psc=1&refRID=KCRY7BS6TREZRWHMJ63F&tag=liber0e-21",
                    "variant": "Tapa blanda",
                    "image": "https://images-na.ssl-images-amazon.com/images/I/91hAzFbzXhS._AC_UL200_SR200,200_.jpg",
                    "price_lower": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 23.9,
                        "raw": "€23,90"
                    },
                    "price_upper": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 23.9,
                        "raw": "23,90€"
                    },
                    "price": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 23.9,
                        "raw": "€23,90 - 23,90€"
                    },
                    "current_category": {
                        "name": "Libros",
                        "link": "https://www.amazon.es/gp/bestsellers/books",
                        "id": "books"
                    },
                    "parent_category": {
                        "name": "Cualquier departamento",
                        "link": "https://www.amazon.es/gp/bestsellers/ref=zg_bs_unv_b_0_b_1",
                        "id": "bestsellers"
                    }
                    },
                    {
                    "rank": 44,
                    "position": 44,
                    "title": "El caso del castillo encantado (Serie Los BuscaPistas 1)",
                    "asin": "8415580703",
                    "link": "https://www.amazon.es/caso-castillo-encantado-Serie-BuscaPistas/dp/8415580703/ref=zg_bs_books_44?_encoding=UTF8&psc=1&refRID=KCRY7BS6TREZRWHMJ63F&tag=liber0e-21",
                    "variant": "Tapa blanda",
                    "image": "https://images-na.ssl-images-amazon.com/images/I/81rEYGN8BPL._AC_UL200_SR200,200_.jpg",
                    "rating": 4.6,
                    "ratings_total": 1824,
                    "price_lower": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 6.6,
                        "raw": "€6,60"
                    },
                    "price_upper": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 6.6,
                        "raw": "6,60€"
                    },
                    "price": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 6.6,
                        "raw": "€6,60 - 6,60€"
                    },
                    "current_category": {
                        "name": "Libros",
                        "link": "https://www.amazon.es/gp/bestsellers/books",
                        "id": "books"
                    },
                    "parent_category": {
                        "name": "Cualquier departamento",
                        "link": "https://www.amazon.es/gp/bestsellers/ref=zg_bs_unv_b_0_b_1",
                        "id": "bestsellers"
                    }
                    },
                    {
                    "rank": 45,
                    "position": 45,
                    "title": "Las Ratitas 1. Tres, dos, uno... ¡superpoderes! (Jóvenes influencers)",
                    "asin": "840822574X",
                    "link": "https://www.amazon.es/Ratitas-Tres-%C2%A1superpoderes-Youtubers-infantiles/dp/840822574X/ref=zg_bs_books_45?_encoding=UTF8&psc=1&refRID=KCRY7BS6TREZRWHMJ63F&tag=liber0e-21",
                    "variant": "Tapa dura",
                    "image": "https://images-na.ssl-images-amazon.com/images/I/81EnTaBbw-L._AC_UL200_SR200,200_.jpg",
                    "rating": 4.6,
                    "ratings_total": 1061,
                    "price_lower": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 14.2,
                        "raw": "€14,20"
                    },
                    "price_upper": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 14.2,
                        "raw": "14,20€"
                    },
                    "price": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 14.2,
                        "raw": "€14,20 - 14,20€"
                    },
                    "current_category": {
                        "name": "Libros",
                        "link": "https://www.amazon.es/gp/bestsellers/books",
                        "id": "books"
                    },
                    "parent_category": {
                        "name": "Cualquier departamento",
                        "link": "https://www.amazon.es/gp/bestsellers/ref=zg_bs_unv_b_0_b_1",
                        "id": "bestsellers"
                    }
                    },
                    {
                    "rank": 46,
                    "position": 46,
                    "title": "Los Compas y la maldición de Mikecrack (4You2)",
                    "asin": "8427047495",
                    "link": "https://www.amazon.es/Los-Compas-maldici%C3%B3n-Mikecrack-4You2/dp/8427047495/ref=zg_bs_books_46?_encoding=UTF8&psc=1&refRID=KCRY7BS6TREZRWHMJ63F&tag=liber0e-21",
                    "variant": "Tapa dura",
                    "image": "https://images-na.ssl-images-amazon.com/images/I/91aDsj10boL._AC_UL200_SR200,200_.jpg",
                    "rating": 4.8,
                    "ratings_total": 897,
                    "price_lower": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 18.9,
                        "raw": "€18,90"
                    },
                    "price_upper": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 18.9,
                        "raw": "18,90€"
                    },
                    "price": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 18.9,
                        "raw": "€18,90 - 18,90€"
                    },
                    "current_category": {
                        "name": "Libros",
                        "link": "https://www.amazon.es/gp/bestsellers/books",
                        "id": "books"
                    },
                    "parent_category": {
                        "name": "Cualquier departamento",
                        "link": "https://www.amazon.es/gp/bestsellers/ref=zg_bs_unv_b_0_b_1",
                        "id": "bestsellers"
                    }
                    },
                    {
                    "rank": 47,
                    "position": 47,
                    "title": "¡Eres un ser fantástico!: Inspirador libro infantil sobre la autoconfianza, la concienciación y la amistad - apto para…",
                    "asin": "B08Z2WTTWT",
                    "link": "https://www.amazon.es/%C2%A1Eres-ser-fant%C3%A1stico-autoconfianza-concienciaci%C3%B3n/dp/B08Z2WTTWT/ref=zg_bs_books_47?_encoding=UTF8&psc=1&refRID=KCRY7BS6TREZRWHMJ63F&tag=liber0e-21",
                    "variant": "Tapa blanda",
                    "image": "https://images-na.ssl-images-amazon.com/images/I/71kT-x-YNZS._AC_UL200_SR200,200_.jpg",
                    "rating": 4.2,
                    "ratings_total": 27,
                    "price_lower": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 9.99,
                        "raw": "€9,99"
                    },
                    "price_upper": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 9.99,
                        "raw": "9,99€"
                    },
                    "price": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 9.99,
                        "raw": "€9,99 - 9,99€"
                    },
                    "current_category": {
                        "name": "Libros",
                        "link": "https://www.amazon.es/gp/bestsellers/books",
                        "id": "books"
                    },
                    "parent_category": {
                        "name": "Cualquier departamento",
                        "link": "https://www.amazon.es/gp/bestsellers/ref=zg_bs_unv_b_0_b_1",
                        "id": "bestsellers"
                    }
                    },
                    {
                    "rank": 48,
                    "position": 48,
                    "title": "Culpa nuestra (Culpables 3)",
                    "asin": "8413142032",
                    "link": "https://www.amazon.es/Culpa-nuestra-Culpables-Mercedes-Ron/dp/8413142032/ref=zg_bs_books_48?_encoding=UTF8&psc=1&refRID=KCRY7BS6TREZRWHMJ63F&tag=liber0e-21",
                    "variant": "Libro de bolsillo",
                    "image": "https://images-na.ssl-images-amazon.com/images/I/81555TMQm3L._AC_UL200_SR200,200_.jpg",
                    "rating": 4.7,
                    "ratings_total": 648,
                    "price_lower": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 8.5,
                        "raw": "€8,50"
                    },
                    "price_upper": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 8.5,
                        "raw": "8,50€"
                    },
                    "price": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 8.5,
                        "raw": "€8,50 - 8,50€"
                    },
                    "current_category": {
                        "name": "Libros",
                        "link": "https://www.amazon.es/gp/bestsellers/books",
                        "id": "books"
                    },
                    "parent_category": {
                        "name": "Cualquier departamento",
                        "link": "https://www.amazon.es/gp/bestsellers/ref=zg_bs_unv_b_0_b_1",
                        "id": "bestsellers"
                    }
                    },
                    {
                    "rank": 49,
                    "position": 49,
                    "title": "Cocina de resistencia: Las mejores recetas para no desperdiciar nada (Planeta Cocina)",
                    "asin": "8408239104",
                    "link": "https://www.amazon.es/Cocina-resistencia-mejores-recetas-desperdiciar/dp/8408239104/ref=zg_bs_books_49?_encoding=UTF8&psc=1&refRID=KCRY7BS6TREZRWHMJ63F&tag=liber0e-21",
                    "variant": "Tapa blanda",
                    "image": "https://images-na.ssl-images-amazon.com/images/I/91FgOAjnstL._AC_UL200_SR200,200_.jpg",
                    "rating": 4.7,
                    "ratings_total": 46,
                    "price_lower": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 20.8,
                        "raw": "€20,80"
                    },
                    "price_upper": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 20.8,
                        "raw": "20,80€"
                    },
                    "price": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 20.8,
                        "raw": "€20,80 - 20,80€"
                    },
                    "current_category": {
                        "name": "Libros",
                        "link": "https://www.amazon.es/gp/bestsellers/books",
                        "id": "books"
                    },
                    "parent_category": {
                        "name": "Cualquier departamento",
                        "link": "https://www.amazon.es/gp/bestsellers/ref=zg_bs_unv_b_0_b_1",
                        "id": "bestsellers"
                    }
                    },
                    {
                    "rank": 50,
                    "position": 50,
                    "title": "Trolardy y el pan dorado (4You2)",
                    "asin": "8427048068",
                    "link": "https://www.amazon.es/Trolardy-dorado-4You2-Trolerotutos-Hardy/dp/8427048068/ref=zg_bs_books_50?_encoding=UTF8&psc=1&refRID=KCRY7BS6TREZRWHMJ63F&tag=liber0e-21",
                    "variant": "Tapa blanda",
                    "image": "https://images-na.ssl-images-amazon.com/images/I/918ffvs51hL._AC_UL200_SR200,200_.jpg",
                    "rating": 4.8,
                    "ratings_total": 103,
                    "price_lower": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 13.2,
                        "raw": "€13,20"
                    },
                    "price_upper": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 13.2,
                        "raw": "13,20€"
                    },
                    "price": {
                        "symbol": "€",
                        "currency": "EUR",
                        "value": 13.2,
                        "raw": "€13,20 - 13,20€"
                    },
                    "current_category": {
                        "name": "Libros",
                        "link": "https://www.amazon.es/gp/bestsellers/books",
                        "id": "books"
                    },
                    "parent_category": {
                        "name": "Cualquier departamento",
                        "link": "https://www.amazon.es/gp/bestsellers/ref=zg_bs_unv_b_0_b_1",
                        "id": "bestsellers"
                    }
                    }
                ],

                "pagination": {
                    "current_page": 1,
                    "total_pages": 2
                },

                "bestsellers_info": {
                    "current_category": {
                    "name": "Libros",
                    "link": "https://www.amazon.es/gp/bestsellers/books",
                    "id": "books"
                    },
                    "parent_category": {
                    "name": "Cualquier departamento",
                    "link": "https://www.amazon.es/gp/bestsellers/ref=zg_bs_unv_b_0_b_1",
                    "id": "bestsellers"
                    },
                    "child_categories": [
                    {
                        "name": "Acción y aventura",
                        "link": "https://www.amazon.es/gp/bestsellers/books/902675031/ref=zg_bs_nav_b_1_b",
                        "id": "902675031"
                    },
                    {
                        "name": "Arte, cine y fotografía",
                        "link": "https://www.amazon.es/gp/bestsellers/books/902486031/ref=zg_bs_nav_b_1_b",
                        "id": "902486031"
                    },
                    {
                        "name": "Biografías, diarios y hechos reales",
                        "link": "https://www.amazon.es/gp/bestsellers/books/902498031/ref=zg_bs_nav_b_1_b",
                        "id": "902498031"
                    },
                    {
                        "name": "Calendarios",
                        "link": "https://www.amazon.es/gp/bestsellers/books/902502031/ref=zg_bs_nav_b_1_b",
                        "id": "902502031"
                    },
                    {
                        "name": "Ciencias, tecnología y medicina",
                        "link": "https://www.amazon.es/gp/bestsellers/books/902503031/ref=zg_bs_nav_b_1_b",
                        "id": "902503031"
                    },
                    {
                        "name": "Cocina, bebida y hospitalidad",
                        "link": "https://www.amazon.es/gp/bestsellers/books/902613031/ref=zg_bs_nav_b_1_b",
                        "id": "902613031"
                    },
                    {
                        "name": "Consulta",
                        "link": "https://www.amazon.es/gp/bestsellers/books/902517031/ref=zg_bs_nav_b_1_b",
                        "id": "902517031"
                    },
                    {
                        "name": "Cómics, manga y novelas gráficas",
                        "link": "https://www.amazon.es/gp/bestsellers/books/902516031/ref=zg_bs_nav_b_1_b",
                        "id": "902516031"
                    },
                    {
                        "name": "Deportes y aire libre",
                        "link": "https://www.amazon.es/gp/bestsellers/books/902520031/ref=zg_bs_nav_b_1_b",
                        "id": "902520031"
                    },
                    {
                        "name": "Derecho",
                        "link": "https://www.amazon.es/gp/bestsellers/books/902590031/ref=zg_bs_nav_b_1_b",
                        "id": "902590031"
                    },
                    {
                        "name": "Economía y empresa",
                        "link": "https://www.amazon.es/gp/bestsellers/books/902595031/ref=zg_bs_nav_b_1_b",
                        "id": "902595031"
                    },
                    {
                        "name": "Erótica",
                        "link": "https://www.amazon.es/gp/bestsellers/books/902681031/ref=zg_bs_nav_b_1_b",
                        "id": "902681031"
                    },
                    {
                        "name": "Fantasía, terror y ciencia ficción",
                        "link": "https://www.amazon.es/gp/bestsellers/books/1349107031/ref=zg_bs_nav_b_1_b",
                        "id": "1349107031"
                    },
                    {
                        "name": "Ficción histórica",
                        "link": "https://www.amazon.es/gp/bestsellers/books/902682031/ref=zg_bs_nav_b_1_b",
                        "id": "902682031"
                    },
                    {
                        "name": "Guías de estudio y repaso",
                        "link": "https://www.amazon.es/gp/bestsellers/books/902599031/ref=zg_bs_nav_b_1_b",
                        "id": "902599031"
                    },
                    {
                        "name": "Historia",
                        "link": "https://www.amazon.es/gp/bestsellers/books/902600031/ref=zg_bs_nav_b_1_b",
                        "id": "902600031"
                    },
                    {
                        "name": "Hogar, manualidades y estilos de vida",
                        "link": "https://www.amazon.es/gp/bestsellers/books/902610031/ref=zg_bs_nav_b_1_b",
                        "id": "902610031"
                    },
                    {
                        "name": "Humor",
                        "link": "https://www.amazon.es/gp/bestsellers/books/902620031/ref=zg_bs_nav_b_1_b",
                        "id": "902620031"
                    },
                    {
                        "name": "Infantil",
                        "link": "https://www.amazon.es/gp/bestsellers/books/902621031/ref=zg_bs_nav_b_1_b",
                        "id": "902621031"
                    },
                    {
                        "name": "Informática, internet y medios digitales",
                        "link": "https://www.amazon.es/gp/bestsellers/books/902652031/ref=zg_bs_nav_b_1_b",
                        "id": "902652031"
                    },
                    {
                        "name": "Juvenil",
                        "link": "https://www.amazon.es/gp/bestsellers/books/12942013031/ref=zg_bs_nav_b_1_b",
                        "id": "12942013031"
                    },
                    {
                        "name": "Lengua, lingüística y redacción",
                        "link": "https://www.amazon.es/gp/bestsellers/books/902665031/ref=zg_bs_nav_b_1_b",
                        "id": "902665031"
                    },
                    {
                        "name": "Libros en catalán",
                        "link": "https://www.amazon.es/gp/bestsellers/books/665405031/ref=zg_bs_nav_b_1_b",
                        "id": "665405031"
                    },
                    {
                        "name": "Libros en euskera",
                        "link": "https://www.amazon.es/gp/bestsellers/books/665407031/ref=zg_bs_nav_b_1_b",
                        "id": "665407031"
                    },
                    {
                        "name": "Libros en gallego",
                        "link": "https://www.amazon.es/gp/bestsellers/books/665406031/ref=zg_bs_nav_b_1_b",
                        "id": "665406031"
                    },
                    {
                        "name": "Libros en idiomas extranjeros",
                        "link": "https://www.amazon.es/gp/bestsellers/books/16247123031/ref=zg_bs_nav_b_1_b",
                        "id": "16247123031"
                    },
                    {
                        "name": "Libros en inglés",
                        "link": "https://www.amazon.es/gp/bestsellers/books/665418031/ref=zg_bs_nav_b_1_b",
                        "id": "665418031"
                    },
                    {
                        "name": "Libros escolares",
                        "link": "https://www.amazon.es/gp/bestsellers/books/902673031/ref=zg_bs_nav_b_1_b",
                        "id": "902673031"
                    },
                    {
                        "name": "Libros universitarios y de estudios superiores",
                        "link": "https://www.amazon.es/gp/bestsellers/books/15246790031/ref=zg_bs_nav_b_1_b",
                        "id": "15246790031"
                    },
                    {
                        "name": "Literatura y ficción",
                        "link": "https://www.amazon.es/gp/bestsellers/books/902674031/ref=zg_bs_nav_b_1_b",
                        "id": "902674031"
                    },
                    {
                        "name": "Policíaca, negra y suspense",
                        "link": "https://www.amazon.es/gp/bestsellers/books/902685031/ref=zg_bs_nav_b_1_b",
                        "id": "902685031"
                    },
                    {
                        "name": "Política",
                        "link": "https://www.amazon.es/gp/bestsellers/books/902693031/ref=zg_bs_nav_b_1_b",
                        "id": "902693031"
                    },
                    {
                        "name": "Religión",
                        "link": "https://www.amazon.es/gp/bestsellers/books/902702031/ref=zg_bs_nav_b_1_b",
                        "id": "902702031"
                    },
                    {
                        "name": "Romántica",
                        "link": "https://www.amazon.es/gp/bestsellers/books/902686031/ref=zg_bs_nav_b_1_b",
                        "id": "902686031"
                    },
                    {
                        "name": "Salud, familia y desarrollo personal",
                        "link": "https://www.amazon.es/gp/bestsellers/books/902716031/ref=zg_bs_nav_b_1_b",
                        "id": "902716031"
                    },
                    {
                        "name": "Sociedad y ciencias sociales",
                        "link": "https://www.amazon.es/gp/bestsellers/books/902721031/ref=zg_bs_nav_b_1_b",
                        "id": "902721031"
                    },
                    {
                        "name": "Viajes",
                        "link": "https://www.amazon.es/gp/bestsellers/books/902729031/ref=zg_bs_nav_b_1_b",
                        "id": "902729031"
                    }]
                },
                
                }

        const book_json = {
  "request_info": {
    "success": true,
    "credits_used": 4,
    "credits_used_this_request": 1,
    "credits_remaining": 496,
    "credits_reset_at": "2021-06-18T03:10:14.000Z"
  },
  "request_metadata": {
    "created_at": "2021-05-20T15:36:55.959Z",
    "processed_at": "2021-05-20T15:36:59.467Z",
    "total_time_taken": 3.51,
    "amazon_url": "https://www.amazon.es/dp/8418318198?th=1&psc=1&language=es_ES"
  },
  "request_parameters": {
    "type": "product",
    "amazon_domain": "amazon.es",
    "asin": "8418318198",
    "language": "es_ES",
    "output": "json",
    "associate_id": "liber0e-21"
  },
  "product": {
    "title": "League of Legends. Reinos de Runaterra (No ficción ilustrados)",
    "keywords": "Riot Games Merchandise, Inc,League of Legends. Reinos de Runaterra (No ficción ilustrados),MONTENA,8418318198,Handbooks and manuals.,League of legends (Game);Handbooks, manuals, etc.,Video games;Handbooks, manuals, etc.,YOUNG ADULT NONFICTION / Computers / Entertainment & Games,Young Adult Nonfiction/Computers - Entertainment & Games,Children’s / Teenage general interest: Sports and outdoor recreation,Sports & outdoor recreation (Children's / Teenage),Children’s,Children’s / Teenage general interest: Sports and outdoor recreation,Computers,Entertainment & Games,Handbooks and manuals.,JUVENILE,Juvenile Non-Fiction,League of legends (Game);Handbooks, manuals, etc.,Spanish Grades 7-9,Sports & outdoor recreation (Children's,Sports & outdoor recreation (Children's / Teenage),Techniques,Teenage general interest: Sports and outdoor recreation,Teenage),United States,Video games;Handbooks, manuals, etc.,YOUNG ADULT NONFICTION,YOUNG ADULT NONFICTION / Computers / Entertainment & Games,Young Adult Nonfiction/Computers - Entertainment & Games,league of legends;libro de league of legends;reinos de runeterra;librode reinos de runeterra;libros para regalar a mi novio;libros devideojuegos;guia de videojuegos;libros de fortnite;minecraft;libros deesports;para jovenes;para adolescentes;12 años;13 años;14 años;15años;en español;silla gamer;ps4;en español;en castellano;2020;libros dee-sports;libro para gamers;regalo para gamer;libros de fantasia paraniños;libros de fantasia para adolescentes;libro fantasiajuvenil;fantasy;fantasia epic",
    "keywords_list": [
      "Riot Games Merchandise",
      "League of Legends. Reinos de Runaterra (No ficción ilustrados)",
      "MONTENA",
      "8418318198",
      "Handbooks and manuals.",
      "League of legends (Game)",
      "Handbooks",
      "manuals",
      "etc.",
      "Video games",
      "Handbooks",
      "manuals",
      "etc.",
      "YOUNG ADULT NONFICTION / Computers / Entertainment & Games",
      "Young Adult Nonfiction/Computers - Entertainment & Games",
      "Children’s / Teenage general interest: Sports and outdoor recreation",
      "Sports & outdoor recreation (Children's / Teenage)",
      "Children’s",
      "Children’s / Teenage general interest: Sports and outdoor recreation",
      "Computers",
      "Entertainment & Games",
      "Handbooks and manuals.",
      "JUVENILE",
      "Juvenile Non-Fiction",
      "League of legends (Game)",
      "Handbooks",
      "manuals",
      "etc.",
      "Spanish Grades 7-9",
      "Sports & outdoor recreation (Children's",
      "Sports & outdoor recreation (Children's / Teenage)",
      "Techniques",
      "Teenage general interest: Sports and outdoor recreation",
      "Teenage)",
      "United States",
      "Video games",
      "Handbooks",
      "manuals",
      "etc.",
      "YOUNG ADULT NONFICTION",
      "YOUNG ADULT NONFICTION / Computers / Entertainment & Games",
      "Young Adult Nonfiction/Computers - Entertainment & Games",
      "league of legends",
      "libro de league of legends",
      "reinos de runeterra",
      "librode reinos de runeterra",
      "libros para regalar a mi novio",
      "libros devideojuegos",
      "guia de videojuegos",
      "libros de fortnite",
      "minecraft",
      "libros deesports",
      "para jovenes",
      "para adolescentes",
      "12 años",
      "13 años",
      "14 años",
      "15años",
      "en español",
      "silla gamer",
      "en español",
      "en castellano",
      "2020",
      "libros dee-sports",
      "libro para gamers",
      "regalo para gamer",
      "libros de fantasia paraniños",
      "libros de fantasia para adolescentes",
      "libro fantasiajuvenil",
      "fantasy",
      "fantasia epic"
    ],
    "asin": "8418318198",
    "link": "https://www.amazon.es/League-Legends-Runaterra-ficci%C3%B3n-ilustrados/dp/8418318198?tag=liber0e-21",
    "sell_on_amazon": true,
    "variants": [
      {
        "asin": "8418318198",
        "link": "https://www.amazon.es/League-Legends-Runaterra-ficci%C3%B3n-ilustrados/dp/8418318198?tag=liber0e-21",
        "is_current_product": true,
        "title": "Tapa dura",
        "price": {
          "symbol": "€",
          "currency": "EUR",
          "value": 23.7,
          "raw": "€23,70"
        }
      }
    ],
    "authors": [
      {
        "name": "Inc Riot Games Merchandise",
        "link": "https://www.amazon.es/s/ref=dp_byline_sr_book_1?ie=UTF8&field-author=Inc+Riot+Games+Merchandise&search-alias=stripbooks"
      }
    ],
    "categories": [
      {
        "name": "Libros"
      }
    ],
    "delivery_message": "Entrega GRATIS: jueves, 27 de mayo",
    "a_plus_content": {
      "has_a_plus_content": false
    },
    "sub_title": {
      "text": "de Inc Riot Games Merchandise (Autor)",
      "link": "https://www.amazon.es/gp/help/customer/display.html?nodeId=201909010&ref_=buybox-secureTransaction-learnMore-web&tag=liber0e-21"
    },
    "has_coupon": false,
    "rating": 4.7,
    "rating_breakdown": {
      "five_star": {
        "percentage": 85,
        "count": 69
      },
      "four_star": {
        "percentage": 7,
        "count": 5
      },
      "three_star": {
        "percentage": 3,
        "count": 2
      },
      "two_star": {
        "percentage": 2,
        "count": 1
      },
      "one_star": {
        "percentage": 3,
        "count": 2
      }
    },
    "ratings_total": 82,
    "book_description": "Descubre todos los misterios, trucos y secretos con el libro oficial de League of Legends. Embárcate en un viaje a través de los Reinos de Runeterra en este recopilatorio único de League of Legends, uno de los videojuegos más populares del mundo. Dentro encontrarás: -Una expedición a través de las once regiones, crónica de los conflictos, las rivalidades más arraigadas y las alianzas encubiertas. -Cientos de ilustraciones, incluyendo mapas inéditos. -Todos los detalles sobre los héroes, flora, fauna, arquitectura, política y tecnologías de todos los rincones del universo. -Originales tramas y narrativas que convierten las culturas de Runeterra en realidad. Este es el volumen esencial de referencia para cualquier fan y gamer. Leer más Leer menos",
    "main_image": {
      "link": "https://images-na.ssl-images-amazon.com/images/I/41u4lT3aASL.jpg"
    },
    "attributes": [
      {
        "name": "variant",
        "value": "Tapa dura"
      }
    ],
    "buybox_winner": {
      "offer_id": "5ZutQHxw2Lx5pwahwHkpyiyIIbYsGu88yl28QO+V26j25lIjs2hIXSd3DUAkiooPhNElysRQWkadWbEduiIgRngDMi1iLallbE9cO6Ev+xIFm4GxxxVEJtqQN3myC9pfkawKGcNzyaxb953mq4mXvQ==",
      "new_offers_count": 12,
      "new_offers_from": {
        "value": 2249,
        "currency": "EUR",
        "raw": "2249"
      },
      "used_offers_count": 9,
      "used_offers_from": {
        "value": 1514,
        "currency": "EUR",
        "raw": "1514"
      },
      "is_prime": true,
      "is_amazon_fresh": false,
      "condition": {
        "is_new": true
      },
      "availability": {
        "type": "in_stock",
        "raw": "En stock.",
        "dispatch_days": 1
      },
      "fulfillment": {
        "type": "1p",
        "is_sold_by_amazon": true,
        "is_fulfilled_by_amazon": true,
        "is_fulfilled_by_third_party": false,
        "is_sold_by_third_party": false
      },
      "price": {
        "currency": "EUR",
        "value": 23.7,
        "raw": "EUR 23,70"
      }
    },
    "more_buying_choices": [
      {
        "price": {
          "symbol": "€",
          "currency": "EUR",
          "value": 24.95,
          "raw": "€24,95"
        },
        "seller_name": "Agapea Libros Urgentes",
        "seller_link": "https://www.amazon.es/gp/product/du/mbc-seller-information.html/ref=dp_mbc_info_0?c=new&a=8418318198&me=A1ODG9SE0K7SKL&brand=Montena&productGroupID=book_display_on_website&isUDP=1&isAGS=0&uniqueMerchantOfferKey=bmV3JHxBMU9ERzlTRTBLN1NLTCR8MTk2OTMxMTQkfEExT0RHOVNFMEs3U0tMJHxwdXJjaGFzYWJsZSR8QUxM",
        "position": 1
      },
      {
        "price": {
          "symbol": "€",
          "currency": "EUR",
          "value": 23.7,
          "raw": "€23,70"
        },
        "seller_name": "Imosver",
        "seller_link": "https://www.amazon.es/gp/product/du/mbc-seller-information.html/ref=dp_mbc_info_1?c=new&a=8418318198&me=A3T8NGZYWN6HYL&brand=Montena&productGroupID=book_display_on_website&isUDP=1&isAGS=0&uniqueMerchantOfferKey=bmV3JHxBM1Q4TkdaWVdONkhZTCR8MDAxMDI4MTU1NSR8QTNUOE5HWllXTjZIWUwkfHB1cmNoYXNhYmxlJHxBTEw=",
        "position": 2
      },
      {
        "price": {
          "symbol": "€",
          "currency": "EUR",
          "value": 23.7,
          "raw": "€23,70"
        },
        "seller_name": "Nobel Booksellers",
        "seller_link": "https://www.amazon.es/gp/product/du/mbc-seller-information.html/ref=dp_mbc_info_2?c=new&a=8418318198&me=A1ATYXWNE9V4C0&brand=Montena&productGroupID=book_display_on_website&isUDP=1&isAGS=0&uniqueMerchantOfferKey=bmV3JHxBMUFUWVhXTkU5VjRDMCR8OTc4ODQxODMxODE5MSR8QTFBVFlYV05FOVY0QzAkfHB1cmNoYXNhYmxlJHxBTEw=",
        "position": 3
      }
    ],
    "specifications": [
      {
        "name": "Editorial",
        "value": "MONTENA; 001 edición (8 octubre 2020)"
      },
      {
        "name": "Idioma",
        "value": "Español"
      },
      {
        "name": "Tapa dura",
        "value": "264 páginas"
      },
      {
        "name": "ISBN-10",
        "value": "8418318198"
      },
      {
        "name": "ISBN-13",
        "value": "978-8418318191"
      },
      {
        "name": "Edad de lectura",
        "value": "12 - 17 años"
      },
      {
        "name": "Peso del producto",
        "value": "816 g"
      },
      {
        "name": "Dimensiones",
        "value": "18.29 x 2.54 x 24.38 cm"
      },
      {
        "name": "Clasificación en los más vendidos de Amazon",
        "value": "Ver el Top 100 en Libros"
      }
    ],
    "specifications_flat": "Clasificación en los más vendidos de Amazon: Ver el Top 100 en Libros. Dimensiones: 18.29 x 2.54 x 24.38 cm. Peso del producto: 816 g. Edad de lectura: 12 - 17 años. ISBN-13: 978-8418318191. ISBN-10: 8418318198. Tapa dura: 264 páginas. Idioma: Español. Editorial: MONTENA; 001 edición (8 octubre 2020).",
    "bestsellers_rank": [
      {
        "category": "Libros",
        "rank": 6714,
        "link": "https://www.amazon.es/gp/bestsellers/books/ref=pd_zg_ts_books?tag=liber0e-21"
      },
      {
        "category": "Libros sobre deportes y aire libre para jóvenes",
        "rank": 2,
        "link": "https://www.amazon.es/gp/bestsellers/books/12942405031/ref=pd_zg_hrsr_books?tag=liber0e-21"
      },
      {
        "category": "Libros sobre ordenadores para jóvenes",
        "rank": 3,
        "link": "https://www.amazon.es/gp/bestsellers/books/12942111031/ref=pd_zg_hrsr_books?tag=liber0e-21"
      },
      {
        "category": "Guías de videojuegos para videoconsola y ordenador para jóvenes",
        "rank": 7,
        "link": "https://www.amazon.es/gp/bestsellers/books/12942175031/ref=pd_zg_hrsr_books?tag=liber0e-21"
      }
    ],
    "isbn_10": "8418318198",
    "isbn_13": "978-8418318191"
  },
  "frequently_bought_together": {
    "total_price": {
      "symbol": "€",
      "currency": "EUR",
      "value": 57.9,
      "raw": "57,90 €"
    },
    "products": [
      {
        "asin": "8413340810",
        "title": "League of Legends. Ashe. Comandante (MARVEL)",
        "link": "https://www.amazon.es/League-Legends-Ashe-Comandante-Shafer/dp/8413340810/ref=pd_bxgy_img_2/259-0741569-9361331?_encoding=UTF8&pd_rd_i=8413340810&pd_rd_r=0e060c90-c3b7-476f-995f-3fa93b68ce32&pd_rd_w=CBDrO&pd_rd_wg=hmRCo&pf_rd_p=1e5224b7-4b05-43dc-b9bd-5f16e5a29bac&pf_rd_r=HCXEHRG0H86421DDZRNN&psc=1&refRID=HCXEHRG0H86421DDZRNN&tag=liber0e-21",
        "price": {
          "symbol": "€",
          "currency": "EUR",
          "value": 17.1,
          "raw": "17,10 €"
        }
      },
      {
        "asin": "8413342201",
        "title": "League of Legends. Lux (PRODUCTO ESPECIAL)",
        "link": "https://www.amazon.es/League-Legends-John-OBryan-Billy/dp/8413342201/ref=pd_bxgy_img_3/259-0741569-9361331?_encoding=UTF8&pd_rd_i=8413342201&pd_rd_r=0e060c90-c3b7-476f-995f-3fa93b68ce32&pd_rd_w=CBDrO&pd_rd_wg=hmRCo&pf_rd_p=1e5224b7-4b05-43dc-b9bd-5f16e5a29bac&pf_rd_r=HCXEHRG0H86421DDZRNN&psc=1&refRID=HCXEHRG0H86421DDZRNN&tag=liber0e-21",
        "price": {
          "symbol": "€",
          "currency": "EUR",
          "value": 17.1,
          "raw": "17,10 €"
        }
      }
    ]
  },
  "sponsored_products": [
    {
      "title": "Introducción a la Mentalidad en League of Legends: Cambia tu actitud y sube de División (Guía No Oficial) (Mentalidad en LoL nº 1)",
      "asin": "B088DK4GX2",
      "link": "https://www.amazon.es/gp/slredirect/picassoRedirect.html/ref=sspa_dk_detail_0?ie=UTF8&adId=A02774462VTI10UN0TLV2&qualifier=1621525017&id=6646833288209711&widgetName=sp_detail&url=%2Fdp%2FB088DK4GX2%2Fref%3Dsspa_dk_detail_0%3Fpsc%3D1%26pd_rd_i%3DB088DK4GX2p13NParams&tag=liber0e-21",
      "image": "https://m.media-amazon.com/images/I/41AR-JH8qeL._BG0,0,0,0_FMpng_AC_SY160_SX160_.jpg",
      "rating": 5,
      "ratings_total": 1,
      "is_prime": false,
      "price": {
        "symbol": "€",
        "currency": "EUR",
        "value": 0,
        "raw": "€0,00"
      }
    },
    {
      "title": "La mentalidad en League of Legends: actitud y gestión emocional para convertirse en ganador (Guía no oficial) (Mentalidad en LoL nº 2)",
      "asin": "B082H4662V",
      "link": "https://www.amazon.es/gp/slredirect/picassoRedirect.html/ref=sspa_dk_detail_1?ie=UTF8&adId=A02772901H6K0ZMDRJXD6&qualifier=1621525017&id=6646833288209711&widgetName=sp_detail&url=%2Fdp%2FB082H4662V%2Fref%3Dsspa_dk_detail_1%3Fpsc%3D1%26pd_rd_i%3DB082H4662Vp13NParams&tag=liber0e-21",
      "image": "https://m.media-amazon.com/images/I/41dWgBpGF7L._BG0,0,0,0_FMpng_AC_SY160_SX160_.jpg",
      "rating": 4.5,
      "ratings_total": 24,
      "is_prime": false,
      "price": {
        "symbol": "€",
        "currency": "EUR",
        "value": 4.95,
        "raw": "€4,95"
      }
    },
    {
      "title": "League Of Legends - Re-program Your Brain To Succeed: How The Correct Mindset, Mentality, And Attitude Are The Keys To Unlock Your Potential: 1 (League of Legends Guide)",
      "asin": "1708171967",
      "link": "https://www.amazon.es/gp/slredirect/picassoRedirect.html/ref=sspa_dk_detail_2?ie=UTF8&adId=A0119817OVX86W3GE2GX&qualifier=1621525017&id=6646833288209711&widgetName=sp_detail&url=%2Fdp%2F1708171967%2Fref%3Dsspa_dk_detail_2%3Fpsc%3D1%26pd_rd_i%3D1708171967p13NParams&tag=liber0e-21",
      "image": "https://m.media-amazon.com/images/I/41IWiP2NeML._BG0,0,0,0_FMpng_AC_SY160_SX160_.jpg",
      "rating": 4.5,
      "ratings_total": 58,
      "is_prime": true,
      "price": {
        "symbol": "€",
        "currency": "EUR",
        "value": 14.99,
        "raw": "€14,99"
      }
    },
    {
      "title": "League Of Legends - The Secret Blueprint To High Elo: With This Simple Step-by-Step Process, You Will Climb The Ranked Ladder With Ease",
      "asin": "B08MSNHWW9",
      "link": "https://www.amazon.es/gp/slredirect/picassoRedirect.html/ref=sspa_dk_detail_3?ie=UTF8&adId=A05179793H5RQ55RNEV2M&qualifier=1621525017&id=6646833288209711&widgetName=sp_detail&url=%2Fdp%2FB08MSNHWW9%2Fref%3Dsspa_dk_detail_3%3Fpsc%3D1%26pd_rd_i%3DB08MSNHWW9p13NParams&tag=liber0e-21",
      "image": "https://m.media-amazon.com/images/I/51L4yZg8drL._BG0,0,0,0_FMpng_AC_SY160_SX160_.jpg",
      "rating": 4,
      "ratings_total": 17,
      "is_prime": true,
      "price": {
        "symbol": "€",
        "currency": "EUR",
        "value": 14.99,
        "raw": "€14,99"
      }
    },
    {
      "title": "Rompecabezas y Pasatiempos para Niños: Juegos educativos, Encuentra las diferencias, Sopa de letras, Encuentra el intruso, Desafío laberintos y unir los puntos.",
      "asin": "B085KQ2MZ4",
      "link": "https://www.amazon.es/gp/slredirect/picassoRedirect.html/ref=sspa_dk_detail_4?ie=UTF8&adId=A0405584Y4W6VQUOTYA4&qualifier=1621525017&id=6646833288209711&widgetName=sp_detail&url=%2Fdp%2FB085KQ2MZ4%2Fref%3Dsspa_dk_detail_4%3Fpsc%3D1%26pd_rd_i%3DB085KQ2MZ4p13NParams&tag=liber0e-21",
      "image": "https://m.media-amazon.com/images/I/5134rnVLPOL._BG0,0,0,0_FMpng_AC_SY160_SX160_.jpg",
      "rating": 4,
      "ratings_total": 26,
      "is_prime": true,
      "price": {
        "symbol": "€",
        "currency": "EUR",
        "value": 6.99,
        "raw": "€6,99"
      }
    },
    {
      "title": "Oscura Dinastía (Oferta Especial 3 Libros En 1) Colección Especial De Vampiros En Español: Libros de Novelas de Vampiros. Las mejores historias de Suspenso, Romance y Fantasía Paranormal",
      "asin": "B084Z42CV8",
      "link": "https://www.amazon.es/gp/slredirect/picassoRedirect.html/ref=sspa_dk_detail_5?ie=UTF8&adId=A00817517O80WFIDDL6J&qualifier=1621525017&id=6646833288209711&widgetName=sp_detail&url=%2Fdp%2FB084Z42CV8%2Fref%3Dsspa_dk_detail_5%3Fpsc%3D1%26pd_rd_i%3DB084Z42CV8p13NParams&tag=liber0e-21",
      "image": "https://m.media-amazon.com/images/I/4160iI6CTgL._BG0,0,0,0_FMpng_AC_SY160_SX160_.jpg",
      "rating": 5,
      "ratings_total": 1,
      "is_prime": true,
      "price": {
        "symbol": "€",
        "currency": "EUR",
        "value": 12.47,
        "raw": "€12,47"
      }
    },
    {
      "title": "Caligrafía y lettering creativa: Una guía para principiantes con instrucciones, ejercicios, páginas de práctica y más!",
      "asin": "1678697532",
      "link": "https://www.amazon.es/gp/slredirect/picassoRedirect.html/ref=sspa_dk_detail_6?ie=UTF8&adId=A0917946PUO3PQBKC14I&qualifier=1621525017&id=6646833288209711&widgetName=sp_detail&url=%2Fdp%2F1678697532%2Fref%3Dsspa_dk_detail_6%3Fpsc%3D1%26pd_rd_i%3D1678697532p13NParams&tag=liber0e-21",
      "image": "https://m.media-amazon.com/images/I/41SfpPMp9CL._BG0,0,0,0_FMpng_AC_SY160_SX160_.jpg",
      "rating": 4,
      "ratings_total": 56,
      "is_prime": true,
      "price": {
        "symbol": "€",
        "currency": "EUR",
        "value": 7.95,
        "raw": "€7,95"
      }
    },
    {
      "title": "La puerta de Abadón (The Expanse 3)",
      "asin": "8417347208",
      "link": "https://www.amazon.es/gp/slredirect/picassoRedirect.html/ref=sspa_dk_detail_7?ie=UTF8&adId=A00778472QO845TET936K&qualifier=1621525017&id=6646833288209711&widgetName=sp_detail&url=%2Fdp%2F8417347208%2Fref%3Dsspa_dk_detail_7%3Fpsc%3D1%26pd_rd_i%3D8417347208p13NParams&tag=liber0e-21",
      "image": "https://m.media-amazon.com/images/I/519qqD2rVQL._BG0,0,0,0_FMpng_AC_SY160_SX160_.jpg",
      "rating": 4.5,
      "ratings_total": 124,
      "is_prime": true,
      "price": {
        "symbol": "€",
        "currency": "EUR",
        "value": 20.8,
        "raw": "€20,80"
      }
    },
    {
      "title": "La Furia y El Poder De Las Sombras. Colección Especial De Vampiros En Español (3 En 1): Libros de Novelas de Vampiros. Las mejores historias de Suspense, Romance y Fantasía Paranormal",
      "asin": "1658892798",
      "link": "https://www.amazon.es/gp/slredirect/picassoRedirect.html/ref=sspa_dk_detail_8?ie=UTF8&adId=A04594491W1TF8H4F13LI&qualifier=1621525017&id=6646833288209711&widgetName=sp_detail&url=%2Fdp%2F1658892798%2Fref%3Dsspa_dk_detail_8%3Fpsc%3D1%26pd_rd_i%3D1658892798p13NParams&tag=liber0e-21",
      "image": "https://m.media-amazon.com/images/I/51+OHyc5NCL._BG0,0,0,0_FMpng_AC_SY160_SX160_.jpg",
      "rating": 3.5,
      "ratings_total": 5,
      "is_prime": true,
      "price": {
        "symbol": "€",
        "currency": "EUR",
        "value": 18.71,
        "raw": "€18,71"
      }
    },
    {
      "title": "Retrato de mim: Roubaram a minha infancia",
      "asin": "B08C961BVB",
      "link": "https://www.amazon.es/gp/slredirect/picassoRedirect.html/ref=sspa_dk_detail_9?ie=UTF8&adId=A0804781259FQ38S4R3M3&qualifier=1621525017&id=6646833288209711&widgetName=sp_detail&url=%2Fdp%2FB08C961BVB%2Fref%3Dsspa_dk_detail_9%3Fpsc%3D1%26pd_rd_i%3DB08C961BVBp13NParams&tag=liber0e-21",
      "image": "https://m.media-amazon.com/images/I/51f8Uxjkc2L._BG0,0,0,0_FMpng_AC_SY160_SX160_.jpg",
      "rating": 5,
      "ratings_total": 1,
      "is_prime": true,
      "price": {
        "symbol": "€",
        "currency": "EUR",
        "value": 13.31,
        "raw": "€13,31"
      }
    },
    {
      "title": "League Of Legends - Re-program Your Brain To Succeed: How The Correct Mindset, Mentality, And Attitude Are The Keys To Unlock Your Potential: 1 (League of Legends Guide)",
      "asin": "1708171967",
      "link": "https://www.amazon.es/gp/slredirect/picassoRedirect.html/ref=sspa_dk_detail_0?ie=UTF8&adId=A0119817OVX86W3GE2GX&qualifier=1621525017&id=1503378899377329&widgetName=sp_detail2&url=%2Fdp%2F1708171967%2Fref%3Dsspa_dk_detail_0%3Fpsc%3D1%26pd_rd_i%3D1708171967p13NParams&tag=liber0e-21",
      "image": "https://m.media-amazon.com/images/I/41IWiP2NeML._BG0,0,0,0_FMpng_AC_SY160_SX160_.jpg",
      "rating": 4.5,
      "ratings_total": 58,
      "is_prime": true,
      "price": {
        "symbol": "€",
        "currency": "EUR",
        "value": 14.99,
        "raw": "€14,99"
      }
    },
    {
      "title": "League Of Legends - The Secret Blueprint To High Elo: With This Simple Step-by-Step Process, You Will Climb The Ranked Ladder With Ease",
      "asin": "B08MSNHWW9",
      "link": "https://www.amazon.es/gp/slredirect/picassoRedirect.html/ref=sspa_dk_detail_1?ie=UTF8&adId=A05179793H5RQ55RNEV2M&qualifier=1621525017&id=1503378899377329&widgetName=sp_detail2&url=%2Fdp%2FB08MSNHWW9%2Fref%3Dsspa_dk_detail_1%3Fpsc%3D1%26pd_rd_i%3DB08MSNHWW9p13NParams&tag=liber0e-21",
      "image": "https://m.media-amazon.com/images/I/51L4yZg8drL._BG0,0,0,0_FMpng_AC_SY160_SX160_.jpg",
      "rating": 4,
      "ratings_total": 17,
      "is_prime": true,
      "price": {
        "symbol": "€",
        "currency": "EUR",
        "value": 14.99,
        "raw": "€14,99"
      }
    },
    {
      "title": "Retrato de mim: Roubaram a minha infancia",
      "asin": "B08C961BVB",
      "link": "https://www.amazon.es/gp/slredirect/picassoRedirect.html/ref=sspa_dk_detail_2?ie=UTF8&adId=A0804781259FQ38S4R3M3&qualifier=1621525017&id=1503378899377329&widgetName=sp_detail2&url=%2Fdp%2FB08C961BVB%2Fref%3Dsspa_dk_detail_2%3Fpsc%3D1%26pd_rd_i%3DB08C961BVBp13NParams&tag=liber0e-21",
      "image": "https://m.media-amazon.com/images/I/51f8Uxjkc2L._BG0,0,0,0_FMpng_AC_SY160_SX160_.jpg",
      "rating": 5,
      "ratings_total": 1,
      "is_prime": true,
      "price": {
        "symbol": "€",
        "currency": "EUR",
        "value": 13.31,
        "raw": "€13,31"
      }
    },
    {
      "title": "BLOODY ALPHABET: The Scariest Serial Killers Coloring Book. A True Crime Adult Gift - Full of Famous Murderers. For Adults Only.: 2 (True Crime Gifts)",
      "asin": "170201939X",
      "link": "https://www.amazon.es/gp/slredirect/picassoRedirect.html/ref=sspa_dk_detail_3?ie=UTF8&adId=A072820912B83QCQPRPY4&qualifier=1621525017&id=1503378899377329&widgetName=sp_detail2&url=%2Fdp%2F170201939X%2Fref%3Dsspa_dk_detail_3%3Fpsc%3D1%26pd_rd_i%3D170201939Xp13NParams&tag=liber0e-21",
      "image": "https://m.media-amazon.com/images/I/61pThDaQObL._BG0,0,0,0_FMpng_AC_SY160_SX160_.jpg",
      "rating": 4.5,
      "is_prime": true,
      "price": {
        "symbol": "€",
        "currency": "EUR",
        "value": 8.31,
        "raw": "€8,31"
      }
    },
    {
      "title": "El camino de los reyes (El Archivo de las Tormentas 1)",
      "asin": "8466657665",
      "link": "https://www.amazon.es/gp/slredirect/picassoRedirect.html/ref=sspa_dk_detail_4?ie=UTF8&adId=A00788638GZIL6I0S5RW&qualifier=1621525017&id=1503378899377329&widgetName=sp_detail2&url=%2Fdp%2F8466657665%2Fref%3Dsspa_dk_detail_4%3Fpsc%3D1%26pd_rd_i%3D8466657665p13NParams&tag=liber0e-21",
      "image": "https://m.media-amazon.com/images/I/518ggd0zZCL._BG0,0,0,0_FMpng_AC_SY160_SX160_.jpg",
      "rating": 4.5,
      "is_prime": true,
      "price": {
        "symbol": "€",
        "currency": "EUR",
        "value": 33.15,
        "raw": "€33,15"
      }
    },
    {
      "title": "La mentalidad en League of Legends: actitud y gestión emocional para convertirse en ganador (Guía no oficial) (Mentalidad en LoL nº 2)",
      "asin": "B082H4662V",
      "link": "https://www.amazon.es/gp/slredirect/picassoRedirect.html/ref=sspa_dk_detail_5?ie=UTF8&adId=A02772901H6K0ZMDRJXD6&qualifier=1621525017&id=1503378899377329&widgetName=sp_detail2&url=%2Fdp%2FB082H4662V%2Fref%3Dsspa_dk_detail_5%3Fpsc%3D1%26pd_rd_i%3DB082H4662Vp13NParams&tag=liber0e-21",
      "image": "https://m.media-amazon.com/images/I/41dWgBpGF7L._BG0,0,0,0_FMpng_AC_SY160_SX160_.jpg",
      "rating": 4.5,
      "ratings_total": 24,
      "is_prime": false,
      "price": {
        "symbol": "€",
        "currency": "EUR",
        "value": 4.95,
        "raw": "€4,95"
      }
    },
    {
      "title": "Estelar (Escuadrón 2)",
      "asin": "8417347747",
      "link": "https://www.amazon.es/gp/slredirect/picassoRedirect.html/ref=sspa_dk_detail_6?ie=UTF8&adId=A00780032YFPYMGYI2H66&qualifier=1621525017&id=1503378899377329&widgetName=sp_detail2&url=%2Fdp%2F8417347747%2Fref%3Dsspa_dk_detail_6%3Fpsc%3D1%26pd_rd_i%3D8417347747p13NParams&tag=liber0e-21",
      "image": "https://m.media-amazon.com/images/I/41ahELLyf1L._BG0,0,0,0_FMpng_AC_SY160_SX160_.jpg",
      "rating": 4.5,
      "ratings_total": 325,
      "is_prime": true,
      "price": {
        "symbol": "€",
        "currency": "EUR",
        "value": 18.9,
        "raw": "€18,90"
      }
    },
    {
      "title": "Introducción a la Mentalidad en League of Legends: Cambia tu actitud y sube de División (Guía No Oficial) (Mentalidad en LoL nº 1)",
      "asin": "B088DK4GX2",
      "link": "https://www.amazon.es/gp/slredirect/picassoRedirect.html/ref=sspa_dk_detail_7?ie=UTF8&adId=A02774462VTI10UN0TLV2&qualifier=1621525017&id=1503378899377329&widgetName=sp_detail2&url=%2Fdp%2FB088DK4GX2%2Fref%3Dsspa_dk_detail_7%3Fpsc%3D1%26pd_rd_i%3DB088DK4GX2p13NParams&tag=liber0e-21",
      "image": "https://m.media-amazon.com/images/I/41AR-JH8qeL._BG0,0,0,0_FMpng_AC_SY160_SX160_.jpg",
      "rating": 5,
      "ratings_total": 1,
      "is_prime": false,
      "price": {
        "symbol": "€",
        "currency": "EUR",
        "value": 0,
        "raw": "€0,00"
      }
    },
    {
      "title": "El Héroe de las Eras (Nacidos de la bruma [Mistborn] 3)",
      "asin": "8498727952",
      "link": "https://www.amazon.es/gp/slredirect/picassoRedirect.html/ref=sspa_dk_detail_8?ie=UTF8&adId=A00786831XQB41SQ43LJZ&qualifier=1621525017&id=1503378899377329&widgetName=sp_detail2&url=%2Fdp%2F8498727952%2Fref%3Dsspa_dk_detail_8%3Fpsc%3D1%26pd_rd_i%3D8498727952p13NParams&tag=liber0e-21",
      "image": "https://m.media-amazon.com/images/I/51esLV8OYyL._BG0,0,0,0_FMpng_AC_SY160_SX160_.jpg",
      "rating": 4.5,
      "ratings_total": 772,
      "is_prime": true,
      "price": {
        "symbol": "€",
        "currency": "EUR",
        "value": 12.3,
        "raw": "€12,30"
      }
    },
    {
      "title": "LA ÚLTIMA CRIPTA: La novela Nº1 en Amazon España (Las aventuras de Ulises Vidal)",
      "asin": "B07CNMTJ6Z",
      "link": "https://www.amazon.es/gp/slredirect/picassoRedirect.html/ref=sspa_dk_detail_9?ie=UTF8&adId=A07715707QJILPNFL6CM&qualifier=1621525017&id=1503378899377329&widgetName=sp_detail2&url=%2Fdp%2FB07CNMTJ6Z%2Fref%3Dsspa_dk_detail_9%3Fpsc%3D1%26pd_rd_i%3DB07CNMTJ6Zp13NParams&tag=liber0e-21",
      "image": "https://m.media-amazon.com/images/I/51ryA9Ad4GS._BG0,0,0,0_FMpng_AC_SY160_SX160_.jpg",
      "rating": 4,
      "is_prime": false,
      "price": {
        "symbol": "€",
        "currency": "EUR",
        "value": 4.99,
        "raw": "€4,99"
      }
    }
  ]
}

        // console.log(json.bestsellers);
        //CAMBIAR bestsellers POR search_result PARA EL BUSCADOR
        json.bestsellers.forEach(book => {
            // console.log((book.title).toLowerCase())
            // console.log(book.image)
            // console.log(book.link)
            // console.log(book.asin)
         
            const bookData = {
                title: book.title,
                title_search: (book.title).toLowerCase(),
                cover: book.image,
                asin: book.asin,
                link: book.link,
            }
            /*axios.post('/api/newBook', bookData).then((response)=>{
                console.log(response.data);
            })*/
        });

        /*****ZONA DEL BOOK_JSON*****/
        let book = book_json.product
         console.log((book.title).toLowerCase())
         console.log(book.main_image.link)
         console.log(book.link)
         console.log(book.asin)
         console.log(book.authors[0].name)
         console.log(book.book_description)
         
        const bookData = {
            title: book.title,
            title_search: (book.title).toLowerCase(),
            cover: book.main_image.link,
            asin: book.asin,
            link: book.link,
            author: book.authors[0].name,
            sinopsis: book.book_description
        }
            axios.post('/api/newBook', bookData).then((response)=>{
                console.log(response.data);
            })

    },
    methods: {
        test(){
 
            
        }
    }
}






</script>

<style>
    #Content{
        min-height: calc(100vh - 4em - 4em);
    }

    #contentbg{
        background: rgb(0,106,255);
        background: linear-gradient(340deg, rgba(0,106,255,1) 0%, rgba(94,161,255,1) 16%, rgba(116,174,255,1) 17%, rgba(150,195,255,1) 33%, rgba(150,195,255,1) 33%, rgba(164,203,255,1) 34%, rgba(213,231,255,1) 47%, rgba(219,234,255,1) 47%, rgba(235,243,255,1) 55%, rgba(236,243,255,1) 55%, rgba(244,248,254,1) 78%, rgba(255,255,255,1) 100%);
    }
    ::-webkit-scrollbar {
        width: 8px;
        background: rgba(255, 255, 255, 0);

    }
    ::-webkit-scrollbar-track{
        background: rgba(255, 255, 255, 0);
    }
    ::-webkit-scrollbar-thumb {
        border-radius: 10px;
        background: rgba(0, 99, 237, 0.301);
    }
</style>
