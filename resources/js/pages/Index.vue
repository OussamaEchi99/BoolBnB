<template>
    <section>
        <div v-for="location in locations" :key="location.id">
            <img v-if="location.photo" :src="location.photo" alt="">
            <img src="" alt="">
            <span>{{location.name}}</span>
        </div>
    </section>
</template>

<script>
export default {
    name: 'Index',
    data: function() {
        return {
            locations: [],
            currentPage: 1,
            lastPage: false
        };
    },
    methods: {
        getLocations: function(pageNumber) {
            axios.get('/api/locations', {
                params: {
                    page: pageNumber
                }
            })
            .then((response) => {
                this.locations = response.data.results.data;
                this.currentPage = response.data.results.current_page;
                this.lastPage = response.data.results.last_page;
            });
        },
        truncateText: function(text, maxCharsNumber) {
            if(text.length > maxCharsNumber) {
                return text.substr(0, maxCharsNumber) + '...';
            }
            return text;
        }
    },
    created: function() {
        this.getLocations(1);
    }
}
</script>