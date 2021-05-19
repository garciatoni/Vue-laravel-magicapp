<template>
    <div class="container mx-auto">
        <div class="h-10 w-full place-items-center lg:flex flex-row hidden" id="breadcrumbs">
            <router-link class="px-1 focus:text-blue-500 focus:outline-none flex align-middle" :to="{ name: 'home' }">Página Principal</router-link>
            <i class="fas fa-caret-right fa-2x m-4" alt="Flecha" />
            <p>Género</p>
            <i class="fas fa-caret-right fa-2x m-4" alt="Flecha" />
            <p>Ciencia Ficción</p>
        </div>
        
        <div class="flex flex-col sm:flex-row py-7 sm:space-x-5 divide-x divide-blue-500"> 
            <div class="px-3 sm:px-0 text-lg sm:w-1/2 text-justify">
                <div>
                    <h1 class="text-4xl pb-7">Ciencia ficción</h1>
                </div>
                <div class="space-y-1">
                    <p>La ciencia ficción es un género narrativo que sitúa la acción en unas coordenadas espacio-temporales imaginarias y diferentes a las nuestras, y que especula racionalmente sobre posibles avances científicos o sociales y su impacto en la sociedad.
                    </p>    
                    <p>En ocasiones se la ha llamado también "literatura de anticipación", debido a que algunos autores, como Julio Verne, han llegado a anticipar el surgimiento de logros científicos y tecnológicos, como los cohetes espaciales o los submarinos.</p>
                    <p>Muchas veces, contiene un héroe con origen incierto que acaba siendo un elegido (por los dioses, por la magia o los hombres) para salvar su mundo, triunfando sobre el Mal y descubriendo la verdad de su pasado.</p>
                    <p>En todos los casos, y a lo largo de su historia, la ciencia ficción ha mantenido siempre la característica principal que la hace tan interesante: la capacidad de crear escenarios que inspiren debates filosóficos, sociales o científicos sobre la naturaleza del hombre y de la sociedad, plantear dudas, señalar peligros o buscar respuestas.</p>
                </div>
                <div>
                    <h2 class="text-3xl py-7">Orígen</h2>
                </div>
                <div class="space-y-1">
                    <p>Según opinan algunos especialistas el relato de ciencia ficción nació en la primera mitad del siglo XIX con la novela Frankenstein de la escritora inglesa Mary Shelley (1791-1851). Un científico da vida en su laboratorio a un ser monstruoso con restos de cadáveres humanos. Aunque la autora no le puso nombre al monstruo creado por Víctor Frankenstein, con el tiempo, los lectores o los espectadores de las diferentes versiones teatrales y cinematográficas llamaron a la criatura con el nombre de su creador. 
                    </p>
                    <p>
                    En la segunda mitad del siglo XIX, el escritor escocés Robert Louis Stevenson (1850- 1894) concibió su novela El extraño caso del doctor Jekyll y Mr. Hyde, que aportó al imaginario de la literatura otro científico. El respetado Dr. Jekyll se convertía en su doble, el siniestro Mr. Hyde, gracias a una droga que él mismo preparaba en su gabinete.
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
                            <img class="w-36" src="https://images-na.ssl-images-amazon.com/images/I/61vmozJbdXL.jpg" alt="LibroPortada" @click="BookInformation(8445076531)" >
                        </div>
                        <div class="p-2 sm:w-9/12 flex flex-col items-center justify-center space-y-2">
                            <a class="text-2xl focus:text-blue-500 focus:outline-none" target="_blanck" href="https://amzn.to/2QgQCML">Crónicas Marcianas</a>
                            <a class="text-lg hover:text-red-800 focus:text-blue-500 focus:outline-none" target="_blanck" href="https://www.amazon.es/Ray-Bradbury/e/B000AQ1HW4?ref_=dbs_p_pbk_r00_abau_000000">(Ray Bradbury)</a>  
                            <p class="text-justify flex items-center justify-center">
                              Esta colección de relatos reúne la crónica de la colonización de Marte por parte de la Humanidad, que abandona la Tierra en sucesivas oleadas de cohetes plateados y sueña con reproducir en el planeta rojo una civilización de perritos calientes, cómodos sofás y limonada en el porche al atardecer.
                            </p>
                        </div>
                    </div>

                    <div class="bg-white bg-opacity-25 border border-blue-400 flex flex-col sm:flex-row items-center sm:items-start text-center">
                        <div class="p-2 sm:3/12">
                            <img class="w-36" src="https://images-na.ssl-images-amazon.com/images/I/81LteaYX8jL.jpg" alt="LibroPortada" @click="BookInformation(8408210068)" >
                        </div>
                        <div class="p-2 sm:w-9/12 flex flex-col items-center justify-center space-y-2">
                            <a class="text-2xl focus:text-blue-500 focus:outline-none" target="_blanck" href="https://amzn.to/2RhLyYL">La Guerra de los Mundos</a>
                            <a class="text-lg hover:text-red-800 focus:text-blue-500 focus:outline-none" target="_blanck" href="https://www.amazon.es/H.-G.-Wells/e/B000AQ4FBE?ref_=dbs_p_pbk_r00_abau_000000">(H. G. Wells)</a>  
                            <p class="text-justify flex items-center justify-center">
                                Han llegado del espacio exterior, de Marte. Equipados con terribles máquinas, los invasores aterrizan en nuestro planeta y empiezan a sembrar el terror y la destrucción. Su único objetivo es conquistar la Tierra y convertir a los humanos en sus esclavos. Parece que nada ni nadie podrá detenerlos.
                            </p>
                        </div>
                    </div>
                    <div class="bg-white bg-opacity-25 border border-blue-400 flex flex-col sm:flex-row items-center sm:items-start text-center">
                        <div class="p-2 sm:3/12">
                            <img class="w-36" src="https://images-na.ssl-images-amazon.com/images/I/81ZVmNRdoRL.jpg" alt="LibroPortada" @click="BookInformation(8499890946)" >
                        </div>
                        <div class="p-2 sm:w-9/12 flex flex-col items-center justify-center space-y-2">
                            <a class="text-2xl focus:text-blue-500 focus:outline-none" target="_blanck" href="https://amzn.to/3tKLNJl">1984</a>
                            <a class="text-lg hover:text-red-800 focus:text-blue-500 focus:outline-none" target="_blanck" href="https://www.amazon.es/George-Orwell/e/B000AQ0KKY?ref_=dbs_p_pbk_r00_abau_000000">(George Orwell)</a>  
                            <p class="text-justify flex items-center justify-center">
                                En el año 1984 Londres es una ciudad lúgubre en la que la Policía del Pensamiento controla de forma asfixiante la vida de los ciudadanos. Winston Smith es un peón de este engranaje perverso y su cometido es reescribir la historia para adaptarla a lo que el Partido considera la versión oficial de los hechos. Hasta que decide replantearse la verdad del sistema que los gobierna y somete.
                            </p>
                        </div>
                    </div>
                    <div class="bg-white bg-opacity-25 border border-blue-400 flex flex-col sm:flex-row items-center sm:items-start text-center">
                        <div class="p-2 sm:3/12">
                            <img class="w-36" src="https://m.media-amazon.com/images/I/51Jf3lVAr7L.jpg" alt="LibroPortada" @click="BookInformation(1620929304)" >
                        </div>
                        <div class="p-2 sm:w-9/12 flex flex-col items-center justify-center space-y-2">
                            <a class="text-2xl focus:text-blue-500 focus:outline-none" target="_blanck" href="https://amzn.to/3bqfkRZ">La última pregunta</a>
                            <a class="text-lg hover:text-red-800 focus:text-blue-500 focus:outline-none" target="_blanck" href="https://www.amazon.es/Isaac-Asimov/e/B003RY2ISS?ref_=dbs_p_ebk_r00_abau_000000">(Isaac Asimov)</a>  
                            <p class="text-justify flex items-center justify-center">
                               ¿Es posible revertir el inevitable final del Universo, o el mundo debe acabar de todas formas? es la pregunta que desde un día del siglo XXI, hasta generaciones y generaciones posteriores en el tiempo, hacen los humanos a los ordenadores.
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
    name: 'cifi',
    data(){
        return{
            
        }
    },
    methods: {
        BookInformation(isbn) {
            this.$router.push('/agarcia/LiberLogin/public/book/' + isbn);
        },
    }

}
</script>

<style>

</style>
