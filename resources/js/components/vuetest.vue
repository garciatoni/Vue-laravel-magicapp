<template>
        <div>
            <h1 id="titulo">Liber</h1>
            <div v-for="user in users" :key="user.id">
                <p>{{user.id}}</p>
                <p>{{user.email}}</p>
                <p>---------------</p>
            </div>
        </div>
</template>

<script>
// import { computed, onMounted, ref }  from "vue";
export default {
    name: 'testvue',
    data(){
        return{
            users: []
        }
    },

    mounted(){
        console.log('hola');
        axios.get('https://dawjavi.insjoaquimmir.cat/agarcia/Liber/public/api/users').then(response => {
            this.users = response.data;
        });
    }
}



</script>

<style scoped>
    #titulo{
        color: aqua;
    }
</style>
