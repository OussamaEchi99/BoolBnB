<template>
    <section>
        <h1>{{location.name}}</h1>
        
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

        getLocation(locationSlug) {
            axios.get('/api/locations/', {
                params: {
                    slug: locationSlug
                }
            })
            .then((response) => {
                console.log(response.data.results.data);

                if(response.data.success) {
                    this.location = response.data.results.data[0];
                } else {
                    this.$router.push({ name: 'not-found' });
                }
            });
        }
        
    },
    created: function() {
        this.getLocation('barberini-maison');
    }
}
</script>

<style lang="scss" scoped>

</style>