<template>
    <div class="container mx-auto">
        <div class="flex flex-col sm:flex-row py-7 sm:space-x-5 divide-x divide-blue-500"> 

            <div class="px-3 sm:px-0 text-lg sm:w-1/2 text-justify">
                <div>
                    <h1 class="text-4xl pb-7">Aventura</h1>
                </div>
                <div class="space-y-1">
                    <p>La novela de aventuras es la esencia misma de la ficción, puesto que se gesta con el sencillo objetivo de entretener. El esquema salida-viaje-retorno se suele repetir en el género, creando expectación para el lector, quien llega a las últimas páginas en busca del destino del héroe que lo ha cautivado con sus peripecias. Sí, siempre hay un personaje principal con el que el lector se identifica plenamente. La aventura es aquello que se opone a la rutina, a lo cotidiano, de ahí su valor.
                    </p>    
                    <p>Es la capacidad del protagonista para enfrentarse a riesgos, misterios y peligros. Por norma, la novela de aventuras cuenta con un final feliz: el héroe, aunque cansado, logra al fin sus propósitos. Aunque su estructura sea clara, sus límites son difusos, pues suele acompañar a otros géneros en una misma obra.</p>
                </div>
                <div>
                    <h2 class="text-3xl py-7">Orígen</h2>
                </div>
                <div class="space-y-1">
                    <p>Se considera que los orígenes del género de aventuras se encuentran en La Odisea y en La Ilíada de Homero (siglo VIII a. d C.) y, por ende, en la época clásica. Ya por aquel entonces el objetivo era claro: acompañar a un protagonista que emprende una aventura y seguir sus dificultades hasta llegar a su triunfo definitivo. Con respecto a la Edad Media, los libros de caballerías, como El Libro del Caballero Zifar es una buena referencia.
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
                            <img class="w-36" src="https://images-na.ssl-images-amazon.com/images/I/81OMiXFFwHL.jpg" alt="LibroPortada" @click="BookInformation(843167637)" >
                        </div>
                        <div class="p-2 sm:w-9/12 flex flex-col items-center justify-center space-y-2">
                            <a class="text-2xl" target="_blanck" href="https://amzn.to/33KxOIA">Don Quijote de la Mancha</a>
                            <a class="text-lg hover:text-red-800" target="_blanck" href="https://www.amazon.es/Miguel-De-Cervantes-Saavedra/e/B000APV3WE?ref_=dbs_p_pbk_r00_abau_000000">(Jonathan Swift)</a>  
                            <p class="text-justify flex items-center justify-center">
                             El ingenioso hidalgo don Quijote de la Mancha narra las aventuras de Alonso Quijano, un hidalgo pobre que de tanto leer novelas de caballería acaba enloqueciendo y creyendo ser un caballero andante, nombrándose a sí mismo como don Quijote de la Mancha.
                            </p>
                        </div>
                    </div>

                    <div class="bg-white bg-opacity-25 border border-blue-400 flex flex-col sm:flex-row items-center sm:items-start text-center">
                        <div class="p-2 sm:3/12">
                            <img class="w-36" src="https://images-na.ssl-images-amazon.com/images/I/7179uNkP9xL.jpg" alt="LibroPortada" @click="BookInformation(8469836072)" >
                        </div>
                        <div class="p-2 sm:w-9/12 flex flex-col items-center justify-center space-y-2">
                            <a class="text-2xl" target="_blanck" href="https://amzn.to/3hmTv9I">Los viajes de Gulliver</a>
                            <a class="text-lg hover:text-red-800" target="_blanck" href="https://www.amazon.es/Jonathan-Swift/e/B001HCV1RG?ref_=dbs_p_pbk_r00_abau_000000">(Jonathan Swift)</a>  
                            <p class="text-justify flex items-center justify-center">
                                Gulliver viaja a fabulosos lugares como Liliput, donde le atraparán sus diminutos habitantes; o Brobdingnag, poblado por gigantes; o la isla voladora de Laputa, donde viven disparatados científicos; o al país de los houyhnhnms, donde los caballos dominan a los hombres.
                            </p>
                        </div>
                    </div>
                    <div class="bg-white bg-opacity-25 border border-blue-400 flex flex-col sm:flex-row items-center sm:items-start text-center">
                        <div class="p-2 sm:3/12">
                            <img class="w-36" src="https://images-na.ssl-images-amazon.com/images/I/71UDhPMMchL.jpg" alt="LibroPortada" @click="BookInformation(8469836099)" >
                        </div>
                        <div class="p-2 sm:w-9/12 flex flex-col items-center justify-center space-y-2">
                            <a class="text-2xl" target="_blanck" href="https://amzn.to/3tHb2Mp">La vuelta al mundo en 80 días</a>
                            <a class="text-lg hover:text-red-800" target="_blanck" href="https://www.amazon.es/Julio-Verne/e/B00F1CW7NK?ref_=dbs_p_pbk_r00_abau_000000">(Julio Verne)</a>  
                            <p class="text-justify flex items-center justify-center">
                                Phileas Fogg ha apostado una gran suma de dinero a que es capaz de dar la vuelta al mundo en 80 días, gracias a los distintos medios de locomoción de su época. Una aventura en la que habrá momentos de humor, de peligro, de acciones heroicas e incluso de amor.
                            </p>
                        </div>
                    </div>
                    <div class="bg-white bg-opacity-25 border border-blue-400 flex flex-col sm:flex-row items-center sm:items-start text-center">
                        <div class="p-2 sm:3/12">
                            <img class="w-36" src="https://images-na.ssl-images-amazon.com/images/I/71R2vDdC9-L.jpg" alt="LibroPortada" @click="BookInformation(8466794999)" >
                        </div>
                        <div class="p-2 sm:w-9/12 flex flex-col items-center justify-center space-y-2">
                            <a class="text-2xl" target="_blanck" href="https://amzn.to/3y47irX">La isla del tesoro</a>
                            <a class="text-lg hover:text-red-800" target="_blanck" href="https://www.amazon.es/Robert-Louis-Stevenson/e/B00JVVRCRS?ref_=dbs_p_pbk_r00_abau_000000">(Robert Louis Stevenson)</a>  
                            <p class="text-justify flex items-center justify-center">
                               El protagonista de este magnífico libro es un niño, Jim Hawkins. Su emocionante aventura comienza el día en que un viejo marinero con la cara marcada por un sablazo llega a la posada de su padre. El cofre que transporta el desconocido contiene un extraño mapa, que Jim descubrirá por casualidad.
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
    name: 'Aventura',
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
