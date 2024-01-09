<template>
    <router-view />
</template>

<script>
import { useUserStore } from '../../stores/user';
import { useSocketStore } from '../../stores/socket';
export default {
    name: "User",
    setup() {
        const User = useUserStore();
        const Socket = useSocketStore();
        return { User, Socket };
    },
    mounted() {
        this.User.GET_TOKEN();
        this.Socket.connect();
    },
}
</script>
