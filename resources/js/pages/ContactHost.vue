<template>
    <div>
        <section>
            <div class="container">
                <h1>Contanct us</h1>

                <div v-if="success">Email sent succesfully</div>

                <form>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input v-model="email" type="email" class="form-control" id="email">
                    </div>

                    <div v-if="errors.email">
                        <p v-for="(error, index) in errors.email" :key="index">{{ error }}</p>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input v-model="name" type="text" class="form-control" id="name">
                    </div>

                    <div v-if="errors.name">
                        <p v-for="(error, index) in errors.name" :key="index">{{ error }}</p>
                    </div>

                    <div class="mb-3">
                        <label for="object" class="form-label">Oggetto Email</label>
                        <input v-model="object" type="text" class="form-control" id="object">
                    </div>

                    <div v-if="errors.object">
                        <p v-for="(error, index) in errors.object" :key="index">{{ error }}</p>
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label">Testo Email</label>
                        <textarea v-model="message" class="form-control" id="message" cols="30" rows="10"></textarea>
                    </div>

                    <div v-if="errors.message">
                        <p v-for="(error, index) in errors.message" :key="index">{{ error }}</p>
                    </div>

                    <button type="submit" @click.prevent="sendMessage()" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </section>
    </div>
</template>


<script>
export default {
    name: 'ContactHost',
    data: function() {
        return {
            location_id: this.$route.params.id,
            email: '',
            name: '',
            object: '',
            message: '',
            success: false,
            errors: {}
        };
    },
    methods: {
        sendMessage: function() {
            console.log(this.$route.params.id)
            axios.post('/api/leads/store', {
                location_id: this.location_id,
                email: this.email,
                name: this.name,
                object: this.object,
                message: this.message
            })
            .then((response) => {
                if(response.data.success) {
                    this.location_id = '';
                    this.name = '';
                    this.email = '';
                    this.object = '';
                    this.message = '';
                    this.success = true;
                    this.error = {};
                } else {
                    this.success = false;
                    this.errors = response.data.errors
                }
            });
        }
    }
}
</script>

<style lang="scss" scoped>

</style>