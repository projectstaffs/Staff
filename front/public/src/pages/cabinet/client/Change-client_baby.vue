<template>
    <div class="edit_title">{{ $t('c_baby.title_change') }}</div>
    <form @submit.prevent="changeForm" class="personal">
        <div class="login_form_text">{{ $t('c_baby.item1_ua') }}</div>
        <textarea v-if="Baby.baby" v-model="Baby.baby.title_about.ua" required class="login_form_item register_textarea"
            :placeholder="$t('c_baby.item1_ua_holder')"></textarea>
        <div class="login_form_text">{{ $t('c_baby.item1_en') }}</div>
        <textarea v-if="Baby.baby" v-model="Baby.baby.title_about.en" required class="login_form_item register_textarea"
            :placeholder="$t('c_baby.item1_en_holder')"></textarea>
        <div class="login_form_text">{{ $t('w_baby.item8') }}</div>
        <select v-if="Baby.baby" v-model="Baby.baby.childrencount_id" class="login_form_item auth_arrow">
            <option v-for="option in Store.childrens" :value="option.id">
                {{ option.title[locale] }}
            </option>
        </select>
        <div class="login_form_text">{{ $t('w_baby.item2') }}</div>
        <div v-for="post in Store.agegroups" :key="post.id" class="login_checkbox">
            <input type="checkbox" v-bind:value="post.id" v-model="Baby.baby_options.anketaagegroups">
            {{ post.title[locale] }}
        </div>
        <div class="login_form_text">{{ $t('w_baby.item7') }}</div>
        <select v-if="Baby.baby" v-model="Baby.baby.workperiod_id" class="login_form_item auth_arrow">
            <option v-for="option in Store.workperiods" :value="option.id">
                {{ option.title[locale] }}
            </option>
        </select>
        <div class="login_form_text">{{ $t('baby_anketa.item16') }}</div>
        <div v-for="post in Store.babysittingduties" :key="post.id" class="login_checkbox">
            <input type="checkbox" v-bind:value="post.id" v-model="Baby.baby_options.anketaduties">
            {{ post.title[locale] }}
        </div>
        <div class="login_form_text">{{ $t('w_baby.item11') }}</div>
        <select v-if="Baby.baby" v-model="Baby.baby.hourpay_id" class="login_form_item auth_arrow">
            <option v-for="option in Store.hourlypayments" :value="option.id">
                {{ option.title[locale] }}
            </option>
        </select>
        <div class="login_form_text">{{ $t('w_baby.item12') }}</div>
        <select v-if="Baby.baby" v-model="Baby.baby.monthpay_id" class="login_form_item auth_arrow">
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
            <div v-if="Baby.errors" class="login_middle">
                <ul v-for="item in Baby.errors" :key="item">
                    <li>{{ item[0][locale] }}</li>
                </ul>
            </div>
        </div>

        <button type="submit" class="btn">{{ $t('cabinet.edit_btn') }}</button>
    </form>
</template>

<script>
import { useI18n } from 'vue-i18n';
import { useClient_BabyStore } from '../../../stores/client_baby';
import { useDataStore } from '../../../stores/variables';
import { useUserStore } from '../../../stores/user';
export default {
    name: "Change-client_baby",
    data() {
        return {
            errors: null
        }
    },
    setup() {
        const Baby = useClient_BabyStore();
        const Store = useDataStore();
        const User = useUserStore();
        const { t, locale } = useI18n({ useScope: 'global' });
        return { t, locale, Store, Baby, User };
    },
    methods: {
        back() {
            this.$router.push({ name: "Client_baby" })
        },
        changeForm() {
            this.Baby.errors = null;
            if ((this.Baby.baby_options.anketaduties.length == 0) || (this.Baby.baby_options.anketaagegroups.length == 0)) {
                this.errors = [];
                if (this.Baby.baby_options.anketaduties == 0) { this.errors.push({ en: "Specify responsibilities for the nanny.", ua: "Вкажіть обов'язки для няні." }); }
                if (this.Baby.baby_options.anketaagegroups.length == 0) { this.errors.push({ en: "Indicate your experience working with children by age group.", ua: "Вкажіть досвід роботи з дітьми за віковими групами." }); }
            } else {
                this.errors = null;
                this.Baby.CHANGE_BABY([this.Baby.baby, this.Baby.baby_options.anketaduties, this.Baby.baby_options.anketaagegroups]);
            }
        },
    },
    mounted() {
        this.Baby.GET_BABY(localStorage.userID);

        this.Store.GET_WORKPERIODS(); this.Store.GET_CHILDRENS(); this.Store.GET_BABYSITTINGDUTIES();
        this.Store.GET_HOURLYPAYMENTS(); this.Store.GET_MONTHLYPAYMENTS(); this.Store.GET_AGEGROUPS();
        this.Baby.errors = null; this.errors = null;
    },
}
</script>
