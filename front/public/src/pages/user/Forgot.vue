<template>
    <div class="login_title"> Восстановление пароля </div>    
    <form @submit.prevent="forgot" class="login_form">        
        <input v-model="user.email" required class="login_form_item" type="email" placeholder="email">
        <button type="submit" class="login_form_btn">Восстановить пароль</button>
        <div @click.prevent="remember" class="user_btn">Вспомнил пароль.</div> 
    </form>    
    
    <div class="register_error">{{ User.forgot_error }}</div>
</template>

<script>
import { useUserStore } from '../../stores/user';
export default {
    name: "Forgot",
    data() {
        return {
            user: {}
        }
    },
    setup() {
        const User = useUserStore();
        return { User };
    },
    methods: {        
        forgot() {
            this.User.FORGOT_PASSWORD(this.user);            
        },
        remember() {
            this.$router.push({name: "Login"})
        },
    },
    mounted() {
        this.User.GET_TOKEN();
        this.User.forgot_error = '';
    },    
}
</script>