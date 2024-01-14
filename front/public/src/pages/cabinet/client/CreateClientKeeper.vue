<template>
    <div class="edit_title">{{ $t('c_keeper.title') }}</div>
    <form @submit.prevent="createForm" class="anketa">
        <div class="login_form_text">{{ $t('c_baby.item1_ua') }}</div>
        <textarea v-model="title_about.ua" required class="login_form_item register_textarea"
            :placeholder="$t('c_baby.item1_ua_holder')"></textarea>
        <div class="login_form_text">{{ $t('c_baby.item1_en') }}</div>
        <textarea v-model="title_about.en" required class="login_form_item register_textarea"
            :placeholder="$t('c_baby.item1_en_holder')"></textarea>

        <div class="login_form_text">{{ $t('w_baby.item7') }}</div>
        <select v-model="anketa.workperiod_id" class="login_form_item auth_arrow">
            <option v-for="option in Store.workperiods" :value="option.id">
                {{ option.title[locale] }}
            </option>
        </select>
        <div class="login_form_text">{{ $t('baby_anketa.item16') }}</div>
        <div v-for="post in Store.housekeeperduties" :key="post.id" class="login_checkbox">
            <input type="checkbox" v-bind:value="post.id" v-model="anketaduties">
            {{ post.title[locale] }}
        </div>
        <div class="login_form_text">{{ $t('w_baby.item11') }}</div>
        <select v-model="anketa.hourpay_id" class="login_form_item auth_arrow">
            <option v-for="option in Store.hourlypayments" :value="option.id">
                {{ option.title[locale] }}
            </option>
        </select>
        <div class="login_form_text">{{ $t('w_baby.item12') }}</div>
        <select v-model="anketa.monthpay_id" class="login_form_item auth_arrow">
            <option v-for="option in Store.monthlypayments" :value="option.id">
                {{ option.title[locale] }}
            </option>
        </select>

        <Errors :errors="errors" :formErrors="Keeper.errors" />

        <button type="submit" class="btn">{{ $t('c_nurse.btn') }}</button>
    </form>
</template>

<script>
import { useI18n } from 'vue-i18n';
import { useDataStore } from '../../../stores/variables';
import { useClient_KeeperStore } from '../../../stores/client_keeper';
import Errors from '../../layouts/Error.vue';
export default {
    name: "CreateClientKeeper",
    data() {
        return {
            anketa: {},
            anketaduties: [],
            title_about: {},
            errors: {},
        }
    },
    setup() {
        const { t, locale } = useI18n({ useScope: 'global' });
        const Store = useDataStore();
        const Keeper = useClient_KeeperStore();
        return { t, locale, Store, Keeper };
    },
    components: { Errors },
    methods: {
        createForm() {
            this.Keeper.errors = null;
            if ((this.anketaduties.length == 0)) {
                this.errors = [];
                if (this.anketaduties.length == 0) { this.errors.push({ en: "Specify the responsibilities for the housekeeper.", ua: "Вкажіть обов'язки для домробітниці." }); }
            } else {
                this.errors = null;
                this.anketa.user_id = localStorage.userID;
                this.anketa.confirmed = true;
                this.anketa.title_about = this.title_about;

                this.Keeper.CREATE_KEEPER([this.anketa, this.anketaduties,]);
            }
        },
    },
    mounted() {
        this.Store.GET_WORKPERIODS();
        this.Store.GET_HOUSEKEEPERDUTIES();
        this.Store.GET_HOURLYPAYMENTS(); this.Store.GET_MONTHLYPAYMENTS();
        this.errors = null; this.Keeper.errors = null;
    },
}
</script>