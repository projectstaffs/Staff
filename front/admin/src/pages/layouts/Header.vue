<template> 
    <div v-if="token" @click.prevent="cabinet" class="user_btn">Menu</div> 
    <div v-if="!token" @click.prevent="login" class="user_btn">login</div>        
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
        cabinet() {
            this.$router.push({name: "Messages"})
        },
        login() {
            this.$router.push({name: "Login"})
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