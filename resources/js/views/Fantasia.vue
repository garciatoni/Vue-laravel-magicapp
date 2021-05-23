<template>
    <div class="container mx-auto">
        <div class="h-10 w-full place-items-center lg:flex flex-row hidden" id="breadcrumbs">
            <router-link class="px-1 focus:text-blue-500 focus:outline-none flex align-middle" :to="{ name: 'home' }">Página Principal</router-link>
            <i class="fas fa-caret-right fa-2x m-4" alt="Flecha" />
            <p>Género</p>
            <i class="fas fa-caret-right fa-2x m-4" alt="Flecha" />
            <p>Fantasía</p>
        </div>
        
        <div class="flex flex-col sm:flex-row py-7 sm:space-x-5 divide-x divide-blue-500"> 
            <div class="px-3 sm:px-0 text-lg sm:w-1/2 text-justify">
                <div>
                    <h1 class="text-4xl pb-7">Fantasia</h1>
                </div>
                <div class="space-y-1">
                    <p>Cómo uno de los géneros más comunes y famosos del mundo, la novela fantástica es a la vez simple y compleja. La única regla para que un libro sea considerado fantasía es simple: que ocurran sucesos fantásticos, criaturas de leyenda y magia. 
                    </p>    
                    <p>Uno de los temas habituales de la fantasía es el conflicto entre el Bien y el Mal representado en las acciones de los personajes. Otro de los aspectos comunes del relato fantástico es su medievalismo, es decir, la ambientación medieval, ya sea en localizaciones, vestuario, costumbres, etc., y el uso de mitos y leyendas en la trama, aunque no es imprescindible.</p>
                    <p>Muchas veces, contiene un héroe con origen incierto que acaba siendo un elegido (por los dioses, por la magia o los hombres) para salvar su mundo, triunfando sobre el Mal y descubriendo la verdad de su pasado.</p>
                    <p>Hay dos subgéneros principales: la alta fantasía o fantasía épica y la baja fantasía:
		            La primera sitúa la acción en un mundo secundario ficticio, alejado de la realidad que conocemos y sus reglas lógicas, en tanto que la segunda, se desarrolla en el mundo real, o en uno muy parecido, con elementos y criaturas mágicas.</p>
                </div>
                <div>
                    <h2 class="text-3xl py-7">Orígen</h2>
                </div>
                <div class="space-y-1">
                    <p>La literatura fantástica, tal y como la conocemos hoy, tiene sus cimientos a finales del siglo XVIII con la irrupción del Romanticismo. No obstante, no era la primera vez que elementos semejantes aparecían por escrito. La literatura fantástica cuenta con otros antecedentes más antiguos, como el mito greco-romano o la mitología hindú, celta y escandinava, la novela de caballerías del siglo XVI y la novela bizantina del XVII, y, por supuesto, la novela gótica de finales del XVIII. 
                    </p>
                    <p>
                        El diablo enamorado (1772), de Jacques Cazzotte, es considerada la primera obra fantástica de la literatura occidental, una novela corta en la que el protagonista, un joven español, capitán de la guardia del rey de Nápoles, cae bajo el influjo del mismísimo diablo, encaprichado con poseer su alma.
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
                            <img class="w-36" src="https://images-na.ssl-images-amazon.com/images/I/816QLZKwmIL.jpg" alt="LibroPortada" @click="BookInformation(15)" >
                        </div>
                        <div class="p-2 sm:w-9/12 flex flex-col items-center justify-center space-y-2">
                            <a class="text-2xl focus:text-blue-500 focus:outline-none" target="_blanck" href="https://amzn.to/3hvJrv4">El Señor de los Anillos</a>
                            <a class="text-lg hover:text-red-800 focus:text-blue-500 focus:outline-none" target="_blanck" href="https://www.amazon.es/J.-R.-R.-Tolkien/e/B000ARC6KA?ref_=dbs_p_ebk_r00_abau_000000">(J. R. R. Tolkien)</a>  
                            <p class="text-justify flex items-center justify-center">
                              En la adormecida e idílica Comarca, un joven hobbit recibe un encargo: custodiar el Anillo Único y emprender el viaje para su destrucción en el monte del Destino. Acompañado por magos, hombres, elfos y enanos, atravesará la Tierra Media y se internará en las sombras de Mordor.
                            </p>
                        </div>
                    </div>

                    <div class="bg-white bg-opacity-25 border border-blue-400 flex flex-col sm:flex-row items-center sm:items-start text-center">
                        <div class="p-2 sm:3/12">
                            <img class="w-36" src="https://images-na.ssl-images-amazon.com/images/I/51jZNYgcL+L.jpg" alt="LibroPortada" @click="BookInformation(11)" >
                        </div>
                        <div class="p-2 sm:w-9/12 flex flex-col items-center justify-center space-y-2">
                            <a class="text-2xl focus:text-blue-500 focus:outline-none" target="_blanck" href="https://amzn.to/3ocsvLA">La Historia Interminable</a>
                            <a class="text-lg hover:text-red-800 focus:text-blue-500 focus:outline-none" target="_blanck" href="https://www.amazon.es/Michael-Ende/e/B000AQ4EIS?ref_=dbs_p_pbk_r00_abau_000000">(Michael Ende)</a>  
                            <p class="text-justify flex items-center justify-center">
                                La Emperatriz Infantil está mortalmente enferma y su reino, Fantasia, corre un grave peligro. La salvación depende de Atreyu, un valiente guerrero de la tribu de los pieles verdes, y Bastian, un niño tímido que lee con pasión un libro mágico. Solo un ser humano puede salvar este lugar encantado.
                            </p>
                        </div>
                    </div>
                    <div class="bg-white bg-opacity-25 border border-blue-400 flex flex-col sm:flex-row items-center sm:items-start text-center">
                        <div class="p-2 sm:3/12">
                            <img class="w-36" src="https://images-na.ssl-images-amazon.com/images/I/71UBPNAvmAL.jpg" alt="LibroPortada" @click="BookInformation(9)" >
                        </div>
                        <div class="p-2 sm:w-9/12 flex flex-col items-center justify-center space-y-2">
                            <a class="text-2xl focus:text-blue-500 focus:outline-none" target="_blanck" href="https://amzn.to/3tNipls">Harry Potter y la Piedra Filosofal</a>
                            <a class="text-lg hover:text-red-800 focus:text-blue-500 focus:outline-none" target="_blanck" href="https://www.amazon.es/J.-K.-Rowling/e/B000AP9A6K?ref_=dbs_p_ebk_r00_abau_000000">(J. K. Rowling)</a>  
                            <p class="text-justify flex items-center justify-center">
                                Instalado en casa de la horrible familia Dursley, en el número 4 de Privet Drive, donde duerme en una alacena bajo la escalera y a los once años nunca ha celebrado su cumpleaños, la magia es algo totalmente desconocido para Harry Potter.
                            </p>
                        </div>
                    </div>
                    <div class="bg-white bg-opacity-25 border border-blue-400 flex flex-col sm:flex-row items-center sm:items-start text-center">
                        <div class="p-2 sm:3/12">
                            <img class="w-36" src="https://images-na.ssl-images-amazon.com/images/I/812AcWt+C2L.jpg" alt="LibroPortada" @click="BookInformation(4)" >
                        </div>
                        <div class="p-2 sm:w-9/12 flex flex-col items-center justify-center space-y-2">
                            <a class="text-2xl focus:text-blue-500 focus:outline-none" target="_blanck" href="https://amzn.to/3tJQ5R5">Las Crónicas de Narnia</a>
                            <a class="text-lg hover:text-red-800 focus:text-blue-500 focus:outline-none" target="_blanck" href="https://www.amazon.es/C.S.-Lewis/e/B000APXBPG%3Fref=dbs_a_mng_rwt_scns_share">(C. S. Lewis)</a>  
                            <p class="text-justify flex items-center justify-center">
                               Narnia…, un lugar por el que deambulan Bestias Parlantes…, donde aguarda una bruja…, donde un nuevo mundo está a punto de nacer. Dos amigos, víctimas del poder de unos anillos mágicos, son arrojados a otro mundo en el que una malvada hechicera intenta convertirlos en sus esclavos.
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
    name: 'Fantasia',
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
