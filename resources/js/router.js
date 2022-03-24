import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Index from './pages/Index.vue';
import Search from './pages/Search.vue'

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/index",
            name: "Index",
            component: Index
        },
        {
            path: "/search",
            name: "Search",
            component: Search
        }
    ]
});

export default router