<template>
    <div class="category_title">Изменение анкеты для сиделки:</div>
    <form @submit.prevent="changeForm" class="personal">
        <div>Измените Ваш опыт работы с пристарелыми:</div>
        <textarea v-model="Nurse.nurse.nurse_exp" required class="login_form_item" placeholder="about"></textarea>

        <div>Отметьте диагнозы пациентов, с которыми вам приходилось работать:</div>
        <div v-for="post in Store.diagnoses" :key="post.id" class="language_item">
            <input type="checkbox" v-bind:value="post.id" v-model="Nurse.nurse_options.anketadiagnoses">
            {{ post.title }}
        </div>
        <div>Укажите свой опыт работы с пристарелыми:</div>
        <select v-model="Nurse.nurse.experience_id" class="category_form_title">
            <option v-for="option in Store.experiences" :value="option.id">
                {{ option.title }}
            </option>
        </select>
        <div>Укажите Ваше образование:</div>
        <div v-for="post in Store.educations" :key="post.id" class="language_item">
            <input type="checkbox" v-bind:value="post.id" v-model="Nurse.nurse_options.anketaeducations">
            {{ post.title }}
        </div>

        <div>Какую работу вы ищите:</div>
        <div v-for="post in Store.nursetypeofworks" :key="post.id" class="language_item">
            <input type="checkbox" v-bind:value="post.id" v-model="Nurse.nurse_options.anketatypeworks">
            {{ post.title }}
        </div>
        <div>Укажите период работы:</div>
        <select v-model="Nurse.nurse.workperiod_id" class="category_form_title">
            <option v-for="option in Store.workperiods" :value="option.id">
                {{ option.title }}
            </option>
        </select>
        <div>Какие обязанности вы готовы выполнять:</div>
        <div v-for="post in Store.nurseduties" :key="post.id" class="language_item">
            <input type="checkbox" v-bind:value="post.id" v-model="Nurse.nurse_options.anketaduties">
            {{ post.title }}
        </div>
        <div>Ожидаемая почасовая оплата:</div>
        <select v-model="Nurse.nurse.hourpay_id" class="category_form_title">
            <option v-for="option in Store.hourlypayments" :value="option.id">
                {{ option.title }}
            </option>
        </select>
        <div>Ожидаемая помесячная оплата:</div>
        <select v-model="Nurse.nurse.monthpay_id" class="category_form_title">
            <option v-for="option in Store.monthlypayments" :value="option.id">
                {{ option.title }}
            </option>
        </select>


        <button type="submit" class="login_form_btn">Изменить анкету</button>
    </form>
</template>

<script>
import { useForm_NurseStore } from '../../../stores/form_nurse';
import { useDataStore } from '../../../stores/variables';
import { useUserStore } from '../../../stores/user';
export default {
    name: "Change-nurse",
    data() {
        return {
            errors: null
        }
    },
    setup() {
        const Nurse = useForm_NurseStore();
        const Store = useDataStore();
        const User = useUserStore();
        return { Store, Nurse, User };
    },
    methods: {
        back() {
            this.$router.push({ name: "Nurse" })
        },
        changeForm() {
            if ((this.Nurse.nurse_options.anketaduties.length == 0) || (this.Nurse.nurse_options.anketadiagnoses.length == 0) || (this.Nurse.nurse_options.anketaeducations.length == 0) || (this.Nurse.nurse_options.anketatypeworks.length == 0)) {
                this.errors = [];
                if (this.Nurse.nurse_options.anketaeducations.length == 0) { this.errors.push('Укажите Ваше образование.'); }
                if (this.Nurse.nurse_options.anketadiagnoses.length == 0) { this.errors.push('Отметьте диагнозы пациентов, с которыми вам приходилось работать.'); }
                if (this.Nurse.nurse_options.anketaduties.length == 0) { this.errors.push('Укажите обязанности для сиделки.'); }
                if (this.Nurse.nurse_options.anketatypeworks.length == 0) { this.errors.push('Укажите какую работу вы ищите.'); }
            } else {
                this.errors = null; this.User.global_error = null;
                this.Nurse.CHANGE_NURSE([this.Nurse.nurse, this.Nurse.nurse_options.anketaeducations, this.Nurse.nurse_options.anketajoboptions, this.Nurse.nurse_options.anketadiagnoses, this.Nurse.nurse_options.anketaduties, this.Nurse.nurse_options.anketaskills, this.Nurse.nurse_options.anketatypeworks, this.Nurse.nurse_options.anketaworklocations]);
            }
        },
    },
    mounted() {
        this.Nurse.GET_NURSE(localStorage.userID);
        this.Store.GET_DIAGNOSES(); this.Store.GET_EXPERIENCES(); this.Store.GET_EDUCATIONS();
        this.Store.GET_NURSETYPEOFWORKS(); this.Store.GET_WORKPERIODS();
        this.Store.GET_NURSEDUTIES(); this.Store.GET_HOURLYPAYMENTS(); this.Store.GET_MONTHLYPAYMENTS();
        this.errors = null;
    },
}
</script>

