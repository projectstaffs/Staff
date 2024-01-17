<template>
    <router-view />
</template>

<script>
import { useUserStore } from '../../stores/user';
export default {
    name: "User",
    setup() {
        const User = useUserStore();
        return { User };
    },
    mounted() {
        this.User.GET_TOKEN();
    },
}
</script>