import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios';
axios.defaults.withCredentials = true;
Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        user: null,
        auth: false,
    },
    mutations: {
        SET_USER(state, user) {
            state.user = user;
            state.auth = Boolean(user);
        },
    },
    actions: {
        // login({ commit }, { dispatch }, formData) {
        //     axios.post('api/login', formData).then((response) => {
        //         localStorage.setItem('token', response.data);
        //         commit("SET_TOKEN", response.data)
        //             // this.$router.push('/');
        //         return dispatch("getUser");

        //     })
        // },
        // getUser({ commit }) {
        //     window.axios.defaults.headers.common['Authorization'] = `Bearer ${state.token}`
        //     axios.get('/api/user').then((response) => {
        //         commit("SET_USER", response.data)
        //     }).catch(() => {
        //         commit("SET_USER", null)
        //     })
        // }
    },
    modules: {}
})

export default store;