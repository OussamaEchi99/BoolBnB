<template>
    <div id="map"></div>
</template>

<script>
// fonte https://developer.tomtom.com/blog/build-different/using-tomtom-maps-vue-3
export default {
    name: 'LocationMap',
    // props: {
    //     lng: 11.349230,
    //     lat: 45.710370,
    // },
    data() {
        return {
            apiKey: 'jRVJgpmxvidkjvJmEfhDb7On6Yp71S6p', //tua key personale da developer.tomtom
            tt: window.tt,
            coordinates: [this.lng,this.lat],
        }
    },
    methods: {
        getMap() {
            let map = this.tt.map({
                key: this.apiKey,
                container: 'map',
                center: this.coordinates,
                zoom: 14
            });
            map.addControl(new this.tt.FullscreenControl()); 
            map.addControl(new this.tt.NavigationControl());
            this.addMarker(map);
        },
        addMarker(map) { 
            let popupOffset = 25; 
        
            var marker = new this.tt.Marker().setLngLat(this.coordinates).addTo(map); 
            var popup = new this.tt.Popup({ offset: popupOffset }); 
            this.reverseGeocoding(marker, popup); 
            marker.setPopup(popup).togglePopup(); 
        },
        reverseGeocoding(marker, popup) { 
            this.tt.services.reverseGeocode({ 
            key: 'jRVJgpmxvidkjvJmEfhDb7On6Yp71S6p', 
            position: marker.getLngLat() 
            })
            .then( function( result ){ 
            console.log(result.addresses[0].address.freeformAddress); 
            popup.setHTML(result.addresses[0].address.freeformAddress); 
            }) 
        }
    },
}
</script>

<style lang="scss" scoped>
#map {
  height: 90vh;
  width: 90vw;
}
</style>