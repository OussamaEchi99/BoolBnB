import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Index from './pages/Index.vue';
import Search from './pages/Search.vue';
import NotFound from './pages/NotFound.vue';

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "index",
            component: Index
        },
        {
            path: "/search",
            name: "search",
            component: Search
        },
        {
            path: "/*",
            name: "not-found",
            component: NotFound
        }
    ]
});

export default router