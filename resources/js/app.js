/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.Vue = require('vue');
import Vue from  'vue';
import Navbar from './components/Navbar.vue';
import router from './router.js';
import Index from './components/Index.vue';
import Location from './pages/Location.vue';
import Hostapp from './views/Hostapp.vue';



// import Navbar from './components/Navbar.vue';
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('Navbar', Navbar);
Vue.component('Index', Index);
Vue.component('Location', Location);
Vue.component('Hostapp', Hostapp);
Vue.component('payament-section', require('./components/Payament.vue').default);

Vue.component('map-component', require('./components/Map.vue').default);
// Vue.component('Navbar', require('./components/Navbar.vue'));


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    // render: h => h(Hostapp),
    router
    // components: {
    //     'Navbar' : require('./components/Navbar.vue'),
    // }
});

// const checkout = require('./routes/checkout');
// app.use('/checkout', checkout);