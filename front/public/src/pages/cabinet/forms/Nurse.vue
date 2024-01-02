<template>
    <div class="edit_title">{{ $t('w_nurse.title') }}</div>
    <div class="anketa">
        <div class="anketa_text"> <span v-if="User.user.name">{{ User.user.name[locale] }}</span> <span
                v-if="User.user.surname">{{
                    User.user.surname[locale] }}</span> </div>
        <div v-if="User.user.country_title" class="anketa_text">{{ $t('baby_anketa.item2') }} {{
            User.user.country_title.title[locale] }}</div>
        <div class="anketa_text">
            {{ $t('baby_anketa.item1') }} {{ User.user.current_age }}
            &nbsp;&nbsp;•&nbsp;&nbsp; <span v-if="User.user.city_title">{{ User.user.city_title.title[locale] }}</span>
        </div>
        <div class="anketa_item anketa_fix">{{ $t('baby_anketa.item4') }}</div>
        <div class="anketa_text">{{ User.user.phone_number }}</div>
        <div class="anketa_item">{{ $t('baby_anketa.item5') }}</div>
        <div class="anketa_text">
            <p v-if="User.user.about">{{ User.user.about[locale] }}</p>
            <p v-if="Nurse.nurse">{{ Nurse.nurse.nurse_exp[locale] }}</p>
        </div>
        <div class="anketa_item"> {{ $t('baby_anketa.item6') }} </div>
        <div v-if="User.user.animal_work" class="anketa_text">{{ User.user.animal_work[locale] }}</div>
        <div class="anketa_item  anketa_fix">{{ $t('baby_anketa.item3') }}</div>
        <span v-if="Nurse.nurse" v-for="(item, index) in Nurse.nurse.Typeworks" :key="index" class="anketa_text">
            {{ item.title[locale] }}{{
                index < Nurse.nurse.Typeworks.length - 1 ? ', ' : '' }} </span>
                <div class="anketa_item anketa_fix">{{ $t('baby_anketa.item8') }}</div>
                <div v-if="Nurse.nurse" class="anketa_text"> {{ Nurse.nurse.experience.title[locale] }}</div>

                <div class="anketa_item">{{ $t('baby_anketa.n_item18') }}</div>
                <span v-if="Nurse.nurse" v-for="(item, index) in Nurse.nurse.Diagnoses" :key="index" class="anketa_text">
                    {{ item.title[locale] }}{{
                        index < Nurse.nurse.Diagnoses.length - 1 ? ', ' : '' }} </span>

                        <div class="anketa_item anketa_fix">{{ $t('baby_anketa.item10') }}</div>
                        <span v-if="Nurse.nurse" class="anketa_text" v-for="(item, index) in Nurse.nurse.Educations"
                            :key="index"> {{
                                item.title.title[locale]
                            }}{{ index < Nurse.nurse.Educations.length - 1 ? ', ' : '' }} </span>

                                <div class="anketa_item anketa_fix">{{ $t('baby_anketa.item13') }}</div>
                                <div v-if="Nurse.nurse" class="anketa_text"> {{ Nurse.nurse.monthpay.title[locale] }}
                                </div>
                                <div class="anketa_item">{{ $t('baby_anketa.item15') }}</div>
                                <div v-if="Nurse.nurse" class="anketa_text">{{ Nurse.nurse.workperiod.title[locale] }}
                                </div>
                                <div class="anketa_item">{{ $t('baby_anketa.item16') }}</div>
                                <span v-if="Nurse.nurse" class="anketa_text" v-for="(item, index) in Nurse.nurse.Duties"
                                    :key="index"> {{
                                        item.title[locale] }}{{ index < Nurse.nurse.Duties.length - 1 ? ', ' : '' }} </span>
    </div>
    <div class="personal_btns">
        <span class="btn" @click.prevent="change_nurse()">{{ $t('baby_anketa.btn_1') }}</span>
        <span class="btn" @click.prevent="delete_nurse()">{{ $t('baby_anketa.btn_2') }}</span>
    </div>
</template>

<script>
import { useI18n } from 'vue-i18n';
import { useForm_NurseStore } from '../../../stores/form_nurse';
import { useUserStore } from '../../../stores/user';
export default {
    name: "Nurse",
    setup() {
        const Nurse = useForm_NurseStore();
        const User = useUserStore();
        const { t, locale } = useI18n({ useScope: 'global' });
        return { t, locale, Nurse, User };
    },
    methods: {
        change_nurse() {
            this.$router.push({ name: "Change-nurse" })
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

