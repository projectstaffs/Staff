<template>
    <div class="login_title"> login page </div>
    <form @submit.prevent="login" class="login_form">        
        <input v-model="new_user.email" required class="login_form_item" type="email" placeholder="email">
        <input v-model="new_user.password" required class="login_form_item" type="password" placeholder="password">
        <button type="submit" class="login_form_btn">login</button>        
        <div @click.prevent="register" class="user_btn">Зарегистрироваться</div>
    </form>    
</template>

<script>
import { useUserStore } from '../../stores/user';
export default {
    name: "Login",
    data() {
        return {
            new_user: {}
        }
    },
    setup() {
        const User = useUserStore();
        return { User };
    },
    methods: {        
        login() {
            this.User.LOGIN_USER(this.new_user);            
        },
        register() {
            this.$router.push({name: "Register-menu"})
        },
    },
    mounted() {
        this.User.GET_TOKEN();
    },    
}
</script>

