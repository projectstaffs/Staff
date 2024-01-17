<template>
    <div v-if="User.token" @click.prevent="cabinet" class="user_btn">Menu</div>
    <div v-if="!User.token" @click.prevent="login" class="user_btn">login</div>
    <div v-if="User.token" @click.prevent="logout" class="user_btn">logout</div>
</template>

<script>
import { useUserStore } from '../../stores/user'
export default {
    name: "Header",
    setup() {
        const User = useUserStore();
        return { User };
    },
    methods: {
        cabinet() {
            this.$router.push({ name: "Users" })
        },
        login() {
            this.$router.push({ name: "Login" })
        },
        logout() {
            this.User.LOGOUT_USER();
        },
    },
    mounted() {
        this.User.GET_TOKEN();
    },
}
</script>