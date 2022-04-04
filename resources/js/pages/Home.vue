<template>

    <div>

        <div class="research">
            <input class="inputText" type="text" v-model="searchText">
            
            <button class="search_button">
                <router-link class="color_link" :to="{ name: 'search', params: {homeSearch: searchText }}">
                    Cerca un appartamento
                </router-link>
            </button>
        </div>

        <div class="all_page">
        
            <div class="main_page container">
                <div v-if="activeSponsor && activeSponsor.length" id="carouselExampleControls" class="carousel slide my-4" data-bs-ride="carousel">
                    <span class="advice">BoolBnB ti consiglia:</span>
                    <div class="carousel-inner">
                        <div v-for="(location,index) in activeSponsor" :key="index" class="carousel-item" :class="index == activeLocation ? 'active' : 'none' ">
                            <img class="d-block img_carousel" :src="location.photo.includes(`https:`) ?  location.photo : `http://127.0.0.1:8000/storage/` + location.photo" :alt="location.name">
                            <div class="centered">
                                <router-link class="text" :to="{ name: 'location-details', params: { slug: location.slug }}">Vedi nel dettaglio: {{location.name}} a {{location.city}}</router-link>  
                            </div>   
                        </div>
                    </div>
                    <button @click="back()" class="back carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button  @click="next()" class=" next carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="visually-hidden">Next</span>
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </button>
                </div>

                <div class="map_container">
                    <span class="map_text">Esplora tutte le nostre Locations:</span>
                    <div id="map" class="map"></div>
                </div>
            </div>
            
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
            locations: [],
        }
    },
    methods: {
        getLocationsAndCategories: function() {
            axios.get('http://127.0.0.1:8000/api/locations', {
                })
                .then((response) => {
                    this.activeSponsor = response.data.results.activeSponsor;
                    this.locations = response.data.results.locations;
                    this.initializeMap();
            });
        },
        initializeMap: function() {
            const map = tt.map({
            key: 'IEix9iHTEHOJolKXAoByVdl4reKermIB',
            container: 'map',
            zoom: 4,
            center: [12.495673, 42.001585],
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
    },
    mounted: function(){
        this.getLocationsAndCategories();
    }
}
</script>

<style lang="scss" scoped>

.advice{
    font-size: 30px;
}

.all_page{
    height: 80vh;
    overflow-y: auto;
}

.research{
    width: 60%;
    margin: auto;
    display:flex;
    justify-content: center;
    position: relative;
    bottom: 50px;

    input{
        border-top-left-radius: 25px;
        border-bottom-left-radius: 25px;
        border: 1px solid #add8e6;
        border-right: none;
        width: 300px;
        padding-left: 20px;
        outline: none;
    }

    .search_button{
        border-radius: 50px;
        height: 50px; 
        position: relative;
        right: 50px;
        border: 3px solid #add8e6;
        background-color: #add8e6;

        .color_link{
            color: white;
            text-decoration: none;
        }
    }
}

.centered{
    display: flex;
    justify-content: center;
}

.map_text{
    display: block;
    font-size: 25px;
}

#carouselExampleControls{
    width: 100%;
    margin: auto;

    .text{
        display: inline-block;
        text-align: center;
        font-size: 25px;
        text-decoration: none;
        position: relative;
        bottom: 35px;
        background-color: #F8FAFC;
        padding: 5px 20px;
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;

    }

    img{
        width: 100%;
        height: 50vh;
        object-fit: cover;
        border-radius: 20px;
    }
}

#map{
        width: 100% !important;
    }
.map{
    overflow: hidden;
    position: relative;
    margin: auto;
    border-radius: 20px;
        
    canvas .mapboxgl-canvas{
        width: 100%;
        height: auto;
    };
}
.back,.next{
    color: white;
}
</style>