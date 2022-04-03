<template>
    <section>
        <div class="container">

            <!-- Select -->
            <select class="form-select" aria-label="Default select example" v-model="tmpCategory">
                <option :value="0" selected>Tutte</option>
                <option v-for="category in categories" :key="category.id" :value="category.id">{{ category.name }}</option>
            </select>

            <!-- Featurs Select -->
            <button data-toggle="dropdown" class="dropdown-toggle">Features<b class="caret"></b></button>
            <ul class="dropdown-menu">
                <li v-for="feature in features" :key="feature.id">
                    <input @change="filterMedia()" :id="'check-' + feature.name.toLowerCase()" type="checkbox">
                    <label :for="'check-' + feature.name.toLowerCase()" class="checkbox">{{ feature.name }}</label>
                </li>
            </ul>

            <!-- Search -->
            <input @keyup.enter="getCoordinates()" v-model="searchText" type="text" placeholder="Cerca una città">

            <label for="vol">Range ricerca</label>
            <input @change="getCoordinates()" value="20" v-model="distance" type="range" id="range" name="range" min="10" max="50">
            {{distance}}Km
            
            <div class="found_elements">
                <div id="map" class="map" :class=" search == 0 ? 'd-none' : 'show' "></div>

                <div class="searched" :class="search == 0 ? 'entire' : 'half'">
                    <div :id="'sponsor' + location.id" :class=" (location.category_id != tmpCategory) && (tmpCategory != 0) ? 'hide' : 'show'" class="single-location mb-3 sponsorized" v-for="(location, index) in activeSponsor" :key="'sponsor' + index">
                                
                        <router-link class="no-style" :to="{ name: 'location-details', params: { slug: location.slug }}">
                            <div class="card">
                                <h3 class="card-header">{{location.name}}</h3>
                                <div class="card-body">
                                    <div class="top">
                                        <img class="main_img" :src="location.photo.includes(`https:`) ?  location.photo : `http://127.0.0.1:8000/storage/` + location.photo" alt="location.name">
                                        <span>{{truncateText(location.description, 300)}}</span>
                                    </div>
                                   
                                    <div class="bot my-2">
                                        <span>Servizi:<span v-for="(element,ind) in location.features" :key="ind">{{element.name}} </span></span>
                                        <span class="card-text">{{location.price}}€ a notte</span>
                                    </div>
                                    
                                </div>
                            </div>
                        </router-link>

                    </div>
                    <div :id="location.id" :class=" (location.category_id != tmpCategory) && (tmpCategory != 0) && (sponsored(location.id) == false) ? 'hide' : 'show'" class="single-location mb-3 all" v-for="location in locations" :key="location.id">
                                
                        <router-link v-if="sponsored(location.id) != false" class="no-style" :to="{ name: 'location-details', params: { slug: location.slug }}">
                            <div class="card">
                                <h3 class="card-header">{{location.name}}</h3>
                                <div class="card-body">
                                    <div class="top">
                                        <img class="main_img" :src="location.photo.includes(`https:`) ?  location.photo : `http://127.0.0.1:8000/storage/` + location.photo" alt="location.name">
                                        <span>{{truncateText(location.description, 300)}}</span>
                                    </div>
                                   
                                    <div class="bot my-2">
                                        <span>Servizi:<span v-for="(element,index) in location.features" :key="index">{{element.name}} </span></span>
                                        <span class="card-text">{{location.price}}€ a notte</span>
                                    </div>
                                    
                                </div>
                            </div>
                        </router-link>

                    </div>
                </div>
            </div>

        </div>
    </section>
</template>

<script>
export default {
    name: 'Index',
    data: function() {
        return {
            locations: [],
            tmpCategory: '',
            categories: [],
            searchText: '',
            searchLat: 0,
            searchLon: 0,
            deg: 0,
            distance: 20,
            search: 0,
            activeSponsor:[],
            features: []
        };
    },
    methods: {
        sponsored(id){
            for (let i = 0; i < this.activeSponsor.length; i++) {
                if(id == this.activeSponsor[i].id){
                    return false;
                }
            }
        },
        initializeMap: function(cen_lat,cen_long) {
            this.search = 1;
            const map = tt.map({
            key: 'IEix9iHTEHOJolKXAoByVdl4reKermIB',
            container: 'map',
            zoom: 9,
            center: [cen_lat, cen_long],
            });
             // aggiunta controlli mappa
            map.addControl(new tt.FullscreenControl());
            map.addControl(new tt.NavigationControl());

            for (let i = 0; i < this.locations.length; i++) {
                new tt.Marker({name: this.locations[i].name}).setLngLat([this.locations[i].long, this.locations[i].lat]).addTo(map);
            }
        },
        getLocationsAndCategories: function() {
            axios.get('http://127.0.0.1:8000/api/locations', {
            })
            .then((response) => {
                this.locations = response.data.results.locations;
                this.categories = response.data.results.categories;
                this.activeSponsor = response.data.results.activeSponsor;
                this.features = response.data.results.features;
            });
        },
        truncateText: function(text, maxCharsNumber) {
            if(text.length > maxCharsNumber) {
                return text.substr(0, maxCharsNumber) + '...';
            }
            return text;
        },
        getCoordinates(){
            if(this.searchText.length>1){
                axios.get('https://api.tomtom.com/search/2/structuredGeocode.json', {
                    params: {
                        key: 'R6KZnN9ipu52EGyKlInZsrp7MMTUJZP2',
                        countryCode: 'IT',
                        municipality: this.searchText
                    }
                })
                .then((response) => {
                    this.searchLat = response.data.results[0].position.lat;
                    this.searchLon = response.data.results[0].position.lon;
                    this.initializeMap(this.searchLon,this.searchLat);
                    for (let i = 0; i < this.locations.length; i++) {
                        let single_location = this.locations[i];
                        var el = document.getElementById(single_location.id);
                        el.classList.remove("hide");
                    };
                    for (let i = 0; i < this.activeSponsor.length; i++) {
                        let single_location = this.activeSponsor[i];
                        var el = document.getElementById('sponsor' + single_location.id);
                        el.classList.remove("hide");   
                    };
                    for (let i = 0; i < this.activeSponsor.length; i++) {
                        let single_location = this.activeSponsor[i];
                        if(this.getDistanceFromLatLonInKm(this.activeSponsor[i].lat,this.activeSponsor[i].long,this.searchLat,this.searchLon)>this.distance){
                            function addClass(){
                                var el = document.getElementById('sponsor' + single_location.id);
                                el.classList.add("hide");
                            }
                            addClass();
                        }
                    }
                    for (let i = 0; i < this.locations.length; i++) {
                        let single_location = this.locations[i];
                        if(this.getDistanceFromLatLonInKm(this.locations[i].lat,this.locations[i].long,this.searchLat,this.searchLon)>this.distance){
                            function addClass(){
                                var el = document.getElementById(single_location.id);
                                el.classList.add("hide");
                            }
                            addClass();
                        }
                    }
                });
            }else{
                for (let i = 0; i < this.locations.length; i++) {
                    let single_location = this.locations[i];
                    var el = document.getElementById(single_location.id);
                    el.classList.remove("hide");     
                };
            }
           
        },
        getDistanceFromLatLonInKm(lat1,lon1,lat2,lon2) {
            function deg2rad(deg){
                return deg * (Math.PI/180)
            }

            const R = 6371; // Radius of the earth in km
            var dLat = deg2rad(lat2-lat1);  // deg2rad below
            var dLon = deg2rad(lon2-lon1); 
            var a = 
                Math.sin(dLat/2) * Math.sin(dLat/2) +
                Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) * 
                Math.sin(dLon/2) * Math.sin(dLon/2); 
            var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
            var d = R * c; // Distance in km
            return d;
        }
    },
    created: function() {
        this.getLocationsAndCategories();
    }
}
</script>

<style lang="scss" scoped>

    button.dropdown-toggle {
        background-color: white;
        border: 1px solid rgb(118, 118, 118);

        ul.dropdown-menu {

            padding: 0 10px;
        }
    }

    .sponsorized{

        .card-header{
            background-color: gold;
        }
    }

    .found_elements{
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
    }

    #map{
        width: 50% !important;
        margin-right: 20px ;
    }
    .map{
        overflow: hidden;
        position: relative;
        
        canvas{
            min-width: 600px !important;
            height: auto;
        };
    }

    .searched{
        height: 70vh;
        overflow-y: auto ;
    }

    .top{
        display: flex;

         .main_img{
            width: 200px;
            height: auto;
            border-radius: 20px;
            object-fit: cover;
            margin-right: 20px;
        }
    }
    .no-style{
        color: black;
        cursor: pointer;
        text-decoration: none;
    }

    .entire{
        width: 100%;
    }

    .half{
        width: 45%;
    }
       

    .hide{
        display: none;
    }
    
</style>