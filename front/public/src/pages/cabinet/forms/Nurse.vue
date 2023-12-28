<template>
    <div class="edit_title">{{ $t('w_nurse.title') }}</div>
    <form v-if="!Nurse.nurse" @submit.prevent="createForm" class="personal">
        <div>Опишите Ваш опыт работы с пристарелыми:</div>
        <textarea v-model="anketa.nurse_exp" required class="login_form_item" placeholder="about"></textarea>
        <div>Отметьте диагнозы пациентов, с которыми вам приходилось работать:</div>
        <div v-for="post in Store.diagnoses" :key="post.id" class="language_item">
            <input type="checkbox" v-bind:value="post.id" v-model="anketadiagnoses">
            {{ post.title }}
        </div>
        <div>Укажите свой опыт работы с пристарелыми:</div>
        <select v-model="anketa.experience_id" class="category_form_title">
            <option v-for="option in Store.experiences" :value="option.id">
                {{ option.title }}
            </option>
        </select>
        <div>Укажите Ваше образование:</div>
        <div v-for="post in Store.educations" :key="post.id" class="language_item">
            <input type="checkbox" v-bind:value="post.id" v-model="anketaeducations">
            {{ post.title }}
        </div>
        <div>Какую работу вы ищите:</div>
        <div v-for="post in Store.nursetypeofworks" :key="post.id" class="language_item">
            <input type="checkbox" v-bind:value="post.id" v-model="anketatypeworks">
            {{ post.title }}
        </div>
        <div>Укажите период работы:</div>
        <select v-model="anketa.workperiod_id" class="category_form_title">
            <option v-for="option in Store.workperiods" :value="option.id">
                {{ option.title }}
            </option>
        </select>
        <div>Какие обязанности вы готовы выполнять:</div>
        <div v-for="post in Store.nurseduties" :key="post.id" class="language_item">
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

    <div class="register_error" v-for="item in errors" :key="item">
        {{ item }}
    </div>
    <div class="register_error" v-for="item in Nurse.errors" :key="item">
        {{ item[0] }}
    </div>

    <div v-if="Nurse.nurse" class="anketa">
        <div v-if="photo" class="anketaitem_img"> <img :src="photo" alt="photo"> </div>
        <div class="anketa_content">
            <div class="anketa_content_name">
                {{ User.user.name }} {{ User.user.patronymic }} {{ User.user.surname }}
            </div>
            <div class="anketa_content_age">
                Возраст(лет): {{ User.user.current_age }} &nbsp;&nbsp;•&nbsp;&nbsp; Опыт работы: {{ Nurse.nurse.experience
                }} &nbsp;&nbsp;•&nbsp;&nbsp; {{ User.user.city }}
            </div>
            <div class="anketa_content_typeworks">
                <b>Предоставляю услуги:&nbsp;</b>
                <div v-for="work in Nurse.nurse.Typeworks" :key="work.id" class="anketa_content_typeworks_item"> {{
                    work.title }},&nbsp; </div>
            </div>
            <div class="anketa_content_phone">
                <b>Телефон:</b> {{ User.user.phone_number }}
            </div>

            <h2 class="anketa_title">Обо мне</h2>
            <p>{{ User.user.about }}</p>
            <p>{{ Nurse.nurse.nurse_exp }}</p>

            <div class="anketa_inform_item">
                <b>Готовность работать в доме с домашними животными:</b> <br> {{ User.user.animal_work }}
            </div>

            <h2 class="anketa_title">Опыт работы и Образование</h2>
            <div class="anketa_experience">
                Опыт работы: {{ Nurse.nurse.experience }}, Рекомендации с прежних мест работы: {{ Nurse.nurse.recommendation
                }}
            </div>
            <div class="anketa_inform">

                <div class="anketa_inform_item">
                    <b>Опыт работы со следующими Диагнозами пациентов:</b> <br>
                    <span v-for="work in Nurse.nurse.Diagnoses" :key="work.id"> {{ work.title }},&nbsp; </span>
                </div>
            </div>
            <div class="anketa_education">
                <b>Образование / курсы:</b> <br>
                <span v-for="education in Nurse.nurse.Educations" :key="education.id"> {{ education.title }},&nbsp; </span>
            </div>

            <h2 class="anketa_title">Предпочтения по желаемой должности</h2>
            <div class="anketa_inform">
                <div class="anketa_inform_item">
                    <b>Должность:</b> <br>
                    <span v-for="work in Nurse.nurse.Typeworks" :key="work.id"> {{ work.title }},&nbsp; </span>
                </div>
                <div class="anketa_inform_item">
                    <b>Желаемая зарплата:</b> <br>
                    {{ Nurse.nurse.monthpay }}
                </div>
                <div class="anketa_inform_item">
                    <b>Работа на срок:</b> <br>
                    {{ Nurse.nurse.workperiod }}
                </div>
                <div class="anketa_inform_item">
                    <b>Готовность выполнять следующие обязанности:</b> <br>
                    <span v-for="work in Nurse.nurse.Duties" :key="work.id"> {{ work.title }},&nbsp; </span>
                </div>
            </div>
        </div>
    </div>

    <span v-if="Nurse.nurse" class="category_change_btn" @click.prevent="change_nurse()">Изменить анкету</span>
    <span v-if="Nurse.nurse" class="category_change_btn red" @click.prevent="delete_nurse()">Удалить анкету</span>
</template>

<script>
import { useI18n } from 'vue-i18n';
import { useForm_NurseStore } from '../../../stores/form_nurse';
import { useDataStore } from '../../../stores/variables';
import { useUserStore } from '../../../stores/user';
export default {
    name: "Nurse",
    data() {
        return {
            anketa: {},
            anketadiagnoses: [],
            anketaeducations: [],
            anketatypeworks: [],
            anketaduties: [],
            errors: null,
        }
    },
    setup() {
        const Nurse = useForm_NurseStore();
        const Store = useDataStore();
        const User = useUserStore();
        const { t, locale } = useI18n({ useScope: 'global' });
        return { t, locale, Store, Nurse, User };
    },
    methods: {
        createForm() {
            this.Nurse.errors = null;
            if ((this.anketaduties.length == 0) || (this.anketadiagnoses.length == 0) || (this.anketaeducations.length == 0) || (this.anketatypeworks.length == 0)) {
                this.errors = [];
                if (this.anketaeducations.length == 0) { this.errors.push('Укажите Ваше образование.'); }
                if (this.anketadiagnoses.length == 0) { this.errors.push('Отметьте диагнозы пациентов, с которыми вам приходилось работать.'); }
                if (this.anketaduties.length == 0) { this.errors.push('Укажите обязанности для сиделки.'); }
                if (this.anketatypeworks.length == 0) { this.errors.push('Укажите какую работу вы ищите.'); }
            } else {
                this.errors = null;
                this.anketa.user_id = localStorage.userID;
                this.anketa.confirmed = true;
                this.Nurse.CREATE_NURSE([this.anketa, this.anketaeducations, this.anketadiagnoses, this.anketaduties, this.anketatypeworks]);
            }
        },
        change_nurse() {
            this.$router.push({ name: "Change-nurse" })
        },
        delete_nurse() {
            this.Nurse.DELETE_NURSE([this.Nurse.nurse.user_id, this.Nurse.nurse.id]);
        }
    },
    mounted() {
        this.User.GET_USER();
        this.Nurse.GET_NURSE(localStorage.userID);
        this.Store.GET_DIAGNOSES(); this.Store.GET_EXPERIENCES(); this.Store.GET_EDUCATIONS();
        this.Store.GET_NURSETYPEOFWORKS(); this.Store.GET_WORKPERIODS();
        this.Store.GET_NURSEDUTIES(); this.Store.GET_HOURLYPAYMENTS(); this.Store.GET_MONTHLYPAYMENTS();
        this.errors = null; this.Nurse.errors = null;
    },
}
</script>

