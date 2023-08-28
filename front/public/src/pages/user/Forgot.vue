<template>
    <div class="login_title"> Восстановление пароля </div>    
    <form @submit.prevent="forgot" class="login_form">        
        <input v-model="email" required class="login_form_item" type="email" placeholder="email">
        <button type="submit" class="login_form_btn">login</button>
    </form>
    <div @click.prevent="remember" class="user_btn">Вспомнил пароль.</div> 
    
    <div class="register_error">{{ User.forgot_error }}</div>
</template>

<script>
import { useUserStore } from '../../stores/user';
export default {
    name: "Forgot",
    data() {
        return {
            email: ''
        }
    },
    setup() {
        const User = useUserStore();
        return { User };
    },
    methods: {        
        forgot() {
            this.User.LOGIN_USER(this.new_user);            
        },
        remember() {
            this.$router.push({name: "Login"})
        },
    },
    mounted() {
        this.User.GET_TOKEN();
    },    
}
</script>