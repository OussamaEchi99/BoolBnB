<template>
    <section>
        
        <div class="container">
            <h1>{{location.name}}</h1>

            <div class="img-fluid">
                <img class="main_img" v-if="location.photo" :src="location.photo" alt="location.name">
            </div>        
            
            <router-link class="no-style" :to="{ name: 'contact', params: {id: location.id }}">
                Clicca qui per contattare il proprietario dell'immobile
            </router-link>

            <!-- <div class="map">
                <img src="https://api.tomtom.com/map/1/staticimage?key=IEix9iHTEHOJolKXAoByVdl4reKermIB&center=9.655420,45.704690&zoom=16&width=500&height=500&format=jpg" alt="mappa">
            </div> -->
            <Map />
        </div>
        
    </section>
</template>

<script>
<<<<<<< HEAD

=======
import Map from '../components/Map.vue';
>>>>>>> a938ee33ea45611fc44b89697afd89fff11a279b
export default {
    name: 'Location',
    components: {
        Map
    },
    data: function() {
        return {
            location: {},
            locationLong: '',
            locationLat: '',
            userIpAddress: '',
            locationId: 0,
            TomTomApiKey: 'IEix9iHTEHOJolKXAoByVdl4reKermIB',
            mapCoordinate: '9.655420,45.704690',
            mapZoom: 13,
            mapWidth: 500,
            mapHeight: 500,
            imgFormat: 'jpg',
            mapImgZoom13: '',
            mapImgZoom16: ''

        };
    },
    methods: {

        getLocation() {
            axios.get('/api/locations/' + this.$route.params.slug)
            .then((response) => {
                if(response.data.success) {
                    this.location = response.data.results;
                    this.locationId = this.location.id;
                    this.locationLong = this.location.long;
                    this.locationLat = this.location.lat;
                } 
                else {
                    this.$router.push({ name: 'not-found' });
                }
            });
        },
        getIpAddress() {
            axios.get('https://ip-fast.com/api/ip/')
            .then((response) => {
                this.userIpAddress = response.data;
                this.sendIpAddressToBackend();
            });
        },
        sendIpAddressToBackend() {
            axios.post('/api/visuals/store', {
                ip: this.userIpAddress,
                location_id: this.locationId
            })
        },
        getMapImage() {
            axios.get('https://api.tomtom.com/map/1/staticimage?key=IEix9iHTEHOJolKXAoByVdl4reKermIB&center=9.655420,45.704690&zoom=16&width=500&height=500&format=jpg', {
                params: {
                    // apiKey: this.TomTomApiKey,
                    // center: this.mapCoordinate,
                    // zoom: this.mapZoom,
                    // width: this.mapWidth,
                    // height: this.mapHeight,
                    // format: this.imgFormat
                }
            })
            .then((response) => {
                this.mapImgZoom13 = response;
                // console.log(response)
            });
        },
        
    },
    created: function() {
        this.getLocation();
        this.getIpAddress();
        this.getMapImage();
    }
}

</script>

<style lang="scss" scoped>
    .main_img{
        height: 50px;
    }
</style>
