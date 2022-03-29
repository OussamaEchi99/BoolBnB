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
        getMap: function() {
            tt.setProductInfo('prova', '1');
            tt.map({
            key: 'R6KZnN9ipu52EGyKlInZsrp7MMTUJZP2',
            container: 'map'
            });
        }
    },
    mounted: function() {
        this.getMap();
    }

}
</script>

<style lang="scss">
#map {
           width: 100vw;
           height: 100vh;
       }
    
</style>