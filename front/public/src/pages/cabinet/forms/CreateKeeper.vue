<template>
    <div class="edit_title">{{ $t('w_keeper.title') }}</div>
    <form @submit.prevent="createForm" class="anketa">
        <div class="login_form_text">{{ $t('w_keeper.item1_ua') }}</div>
        <textarea v-model="keeper_exp.ua" required class="login_form_item register_textarea"
            :placeholder="$t('w_keeper.item1_ua_holder')"></textarea>
        <div class="login_form_text">{{ $t('w_keeper.item1_en') }}</div>
        <textarea v-model="keeper_exp.en" required class="login_form_item register_textarea"
            :placeholder="$t('w_keeper.item1_en_holder')"></textarea>
        <div class="login_form_text">{{ $t('w_keeper.item2') }}</div>
        <select v-model="anketa.experience_id" class="login_form_item auth_arrow">
            <option v-for="option in Store.experiences" :value="option.id">
                {{ option.title[locale] }}
            </option>
        </select>
        <div class="login_form_text">{{ $t('w_baby.item6') }}</div>
        <div v-for="post in Store.housekeepertypeofworks" :key="post.id" class="login_checkbox">
            <input type="checkbox" v-bind:value="post.id" v-model="anketatypeworks">
            {{ post.title[locale] }}
        </div>
        <div class="login_form_text">{{ $t('w_baby.item7') }}</div>
        <select v-model="anketa.workperiod_id" class="login_form_item auth_arrow">
            <option v-for="option in Store.workperiods" :value="option.id">
                {{ option.title[locale] }}
            </option>
        </select>
        <div class="login_form_text">{{ $t('w_keeper.item3') }}</div>
        <div v-for="post in Store.housekeeperpreferences" :key="post.id" class="login_checkbox">
            <input type="checkbox" v-bind:value="post.id" v-model="anketarpreferences">
            {{ post.title[locale] }}
        </div>
        <div class="login_form_text">{{ $t('w_baby.item10') }}</div>
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

        <div class="personal_errors">
            <div v-if="errors" class="login_middle">
                <ul v-for="item in errors" :key="item">
                    <li>{{ item[locale] }}</li>
                </ul>
            </div>
            <div v-if="Keeper.errors" class="login_middle">
                <ul v-for="item in Keeper.errors" :key="item">
                    <li>{{ item[0][locale] }}</li>
                </ul>
            </div>
        </div>

        <button type="submit" class="btn">{{ $t('w_baby.btn') }}</button>
    </form>
</template>

<script>
import { useI18n } from 'vue-i18n';
import { useDataStore } from '../../../stores/variables';
import { useForm_HousekeeperStore } from '../../../stores/form_housekeeper';
export default {
    name: "CreateKeeper",
    data() {
        return {
            anketa: {},
            anketaduties: [],
            anketarpreferences: [],
            anketatypeworks: [],
            keeper_exp: {},
            errors: null,
        }
    },
    setup() {
        const Store = useDataStore();
        const Keeper = useForm_HousekeeperStore();
        const { t, locale } = useI18n({ useScope: 'global' });
        return { Store, t, locale, Keeper };
    },
    methods: {
        createForm() {
            this.Keeper.errors = null;
            if ((this.anketarpreferences.length == 0) || (this.anketaduties.length == 0) || (this.anketatypeworks.length == 0)) {
                this.errors = [];
                if (this.anketarpreferences.length == 0) { this.errors.push({ en: "Please indicate your preference.", ua: "Вкажіть, чому Ви надаєте перевагу." }); }
                if (this.anketaduties.length == 0) { this.errors.push({ en: "Specify the responsibilities for the housekeeper.", ua: "Вкажіть обов'язки для домробітниці." }); }
                if (this.anketatypeworks.length == 0) { this.errors.push({ en: "Specify what kind of job you are looking for.", ua: "Вкажіть яку роботу ви шукаєте." }); }
            } else {
                this.errors = null;
                this.anketa.user_id = localStorage.userID;
                this.anketa.confirmed = true;
                this.anketa.keeper_exp = this.keeper_exp;
                this.Keeper.CREATE_KEEPER([this.anketa, this.anketarpreferences, this.anketaduties, this.anketatypeworks]);
            }
        },
    },
    mounted() {
        this.Store.GET_EXPERIENCES(); this.Store.GET_HOUSEKEEPERTYPEOFWORKS();
        this.Store.GET_WORKPERIODS();
        this.Store.GET_HOUSEKEEPERPREFERENCES(); this.Store.GET_HOUSEKEEPERDUTIES();
        this.Store.GET_HOURLYPAYMENTS(); this.Store.GET_MONTHLYPAYMENTS();
        this.errors = null; this.Keeper.errors = null;
    },
}
</script>