<template>
    <div>
        <ul>
            <li v-for="deck in decks" v-bind:key="deck.id">
                <h1>{{deck.titulo}}</h1>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    data() {
        return {
            decks: []
        };
    },
    methods:{

    },
    mounted(){
        let vuestore = this.$store.state
        axios.get('/api/GetDecks/' + 2).then((response)=>{
            this.decks = response.data
            console.log(response)
        });
    }

}
</script>

<style>

</style>
