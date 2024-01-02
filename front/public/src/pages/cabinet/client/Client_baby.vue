<template>
    <div class="edit_title">{{ $t('c_baby.title') }}</div>
    <div class="anketa">
        <div class="anketa_text"> <span v-if="User.user.name">{{ User.user.name[locale] }}</span> <span
                v-if="User.user.surname">{{
                    User.user.surname[locale] }}</span> </div>
        <div v-if="User.user.country_title" class="anketa_text">{{ $t('baby_anketa.item2') }} {{
            User.user.country_title.title[locale] }}</div>
        <div class="anketa_text">
            {{ $t('c_baby.item2') }} <span v-if="User.user.city_title">{{ User.user.city_title.title[locale] }}</span>
        </div>
        <div class="anketa_item anketa_fix">{{ $t('baby_anketa.item4') }}</div>
        <div class="anketa_text">{{ User.user.phone_number }}</div>
        <div class="anketa_item"> {{ $t('c_baby.item3') }} </div>
        <div v-if="Baby.baby" class="anketa_text">{{ Baby.baby.title_about[locale] }}</div>
        <div class="anketa_item">{{ $t('baby_anketa.item14') }}</div>
        <div v-if="Baby.baby" class="anketa_text"> {{ Baby.baby.childrencount.title[locale]
        }}</div>
        <div class="anketa_item">{{ $t('baby_anketa.item9') }}</div>
        <span v-if="Baby.baby" class="anketa_text" v-for="(item, index) in Baby.baby.Agegroups" :key="index"> {{
            item.title.title[locale] }}{{ index < Baby.baby.Agegroups.length - 1 ? ', ' : '' }} </span>
                <div class="anketa_item anketa_fix">{{ $t('baby_anketa.item13') }}</div>
                <div v-if="Baby.baby" class="anketa_text"> {{ Baby.baby.monthpay.title[locale] }}
                </div>
                <div class="anketa_item">{{ $t('baby_anketa.item15') }}</div>
                <div v-if="Baby.baby" class="anketa_text">{{ Baby.baby.workperiod.title[locale] }}
                </div>
                <div class="anketa_item">{{ $t('baby_anketa.item16') }}</div>
                <span v-if="Baby.baby" class="anketa_text" v-for="(item, index) in Baby.baby.Duties" :key="index"> {{
                    item.title.title[locale] }}{{ index < Baby.baby.Duties.length - 1 ? ', ' : '' }} </span>
    </div>
    <div class="personal_btns">
        <span class="btn" @click.prevent="change_baby()">{{ $t('c_nurse.btn_change') }}</span>
        <span class="btn" @click.prevent="delete_baby()">{{ $t('c_nurse.btn_delete') }}</span>
    </div>
</template>

<script>
import { useI18n } from 'vue-i18n';
import { useClient_BabyStore } from '../../../stores/client_baby';
import { useUserStore } from '../../../stores/user';
export default {
    name: "Client_baby",
    setup() {
        const Baby = useClient_BabyStore();
        const User = useUserStore();
        const { t, locale } = useI18n({ useScope: 'global' });
        return { t, locale, Baby, User };
    },
    methods: {
        change_baby() {
            this.$router.push({ name: "Change-client_baby" });
        },
        delete_baby() {
            this.Baby.DELETE_BABY([this.Baby.baby.user_id, this.Baby.baby.id]);
        }
    },
    mounted() {
        this.User.GET_USER();
        this.Baby.GET_BABY(localStorage.userID);
    },
}
</script>