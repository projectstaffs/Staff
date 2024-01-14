<template>
    <div class="block">
        <div class="block_back"></div>
        <div class="block_content">
            <div class="popup mailfix">
                <img src="../../assets/img/info-circle.svg" alt="" class="popup_img">
                <div class="popup_content">
                    <div class="popup_item">{{ $t('popup.title') }}</div>
                    <div class="popup_item">
                        {{ $t('popup.item1') }}
                        <span v-if="User.user.name"> {{ User.user.name[locale] }}</span>
                    </div>
                    <div class="popup_subitem">{{ $t('popup.item2') }} </div>
                    <div class="popup_subitem">{{ $t('popup.item3') }}</div>
                    <div class="popup_item">{{ $t('popup.end') }}</div>
                </div>
                <div @click.prevent="home" class="btn">{{ $t('popup.button') }}</div>
            </div>
        </div>
    </div>
</template>

<script>
import { useI18n } from 'vue-i18n';
import { useUserStore } from '../../stores/user';
export default {
    name: "PopupMail",
    setup() {
        const User = useUserStore();
        const { t, locale } = useI18n({ useScope: 'global' });
        return { User, t, locale };
    },
    methods: {
        home() { this.$router.push({ name: "Home" }) }
    },
    mounted() {
        this.User.GET_USER();
    },
}
</script>

<style>
.mailfix .popup_content {
    margin-top: 30px;
}

.mailfix .popup_subitem,
.mailfix .popup_item {
    margin-bottom: 25px;
}
</style>