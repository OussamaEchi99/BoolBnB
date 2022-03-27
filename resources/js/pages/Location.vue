<template>
    <section>
        
        <h1>{{location.name}}</h1>

        <div class="img-fluid">
            <img class="main_img" v-if="location.photo" :src="location.photo" alt="location.name">
        </div>        
        
        
        <div class="container">
            <div id="map" style="width: 100%; height: 70vh;"></div>
        </div>
        <script type="application/javascript" src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.5.0/services/services-web.min.js"></script>
        
        
    </section>
</template>

<script>
export default {
    name: 'Location',
    data: function() {
        return {
            location: {},
            userIpAddress: '',
            locationId: 0
        };
    },
    methods: {

        getLocation() {
            axios.get('/api/locations/' + this.$route.params.slug)
            .then((response) => {
                if(response.data.success) {
                    this.location = response.data.results;
                    this.locationId = this.location.id;
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
                console.log(this.locationId);
                console.log(this.userIpAddress);
            });
        },
        sendIpAddressToBackend() {
            axios.post('/api/visuals/store', {
                ip: this.userIpAddress,
                location_id: this.locationId
            })
        }
        
    },
    created: function() {
        this.getLocation();
        this.getIpAddress();
    }
}

// let center = [this.long,this.lat]

// map.on('load',() =>{
//     new tt.Marker().setLngLat(center).addTo(map)
// })
</script>

<style lang="scss" scoped>
    .main_img{
        height: 50px;
    }
</style>
