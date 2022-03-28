<template>
    <section>
        <div class="container">

            <!-- Select -->
            <select class="form-select" aria-label="Default select example" @change="getLocations" v-model="locationId">
                <option value="" selected>Tutte</option>
                <option value="1">casa</option>
                <option value="2">appartamento</option>
                <option value="3">villa</option>
                <option value="4">stanza</option>
            </select>


            <div class="elements row">
                
                    <h3 v-if="locations.length < 1">Non ci sono location con questa categoria</h3>
                    
                    <div v-else class="col-12 col-md-6" v-for="location in locations" :key="location.id">
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
            locationId: "",
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
                console.log(response);
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
        this.getLocations();
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