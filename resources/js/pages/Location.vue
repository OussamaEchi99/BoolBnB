<template>
    <section>
        
        <h1>{{location.name}}</h1>

        <div class="img-fluid">
            <img class="main_img" v-if="location.photo" :src="location.photo" alt="location.name">
        </div>        
        
        <router-link class="no-style" :to="{ name: 'contact', params: {id: location.id }}">
            Clicca qui per contattare il proprietario dell'immobile
        </router-link>
        
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
                console.log(this.userIpAddress)
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

</script>

<style lang="scss" scoped>
    .main_img{
        height: 50px;
    }
</style>
