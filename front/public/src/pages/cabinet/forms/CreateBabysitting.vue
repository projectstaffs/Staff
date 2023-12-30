<template>
    <div class="edit_title">{{ $t('w_baby.title') }}</div>
    <form @submit.prevent="createForm" class="personal">
        <div class="login_form_text">{{ $t('w_baby.item1_ua') }}</div>
        <textarea v-model="baby_exp.ua" required class="login_form_item register_textarea"
            :placeholder="$t('w_baby.item1_ua_holder')"></textarea>
        <div class="login_form_text">{{ $t('w_baby.item1_en') }}</div>
        <textarea v-model="baby_exp.en" required class="login_form_item register_textarea"
            :placeholder="$t('w_baby.item1_en_holder')"></textarea>
        <div class="login_form_text">{{ $t('w_baby.item2') }}</div>
        <div v-for="post in Store.agegroups" :key="post.id" class="login_checkbox">
            <input type="checkbox" v-bind:value="post.id" v-model="anketaagegroups">
            {{ post.title[locale] }}
        </div>
        <div class="login_form_text">{{ $t('w_baby.item3') }}</div>
        <div v-for="post in Store.languages" :key="post.id" class="login_checkbox">
            <input type="checkbox" v-bind:value="post.id" v-model="anketalanguages">
            {{ post.title[locale] }}
        </div>
        <div class="login_form_text">{{ $t('w_baby.item4') }}</div>
        <select v-model="anketa.experience_id" class="login_form_item auth_arrow">
            <option v-for="option in Store.experiences" :value="option.id">
                {{ option.title[locale] }}
            </option>
        </select>
        <div class="login_form_text">{{ $t('w_baby.item5') }}</div>
        <div v-for="post in Store.educations" :key="post.id" class="login_checkbox">
            <input type="checkbox" v-bind:value="post.id" v-model="anketaeducations">
            {{ post.title[locale] }}
        </div>
        <div class="login_form_text">{{ $t('w_baby.item6') }}</div>
        <div v-for="post in Store.typeofworks" :key="post.id" class="login_checkbox">
            <input type="checkbox" v-bind:value="post.id" v-model="anketatypeworks">
            {{ post.title[locale] }}
        </div>
        <div class="login_form_text">{{ $t('w_baby.item7') }}</div>
        <select v-model="anketa.workperiod_id" class="login_form_item auth_arrow">
            <option v-for="option in Store.workperiods" :value="option.id">
                {{ option.title[locale] }}
            </option>
        </select>
        <div class="login_form_text">{{ $t('w_baby.item8') }}</div>
        <select v-model="anketa.childrencount_id" class="login_form_item auth_arrow">
            <option v-for="option in Store.childrens" :value="option.id">
                {{ option.title[locale] }}
            </option>
        </select>
        <div class="login_form_text">{{ $t('w_baby.item9') }}</div>
        <select v-model="anketa.children_invalid" class="login_form_item auth_arrow">
            <option v-for="option in work" :value="option.value">
                {{ option.value[locale] }}
            </option>
        </select>
        <div class="login_form_text">{{ $t('w_baby.item10') }}</div>
        <div v-for="post in Store.babysittingduties" :key="post.id" class="login_checkbox">
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
            <div v-if="Baby.errors" class="login_middle">
                <ul v-for="item in Baby.errors" :key="item">
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
import { useForm_BabyStore } from '../../../stores/form_baby';
export default {
    name: "CreateBabysitting",
    data() {
        return {
            anketa: {},
            anketalanguages: [],
            anketaeducations: [],
            anketatypeworks: [],
            anketaduties: [],
            anketaagegroups: [],
            work: [
                { value: { en: "Yes", ua: "Так" } },
                { value: { en: "No", ua: "Ні" } }
            ],
            baby_exp: {}, // Вввод описания опыта в 2 языках
            errors: {},
        }
    },
    setup() {
        const Baby = useForm_BabyStore();
        const Store = useDataStore();
        const { t, locale } = useI18n({ useScope: 'global' });
        return { t, locale, Store, Baby };
    },
    methods: {
        createForm() {
            this.Baby.errors = null;
            if ((this.anketatypeworks.length == 0) || (this.anketaeducations.length == 0) || (this.anketalanguages.length == 0) || (this.anketaduties.length == 0) || (this.anketaagegroups.length == 0)) {
                this.errors = [];
                if (this.anketalanguages.length == 0) { this.errors.push({ en: "Indicate knowledge of foreign languages.", ua: "Вкажіть знання іноземних мов." }); }
                if (this.anketaeducations.length == 0) { this.errors.push({ en: "Please indicate your education.", ua: "Вкажіть Вашу освіту." }); }
                if (this.anketatypeworks.length == 0) { this.errors.push({ en: "Specify what kind of job you are looking for.", ua: "Вкажіть яку роботу ви шукаєте." }); }
                if (this.anketaduties.length == 0) { this.errors.push({ en: "Specify responsibilities for the nanny.", ua: "Вкажіть обов'язки для няні." }); }
                if (this.anketaagegroups.length == 0) { this.errors.push({ en: "Indicate your experience working with children by age group.", ua: "Вкажіть досвід роботи з дітьми за віковими групами." }); }
            } else {
                this.errors = null;
                this.anketa.user_id = localStorage.userID;
                this.anketa.confirmed = true;
                this.anketa.baby_exp = this.baby_exp;
                //console.log(this.anketa);
                this.Baby.CREATE_BABY([this.anketa, this.anketalanguages, this.anketaeducations, this.anketatypeworks, this.anketaduties, this.anketaagegroups]);
            }
        },
    },
    mounted() {
        this.Store.GET_LANGUAGES(); this.Store.GET_EXPERIENCES(); this.Store.GET_EDUCATIONS(); this.Store.GET_TYPEOFWORKS();
        this.Store.GET_WORKPERIODS(); this.Store.GET_CHILDRENS(); this.Store.GET_BABYSITTINGDUTIES();
        this.Store.GET_HOURLYPAYMENTS(); this.Store.GET_MONTHLYPAYMENTS(); this.Store.GET_AGEGROUPS();
        this.errors = null; this.Baby.errors = null;
    },
}
</script>