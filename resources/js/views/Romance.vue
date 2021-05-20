<template>
    <div class="container mx-auto">
        <div class="h-10 w-full place-items-center lg:flex flex-row hidden" id="breadcrumbs">
            <router-link class="px-1 focus:text-blue-500 focus:outline-none flex align-middle" :to="{ name: 'home' }">Página Principal</router-link>
            <i class="fas fa-caret-right fa-2x m-4" alt="Flecha" />
            <p>Género</p>
            <i class="fas fa-caret-right fa-2x m-4" alt="Flecha" />
            <p>Romance</p>
        </div>

        <div class="flex flex-col sm:flex-row py-7 sm:space-x-5 divide-x divide-blue-500"> 
            <div class="px-3 sm:px-0 text-lg sm:w-1/2 text-justify">
                <div>
                    <h1 class="text-4xl pb-7">Romance</h1>
                </div>
                <div class="space-y-1">
                    <p>También conocidas como novelas rosas, en las novelas románticas se hace mucha énfasis en los personajes y en las relaciones entre ellos. Es tan importante que muchas veces las historias son estáticas y desarrollan poco los escenarios, para no desviar la atención del lector. En realidad, hay dos aspectos básicos que todo libro de este género debe seguir para poder incluirse en él: el primero es que la historia debe girar en torno a una trama amorosa como hilo argumental troncal. Aunque pueden existir otras líneas argumentales que versen sobre diferentes temas o que incluyan a otros personajes, la novela romántica no se concibe sin ese hilo conductor romántico entre dos amantes.

                    </p>    
                    <p> La otra condición que debe seguir toda novela rosa es referente a su desenlace: por norma general siempre nos encontramos ante un final feliz, con la pareja reencontrada viviendo su amor. También es cierto que existen ciertas variaciones, si bien la esencia romántica se mantiene; aunque el desenlace pueda resultar agridulce se debe conservar el ideal de amor infinito que perdurará para siempre. En caso de tener un final triste, sería considerado una tragedia.</p>            
                </div>
                <div>
                    <h2 class="text-3xl py-7">Orígen</h2>
                </div>
                <div class="space-y-1">
                    <p>
                        Si buscamos el origen de la literatura rosa podríamos remontarnos hasta el romance medieval, aunque lo cierto es que el germen original de la mayoría de estas historias lo podemos encontrar ya en muchas de las tramas de la Grecia y Roma clásicas. El esquema clásico del encuentro – conflicto – reencuentro entre los amantes ya se encontraba muy a menudo, si bien faltarían aún bastantes siglos para que el género fuera hallando sus mecánicas más habituales.
                        Fue en la época moderna cuando la novela romántica se amolda a las características que hoy en día la definen, teniendo como primera de la historia a Pamela, o La Virtud Recompensada, de Samuel Richardson.
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
                            <img class="w-36" src="https://images-na.ssl-images-amazon.com/images/I/512PMMDA3GL.jpg" alt="LibroPortada" @click="BookInformation(2)" >
                        </div>
                        <div class="p-2 sm:w-9/12 flex flex-col items-center justify-center space-y-2">
                            <a class="text-2xl focus:text-blue-500 focus:outline-none" target="_blanck" href="https://amzn.to/33Jt5Hn">El cuaderno de Noah</a>
                            <a class="text-lg hover:text-red-800 focus:text-blue-500 focus:outline-none" target="_blanck" href="https://www.amazon.es/Nicholas-Sparks/e/B000APGF36?ref_=dbs_p_pbk_r00_abau_000000">(Nicholas Sparks)</a>  
                            <p class="text-justify flex items-center justify-center">
                             Un hombre tiene un cuaderno, traído y llevado mil veces, en su regazo. Una mujer escucha lo que él le lee aunque no acaba de entender. El cuaderno de Noah cuenta la historia de Noah, un sureño que vuelve a casa después de la Segunda Guerra Mundial.
                            </p>
                        </div>
                    </div>

                    <div class="bg-white bg-opacity-25 border border-blue-400 flex flex-col sm:flex-row items-center sm:items-start text-center">
                        <div class="p-2 sm:3/12">
                            <img class="w-36" src="https://images-na.ssl-images-amazon.com/images/I/71uL0xUNDIL.jpg" alt="LibroPortada" @click="BookInformation(8)" >
                        </div>
                        <div class="p-2 sm:w-9/12 flex flex-col items-center justify-center space-y-2">
                            <a class="text-2xl focus:text-blue-500 focus:outline-none" target="_blanck" href="https://amzn.to/2Rk6Sgh">La princesa prometida</a>
                            <a class="text-lg hover:text-red-800 focus:text-blue-500 focus:outline-none" target="_blanck" href="https://www.amazon.es/William-Goldman/e/B000AQ3QO6">(William Goldman)</a>  
                            <p class="text-justify flex items-center justify-center">
                                Es una historia de espadachines y de combates. Trata de amor eterno, de odio inmortal y de venganzas despiadadas. En esta novela salen algunos gigantes, un montón de villanos y de héroes, cinco o seis hermosas mujeres, monstruos bestiales y otros amables, y muchas aventuras y huidas y capturas. Hay muerte, mentiras, verdad, milagros e incluso algún que otro beso.
                            </p>
                        </div>
                    </div>
                    <div class="bg-white bg-opacity-25 border border-blue-400 flex flex-col sm:flex-row items-center sm:items-start text-center">
                        <div class="p-2 sm:3/12">
                            <img class="w-36" src="https://images-na.ssl-images-amazon.com/images/I/71wnBzT9WqL.jpg" alt="LibroPortada" @click="BookInformation(7)" >
                        </div>
                        <div class="p-2 sm:w-9/12 flex flex-col items-center justify-center space-y-2">
                            <a class="text-2xl focus:text-blue-500 focus:outline-none" target="_blanck" href="https://amzn.to/3fhD2Rv">Orgullo y prejuicio</a>
                            <a class="text-lg hover:text-red-800 focus:text-blue-500 focus:outline-none" target="_blanck" href="https://www.amazon.es/Jane-Austen/e/B000APWOKO?ref_=dbs_p_ebk_r00_abau_000000">(Jane Austen)</a>  
                            <p class="text-justify flex items-center justify-center">
                                Jane Austen ocupó un lugar preminente en la literatura británica. Reivindicada vehementemente por Rudyard Kipling y Edward Said, la elegancia estilística de su prosa, su ironía y, sobre todo, su perspicacia para el retrato social convierten sus obras en una referencia ineludible de la literatura del siglo XIX.
                            </p>
                        </div>
                    </div>
                    <div class="bg-white bg-opacity-25 border border-blue-400 flex flex-col sm:flex-row items-center sm:items-start text-center">
                        <div class="p-2 sm:3/12 sm:flex">
                            <img class="w-36" src="https://images-na.ssl-images-amazon.com/images/I/710Ub2sHyGL.jpg" alt="LibroPortada" @click="BookInformation(27)" >
                        </div>
                        <div class="p-2 sm:w-9/12 flex flex-col items-center justify-center space-y-2">
                            <a class="text-2xl focus:text-blue-500 focus:outline-none" target="_blanck" href="https://amzn.to/3w4OtDa">La Letra Escarlata</a>
                            <a class="text-lg hover:text-red-800 focus:text-blue-500 focus:outline-none" target="_blanck" href="https://www.amazon.es/Nathaniel-Hawthorne/e/B000AQ0C48?ref_=dbs_p_pbk_r00_abau_000000">(Nathaniel Hawthorne)</a>  
                            <p class="text-justify flex items-center justify-center">
                               Ambientada en la Nueva Inglaterra de los puritanos del siglo XVII, La letra escarlata narra el terrible impacto que un simple acto de pasión desencadena en las vidas de tres miembros de la comunidad: Hester Prynne, una mujer objeto del escarnio público; el reverendo Dimmesdale, un alma atormentada por la culpa , y Chillingworth, un ser siniestro, cruel y vengativo, que maquina en la sombra.
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
    name: 'Romance',
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

<style scoped>

</style>
