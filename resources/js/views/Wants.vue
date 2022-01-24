<template>
    <div>
        <ul>
            <li v-for="w in wants" v-bind:key="w.id" class="border">

                <h1>{{w.titulo}}</h1>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    data() {
        return {
            wants: []
        };
    },
    methods:{

    },
    mounted(){
        let vuestore = this.$store.state
        axios.get('/api/GetWant/' + 1).then((response)=>{
            this.wants = response.data
            console.log(response)
        });
    }

}
</script>

<style>

</style>
