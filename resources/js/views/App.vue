<template>
    <div>
        <Navbar />

        <main>
            <router-view>
            </router-view>
        </main>
    </div>
</template>

<script>
import Navbar from '../components/Navbar.vue';

export default {
    name: 'App',
    components: {
        Navbar,
    }
}
</script>
