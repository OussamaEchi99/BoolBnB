<template>
    <div>
        <h1>Home</h1>
        <input type="text" v-model="searchText">
        
        <button>
            <router-link :to="{ name: 'search', params: {homeSearch: searchText }}">
                Cerca un appartamento
            </router-link>
        </button>

        <div id="carouselExampleControls" class="carousel slide my-4" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div v-for="(location,index) in activeSponsor" :key="index" class="carousel-item" :class="index == activeLocation ? 'active' : 'none' ">
                    <img class="d-block" :src="location.photo.includes(`https:`) ?  location.photo : `http://127.0.0.1:8000/storage/` + location.photo" :alt="location.name">
                    <router-link class="text" :to="{ name: 'location-details', params: { slug: location.slug }}">{{location.city}}: {{location.name}}</router-link>      
                </div>
            </div>
            <button @click="back()" class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button  @click="next()" class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

</template>

<script>
export default {
    name: 'Home',
    data: function() {
        return {
            searchText: '',
            activeSponsor: [],
            activeLocation: 0,
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
        next:function(){
            if(this.activeLocation < (this.activeSponsor.length - 1)){
                this.activeLocation = this.activeLocation + 1;
            }else{
                this.activeLocation = 0;
            }
        },
        back(){
            if(this.activeLocation > 0){
                this.activeLocation = this.activeLocation - 1;
            }else{
                this.activeLocation = (this.activeSponsor.length - 1);
            }
        },
    },
    created: function(){
        this.getLocationsAndCategories();       
    }
}
</script>

<style lang="scss" scoped>
#carouselExampleControls{
    width: 60%;
    margin: auto;

    .text{
        display: block;
        text-align: center;
        font-size: 25px;
        text-decoration: none;
    }

    img{
        width: 100%;
        height: 60vh;
        object-fit: cover;
    }
}
</style>