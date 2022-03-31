<template>
    <section>
        <div id="map" class="map"></div>


    </section>
</template>

<script>
export default {
   name: 'Map',
   methods: {
        initializeMap: function() {
            const map = tt.map({
            key: '4xOYA50eGLm6ip0bG0fIFwWnKd4PpRau',
            container: 'map',
            zoom: 15,
            center: [9.665420, 45.704690],
            });
             // aggiunta controlli mappa
            map.addControl(new tt.FullscreenControl());
            map.addControl(new tt.NavigationControl());

            new tt.Marker().setLngLat([9.665420, 45.704690]).addTo(map);
        }
    },
    mounted: function() {
        // this.getMap();
        this.initializeMap();
    }

}
</script>

<style lang="scss">
#map {
           width: 50%;
           height: 400px;
       }

</style>
