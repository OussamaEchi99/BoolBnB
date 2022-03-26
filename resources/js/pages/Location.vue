<template>
    <section>
        <h1>{{location.name}}</h1>

        <div class="img-fluid">
            <img class="main_img" v-if="location.photo" :src="location.photo" alt="location.name">
        </div>        
        
    </section>
</template>

<script>
export default {
    name: 'Location',
    data: function() {
        return {
            location: {}
        };
    },
    methods: {

        getLocation() {
            axios.get('/api/locations/' + this.$route.params.slug)
            .then((response) => {
                if(response.data.success) {
                    this.location = response.data.results;
                } 
                else {
                    this.$router.push({ name: 'not-found' });
                }
            });
        }
        
    },
    created: function() {
        this.getLocation();
    }
}
</script>

<style lang="scss" scoped>

</style>