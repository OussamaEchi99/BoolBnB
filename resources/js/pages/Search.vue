<template>
    <section>
        <div class="container">
            <h1>Pagina di ricerca</h1>
        </div>
        
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
