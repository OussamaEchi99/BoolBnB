<template>
    <div>
        <h1>Home</h1>
        <input type="text" v-model="searchText">
        <!-- <a href="/search">Cerca un appartamento</a> -->
        

        <button>
            <router-link :to="{ name: 'search', params: {homeSearch: searchText }}">
                Cerca un appartamento
            </router-link>
        </button>
        
    </div>

</template>

<script>
export default {
    name: 'Home',
    data: function() {
        return {
            searchText: '',
        }
    }
}
</script>