<template>
    <header class="header">
        <div class="container">
            <div class="header_inner">
                <div class="header_start">
                    <div @click.prevent="home" class="header_logo">
                        <img src="../../assets/img/logo.svg" alt="" class="header_img">
                    </div>
                </div>
                <div class="header_end">
                    <ul class="header_end_items">
                        <li class="header_end_item">
                            <a class="header_btn" href="#">{{ $t('header.item1') }}</a>
                        </li>
                        <li class="header_end_item">
                            <a class="header_btn" href="#">{{ $t('header.item2') }}</a>
                        </li>
                        <li class="header_end_item">
                            <a class="header_btn" href="#">{{ $t('header.item3') }}</a>
                        </li>
                        <li class="header_end_item">
                            <a class="header_btn" href="#">{{ $t('header.item4') }}</a>
                        </li>
                        <li class="header_end_item">
                            <a class="header_btn" href="#">{{ $t('header.item5') }}</a>
                        </li>
                    </ul>
                    <ul class="header_langs">
                        <li @click.prevent="setUA" class="header_langs_item">UA</li>
                        <li @click.prevent="setEN" class="header_langs_item">EN</li>
                    </ul>
                    <div class="btn">{{ $t('header.login') }}</div>
                </div>
            </div>
        </div>
    </header>

    <!-- 
        <div @click.prevent="home" class="user_btn">Главная</div>
        <div v-if="User.token" @click.prevent="cabinet" class="user_btn">Личный кабинет</div>
        <div v-if="User.token" @click.prevent="worker_baby" class="user_btn">Няни</div>
        <div v-if="User.token" @click.prevent="worker_nurse" class="user_btn">Сиделки</div>
        <div v-if="User.token" @click.prevent="worker_keeper" class="user_btn">Домработницы</div>
        <div v-if="User.token" @click.prevent="client_baby" class="user_btn">Работа для няни</div>
        <div v-if="User.token" @click.prevent="client_nurse" class="user_btn">Работа для сиделки</div>
        <div v-if="User.token" @click.prevent="client_keeper" class="user_btn">Работа для домработницы</div>
        <div v-if="!User.token" @click.prevent="login" class="user_btn">login</div>
        <div v-if="!User.token" @click.prevent="register" class="user_btn">register</div>
        <div v-if="User.token" @click.prevent="logout" class="user_btn">logout</div>
    -->
</template>

<script>
import { useI18n } from 'vue-i18n';
import { useUserStore } from '../../stores/user'
export default {
    name: "Header",
    setup() {
        const { t, locale } = useI18n({ useScope: 'global' });
        const User = useUserStore();
        return { t, locale, User };
    },
    methods: {
        home() { this.$router.push({ name: "Home" }) },
        cabinet() { this.$router.push({ name: "Account" }) },
        worker_baby() { this.$router.push({ name: "BabyAll" }) },
        worker_nurse() { this.$router.push({ name: "NurseAll" }) },
        worker_keeper() { this.$router.push({ name: "KeeperAll" }) },
        client_baby() { this.$router.push({ name: "ClientBabyAll" }) },
        client_nurse() { this.$router.push({ name: "ClientNurseAll" }) },
        client_keeper() { this.$router.push({ name: "ClientKeeperAll" }) },
        login() { this.$router.push({ name: "Login" }) },
        register() { this.$router.push({ name: "Register-menu" }) },
        logout() {
            this.User.LOGOUT_USER();
        },
        setUA() {
            if (this.locale === 'en') {
                this.locale = 'ua';
                localStorage.lang = this.locale;
            }
        },
        setEN() {
            if (this.locale === 'ua') {
                this.locale = 'en';
                localStorage.lang = this.locale;
            }
        },
    },
    mounted() {
        this.User.GET_TOKEN();
    },
}
</script>

<style>
.header {}
</style>