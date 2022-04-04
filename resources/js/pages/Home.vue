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

        <div id="map" class="map"></div>
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
                    this.location = response.data.results.locations;
            });
        },
        initializeMap: function(cen_lat,cen_long) {
            this.search = 1;
            const map = tt.map({
            key: 'IEix9iHTEHOJolKXAoByVdl4reKermIB',
            container: 'map',
            zoom: 6,
            center: [cen_lat, cen_long],
            });
             // aggiunta controlli mappa
            map.addControl(new tt.FullscreenControl());
            map.addControl(new tt.NavigationControl());

            for (let i = 0; i < this.locations.length; i++) {
                    new tt.Marker({name: this.locations[i].name}).setLngLat([this.locations[i].long, this.locations[i].lat]).addTo(map);
                    var markerHeight = 50, markerRadius = 10, linearOffset = 25;
                    var popupOffsets = {
                        'top': [0, 0],
                        'top-left': [0,0],
                        'top-right': [0,0],
                        'bottom': [0, -markerHeight],
                        'bottom-left': [linearOffset, (markerHeight - markerRadius + linearOffset) * -1],
                        'bottom-right': [-linearOffset, (markerHeight - markerRadius + linearOffset) * -1],
                        'left': [markerRadius, (markerHeight - markerRadius) * -1],
                        'right': [-markerRadius, (markerHeight - markerRadius) * -1]
                        };
                    var popup = new tt.Popup({offset: popupOffsets, className: 'my-class'})
                        .setLngLat([this.locations[i].long, this.locations[i].lat])
                        .setHTML(this.locations[i].name)
                        .addTo(map);
            }
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
        this.initializeMap(12.495673,42.001585);
        this.initializeMap(12.495673,42.001585);
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

#map{
        width: 500px !important;
        margin-right: 20px ;
    }
    .map{
        overflow: hidden;
        position: relative;
        
        canvas .mapboxgl-canvas{
            width: 100%;
            height: auto;
        };
    }
</style>