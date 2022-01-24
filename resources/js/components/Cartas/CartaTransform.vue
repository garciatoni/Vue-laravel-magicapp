<template>
    <div class="relative" id="carta">

        <div v-if="clickable == true">
            <img @click="CartaInformation(id)" v-if="transformacion == true" :src="Front" class="rounded-[13px] cursor-pointer" id="zoom" alt="front">
            <img @click="CartaInformation(id)" v-else :src="Back" class="rounded-[13px]" id="zoom" alt="back">
            <button @click="Voltear()" id="zoomb" class="absolute bottom-1 left-30 focus:outline-none">
                <svg focusable="false" class="w-14 px-3 py-2 bg-white rounded-full bg-opacity-90 hover:bg-opacity-100"  aria-hidden="true"
                viewBox="0 0 1024 1024">
                    <path d="M884.3,357.6c116.8,117.7,151.7,277-362.2,320V496.4L243.2,763.8L522,1031.3V860.8C828.8,839.4,1244.9,604.5,884.3,357.6z"/>
                    <path d="M557.8,288.2v138.4l230.8-213.4L557.8,0v142.8c-309.2,15.6-792.1,253.6-426.5,503.8C13.6,527.9,30,330.1,557.8,288.2z"/>
                </svg>
            </button>
        </div>

        <div v-else>
            <img class="front" :src="Front" id="Front" alt="front" v-bind:style="{'transform': this.transformf}">
            <img class="back" :src="Back" id="Back" alt="back" v-bind:style="{'transform': this.transformb}">
            <div class="justify-center flex">
                <button @click="Girar()" class="flex items-center justify-center bg-white bg-opacity-90 pr-3 border rounded-md border-[#9d34ff] mt-2" >
                    <svg focusable="false" class="w-10 px-3 py-2"  aria-hidden="true"
                        viewBox="0 0 1024 1024">
                        <path d="M884.3,357.6c116.8,117.7,151.7,277-362.2,320V496.4L243.2,763.8L522,1031.3V860.8C828.8,839.4,1244.9,604.5,884.3,357.6z"/>
                        <path d="M557.8,288.2v138.4l230.8-213.4L557.8,0v142.8c-309.2,15.6-792.1,253.6-426.5,503.8C13.6,527.9,30,330.1,557.8,288.2z"/>
                    </svg>
                    <p>Transform</p>
                </button>
            </div>
        </div>






    </div>
</template>

<script>
export default {
props: {
    front:{
        type: String
    },
    back:{
        type: String
    },
    id:{
        type: String
    },
    clickable:{
        type: Boolean
    },
    aviso:{
        type: Function
    }
},

data() {
  return {
    Front: this.front,
    Back: this.back,
    transformacion: true,

    cara: true,

    transformf: '',
    transformb: ''


  }
},
methods: {

    Girar(){
        this.cara = !this.cara
        this.aviso(this.cara)
        if(this.cara==false){
            this.transformf = 'rotateY(180deg)';
            this.transformb = 'rotateY(0deg)'
        }else{
            this.transformf = 'rotateY(0deg)';
            this.transformb = 'rotateY(360deg)'
        }
    },
    Voltear(){
        this.transformacion = !this.transformacion;
    },
    CartaInformation(id) {
        this.$router.push('/Carta/' + id);
    },
}
}
</script>

<style scoped>
.front, .back {
    backface-visibility: hidden;
    position: relative;
}
.front {
    position: absolute;
    z-index: 2;
    transition: all 0.5s linear;
}
.back {
    transition: all 0.5s linear;
    transform: rotateY(180deg);
}
#carta {
    position: relative;
    transform-style: preserve-3d;
    perspective: 1000px;
}


#zoom {
    transition: transform .2s;
}
#zoom:hover {
    transform: scale(1.16);
}

</style>
