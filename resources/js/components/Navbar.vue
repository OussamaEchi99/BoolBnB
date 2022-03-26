<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="flex navbar-nav">
                        <li>
                            <router-link :to="{name: this.homepage.name}" class="navbar-brand">{{this.homepage.label}}</router-link>
                        </li>
                        <li v-for="(link, index) in menuLinks" :key="index" class="nav-item">
                            <router-link class="nav-link" :to="{ name: link.name }">{{ link.label }}</router-link>
                        </li>
                        <li class="nav-item">
                            <a href="/login" class="nav-link">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        
    </div>
</template>

<script>
export default {
    name: 'Navbar',
    data: function() {
        return {
            homepage:  {
                    name: 'homepage',
                    label: 'Homepage'
                },
            menuLinks: [
                {
                    name: 'search',
                    label: 'Search'
                }
            ],
        };
    }
}
</script>

<style lang="scss" scoped>
    .flex{
        width: 100%;
        justify-content: space-between;
    }
</style>