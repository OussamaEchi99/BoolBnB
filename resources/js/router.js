import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);

import Index from './pages/Index.vue';

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/*",
            name: "index",
            component: Index
        },
    ]
});

export default router;