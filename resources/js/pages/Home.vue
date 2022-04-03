<template>
    <div>
        <h1>Home</h1>
        <input type="text" v-model="searchText">
        <!-- <a href="/search">Cerca un appartamento</a> -->
        

        <button>
            <router-link :to="{ name: 'search', params: {homeSearch: searchText }}">
                Cerca un appartamento
            </router-link>
        </button>
        
    </div>

</template>

<script>
export default {
    name: 'Home',
    data: function() {
        return {
            searchText: '',
            activeSponsor: [],
        }
    },
    methods: {
        getLocationsAndCategories: function() {
            axios.get('http://127.0.0.1:8000/api/locations', {
            })
            .then((response) => {
                this.activeSponsor = response.data.results.activeSponsor;
            });
        },
    },
    created: function(){
        this.getLocationsAndCategories();
    }
}
</script>

<style lang="scss" scoped>
.carousel-item{
    width: auto;
    height: 60%vh
}
.carousel_img{
    width: 100%;
}
</style>