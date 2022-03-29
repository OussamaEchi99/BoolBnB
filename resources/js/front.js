window.Vue = require('vue');
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


import App from './views/App.vue';
import router from './router';
<<<<<<< HEAD
// import tt from '@tomtom-international/web-sdk-maps';

    
// const map = tt.map({
//     key: 'jRVJgpmxvidkjvJmEfhDb7On6Yp71S6p',
//     container: 'map'
// });

=======
>>>>>>> 311568a166b6631b997eab134ab33fa25f778af1

const app = new Vue({
    el: '#root',
    render: h => h(App),
    router
});

// var map = tt.map({

//     key: 'jRVJgpmxvidkjvJmEfhDb7On6Yp71S6p',

//     container: 'map'

// });
