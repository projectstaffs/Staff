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

<style>
.login_inner {
    margin-top: 200px;
    height: 540px;
    background: url(../../assets/img/main/stripes.svg), #FFF0D2 50% / cover no-repeat;
}

.login_text {
    margin-top: 48px;
}

.login_content {
    position: relative;
}

.login_form {
    position: absolute;
    top: -140px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    width: 464px;
    height: 647px;
    margin: 0 auto;
    padding: 32px;
    color: #FFF0D2;
    border-radius: 20px;
    background: #1E1510;
}

.login_form_text {
    margin-bottom: 10px;
    font-size: 16px;
}

.login_form_item {
    width: 100%;
    height: 46px;
    margin-bottom: 12px;
    padding: 0px 16px;
    border-radius: 10px;
    border: 0.2px solid #5C4538;
    background: #FFF;
}

.login_form_item::placeholder {
    color: rgba(30, 21, 16, 0.50);
    font-size: 12px;
    font-weight: 300;
}

.login_checkbox {
    display: flex;
    align-items: center;
    font-size: 12px;
    font-weight: 400;
}

.login_checkbox span {
    margin-top: 3px;
}

.login_checkbox input {
    width: 20px;
    height: 20px;
    margin-right: 8px;
}

.login_middle {
    border-radius: 10px;
    border: 1px solid #A51228;
    padding: 10px 16px;
    margin: 24px 0px;
    color: #A51228;
}

.login_middle ul {
    margin: 0;
    padding-inline-start: 20px;
}

.login_end .btn {
    width: 365px;
    border: 1px solid rgba(255, 240, 210, 0.50);
    font-size: 14px;
    margin-bottom: 24px;
}

.login_forgot {
    margin: 12px 0px 4px 0px;
    display: flex;
    justify-content: center;
}

.login_forgot span {
    cursor: pointer;
}
</style>