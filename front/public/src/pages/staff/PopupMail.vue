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
export default {
    name: "PopupMail",
    methods: {
        home() { this.$router.push({ name: "Home" }) }
    },
}
</script>