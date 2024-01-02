<template>
    <div class="edit_title">{{ $t('c_nurse.title_change') }}</div>
    <form @submit.prevent="changeForm" class="personal">
        <div class="login_form_text">{{ $t('c_baby.item1_ua') }}</div>
        <textarea v-if="Nurse.nurse" v-model="Nurse.nurse.title_about.ua" required class="login_form_item register_textarea"
            :placeholder="$t('c_baby.item1_ua_holder')"></textarea>
        <div class="login_form_text">{{ $t('c_baby.item1_en') }}</div>
        <textarea v-if="Nurse.nurse" v-model="Nurse.nurse.title_about.en" required class="login_form_item register_textarea"
            :placeholder="$t('c_baby.item1_en_holder')"></textarea>
        <div class="login_form_text">{{ $t('w_baby.item7') }}</div>
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

        <button type="submit" class="btn">{{ $t('cabinet.edit_btn') }}</button>
    </form>
</template>

<script>
import { useI18n } from 'vue-i18n';
import { useClient_NurseStore } from '../../../stores/client_nurse';
import { useDataStore } from '../../../stores/variables';
import { useUserStore } from '../../../stores/user';
export default {
    name: "Change-client_nurse",
    data() {
        return {
            errors: null
        }
    },
    setup() {
        const Nurse = useClient_NurseStore();
        const Store = useDataStore();
        const User = useUserStore();
        const { t, locale } = useI18n({ useScope: 'global' });
        return { t, locale, Store, Nurse, User };
    },
    methods: {
        changeForm() {
            this.Nurse.errors = null;
            if ((this.Nurse.nurse_options.anketaduties.length == 0)) {
                this.errors = [];
                if (this.Nurse.nurse_options.anketaduties == 0) { this.errors.push({ en: "Specify the responsibilities for the caregiver.", ua: "Вкажіть обов'язки для доглядальниці." }); }
            } else {
                this.errors = null;
                this.Nurse.CHANGE_NURSE([this.Nurse.nurse, this.Nurse.nurse_options.anketaduties]);
            }
        },
    },
    mounted() {
        this.Nurse.GET_NURSE(localStorage.userID);

        this.Store.GET_WORKPERIODS();
        this.Store.GET_NURSEDUTIES();
        this.Store.GET_HOURLYPAYMENTS(); this.Store.GET_MONTHLYPAYMENTS();
        this.Nurse.errors = null; this.errors = null;
    },
}
</script>
