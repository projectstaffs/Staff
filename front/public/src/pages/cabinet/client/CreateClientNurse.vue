<template>
    <div class="edit_title">{{ $t('c_nurse.title') }}</div>
    <form @submit.prevent="createForm" class="personal">
        <div class="login_form_text">{{ $t('c_baby.item1_ua') }}</div>
        <textarea v-model="title_about.ua" required class="login_form_item register_textarea"
            :placeholder="$t('c_baby.item1_ua_holder')"></textarea>
        <div class="login_form_text">{{ $t('c_baby.item1_en') }}</div>
        <textarea v-model="title_about.en" required class="login_form_item register_textarea"
            :placeholder="$t('c_baby.item1_en_holder')"></textarea>
        <div class="login_form_text">{{ $t('w_nurse.item6') }}</div>
        <select v-model="anketa.workperiod_id" class="login_form_item auth_arrow">
            <option v-for="option in Store.workperiods" :value="option.id">
                {{ option.title[locale] }}
            </option>
        </select>
        <div class="login_form_text">{{ $t('baby_anketa.item16') }}</div>
        <div v-for="post in Store.nurseduties" :key="post.id" class="login_checkbox">
            <input type="checkbox" v-bind:value="post.id" v-model="anketaduties">
            {{ post.title[locale] }}
        </div>
        <div class="login_form_text">{{ $t('w_nurse.item8') }}</div>
        <select v-model="anketa.hourpay_id" class="login_form_item auth_arrow">
            <option v-for="option in Store.hourlypayments" :value="option.id">
                {{ option.title[locale] }}
            </option>
        </select>
        <div class="login_form_text">{{ $t('w_nurse.item9') }}</div>
        <select v-model="anketa.monthpay_id" class="login_form_item auth_arrow">
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

        <button type="submit" class="btn">{{ $t('c_nurse.btn') }}</button>
    </form>
</template>

<script>
import { useI18n } from 'vue-i18n';
import { useDataStore } from '../../../stores/variables';
import { useClient_NurseStore } from '../../../stores/client_nurse';
export default {
    name: "CreateClientNurse",
    data() {
        return {
            anketa: {},
            anketaduties: [],
            title_about: {},
            errors: {},
        }
    },
    setup() {
        const Nurse = useClient_NurseStore();
        const Store = useDataStore();
        const { t, locale } = useI18n({ useScope: 'global' });
        return { t, locale, Store, Nurse };
    },
    methods: {
        createForm() {
            this.Nurse.errors = null;
            if ((this.anketaduties.length == 0)) {
                this.errors = [];
                if (this.anketaduties.length == 0) { this.errors.push({ en: "Specify the responsibilities for the caregiver.", ua: "Вкажіть обов'язки для доглядальниці." }); }
            } else {
                this.errors = null;
                this.anketa.user_id = localStorage.userID;
                this.anketa.confirmed = true;
                this.anketa.title_about = this.title_about;

                this.Nurse.CREATE_NURSE([this.anketa, this.anketaduties]);
            }
        },
    },
    mounted() {
        this.Store.GET_WORKPERIODS();
        this.Store.GET_NURSEDUTIES(); this.Store.GET_HOURLYPAYMENTS(); this.Store.GET_MONTHLYPAYMENTS();
        this.errors = null; this.Nurse.errors = null;
    },
}
</script>