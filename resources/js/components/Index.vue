<template>
    <section>
        <div class="container">
            <div class="elements row">
                <div class="col-12 col-md-6" v-for="location in locations" :key="location.id">
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
            <nav>
                <ul class="pagination">
                    <li class="page-item" :class="{ 'disabled': currentPage == 1 }">
                        <a @click="getPosts(currentPage - 1)" class="page-link" href="#">Previous</a>
                    </li>

                    <li v-for="n in lastPage" :key="n" class="page-item" :class="{ 'active': currentPage == n }">
                        <a @click="getPosts(n)" class="page-link" href="#">{{ n }}</a>
                    </li>


                    <li class="page-item" :class="{ 'disabled': currentPage == lastPage }">
                        <a @click="getPosts(currentPage + 1)" class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
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