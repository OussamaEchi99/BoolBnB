window.Vue = require('vue');
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


import App from './views/App.vue';
import router from './router';
import tt from '@tomtom-international/web-sdk-maps';

const map = tt.map({
    key: 'ntfD0l0bgaKvPwNCnKD4YNOomMQbE61N',
    container: 'map'
});



const app = new Vue({
    el: '#root',
    render: h => h(App),
    router
});
