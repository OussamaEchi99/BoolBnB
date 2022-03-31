window.Vue = require('vue');
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


import App from './views/App.vue';
import router from './router';

const app = new Vue({
    el: '#root',
    render: h => h(App),
    router
});

// var map = tt.map({

//     key: 'jRVJgpmxvidkjvJmEfhDb7On6Yp71S6p',

//     container: 'map'

// });
