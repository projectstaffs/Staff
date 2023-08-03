<template>    
    <div @click.prevent="home" class="user_btn">home</div>
    <div v-if="token" @click.prevent="cabinet" class="user_btn">personal</div> 
    <div v-if="!token" @click.prevent="login" class="user_btn">login</div>
    <div v-if="!token" @click.prevent="register" class="user_btn">register</div>    
    <div v-if="token" @click.prevent="logout" class="user_btn">logout</div>        
</template>

<script>
import { useUserStore } from '../../stores/user'
export default {
    name: "Header",
    data() {
        return {
            token: ''
        }
    },
    setup() {
        const User = useUserStore();
        return { User };
    },
    methods: {           
        home() {
            this.$router.push({name: "Home"})
        },     
        cabinet() {
            this.$router.push({name: "Account"})
        },
        login() {
            this.$router.push({name: "Login"})
        },
        register() {
            this.$router.push({name: "Register-menu"})
        },        
        logout() {
            this.User.LOGOUT_USER();
            this.token = '';
        },
    },
    mounted() {
        this.token = localStorage.access_token;
    },       
}
</script>
