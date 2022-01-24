<template>
<div>



  <div class="flex flex-col w-8/12 mx-auto pt-5 space-y-5">
       <h1 class="text-5xl font-bold">Crear Baraja</h1>
      <div class="flex flex-row border p-5 justify-between">

        <div class="flex flex-col w-5/12">
            <label for="Titulo" class="text-xl font-bold">Titulo</label>
            <input v-model="formData.titulo" type="text" placeholder="Titulo" class="border p-2 focus:outline-none" name="Titulo" id="Titulo">
        </div>

        <div class="flex flex-col w-5/12">
            <label for="Formato" class="text-xl font-bold">Formato</label>
            <select v-model="formData.formato" name="Formato" class="border p-2 focus:outline-none" id="Formato">
                <option value="commander" class="capitalize">commander</option>
                <option value="pauper" class="capitalize">pauper</option>
                <option value="penny" class="capitalize">penny</option>
                <option value="standard" class="capitalize">standard</option>
                <option value="pioneer" class="capitalize">pioneer</option>
                <option value="modern" class="capitalize">modern</option>
                <option value="legacy" class="capitalize">legacy</option>
                <option value="vintage" class="capitalize">vintage</option>
                <option value="oldschool" class="capitalize">oldschool</option>
                <option value="historic" class="capitalize">historic</option>
                <option value="brawl" class="capitalize">brawl</option>
                <option value="duel" class="capitalize">duel</option>
                <option value="gladiator" class="capitalize">gladiator</option>
                <option value="premodern" class="capitalize">premodern</option>
            </select>
        </div>
      </div>

      <div class="flex flex-col border p-5">
        <label for="Descripcion" class="text-xl font-bold">Descripción</label>
        <textarea v-model="formData.descripcion" name="Descripcion" class="border p-2 focus:outline-none" rows="10" id="Descripcion"></textarea>
      </div>

      <div class="flex flex-row border p-5">
        <label for="prototype">Prototipo</label>
        <input v-model="formData.prototipo" type="checkbox" name="prototype" value="prototype" class="p-4">
        <label for="Privado">Privado</label>
        <input v-model="formData.privado" type="checkbox" name="Privado" value="true" class="p-4">
      </div>

      <div>
          <button @click="crear" class="p-3 text-white font-bold bg-gray-600">Crear</button>
          <button class="p-3 bg-gray-600">Crear y seguir editando</button>
          <button class="p-3 bg-gray-600">Cancelar</button>
      </div>
  </div>
  </div>

</template>

<script>
export default {
    data() {
        return {
            formData:{
                titulo: '',
                formato: '',
                descripcion: '',
                privado: false,
                prototipo: false,
            }
        };
    },
    methods:{
        crear(){
            let vuestore = this.$store.state

            axios.post('/api/SetDeck/' + vuestore.user.id, this.formData).then((response) => {
                console.log(response)
            })
        }
    }


}
</script>

<style>

</style>
