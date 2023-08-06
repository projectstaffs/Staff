<template>    
    <div @click.prevent="home" class="user_btn">Главная</div>
    <div v-if="token" @click.prevent="cabinet" class="user_btn">Личный кабинет</div>

    <div v-if="token" @click.prevent="worker_baby" class="user_btn">Няни</div>
    <div v-if="token" @click.prevent="worker_nurse" class="user_btn">Сиделки</div>
    <div v-if="token" @click.prevent="worker_keeper" class="user_btn">Домработницы</div>
    <div v-if="token" @click.prevent="client_baby" class="user_btn">Работа для няни</div>
    <div v-if="token" @click.prevent="client_nurse" class="user_btn">Работа для сиделки</div>
    <div v-if="token" @click.prevent="client_keeper" class="user_btn">Работа для домработницы</div>

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
        home() { this.$router.push({name: "Home"}) },     
        cabinet() { this.$router.push({name: "Account"}) },
        worker_baby() { this.$router.push({name: "BabyAll"}) },
        worker_nurse() { this.$router.push({name: "NurseAll"}) },
        worker_keeper() { this.$router.push({name: "KeeperAll"}) },
        client_baby() { this.$router.push({name: "ClientBabyAll"}) },
        client_nurse() { this.$router.push({name: "ClientNurseAll"}) },
        client_keeper() { this.$router.push({name: "ClientKeeperAll"}) },
        login() { this.$router.push({name: "Login"}) },
        register() { this.$router.push({name: "Register-menu"}) },        
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
