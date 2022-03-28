import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

// import Index from './pages/Index.vue';
import Home from './pages/Home.vue';
import Search from './pages/Search.vue';
import Location from './pages/Location.vue';
import NotFound from './pages/NotFound.vue';
import Homehost from './pages/Homehost.vue';
import ContactHost from './pages/ContactHost';

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "homepage",
            component: Home,
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
            path: "/host/locations",
            name: "home",
            component: Homehost
        },
        {
            path: "/*",
            name: "not-found",
            component: NotFound
        },
        {
            path: "/location/:slug/contact",
            name: "contact",
            component: ContactHost
        }
    ]
});

export default router