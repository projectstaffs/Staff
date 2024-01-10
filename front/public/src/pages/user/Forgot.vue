<template>
    <div class="block">
        <div class="block_back"></div>
        <div class="block_content">
            <div class="container">
                <div class="staff_title">{{ $t('auth.title_pass') }}</div>
                <div class="login_text">{{ $t('auth.text') }}</div>
            </div>
            <div class="login_inner forgot_inner">
                <div class="container">
                    <div class="login_content">
                        <form @submit.prevent="forgot" class="login_form forgot_form">
                            <div class="login_start">
                                <div class="login_form_text">{{ $t('register.item4') }}</div>
                                <input v-model="user.email" required class="login_form_item" type="email"
                                    :placeholder="$t('register.item4_holder')">
                            </div>

                            <div v-if="User.forgot_error" class="login_middle">
                                <ul>
                                    <li>{{ $t('auth.error_pass') }}</li>
                                </ul>
                            </div>

                            <div class="login_end">
                                <button type="submit" class="btn">{{ $t('auth.btn_pass') }}</button>
                                <div @click.prevent="remember" class="login_forgot"><span>{{ $t('auth.btn_pass2') }}</span>
                                </div>
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
        this.User.forgot_error = '';
    },
}
</script>

<style>
.forgot_inner {
    min-height: 300px;
}

.forgot_form {
    min-height: 400px;
}
</style>