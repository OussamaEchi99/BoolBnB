<template>
    
    <div class="payment-message">Il pagamento è avvenuto con successo!</div>

</template>

<script>
export default {
    methods: {

        saveSponsor: function(locationId, sponsorId) {

            // Mando i dati nel controller per salvarli nel db
            axios.post('/api/sponsors/store', {
                location_id: locationId,
                sponsor_id: sponsorId
            });

        }
    },
    created: function() {
        this.saveSponsor();
    }
}
</script>

<style lang="scss" scoped>

    .payment-message {
        color: green;
        font-size: 30px;
        position: fixed;
        bottom: 20px;
        right: 20px;
    }

</style>