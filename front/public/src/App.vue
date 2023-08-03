<template>
    <Header></Header>
    <component :is="layout">
        <router-view/>
    </component>        
</template>

<script>
import Header from './pages/layouts/Header.vue';
import User from './pages/layouts/User.vue';
import Cabinet from './pages/layouts/Cabinet.vue';
export default {
    name: "App",
    computed: {
        layout(){
            return (this.$route.meta.layout || 'User')
        }
    },
    components: { User, Cabinet, Header }    
}
</script>

