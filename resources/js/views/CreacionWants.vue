<template>

  <div class="flex flex-col w-8/12 mx-auto pt-5 space-y-5">
       <h1 class="text-5xl font-bold">Añadir Wants</h1>
      <div class="flex flex-row border p-5 justify-between">

        <div class="flex flex-col w-full">
            <label for="Titulo" class="text-xl font-bold">Titulo</label>
            <input v-model="formData.titulo" type="text" placeholder="Titulo" class="border p-2 focus:outline-none" name="Titulo" id="Titulo">
        </div>

      </div>

      <div class="flex flex-col border p-5">
        <label for="Descripcion" class="text-xl font-bold">Descripción</label>
        <textarea v-model="formData.descripcion" name="Descripcion" class="border p-2 focus:outline-none" rows="10" id="Descripcion"></textarea>
      </div>

      <div>
          <button @click="crear" class="p-3 text-white font-bold bg-gray-600">Crear</button>
          <button class="p-3 bg-gray-600">Crear y seguir editando</button>
          <button class="p-3 bg-gray-600">Cancelar</button>
      </div>
  </div>

</template>

<script>
export default {
    data() {
        return {
            formData:{
                titulo: '',
                descripcion: '',
            }
        };
    },
    methods:{
        crear(){
            let vuestore = this.$store.state
            axios.post('/api/SetWant/' + vuestore.user.id, this.formData).then((response) => {
                console.log(response)
            })
        }
    }


}
</script>

<style>

</style>
