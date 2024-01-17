<template>
    <component :is="layout">
        <router-view />
    </component>
</template>

<script>
import Menu from '../src/pages/layouts/Menu.vue';
import User from '../src/pages/layouts/User.vue';
export default {
    name: "App",
    components: { User, Menu },
    computed: {
        layout() {
            return (this.$route.meta.layout || 'Menu')
        }
    },
}
</script>


