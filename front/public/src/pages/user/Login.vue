<template>
    <div class="block">
        <div class="block_back"></div>
        <div class="block_content">
            <div class="container">
                <div class="staff_title">{{ $t('auth.title') }}</div>
                <div class="login_text">{{ $t('auth.text') }}</div>
            </div>
            <div class="login_inner">
                <div class="container">
                    <div class="login_content">
                        <form @submit.prevent="login" class="login_form">
                            <div class="login_start">
                                <div class="login_form_text">{{ $t('auth.item1') }}</div>
                                <input v-model="new_user.email" required class="login_form_item" type="email"
                                    :placeholder="$t('auth.item1_holder')">
                                <div class="login_form_text">{{ $t('auth.item2') }}</div>
                                <input v-model="new_user.password" required class="login_form_item" type="password"
                                    :placeholder="$t('auth.item2_holder')">
                                <label class="login_checkbox">
                                    <input type="checkbox" v-model="rememberMe"> <span>{{ $t('auth.remember') }}</span>
                                </label>
                            </div>
                            <div v-if="User.login_error" class="login_middle">
                                <ul>
                                    <li>{{ $t('auth.error') }}</li>
                                </ul>
                            </div>
                            <div class="login_end">
                                <button type="submit" class="btn">{{ $t('auth.enter') }}</button>
                                <div @click.prevent="employer" class="btn">{{ $t('auth.register_client') }}</div>
                                <div @click.prevent="executor" class="btn">{{ $t('auth.register_worker') }}</div>
                                <div @click.prevent="forgot" class="login_forgot"><span>{{ $t('auth.forgot') }}</span></div>
                            </div>
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
    name: "Login",
    data() {
        return {
            new_user: {},
            rememberMe: false,
        }
    },
    setup() {
        const User = useUserStore();
        return { User };
    },
    methods: {
        login() {
            if (this.rememberMe) {
                localStorage.setItem('userLogin', this.new_user.email);
            } else { localStorage.removeItem('userLogin'); }
            this.User.LOGIN_USER(this.new_user);
        },
        employer() { this.$router.push({ name: "Register-employer" }); },
        executor() { this.$router.push({ name: "Register" }); },
        forgot() { this.$router.push({ name: "Forgot" }) },
    },
    mounted() {
        this.User.GET_TOKEN();
        if (localStorage.userLogin) { this.new_user.email = localStorage.userLogin }
    },
}
</script>

