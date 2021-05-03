require('./bootstrap');
require('alpinejs');

window.Vue = require('vue').default;

import VueRouter from 'vue-router';
import store from './store/index.js'
import StarRating from 'vue-star-rating';
// import router from './routes/index.js'         ESTO ES PARA TRABAJAR CON LAS RUTAS DESDE OTRA CARPETA!

Vue.use(VueRouter);
Vue.component('star-rating', StarRating);


//Componentes importados

import app from './app.vue'
import login from './components/Auth/login.vue'

import register from './components/Auth/registrovue.vue'
import noencontradavue from './components/noencontradavue.vue'
// Vue.component('testvue', require('./components/vuetest.vue').default);  OTRA FORMA DE LLAMAR A LOS COMPONENTES

import home from './components/Home.vue';
import book from './components/Book.vue';


// Rutas
const router = new VueRouter({
    mode: 'history',
    routes: [{
            path: '/agarcia/LiberLogin/public/login',
            name: 'login',
            component: login,
            meta: { guest: true }
        },
        {
            path: '/agarcia/LiberLogin/public/book/:isbn',
            name: 'book',
            component: book,
            props: true
        },
        {
            path: '/agarcia/LiberLogin/public/register',
            name: 'register',
            component: register,
            meta: { guest: true }
        },
        {
            path: '/agarcia/LiberLogin/public/',
            name: 'home',
            component: home,
            meta: { requiresAuth: true }
        },



        //este siempre abajo del todo.
        {
            path: "/agarcia/LiberLogin/public/:catchAll(.*)",
            component: noencontradavue,
        },
    ]
})


//Rutas privadas.
function loggedIn() {
    return localStorage.getItem('token');
}
router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        // this route requires auth, check if logged in
        // if not, redirect to login page.
        if (!loggedIn()) {
            next({
                path: 'agarcia/LiberLogin/public/login',
                query: { redirect: to.fullPath }
            })
        } else {
            next()
        }
    } else if (to.matched.some(record => record.meta.guest)) {
        if (loggedIn()) {
            next({
                path: 'agarcia/LiberLogin/public/',
                query: { redirect: to.fullPath }
            })
        } else {
            next()
        }
    } else {
        next() // make sure to always call next()!
    }
})



//app view
const appp = new Vue({
    el: '#app',
    components: { app },
    router,
    store
});