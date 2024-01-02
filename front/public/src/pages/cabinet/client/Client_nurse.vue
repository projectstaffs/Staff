<template>
    <div class="edit_title">{{ $t('c_nurse.title') }}</div>
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
        <div v-if="Nurse.nurse" class="anketa_text">{{ Nurse.nurse.title_about[locale] }}</div>

        <div class="anketa_item anketa_fix">{{ $t('baby_anketa.item13') }}</div>
        <div v-if="Nurse.nurse" class="anketa_text"> {{ Nurse.nurse.monthpay.title[locale] }}
        </div>
        <div class="anketa_item">{{ $t('baby_anketa.item15') }}</div>
        <div v-if="Nurse.nurse" class="anketa_text">{{ Nurse.nurse.workperiod.title[locale] }}
        </div>
        <div class="anketa_item">{{ $t('baby_anketa.item16') }}</div>
        <span v-if="Nurse.nurse" class="anketa_text" v-for="(item, index) in Nurse.nurse.Duties" :key="index"> {{
            item.title[locale] }}{{ index < Nurse.nurse.Duties.length - 1 ? ', ' : '' }} </span>
    </div>

    <div class="personal_btns">
        <span class="btn" @click.prevent="change_nurse()">{{ $t('c_nurse.btn_change') }}</span>
        <span class="btn" @click.prevent="delete_nurse()">{{ $t('c_nurse.btn_delete') }}</span>
    </div>
</template>

<script>
import { useI18n } from 'vue-i18n';
import { useClient_NurseStore } from '../../../stores/client_nurse';
import { useUserStore } from '../../../stores/user';
export default {
    name: "Client_urse",
    setup() {
        const Nurse = useClient_NurseStore();
        const User = useUserStore();
        const { t, locale } = useI18n({ useScope: 'global' });
        return { t, locale, Nurse, User };
    },
    methods: {
        change_nurse() {
            this.$router.push({ name: "Change-client_nurse" })
        },
        delete_nurse() {
            this.Nurse.DELETE_NURSE([this.Nurse.nurse.user_id, this.Nurse.nurse.id]);
        }
    },
    mounted() {
        this.User.GET_USER();
        this.Nurse.GET_NURSE(localStorage.userID);
    },
}
</script>

