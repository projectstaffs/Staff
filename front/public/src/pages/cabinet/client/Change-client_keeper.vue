<template>
    <div class="edit_title">{{ $t('c_keeper.title_change') }}</div>
    <form @submit.prevent="changeForm" class="personal">
        <div class="login_form_text">{{ $t('c_baby.item1_ua') }}</div>
        <textarea v-if="Keeper.keeper" v-model="Keeper.keeper.title_about.ua" required
            class="login_form_item register_textarea" :placeholder="$t('c_baby.item1_ua_holder')"></textarea>
        <div class="login_form_text">{{ $t('c_baby.item1_en') }}</div>
        <textarea v-if="Keeper.keeper" v-model="Keeper.keeper.title_about.en" required
            class="login_form_item register_textarea" :placeholder="$t('c_baby.item1_en_holder')"></textarea>

        <div class="login_form_text">{{ $t('w_baby.item7') }}</div>
        <select v-if="Keeper.keeper" v-model="Keeper.keeper.workperiod_id" class="login_form_item auth_arrow">
            <option v-for="option in Store.workperiods" :value="option.id">
                {{ option.title[locale] }}
            </option>
        </select>
        <div class="login_form_text">{{ $t('baby_anketa.item16') }}</div>
        <div v-for="post in Store.housekeeperduties" :key="post.id" class="login_checkbox">
            <input type="checkbox" v-bind:value="post.id" v-model="Keeper.keeper_options.anketaduties">
            {{ post.title[locale] }}
        </div>
        <div class="login_form_text">{{ $t('w_nurse.item8') }}</div>
        <select v-if="Keeper.keeper" v-model="Keeper.keeper.hourpay_id" class="login_form_item auth_arrow">
            <option v-for="option in Store.hourlypayments" :value="option.id">
                {{ option.title[locale] }}
            </option>
        </select>
        <div class="login_form_text">{{ $t('w_nurse.item9') }}</div>
        <select v-if="Keeper.keeper" v-model="Keeper.keeper.monthpay_id" class="login_form_item auth_arrow">
            <option v-for="option in Store.monthlypayments" :value="option.id">
                {{ option.title[locale] }}
            </option>
        </select>

        <Errors :errors="errors" :formErrors="Keeper.errors" />

        <button type="submit" class="btn">{{ $t('cabinet.edit_btn') }}</button>
    </form>
</template>

<script>
import { useI18n } from 'vue-i18n';
import { useClient_KeeperStore } from '../../../stores/client_keeper';
import { useDataStore } from '../../../stores/variables';
import { useUserStore } from '../../../stores/user';
import Errors from '../../layouts/Error.vue';
export default {
    name: "Change-client_keeper",
    data() {
        return {
            errors: null
        }
    },
    setup() {
        const Keeper = useClient_KeeperStore();
        const Store = useDataStore();
        const User = useUserStore();
        const { t, locale } = useI18n({ useScope: 'global' });
        return { Store, Keeper, User, t, locale };
    },
    components: { Errors },
    methods: {
        changeForm() {
            this.Keeper.errors = null;
            if ((this.Keeper.keeper_options.anketaduties.length == 0)) {
                this.errors = [];
                if (this.Keeper.keeper_options.anketaduties == 0) { this.errors.push({ en: "Specify the responsibilities for the housekeeper.", ua: "Вкажіть обов'язки для домробітниці." }); }
            } else {
                this.errors = null;
                this.Keeper.CHANGE_KEEPER([this.Keeper.keeper, this.Keeper.keeper_options.anketaduties]);
            }
        },
    },
    mounted() {
        this.Keeper.GET_KEEPER(localStorage.userID);

        this.Store.GET_WORKPERIODS();
        this.Store.GET_HOUSEKEEPERDUTIES();
        this.Store.GET_HOURLYPAYMENTS(); this.Store.GET_MONTHLYPAYMENTS();
        this.Keeper.errors = null; this.errors = null;
    },
}
</script>
