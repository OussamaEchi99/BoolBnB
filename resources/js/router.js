import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Index from './pages/Index.vue';
import Search from './pages/Search.vue';
import NotFound from './pages/NotFound.vue';
import Location from './pages/Location.vue';

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
            path: "/location/:slug",
            name: "location-details",
            component: Location
        },
        {
            path: "/*",
            name: "not-found",
            component: NotFound
        },
    ]
});

export default router