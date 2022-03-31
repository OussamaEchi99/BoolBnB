<template>
    <section>

        <div class="container">
            <h1>{{location.name}}</h1>

            <div class="img-fluid">
                <img class="main_img" v-if="location.photo" :src="location.photo" alt="location.name">
            </div>

            <div>({{location.country}}){{location.city}} - {{location.address}} {{location.number}}</div>

            <div><strong>N. Stanze:</strong> {{location.rooms}}</div>

            <div><strong>N. Posti letto:</strong> {{location.beds}}</div>

            <div><strong>N. Bagni:</strong> {{location.bathrooms}}</div>

            <div><strong>Metri Quadri:</strong> {{location.square_meters}} mq</div>

            <div><strong>Prezzo (per notte):</strong> {{location.price}} €</div>

            <div><strong>Servizi:</strong>
                <span v-for="(element,index) in location.features" :key="index">{{element.name}} </span>
            </div>

            <p>{{location.description}}</p>

            <router-link class="no-style" :to="{ name: 'contact', params: {id: location.id }}">
                Clicca qui per contattare il proprietario della location
            </router-link>

            <div id="map" class="map"></div>
        </div>

    </section>
</template>

<script>
import Map from '../components/Map.vue';
export default {
    name: 'Location',
    components: {
        Map
    },

    data: function() {
        return {
            location: {},
            locationLong: 0,
            locationLat: 0,
            userIpAddress: '',
            TomTomApiKey: 'IEix9iHTEHOJolKXAoByVdl4reKermIB',

        };
    },
    methods: {
        initializeMap: function() {
            const map = tt.map({
            key: 'IEix9iHTEHOJolKXAoByVdl4reKermIB',
            container: 'map',
            zoom: 15,
            center: [this.locationLong, this.locationLat],
            });
             // aggiunta controlli mappa
            map.addControl(new tt.FullscreenControl());
            map.addControl(new tt.NavigationControl());

            new tt.Marker().setLngLat([this.locationLong, this.locationLat]).addTo(map);
        },

        getLocation() {
            axios.get('/api/locations/' + this.$route.params.slug)
            .then((response) => {
                if(response.data.success) {
                    this.location = response.data.results;
                    this.locationId = this.location.id;
                    this.locationLong = this.location.long;
                    this.locationLat = this.location.lat;
                    this.getIpAddress();
                    this.initializeMap();
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

    },
    created: function() {
        this.getLocation();
    },

    mounted: function(){

    }
}

</script>

<style lang="scss" scoped>
    .main_img{
        width: 70%;
    }
</style>
