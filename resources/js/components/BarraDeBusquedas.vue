<template>
    <div class="w-5/12">
      <form @submit.prevent="searched(formData.search)" class="w-full flex justify-center" aria-label="Buscar libro">

        <input type="text" v-model="formData.search" name="search" placeholder="Buscar entre los planos..." aria-label="buscar libro" class="border-t border-b border-[#600aff] border-l text-white placeholder-gray-300 focus:placeholder-gray-400 bg-gray-700 focus:outline-none py-1 px-2 rounded-sm w-full"/>

        <button class="hover:bg-white hover:text-black focus:text-black text-white focus:bg-white hover:border-gray-500 focus:border-gray-500 shadow-md border-t border-b border-r border-[#600aff] focus:outline-none block py-2 px-4" type="submit" id="search_button">Buscar</button>



      </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            formData:{
                search: '',
            },
        };
    },
    methods: {
        searched(search){
            if(search != ''){
                this.$router.push("/search/" + search.toLowerCase());
                this.formData.search = ''
            }

        },
    },
}
</script>

<style>

</style>
