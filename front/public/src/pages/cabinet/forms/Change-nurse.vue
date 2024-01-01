<template>
    <div class="edit_title">{{ $t('w_nurse.title_change') }}</div>
    <form @submit.prevent="changeForm" class="personal">
        <div class="login_form_text">{{ $t('w_nurse.item1_ua') }}</div>
        <textarea v-if="Nurse.nurse" v-model="Nurse.nurse.nurse_exp.ua" required class="login_form_item register_textarea"
            :placeholder="$t('w_nurse.item1_ua_holder')"></textarea>
        <div class="login_form_text">{{ $t('w_nurse.item1_en') }}</div>
        <textarea v-if="Nurse.nurse" v-model="Nurse.nurse.nurse_exp.en" required class="login_form_item register_textarea"
            :placeholder="$t('w_nurse.item1_en_holder')"></textarea>

        <div class="login_form_text">{{ $t('w_nurse.item2') }}</div>
        <div v-for="post in Store.diagnoses" :key="post.id" class="login_checkbox">
            <input type="checkbox" v-bind:value="post.id" v-model="Nurse.nurse_options.anketadiagnoses">
            {{ post.title[locale] }}
        </div>
        <div class="login_form_text">{{ $t('w_nurse.item3') }}</div>
        <select v-if="Nurse.nurse" v-model="Nurse.nurse.experience_id" class="login_form_item auth_arrow">
            <option v-for="option in Store.experiences" :value="option.id">
                {{ option.title[locale] }}
            </option>
        </select>
        <div class="login_form_text">{{ $t('w_nurse.item4') }}</div>
        <div v-for="post in Store.educations" :key="post.id" class="login_checkbox">
            <input type="checkbox" v-bind:value="post.id" v-model="Nurse.nurse_options.anketaeducations">
            {{ post.title[locale] }}
        </div>

        <div class="login_form_text">{{ $t('w_nurse.item5') }}</div>
        <div v-for="post in Store.nursetypeofworks" :key="post.id" class="login_checkbox">
            <input type="checkbox" v-bind:value="post.id" v-model="Nurse.nurse_options.anketatypeworks">
            {{ post.title[locale] }}
        </div>
        <div class="login_form_text">{{ $t('w_nurse.item6') }}</div>
        <select v-if="Nurse.nurse" v-model="Nurse.nurse.workperiod_id" class="login_form_item auth_arrow">
            <option v-for="option in Store.workperiods" :value="option.id">
                {{ option.title[locale] }}
            </option>
        </select>
        <div class="login_form_text">{{ $t('w_nurse.item7') }}</div>
        <div v-for="post in Store.nurseduties" :key="post.id" class="login_checkbox">
            <input type="checkbox" v-bind:value="post.id" v-model="Nurse.nurse_options.anketaduties">
            {{ post.title[locale] }}
        </div>
        <div class="login_form_text">{{ $t('w_nurse.item8') }}</div>
        <select v-if="Nurse.nurse" v-model="Nurse.nurse.hourpay_id" class="login_form_item auth_arrow">
            <option v-for="option in Store.hourlypayments" :value="option.id">
                {{ option.title[locale] }}
            </option>
        </select>
        <div class="login_form_text">{{ $t('w_nurse.item9') }}</div>
        <select v-if="Nurse.nurse" v-model="Nurse.nurse.monthpay_id" class="login_form_item auth_arrow">
            <option v-for="option in Store.monthlypayments" :value="option.id">
                {{ option.title[locale] }}
            </option>
        </select>

        <div class="personal_errors">
            <div v-if="errors" class="login_middle">
                <ul v-for="item in errors" :key="item">
                    <li>{{ item[locale] }}</li>
                </ul>
            </div>
            <div v-if="Nurse.errors" class="login_middle">
                <ul v-for="item in Nurse.errors" :key="item">
                    <li>{{ item[0][locale] }}</li>
                </ul>
            </div>
        </div>

        <button type="submit" class="btn">{{ $t('baby_anketa.btn_1') }}</button>
    </form>
</template>

<script>
import { useI18n } from 'vue-i18n';
import { useForm_NurseStore } from '../../../stores/form_nurse';
import { useDataStore } from '../../../stores/variables';
import { useUserStore } from '../../../stores/user';
export default {
    name: "Change-nurse",
    data() {
        return {
            errors: null
        }
    },
    setup() {
        const Nurse = useForm_NurseStore();
        const Store = useDataStore();
        const User = useUserStore();
        const { t, locale } = useI18n({ useScope: 'global' });
        return { t, locale, Store, Nurse, User };
    },
    methods: {
        back() {
            this.$router.push({ name: "Nurse" })
        },
        changeForm() {
            this.Nurse.errors = null;
            if ((this.Nurse.nurse_options.anketaduties.length == 0) || (this.Nurse.nurse_options.anketadiagnoses.length == 0) || (this.Nurse.nurse_options.anketaeducations.length == 0) || (this.Nurse.nurse_options.anketatypeworks.length == 0)) {
                this.errors = [];
                if (this.Nurse.nurse_options.anketaeducations.length == 0) { this.errors.push({ en: "Please indicate your education.", ua: "Вкажіть Вашу освіту." }); }
                if (this.Nurse.nurse_options.anketadiagnoses.length == 0) { this.errors.push({ en: "Mark the diagnoses of the patients you have worked with.", ua: "Позначте діагнози пацієнтів, з якими вам доводилося працювати." }); }
                if (this.Nurse.nurse_options.anketaduties.length == 0) { this.errors.push({ en: "Specify the responsibilities for the caregiver.", ua: "Вкажіть обов'язки для доглядальниці." }); }
                if (this.Nurse.nurse_options.anketatypeworks.length == 0) { this.errors.push({ en: "Specify what kind of job you are looking for.", ua: "Вкажіть яку роботу ви шукаєте." }); }
            } else {
                this.errors = null;
                this.Nurse.CHANGE_NURSE([this.Nurse.nurse, this.Nurse.nurse_options.anketaeducations, this.Nurse.nurse_options.anketadiagnoses, this.Nurse.nurse_options.anketaduties, this.Nurse.nurse_options.anketatypeworks]);
            }
        },
    },
    mounted() {
        this.Nurse.GET_NURSE(localStorage.userID);
        this.Store.GET_DIAGNOSES(); this.Store.GET_EXPERIENCES(); this.Store.GET_EDUCATIONS();
        this.Store.GET_NURSETYPEOFWORKS(); this.Store.GET_WORKPERIODS();
        this.Store.GET_NURSEDUTIES(); this.Store.GET_HOURLYPAYMENTS(); this.Store.GET_MONTHLYPAYMENTS();
        this.Nurse.errors = null; this.errors = null;
    },
}
</script>

