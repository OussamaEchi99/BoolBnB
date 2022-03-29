<template>
    <section>
        <div id="map" class="map"></div>
<<<<<<< HEAD
=======


>>>>>>> 665637cb848cf7e0f06bd9db374a727722ef46d8
    </section>
</template>

<script>
export default {
   name: 'Map',
   methods: {
        // getMap: function() {
        //     tt.setProductInfo('prova', '1');
        //     tt.map({
        //     key: 'R6KZnN9ipu52EGyKlInZsrp7MMTUJZP2',
        //     container: 'map'
        //     });
        //     this.initializeMap();
        // },
        initializeMap: function() {
            const map = tt.map({
            key: '4xOYA50eGLm6ip0bG0fIFwWnKd4PpRau',
            container: 'map',
            zoom: 15,
            center: [9.665420, 45.704690],
            });
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
           width: 100%;
           height: 400px;
       }

</style>
