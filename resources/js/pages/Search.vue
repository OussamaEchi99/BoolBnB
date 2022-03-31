<template>
    <section>
        <h1>Pagina di ricerca</h1>
        <Index :searchText="homeSearch"/>
    </section>
</template>

<script>
import Index from '../components/Index.vue';

export default {
    name: 'Search',
    components: {
        Index,
    },
    data: function() {
        return {
            homeSearch: this.$route.params.homeSearch
        }
    }
}
</script>
