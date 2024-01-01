<template>
    <div class="edit_title">{{ $t('c_baby.title') }}</div>
    <form @submit.prevent="createForm" class="personal">
        <div>Опишите вакансию:</div>
        <textarea v-model="anketa.title_about" required class="login_form_item" placeholder="about"></textarea>
        <div>Укажите количество детей:</div>
        <select v-model="anketa.childrencount_id" class="category_form_title">
            <option v-for="option in Store.childrens" :value="option.id">
                {{ option.title }}
            </option>
        </select>
        <div>Опыт работы с детьми по возрастным группам:</div>
        <div v-for="post in Store.agegroups" :key="post.id" class="language_item">
            <input type="checkbox" v-bind:value="post.id" v-model="anketaagegroups">
            {{ post.title }}
        </div>
        <div>Укажите период работы:</div>
        <select v-model="anketa.workperiod_id" class="category_form_title">
            <option v-for="option in Store.workperiods" :value="option.id">
                {{ option.title }}
            </option>
        </select>
        <div>Укажите обязанности для няни:</div>
        <div v-for="post in Store.babysittingduties" :key="post.id" class="language_item">
            <input type="checkbox" v-bind:value="post.id" v-model="anketaduties">
            {{ post.title }}
        </div>
        <div>Ожидаемая почасовая оплата:</div>
        <select v-model="anketa.hourpay_id" class="category_form_title">
            <option v-for="option in Store.hourlypayments" :value="option.id">
                {{ option.title }}
            </option>
        </select>
        <div>Ожидаемая помесячная оплата:</div>
        <select v-model="anketa.monthpay_id" class="category_form_title">
            <option v-for="option in Store.monthlypayments" :value="option.id">
                {{ option.title }}
            </option>
        </select>

        <button type="submit" class="login_form_btn">Добавить анкету</button>
    </form>
</template>

<script>
import { useI18n } from 'vue-i18n';
import { useDataStore } from '../../../stores/variables';
export default {
    name: "CreateClientBaby",
    data() {
        return {
            anketa: {},
            anketaduties: [],
            anketaagegroups: [],
            baby_exp: {},
            errors: {},
        }
    },
    setup() {
        const { t, locale } = useI18n({ useScope: 'global' });
        const Store = useDataStore();
        return { t, locale, Store };
    },
    mounted() {
        this.Store.GET_WORKPERIODS(); this.Store.GET_CHILDRENS(); this.Store.GET_BABYSITTINGDUTIES();
        this.Store.GET_HOURLYPAYMENTS(); this.Store.GET_MONTHLYPAYMENTS(); this.Store.GET_AGEGROUPS();
        this.errors = null;
    },
}
</script>