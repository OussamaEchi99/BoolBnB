<template>
    <section>
        <div class="container">

            <!-- Select -->
            <select class="form-select" aria-label="Default select example" v-model="tmpCategory">
                <option :value="0" selected>Tutte</option>
                <option v-for="category in categories" :key="category.id" :value="category.id">{{ category.name }}</option>
            </select>

            <!-- Search -->
            <input @keyup.enter="getCoordinates()" v-model="searchText" type="text" placeholder="Cerca una città">

            <label for="vol">Range ricerca</label>
            <input value="20" v-model="distance" type="range" id="range" name="range" min="10" max="50">
            {{distance}}Km
                
            <div class="element row my-4">
                <div :id="location.id" :class=" (location.category_id != tmpCategory) && (tmpCategory != 0) ? 'hide' : 'show'" class="col-12 col-md-6 single-location" v-for="location in locations" :key="location.id">
                            
                    <router-link class="no-style" :to="{ name: 'location-details', params: { slug: location.slug }}">
                        <div class="single_element">
                            <strong class="title">{{location.name}}</strong>
                            <img class="main_img" :src="location.photo.includes(`https:`) ?  location.photo : `http://127.0.0.1:8000/storage/` + location.photo" alt="location.name">
                            <p v-if="location.description" class="description">{{truncateText(location.description, 150)}}</p>
                            <span class="price">{{location.price}}€ a notte</span>
                        </div>
                    </router-link>

                </div>
            </div>


            <!-- PAGINATION -->

            <!-- <nav>
                <ul class="pagination">
                    <li class="page-item" :class="{ 'disabled': currentPage == 1 }">
                        <a @click="getLocations(currentPage - 1)" class="page-link" href="#">Previous</a>
                    </li>

                    <li v-for="n in lastPage" :key="n" class="page-item" :class="{ 'active': currentPage == n }">
                        <a @click="getLocations(n)" class="page-link" href="#">{{ n }}</a>
                    </li>


                    <li class="page-item" :class="{ 'disabled': currentPage == lastPage }">
                        <a @click="getLocations(currentPage + 1)" class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav> -->


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
            // pageSearchText: "",
            // currentPage: 1,
            // lastPage: false
        };
    },
    methods: {
        getLocationsAndCategories: function() {
            axios.get('http://127.0.0.1:8000/api/locations', {
                // params: {
                //     // page: pageNumber,
                //     category: this.locationId
                // }
            })
            .then((response) => {
                this.locations = response.data.results.locations;
                this.categories = response.data.results.categories;
                // this.currentPage = response.data.results.current_page;
                // this.lastPage = response.data.results.last_page;
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
                    for (let i = 0; i < this.locations.length; i++) {
                        let single_location = this.locations[i];
                        var el = document.getElementById(single_location.id);
                        el.classList.remove("hide");     
                    };
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
        // getDistanceFromLatLonInKm(lat1,lon1,lat2,lon2) {
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
    .no-style{
        color: black;
        cursor: pointer;
        text-decoration: none;
    }
    .single_element{
        display: flex;
        flex-direction: column;
        align-items: center;
        border-radius: 20px;

        .title{
            font-size: 30px;
        }

        .main_img{
            width: 100%;
            height: 300px;
            border-radius: 20px;
            object-fit: cover;
        }

        .description{
            margin: 20px 0;
        }
    }

    .hide{
        display: none;
    }
    
</style>