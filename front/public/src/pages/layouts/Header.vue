<template>
    <header class="header">
        <div class="container">
            <div class="header_inner">
                <div @click.prevent="home" class="header_start">
                    <img @mouseover="handleMouseOver" @mouseout="handleMouseOut"
                        :src="isHovered ? hoveredImageSrc : originalImageSrc" alt="" class="header_img inactive">
                </div>
                <div class="header_end">
                    <ul class="header_end_items">
                        <li @click.prevent="homeStaff" class="header_end_item">
                            <a class="header_btn" id="home_staff" href="#">{{ $t('header.item1') }}</a>
                        </li>
                        <li @click.prevent="service" class="header_end_item">
                            <a class="header_btn" id="service" href="#">{{ $t('header.item2') }}</a>
                        </li>
                        <li @click.prevent="homeStaff" class="header_end_item">
                            <a class="header_btn" id="client" href="#">{{ $t('header.item3') }}</a>
                        </li>
                        <li @click.prevent="seekers" class="header_end_item">
                            <a class="header_btn" id="worker" href="#">{{ $t('header.item4') }}</a>
                        </li>
                        <li @click.prevent="about" class="header_end_item">
                            <a class="header_btn" id="about" href="#">{{ $t('header.item5') }}</a>
                        </li>
                    </ul>
                    <ul class="header_langs">
                        <li @click.prevent="setUA" class="header_langs_item" data-lang="ua">UA</li>
                        <li @click.prevent="setEN" class="header_langs_item" data-lang="en">EN</li>
                    </ul>
                    <div class="btn">{{ $t('header.login') }}</div>
                    <button class="header_burger_btn" type="button">
                        <span class="header_burger_box">
                            <span class="header_burger_inner"></span>
                        </span>
                    </button>
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
    data() {
        return {
            originalImageSrc: '../../src/assets/img/logo.svg',
            hoveredImageSrc: '../../src/assets/img/footer/footer_logo.svg',
            isHovered: false,
        }
    },
    setup() {
        const { t, locale } = useI18n({ useScope: 'global' });
        const User = useUserStore();
        return { t, locale, User };
    },
    methods: {
        home() { this.$router.push({ name: "Home" }) },
        about() { this.$router.push({ name: "About" }) },
        service() { this.$router.push({ name: "Service" }) },
        seekers() { this.$router.push({ name: "Seekers" }) },
        homeStaff() { this.$router.push({ name: "HomeStaff" }) },

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
        handleMouseOver() {
            this.isHovered = true;
        },
        handleMouseOut() {
            this.isHovered = false;
        },
    },
    mounted() {
        this.User.GET_TOKEN();
    },
}
</script>

<style>
.header {
    padding: 8px 0px 2px 0px;
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 120px;
    z-index: 5;
    background: rgba(255, 255, 255, 0.10);
}

.header_inner {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.header_end,
.header_start,
.header_logo,
.header_end_items {
    display: flex;
    align-items: center;
}

.header_end_items {
    list-style: none;
    margin: 0;
    padding: 0;
}

.header_start:hover {
    cursor: pointer;
}

.header_end_item {
    display: flex;
    align-items: center;
    height: 48px;
    padding: 16px 12px;
    margin: 0px 9px;
}

.header_end .btn {
    width: 115px;
    padding: 16px;
    color: rgba(255, 255, 255, 0.50);
    font-size: 14px;
}

.header_end .btn:hover {
    background: #FFF0D2;
    color: #1E1510;
}

.header_btn {
    color: #1C1C1C;
    font-size: 14px;
    font-weight: 500;
    transition: color 0.3s;
}

.header_btn.is_active {
    color: #FFF0D2;
}

@keyframes fadeInOut {
    0% {
        opacity: 0;
    }

    25% {
        opacity: 0.25;
    }

    50% {
        opacity: 0.5;
    }

    75% {
        opacity: 0.75;
    }

    100% {
        opacity: 1;
    }
}

.header_img:hover {
    animation: fadeInOut 0.3s;
}

.header_btn:hover {
    color: #FFF0D2;
}

.header_langs {
    margin: 0px 14px 0px 5px;
    padding: 0;
}

.header_langs_item {
    display: flex;
    align-items: center;
    width: 24px;
    height: 0px;
    padding: 0px;
    margin: 0px;
    color: #1C1C1C;
    font-size: 12px;
    border-radius: 4px;
    transition: color 0.5s, background 0.5s;
    opacity: 0;
}

.header_langs_item.is_active {
    margin: 3px 0px;
    padding: 4px;
    height: 22px;
    opacity: 1;
}

.header_langs:hover .header_langs_item {
    margin: 3px 0px;
    padding: 4px;
    height: 22px;
    opacity: 1;
}

.header_langs_item:hover {
    cursor: pointer;
    background: #1C1C1C;
    color: #FFF0D2;
}

.header_burger_btn {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    background: none;
    border-radius: 0;
    cursor: pointer;
    margin-left: 30px;
    padding: 3px;
    border: 0;
}

.header_burger_box {
    display: inline-block;
}

.header_burger_inner {
    position: relative;
    background: #1E1510;
    height: 4px;
    width: 33px;
    display: block;
    top: 50%;
    border-radius: 4px;
    transition: background 0.3s;
}

.header_burger_inner::before,
.header_burger_inner::after {
    content: '';
    height: 4px;
    width: 100%;
    background: #1E1510;
    position: absolute;
    left: 0;
    border-radius: 4px;
    transition: background 0.3s;
}

.header_burger_inner::before {
    top: -10px;
}

.header_burger_inner::after {
    bottom: -10px;
}

.header_burger_btn:hover .header_burger_inner,
.header_burger_btn:hover .header_burger_inner::before,
.header_burger_btn:hover .header_burger_inner::after {
    background: #FFF0D2;
}

.header_burger_btn {
    display: none;
}

@media (max-width: 1200px) {

    .header_end_item {
        margin: 0px;
    }

    .header_langs {
        margin: 0px 5px 0px 0px;
    }
}

@media (max-width: 992px) {
    .header {
        height: 90px;
    }

    .header_img {
        width: 80px;
        height: 80px;
    }

    .header_end_items {
        display: none;
    }

    .header_burger_btn {
        display: flex;
    }

    .header_langs {
        margin: 0px 30px 0px 5px;
    }
}

@media (max-width: 576px) {
    .header_end .btn {
        display: none;
    }

    .header_langs {
        margin-right: 0px;
    }
}
</style>