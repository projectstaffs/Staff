<template>
    <div class="edit_title">{{ $t('w_keeper.title') }}</div>
    <form @submit.prevent="createForm" class="anketa">
        <div class="login_form_text">{{ $t('w_keeper.item1_ua') }}</div>
        <textarea v-model="keeper_exp.ua" required class="login_form_item register_textarea"
            :placeholder="$t('w_keeper.item1_ua_holder')"></textarea>
        <div class="login_form_text">{{ $t('w_keeper.item1_en') }}</div>
        <textarea v-model="keeper_exp.en" required class="login_form_item register_textarea"
            :placeholder="$t('w_keeper.item1_en_holder')"></textarea>
        <div>Укажите свой опыт работы:</div>
        <select v-model="anketa.experience_id" class="category_form_title">
            <option v-for="option in Store.experiences" :value="option.id">
                {{ option.title }}
            </option>
        </select>
        <div>Какую работу вы ищите:</div>
        <div v-for="post in Store.housekeepertypeofworks" :key="post.id" class="language_item">
            <input type="checkbox" v-bind:value="post.id" v-model="anketatypeworks">
            {{ post.title }}
        </div>
        <div>Укажите период работы:</div>
        <select v-model="anketa.workperiod_id" class="category_form_title">
            <option v-for="option in Store.workperiods" :value="option.id">
                {{ option.title }}
            </option>
        </select>
        <div>Вы предпочитаете:</div>
        <div v-for="post in Store.housekeeperpreferences" :key="post.id" class="language_item">
            <input type="checkbox" v-bind:value="post.id" v-model="anketarpreferences">
            {{ post.title }}
        </div>
        <div>Какие обязанности вы готовы выполнять:</div>
        <div v-for="post in Store.housekeeperduties" :key="post.id" class="language_item">
            <input type="checkbox" v-bind:value="post.id" v-model="anketaduties">
            {{ post.title }}
        </div>
        <div>Можете ли вы обеспечить собственную технику для уборки:</div>
        <select v-model="anketa.technique" class="category_form_title">
            <option v-for="option in work" :value="option.value">
                {{ option.value }}
            </option>
        </select>
        <div>Можете ли вы обеспечить собственные средства для уборки:</div>
        <select v-model="anketa.material" class="category_form_title">
            <option v-for="option in work" :value="option.value">
                {{ option.value }}
            </option>
        </select>
        <div>Можете ли вы присматривать за детьми:</div>
        <select v-model="anketa.baby_keeper" class="category_form_title">
            <option v-for="option in work" :value="option.value">
                {{ option.value }}
            </option>
        </select>
        <div>Можете ли вы присматривать за пристарелыми:</div>
        <select v-model="anketa.nurse_keeper" class="category_form_title">
            <option v-for="option in work" :value="option.value">
                {{ option.value }}
            </option>
        </select>
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
import { useForm_HousekeeperStore } from '../../../stores/form_housekeeper';
export default {
    name: "CreateKeeper",
    data() {
        return {
            anketa: {},
            anketaduties: [],
            anketarpreferences: [],
            anketatypeworks: [],
            work: [
                { value: 'Да' },
                { value: 'Нет' }
            ],
            errors: null,
            keeper_exp: {}
        }
    },
    setup() {
        const Store = useDataStore();
        const Keeper = useForm_HousekeeperStore();
        const { t, locale } = useI18n({ useScope: 'global' });
        return { Store, t, locale, Keeper };
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