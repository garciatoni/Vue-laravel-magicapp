<template>
    <div class="container mx-auto">
        <div class="h-10 w-full place-items-center lg:flex flex-row hidden" id="breadcrumbs">
            <router-link class="px-1 focus:text-blue-500 focus:outline-none flex align-middle" :to="{ name: 'home' }">Página Principal</router-link>
            <i class="fas fa-caret-right fa-2x m-4" alt="Flecha" />
            <p>Género</p>
            <i class="fas fa-caret-right fa-2x m-4" alt="Flecha" />
            <p>Terror</p>
        </div>

        <div class="flex flex-col sm:flex-row py-7 sm:space-x-5 divide-x divide-blue-500"> 
            <div class="px-3 sm:px-0 text-lg sm:w-1/2 text-justify">
                <div>
                    <h1 class="text-4xl pb-7">Terror</h1>
                </div>
                <div class="space-y-1">
                    <p>La literatura de terror es un género de ficción literario que pretende o tiene la capacidad de asustar, causar miedo o aterrorizar sus lectores o espectadores e inducir sentimientos de horror y terror, creando una atmósfera misteriosa y aterradora.
                    </p>    
                    <p>El historiador literario J. A. Cuddon ha definido la historia de terror como «una ficción en prosa de longitud variable que sacude o también asusta el lector, o tal vez induce una sensación de repulsión o aversión».
                    El horror puede ser sobrenatural o no sobrenatural. A menudo, la amenaza central de una obra de ficción de terror puede interpretarse como una metáfora de los grandes temores de una sociedad.</p>            
                </div>
                <div>
                    <h2 class="text-3xl py-7">Orígen</h2>
                </div>
                <div class="space-y-1">
                    <p>El género del horror tiene orígenes antiguos con raíces en el folclore y las tradiciones religiosas, centrándose en la muerte, la vida futura, el mal, lo demoníaco y el principio de la encarnación en la persona. Estas se manifestaron en historias de seres como brujas, vampiros, hombre lobo y fantasmas.
                    </p>
                    <p>
                        La primera obra considerada como género de terror es Frankestein, de Mary Shelley, la cual todos conocemos.
                    </p>
                    <p>
                        Desde que existe el ser humano existe el miedo, uno de los sentimientos más fuertes, y por tanto el horror y el terror. De acuerdo con H. P. Lovecraft: «El miedo es una de las emociones más antiguas y poderosas de la humanidad, y el miedo más antiguo y poderoso es el temor a lo desconocido». En su libro "El horror sobrenatural en la literatura", Lovecraft explica que lo desconocido era para nuestros antepasados una gran amenaza, ya que fenómenos como los climáticos, los cuales no entendían, les podían ocasionar grandes desgracias.
                    </p>
                </div>
            </div>

            <div class="sm:w-1/2 px-3 pt-7 sm:pt-0">
                <div class="space-y-2">
                    <div>
                        <h2 class="text-4xl pb-7">Obras y Autores más famosos</h2>
                    </div>
                    <div class="bg-white bg-opacity-25 border border-blue-400 flex flex-col sm:flex-row items-center sm:items-start text-center">
                        <div class="p-2 sm:3/12">
                            <img class="w-36" src="https://images-na.ssl-images-amazon.com/images/I/81BnDHnF30L.jpg" alt="LibroPortada" @click="BookInformation(20)" >
                        </div>
                        <div class="p-2 sm:w-9/12 flex flex-col items-center justify-center space-y-2">
                            <a class="text-2xl focus:text-blue-500 focus:outline-none" target="_blanck" href="https://amzn.to/2ROrrRZ">Drácula</a>
                            <a class="text-lg hover:text-red-800 focus:text-blue-500 focus:outline-none" target="_blanck" href="https://www.amazon.es/Bram-Stoker/e/B000AQ3N1C?ref_=dbs_p_pbk_r00_abau_000000">(Bram Stoker)</a>  
                            <p class="text-justify flex items-center justify-center">
                                Drácula es una novela publicada en 1897 por el irlandés Bram Stoker, a raíz de la cual, su personaje antagonista, el conde Drácula, se volvió el arquetipo de vampiro occidental por antonomasia, llegando a ser considerado el vampiro más famoso.
                            </p>
                        </div>
                    </div>

                    <div class="bg-white bg-opacity-25 border border-blue-400 flex flex-col sm:flex-row items-center sm:items-start text-center">
                        <div class="p-2 sm:3/12">
                            <img class="w-36" src="https://images-na.ssl-images-amazon.com/images/I/51CvHSxXmnL._SX327_BO1,204,203,200_.jpg" alt="LibroPortada" @click="BookInformation(26)" >
                        </div>
                        <div class="p-2 sm:w-9/12 flex flex-col items-center justify-center space-y-2">
                            <a class="text-2xl focus:text-blue-500 focus:outline-none" target="_blanck" href="https://amzn.to/3tKCtVB">El Resplandor</a>
                            <a class="text-lg hover:text-red-800 focus:text-blue-500 focus:outline-none" target="_blanck" href="https://www.amazon.es/Stephen-King/e/B000AQ0842?ref_=dbs_p_ebk_r00_abau_000000">(Stephen King)</a>  
                            <p class="text-justify flex items-center justify-center">
                                Danny tenía cinco años, y a esa edad poco niños saben que los espejos invierten las imágenes y menos aún saben diferenciar entre realidad y fantasía. Pero Danny tenía pruebas de que sus fantasías relacionadas con el resplandor del espejo acabarían cumpliéndose: REDRUM... MURDER, asesinato.
                            </p>
                        </div>
                    </div>
                    <div class="bg-white bg-opacity-25 border border-blue-400 flex flex-col sm:flex-row items-center sm:items-start text-center">
                        <div class="p-2 sm:3/12">
                            <img class="w-36" src="https://images-na.ssl-images-amazon.com/images/I/710ZXn+Up2L.jpg" alt="LibroPortada" @click="BookInformation(6)" >
                        </div>
                        <div class="p-2 sm:w-9/12 flex flex-col items-center justify-center space-y-2">
                            <a class="text-2xl focus:text-blue-500 focus:outline-none" target="_blanck" href="https://amzn.to/3eJdduN">La Llamada de Cthulhu</a>
                            <a class="text-lg hover:text-red-800 focus:text-blue-500 focus:outline-none" target="_blanck" href="https://www.amazon.es/H.P.-Lovecraft/e/B000AQ40D2?ref_=dbs_p_pbk_r00_abau_000000">(H. P. Lovecraft)</a>  
                            <p class="text-justify flex items-center justify-center">
                                H. P. Lovecraft ha pasado a la historia de la literatura como uno de los grandes innovadores del relato fantástico y de terror del siglo XX. Niño prodigio empezó a leer y escribir su primer cuento a muy temprana edad. Ya en la adolescencia era de solitaria vida nocturna y vivió atormentado.
                            </p>
                        </div>
                    </div>
                    <div class="bg-white bg-opacity-25 border border-blue-400 flex flex-col sm:flex-row items-center sm:items-start text-center">
                        <div class="p-2 sm:3/12">
                            <img class="w-36" src="https://images-na.ssl-images-amazon.com/images/I/91KVu+3L8dL.jpg" alt="LibroPortada" @click="BookInformation(18)" >
                        </div>
                        <div class="p-2 sm:w-9/12 flex flex-col items-center justify-center space-y-2">
                            <a class="text-2xl focus:text-blue-500 focus:outline-none" target="_blanck" href="https://amzn.to/3ybgnPq">El Retrato de Dorian Grey</a>
                            <a class="text-lg hover:text-red-800 focus:text-blue-500 focus:outline-none" target="_blanck" href="https://www.amazon.es/Oscar-Wilde/e/B000AQ0DXI?ref_=dbs_p_pbk_r00_abau_000000  ">(Oscar Wilde)</a>  
                            <p class="text-justify flex items-center justify-center">
                               Cuando se publicó El retrato de Dorian Gray, la crítica moralizante acusó a su protagonista de ser una figura satánica, corrompida y corruptora, sin comprender que era el héroe de una novela que reflejaba la fatalidad de los románticos: Oscar Wilde (1854-1900) había querido hacer de la belleza un refinamiento de la inteligencia.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
export default {
    name: 'Terror',
    data(){
        return{
            
        }
    },
    methods: {
        BookInformation(isbn) {
            this.$router.push('/agarcia/LiberLogin/public/book/' + isbn);
        },
    },
    mounted() {
        window.scrollTo(0,0);
    }
}



</script>

<style scoped>

</style>
