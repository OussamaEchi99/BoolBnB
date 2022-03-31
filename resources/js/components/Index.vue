<template>
    <section>
        <div class="container">

            <!-- Select -->
            <select class="form-select" aria-label="Default select example" @change="getLocations" v-model="locationId">
                <option value="" selected>Tutte</option>
                <option v-for="category in categories" :key="category.id" :value="category.id">{{ category.name }}</option>
            </select>

            <!-- Search -->
            <input v-model="pageSearchText" @keyup="locationResearchFunction()" type="text" placeholder="Cerca una città">
                
            <div class="element row">
                <div class="col-12 col-md-6 single-location" v-for="location in locations" :key="location.id">
                            
                    <!-- Single Location -->
                    <router-link class="no-style" :to="{ name: 'location-details', params: { slug: location.slug }}">
                        <div class="single_element">
                            <strong class="title">{{location.name}}</strong>
                            <img class="main_img" v-if="location.photo" :src="location.photo" alt="location.name">
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
    props: {
        searchText: String
    },
    data: function() {
        return {
            locations: [],
            locationId: "",
            categories: {},
            // filteredLocation: [],
            pageSearchText: "",
            // currentPage: 1,
            // lastPage: false
        };
    },
    methods: {
        getLocations: function() {
            axios.get('http://127.0.0.1:8000/api/locations', {
                params: {
                    // page: pageNumber,
                    category: this.locationId
                }
            })
            .then((response) => {
                this.locations = response.data.results;
                // this.currentPage = response.data.results.current_page;
                // this.lastPage = response.data.results.last_page;
                // console.log(response);
                // this.filteredSearchLocation();

            });
        },
        getCategories: function() {
            axios.get('http://127.0.0.1:8000/api/categories')
            .then((response) => {
                this.categories = response.data.results;
            })
        },
        truncateText: function(text, maxCharsNumber) {
            if(text.length > maxCharsNumber) {
                return text.substr(0, maxCharsNumber) + '...';
            }
            return text;
        },
        // filteredSearchLocation: function() {

        //     for (let i = 0; i < this.locations.length; i++) {
        //         let singleLocation = this.locations[i]
        //         if ( singleLocation.city.toLowerCase().includes(this.searchText.toLowerCase()) ) {
        //             this.filteredLocation.push(singleLocation);
        //         }
                
        //     }
        // },
        // Questa funzione permette di ricercare nella barra di ricerca una location,
        // risolvendo anche il problema di lettere maiuscole e minuscole,
        // dato che per lavorare trasforma tutto con toLowerCase().
        locationResearchFunction() {
            this.locations.forEach((element) => {
                // console.log(element.city);
                let allLocations = document.querySelector('.single-location');
                // console.log(locations.classList)

                let searchText = this.pageSearchText.toLowerCase();
                let locationCity = element.city.toLowerCase();

                if( !locationCity.includes(searchText) ) {
                    
                    // console.log(locations.classList)

                    // console.log(allLocations.classList);

                    allLocations.classList.add("d-none");
                    console.log(allLocations.classList);


                } else {

                    // allLocations.classList.remove("d-none");

                    
                    // if( allLocations.classList.find("d-none") ) {
                        // allLocations.classList.remove("d-none");
                    // }
                    
                    // console.log(singleLocation)
                    


                }
            });
        },
    },
    created: function() {
        this.getLocations();
        this.getCategories();
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
    
</style>