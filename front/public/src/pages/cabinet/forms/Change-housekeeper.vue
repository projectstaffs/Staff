<template>
    <div class="edit_title">{{ $t('w_keeper.title_change') }}</div>
    <form @submit.prevent="changeForm" class="personal">
        <div class="login_form_text">{{ $t('w_keeper.item1_ua') }}</div>
        <textarea v-if="Keeper.keeper" v-model="Keeper.keeper.keeper_exp.ua" required
            class="login_form_item register_textarea" :placeholder="$t('w_keeper.item1_ua_holder')"></textarea>
        <div class="login_form_text">{{ $t('w_keeper.item1_en') }}</div>
        <textarea v-if="Keeper.keeper" v-model="Keeper.keeper.keeper_exp.en" required
            class="login_form_item register_textarea" :placeholder="$t('w_keeper.item1_en_holder')"></textarea>
        <div class="login_form_text">{{ $t('w_keeper.item2') }}</div>
        <select v-if="Keeper.keeper" v-model="Keeper.keeper.experience_id" class="login_form_item auth_arrow">
            <option v-for="option in Store.experiences" :value="option.id">
                {{ option.title[locale] }}
            </option>
        </select>
        <div class="login_form_text">{{ $t('w_baby.item6') }}</div>
        <div v-for="post in Store.housekeepertypeofworks" :key="post.id" class="login_checkbox">
            <input type="checkbox" v-bind:value="post.id" v-model="Keeper.keeper_options.anketatypeworks">
            {{ post.title[locale] }}
        </div>
        <div class="login_form_text">{{ $t('w_nurse.item6') }}</div>
        <select v-if="Keeper.keeper" v-model="Keeper.keeper.workperiod_id" class="login_form_item auth_arrow">
            <option v-for="option in Store.workperiods" :value="option.id">
                {{ option.title[locale] }}
            </option>
        </select>
        <div class="login_form_text">{{ $t('w_keeper.item3') }}</div>
        <div v-for="post in Store.housekeeperpreferences" :key="post.id" class="login_checkbox">
            <input type="checkbox" v-bind:value="post.id" v-model="Keeper.keeper_options.anketarpreferences">
            {{ post.title[locale] }}
        </div>
        <div class="login_form_text">{{ $t('w_baby.item10') }}</div>
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

        <button type="submit" class="btn">Изменить анкету</button>
    </form>
</template>

<script>
import { useI18n } from 'vue-i18n';
import { useForm_HousekeeperStore } from '../../../stores/form_housekeeper';
import { useDataStore } from '../../../stores/variables';
import { useUserStore } from '../../../stores/user';
import Errors from '../../layouts/Error.vue';
export default {
    name: "Change-housekeeper",
    data() {
        return {
            errors: null
        }
    },
    setup() {
        const Keeper = useForm_HousekeeperStore();
        const Store = useDataStore();
        const User = useUserStore();
        const { t, locale } = useI18n({ useScope: 'global' });
        return { t, locale, Store, Keeper, User };
    },
    components: { Errors },
    methods: {
        changeForm() {
            if ((this.Keeper.keeper_options.anketarpreferences.length == 0) || (this.Keeper.keeper_options.anketaduties.length == 0) || (this.Keeper.keeper_options.anketatypeworks.length == 0)) {
                this.errors = [];
                if (this.Keeper.keeper_options.anketarpreferences.length == 0) { this.errors.push('Укажите что Вы предпочитаете.'); }
                if (this.Keeper.keeper_options.anketaduties.length == 0) { this.errors.push('Укажите обязанности для домработницы.'); }
                if (this.Keeper.keeper_options.anketatypeworks.length == 0) { this.errors.push('Укажите какую работу вы ищите.'); }
            } else {
                this.errors = null;
                this.Keeper.CHANGE_KEEPER([this.Keeper.keeper, this.Keeper.keeper_options.anketarpreferences, this.Keeper.keeper_options.anketaduties, this.Keeper.keeper_options.anketatypeworks]);
            }
        }
    },
    mounted() {
        this.Keeper.GET_KEEPER(localStorage.userID);
        this.Store.GET_EXPERIENCES(); this.Store.GET_HOUSEKEEPERTYPEOFWORKS();
        this.Store.GET_WORKPERIODS();
        this.Store.GET_HOUSEKEEPERPREFERENCES(); this.Store.GET_HOUSEKEEPERDUTIES();
        this.Store.GET_HOURLYPAYMENTS(); this.Store.GET_MONTHLYPAYMENTS();
        this.errors = null;
    },
}
</script>