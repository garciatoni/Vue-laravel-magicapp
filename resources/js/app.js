require('./bootstrap');
require('alpinejs');

window.Vue = require('vue').default;

import VueRouter from 'vue-router';
import store from './store/index.js'
import StarRating from 'vue-star-rating';
import TailablePagination from 'tailable-pagination';

Vue.use(VueRouter);
Vue.component('star-rating', StarRating);
Vue.use(TailablePagination);

//Componentes importados
import app from './app.vue'
import noencontradavue from './components/404.vue'
import home from './components/Home.vue';
import book from './components/Book.vue';
import edicion from './components/EditUser.vue'
import auth from './components/AuthComponent.vue'
import wish from './components/Wish.vue'

//GENEROS COMPONENTS
import generos from './views/Generos.vue'
import aventura from './views/Aventura.vue'
import romance from './views/Romance.vue'
import fantasia from './views/Fantasia.vue'
import terror from './views/Terror.vue'
import cifi from './views/cifi.vue'
// Vue.component('testvue', require('./components/vuetest.vue').default);  OTRA FORMA DE LLAMAR A LOS COMPONENTES


// Rutas
const router = new VueRouter({
    mode: 'history',
    routes: [
        //{guest: true} = Si esta logueado redirige al home
        {
            path: '/agarcia/LiberLogin/public/login',
            name: 'login',
            component: auth,
            meta: { guest: true }
        },
        {
            path: '/agarcia/LiberLogin/public/book/:isbn',
            name: 'book',
            component: book,
            props: true
        },
        //{requiresAuth: true} = Si NO esta logueado redirige al home
        {
            path: '/agarcia/LiberLogin/public/wish',
            name: 'wish',
            component: wish,
            meta: { requiresAuth: true }
        },
        {
            path: '/agarcia/LiberLogin/public/Genero',
            name: 'Genero',
            component: generos,
        },
        {
            path: '/agarcia/LiberLogin/public/Genero/Aventura',
            name: 'Aventura',
            component: aventura,
        },
        {
            path: '/agarcia/LiberLogin/public/Genero/Romance',
            name: 'Romance',
            component: romance,
        },
        {
            path: '/agarcia/LiberLogin/public/Genero/Fantasia',
            name: 'Fantasia',
            component: fantasia,
        },
        {
            path: '/agarcia/LiberLogin/public/Genero/Terror',
            name: 'Terror',
            component: terror,
        },
        {
            path: '/agarcia/LiberLogin/public/Genero/cifi',
            name: 'cifi',
            component: cifi,
        },
        {
            path: '/agarcia/LiberLogin/public/',
            name: 'home',
            component: home,
        },
        {
            path: '/agarcia/LiberLogin/public/edicion',
            name: 'edicion',
            component: edicion,
            meta: { requiresAuth: true }
        },


        //Esta ruta siempre abajo del todo.
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
                path: '/agarcia/LiberLogin/public/login',
                query: { redirect: to.fullPath }
            })
        } else {
            next()
        }
    } else if (to.matched.some(record => record.meta.guest)) {
        if (loggedIn()) {
            next({
                path: '/agarcia/LiberLogin/public',
                query: { redirect: to.fullPath }
            })
        } else {
            next()
        }
    } else {
        next() // make sure to always call next()!
    }
})



//app view, el componente principal
const appp = new Vue({
    el: '#app',
    components: { app },
    router,
    store
});