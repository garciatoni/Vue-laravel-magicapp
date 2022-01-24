<template>
<div>
    <h1>hi</h1>
</div>
</template>

<script>
export default {
    data() {
        return {

        };
    },
    methods:{

    },
    mounted(){
        console.log(this.$route.params.name)
        
    }

}
</script>

<style>

</style>
