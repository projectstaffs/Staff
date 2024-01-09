<template>
    <div class="block">
        <div class="block_back"></div>
        <div class="block_content">
            <div class="container">
                <div class="login_title"> Восстановление пароля </div>
            </div>
            <div class="login_inner">
                <div class="container">
                    <div class="login_content">
                        <form @submit.prevent="forgot" class="login_form">
                            <input v-model="user.email" required class="login_form_item" type="email" placeholder="email">

                            <div v-if="User.forgot_error" class="login_middle">
                                <ul>
                                    <li>{{ $t('auth.error') }}</li>
                                </ul>
                            </div>

                            <button type="submit" class="btn">Восстановить пароль</button>
                            <div @click.prevent="remember" class="btn">Вспомнил пароль.</div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
            //console.log(this.user);
            this.User.FORGOT_PASSWORD(this.user);
        },
        remember() {
            this.$router.push({ name: "Login" })
        },
    },
    mounted() {
        this.User.GET_TOKEN();
        this.User.forgot_error = '';
    },
}
</script>