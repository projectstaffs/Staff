<template>
    <div class="block">
        <div class="block_back"></div>
        <div class="block_content">
            <div class="container">
                <div class="staff_title">{{ $t('cabinet.title') }}</div>
                <div class="cabinet">
                    <div class="cabinet_sidebar">
                        <div class="cabinet_box">
                            <img v-if="photo" class="cabinet_img" :src="photo" alt="">
                            <div v-else class="cabinet_noimg">{{ $t('cabinet.no_img') }}</div>
                        </div>
                        <div @click.prevent="account" class="sidebar_item">{{ $t('cabinet.item1') }}</div>
                        <div @click.prevent="edit" class="sidebar_item">{{ $t('cabinet.item2') }}</div>
                        <div @click.prevent="myphoto" class="sidebar_item">{{ $t('cabinet.item3') }}</div>
                        <div @click.prevent="account" class="sidebar_item">{{ $t('cabinet.item4') }}</div>
                        <div @click.prevent="account" class="sidebar_item">{{ $t('cabinet.item5') }}</div>
                        <div @click.prevent="account" class="sidebar_item">{{ $t('cabinet.item6') }}</div>
                    </div>
                    <div class="cabinet_main">
                        <router-view />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { useUserStore } from '../../stores/user';
export default {
    name: "Cabinet",
    data() {
        return {
            photo: '',
        }
    },
    setup() {
        const User = useUserStore();
        return { User };
    },
    methods: {
        account() { this.$router.push({ name: "Account" }) },
        myphoto() { this.$router.push({ name: "Myphoto" }) },
        edit() { this.$router.push({ name: "Edit" }) },
    },
    mounted() {
        //this.photo = localStorage.user_image;
        this.User.GET_USER();
    },
}
</script>

<style>
.cabinet {
    width: 100%;
    display: flex;
    margin-top: 48px;
    border-top: 1px solid #8E8E8E;
    padding-top: 32px;
}

.cabinet_sidebar {
    width: 307px;
    padding-right: 37px;
    border-right: 1px solid #8E8E8E;
}

.cabinet_box {
    width: 250px;
    height: 250px;
    border-radius: 10px;
    background: #1E1510;
    margin: 20px 0px;
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
}

.cabinet_img {
    position: absolute;
    left: 20px;
    bottom: 20px;
    width: 250px;
    height: 250px;
    background: yellow;
    border-radius: 10px;
}

.cabinet_noimg {
    color: #FFF0D2;
}

.sidebar_item {
    cursor: pointer;
    transition: color 0.3s, background 0.3s;
    width: 250px;
    font-size: 16px;
    margin: 10px 0px;
    padding: 5px 10px;
    border-radius: 10px;
}

.sidebar_item:hover {
    color: #FFF0D2;
    background: #5C4538;
}

.cabinet_main {
    padding: 0 64px;
    flex: 1;
}
</style>

