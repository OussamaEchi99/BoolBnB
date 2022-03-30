<template>
    <section>
        <h1>sono una mappa</h1>
        <div id="map" class="map"></div>
        

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
            key: 'R6KZnN9ipu52EGyKlInZsrp7MMTUJZP2',
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
           width: 50vw;
           height: 50vh;
       }
    
</style>