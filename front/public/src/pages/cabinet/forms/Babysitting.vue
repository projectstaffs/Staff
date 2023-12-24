<template>
    <div class="edit_title">{{ $t('w_baby.title') }}</div>
    <form v-if="!Baby.baby" @submit.prevent="createForm" class="anketa">
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

        <div class="anketa_errors">
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

    <div v-if="Baby.baby" class="anketa">
        <div class="anketa_content">
            <div class="anketa_content_name">
                {{ User.user.name }} {{ User.user.surname }}
            </div>
            <div class="anketa_content_age">
                Возраст(лет): {{ User.user.current_age }} &nbsp;&nbsp;•&nbsp;&nbsp; Опыт работы: {{ Baby.baby.experience }}
                &nbsp;&nbsp;•&nbsp;&nbsp; {{ User.user.city }}
            </div>
            <div class="anketa_content_typeworks">
                <b>Предоставляю услуги:&nbsp;</b>
                <div v-for="work in Baby.baby.Typeworks" :key="work.id" class="anketa_content_typeworks_item"> {{ work.title
                }},&nbsp; </div>
            </div>
            <div class="anketa_content_phone">
                <b>Телефон:</b> {{ User.user.phone_number }}
            </div>

            <h2 class="anketa_title">Обо мне</h2>
            <p>{{ User.user.about }}</p>
            <p>{{ Baby.baby.baby_exp }}</p>
            <div class="anketa_inform">
                <div class="anketa_inform_item">
                    <b>Готовность работать в доме с домашними животными:</b> <br> {{ User.user.animal_work }}
                </div>
                <div class="anketa_inform_item">
                    <b>Знание языков:</b> <br>
                    <span v-for="lang in Baby.baby.Languages" :key="lang.id"> {{ lang.title }},&nbsp; </span>
                </div>
            </div>

            <h2 class="anketa_title">Опыт работы и Образование</h2>
            <div class="anketa_experience">
                Опыт работы: {{ Baby.baby.experience }}
            </div>
            <div class="anketa_agegroup">
                <b>Опыт работы с детьми следующих возрастных групп:</b> <br>
                <span v-for="agegroup in Baby.baby.Agegroups" :key="agegroup.id"> {{ agegroup.title }},&nbsp; </span>
            </div>
            <div class="anketa_education">
                <b>Образование / курсы:</b> <br>
                <span v-for="education in Baby.baby.Educations" :key="education.id"> {{ education.title }},&nbsp; </span>
            </div>

            <h2 class="anketa_title">Предпочтения по желаемой должности</h2>
            <div class="anketa_inform">
                <div class="anketa_inform_item">
                    <b>Должность:</b> <br>
                    <span v-for="work in Baby.baby.Typeworks" :key="work.id"> {{ work.title }},&nbsp; </span>
                </div>
                <div class="anketa_inform_item">
                    <b>Желаемая зарплата:</b> <br>
                    {{ Baby.baby.monthpay }}
                </div>
                <div class="anketa_inform_item">
                    <b>Максимум детей в семье для одновременной работы:</b> <br>
                    {{ Baby.baby.childrencount }}
                </div>
                <div class="anketa_inform_item">
                    <b>Работа на срок:</b> <br>
                    {{ Baby.baby.workperiod }}
                </div>
                <div class="anketa_inform_item">
                    <b>Готовность выполнять следующие обязанности:</b> <br>
                    <span v-for="work in Baby.baby.Duties" :key="work.id"> {{ work.title }},&nbsp; </span>
                </div>
                <div class="anketa_inform_item">
                    <b>Готовность работать с детьми-инвалидами:</b> <br>
                    {{ Baby.baby.children_invalid }}
                </div>
            </div>
        </div>
    </div>
    <span v-if="Baby.baby" class="category_change_btn" @click.prevent="change_baby()">Изменить анкету</span>
    <span v-if="Baby.baby" class="category_change_btn red" @click.prevent="delete_baby()">Удалить анкету</span>
</template>

<script>
import { useI18n } from 'vue-i18n';
import { useForm_BabyStore } from '../../../stores/form_baby';
import { useDataStore } from '../../../stores/variables';
import { useUserStore } from '../../../stores/user';
export default {
    name: "Babysitting",
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
            errors: {},
            baby_exp: {}
        }
    },
    setup() {
        const Baby = useForm_BabyStore();
        const Store = useDataStore();
        const User = useUserStore();
        const { t, locale } = useI18n({ useScope: 'global' });
        return { t, locale, Store, Baby, User };
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
        change_baby() {
            this.$router.push({ name: "Change-babysitting" });
        },
        delete_baby() {
            this.Baby.DELETE_BABY([this.Baby.baby.user_id, this.Baby.baby.id]);
        }
    },
    mounted() {
        this.User.GET_USER();
        this.Baby.GET_BABY(localStorage.userID);
        this.Store.GET_LANGUAGES(); this.Store.GET_EXPERIENCES(); this.Store.GET_EDUCATIONS(); this.Store.GET_TYPEOFWORKS();
        this.Store.GET_WORKPERIODS(); this.Store.GET_CHILDRENS(); this.Store.GET_BABYSITTINGDUTIES();
        this.Store.GET_HOURLYPAYMENTS(); this.Store.GET_MONTHLYPAYMENTS(); this.Store.GET_AGEGROUPS();
        this.errors = null; this.Baby.errors = null;
    },
}
</script>
