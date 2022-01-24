require('./bootstrap');
require('alpinejs');

window.Vue = require('vue').default;

//Plugins y componentes exportados de vue
import VueRouter from 'vue-router';
import store from './store/index.js'
import StarRating from 'vue-star-rating';
import TailablePagination from 'tailable-pagination';
import VueSweetalert2 from 'vue-sweetalert2';
import GoTop from '@inotom/vue-go-top';
// import mtg from 'mtgsdk';

//Indicación a vue que use los componentes y los plugins
Vue.use(VueRouter);
Vue.component('star-rating', StarRating);
Vue.use(TailablePagination);
Vue.use(VueSweetalert2);
Vue.use(GoTop);
// vue.use(mtg);



//estilos sweetAlert2
import 'sweetalert2/dist/sweetalert2.min.css';

//Componentes importados
import app from './app.vue'
import noencontradavue from './components/404.vue'
import home from './components/Home.vue';

import edicion from './components/EditUser.vue'
import auth from './views/AuthComponent.vue'
import resetPassword from './components/resetPassword.vue'

import cookie from './components/cookie.vue'
import search from './components/search.vue'


import Carta from './views/Carta.vue'
import Colecion from './views/Colecion.vue'
import Artista from './views/Artista.vue'

import DeckAdd from './views/CreacionBaraja.vue'
import userDecks from './views/UserDecks.vue'
import WantsAdd from './views/CreacionWants.vue'
import Wants from './views/Wants.vue'
import WantView from './views/wantVista.vue'
//Vue.component('testvue', require('./components/vuetest.vue').default);


// Rutas vue
const router = new VueRouter({
    mode: 'history',
    routes: [
        //{guest: true} = Si esta logueado redirige al home
        //{requiresAuth: true} = Si NO esta logueado redirige al home
        {
            path: '/auth',
            name: 'login',
            component: auth,
            meta: { guest: true }
        },
        {
            path: '/Deck/add',
            name: 'DeckAdd',
            component: DeckAdd,
        },
        {
            path: '/Wants/add',
            name: 'WantAdd',
            component: WantsAdd,
        },
        {
            path: '/Wants',
            name: 'Wants',
            component: Wants,
        },
        {
            path: '/Wants/:name',
            name: 'WantsName',
            component: WantView,
        },
        {
            path: '/cookie',
            name: 'cookie',
            component: cookie,
        },
        {
            path: '/reset-password',
            name: 'resetPassword',
            component: resetPassword,
            meta: { guest: true }
        },
        {
            path: '/Colecion/:id',
            name: 'Colecion',
            component: Colecion,
            props: true
        },
        {
            path: '/Artista/:id',
            name: 'Artista',
            component: Artista,
            props: true
        },
        {
            path: '/Carta/:id',
            name: 'Carta',
            component: Carta,
            props: true
        },
        {
            path: '/search/:campo',
            name: 'search',
            component: search,
            props: true
        },
        {
            path: '/',
            name: 'home',
            component: home,
        },
        {
            path: '/edicion',
            name: 'edicion',
            component: edicion,
            meta: { requiresAuth: true }
        },
        {
            path: '/My_decks',
            name: 'UserDecks',
            component: userDecks,
            meta: { requiresAuth: true }
        },
        //Esta ruta siempre abajo del todo.
        {
            path: "/:catchAll(.*)",
            component: noencontradavue,
        },
    ]
})


//Rutas privadas.
function loggedIn() {
    return sessionStorage.getItem('token');
}
router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        // this route requires auth, check if logged in
        // if not, redirect to login page.
        if (!loggedIn()) {
            next({
                path: '/auth',
                query: { redirect: to.fullPath }
            })
        } else {
            next()
        }
    } else if (to.matched.some(record => record.meta.guest)) {
        if (loggedIn()) {
            next({
                path: '/',
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
