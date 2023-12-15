<template>
    <div class="block">
        <div class="block_back"></div>
        <div class="block_content">
            <div class="popup">
                <img src="../../assets/img/info-circle.svg" alt="" class="popup_img">
                <div class="popup_content">
                    <div class="popup_item">{{ $t('popup.title') }}</div>
                    <div class="popup_item">{{ $t('popup.subtitle') }}</div>
                    <div class="popup_subitem">{{ $t('popup.text') }}</div>
                    <div class="popup_item">{{ $t('popup.end') }}</div>
                </div>
                <div @click.prevent="home" class="btn">{{ $t('popup.button') }}</div>
            </div>
        </div>
    </div>
</template>

<script>
import { useI18n } from 'vue-i18n';
export default {
    name: "Popup",
    setup() {
        const { t, locale } = useI18n({ useScope: 'global' });
        return { t, locale };
    },
    methods: {
        home() { this.$router.push({ name: "Home" }) }
    },
}
</script>

<style>
.popup {
    width: 720px;
    height: 468px;
    border-radius: 20px;
    background: #5C4538;
    margin: 0 auto;
    padding: 40px 64px;
    color: #FFF0D2;
    position: relative;
}

.popup_content {
    margin-top: 40px;
}

.popup_img {
    position: absolute;
    left: 41px;
    top: 24px;
}

.popup_item {
    text-align: center;
    font-size: 24px;
    font-weight: 300;
    margin-bottom: 40px;
}

.popup_subitem {
    text-align: center;
    font-size: 16px;
    margin-bottom: 40px;
}

.popup .btn {
    width: 122px;
    font-size: 14px;
    transition: scale 0.3s;
}

.popup .btn:hover {
    scale: 1.2;
    background: #1E1510;
}
</style>