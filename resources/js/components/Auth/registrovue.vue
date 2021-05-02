<template>
<div>
    <form @submit.prevent="registerUser" class="mt-8">
        <div class="mx-auto max-w-lg ">
            <div class="py-1">
                <input v-model="formData.name" placeholder="Username" type="text" class="text-md block px-3 py-2 rounded-lg w-full bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                <p class="text-red-500" v-text="errors.name"></p>
            </div>

            <div class="py-1">
                <input v-model="formData.email" placeholder="Email" type="email" class="text-md block px-3 py-2 rounded-lg w-full bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                <p class="text-red-500" v-text="errors.email"></p>
            </div>

            <div class="py-1">
                <input  v-model="formData.password" placeholder="Password" type="password" class="text-md block px-3 py-2 rounded-lg w-full bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                <p class="text-red-500" v-text="errors.password"></p>
            </div>

            <div class="py-1">
                <input v-model="formData.password_confirmation" placeholder="Password Confirm" type="password" class="text-md block px-3 py-2 rounded-lg w-full bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                <p class="text-red-500" v-text="errors.password_confirm"></p>
            </div>
            <button class="mt-3 text-lg font-semibold bg-gray-800 w-full text-white rounded-lg px-6 py-3 block shadow-xl hover:text-black hover:bg-white">
                Registerse
            </button>
        </div>
    </form>
</div>

</template>

<script>

export default {

    data(){
        return{
            formData: {
                'name': '',
                'email': '',
                'password': '',
                'password_confirmation': ''
            },
            errors:{}
        }
    },
    methods: {
        registerUser(){
            console.log(this.formData);
            axios.post('/api/register', this.formData).then((response)=>{
                console.log(response.data);
                this.formData.name = this.formData.email = this.formData.password = this.formData.password_confirmation = ''
                this.errors = {}
                this.$router.push('/login')
            }).catch((errors)=>{
                console.log(this.formData);
                this.errors = errors.response.data.errors
                console.log(errors.response.data.errors)
            })
        }



    }
    }



</script>

<style scoped>
</style>
