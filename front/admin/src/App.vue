<template>
    <Header></Header>
    <component :is="layout">
        <router-view/>
    </component>      
</template>

<script>
import Header from '../src/pages/layouts/Header.vue';
import Menu from '../src/pages/layouts/Menu.vue';
import User from '../src/pages/layouts/User.vue';
export default {
    name: "App",
    components: { User, Menu, Header },
    computed: {
        layout(){
            return (this.$route.meta.layout || 'User')
        }
    },
}
</script>


