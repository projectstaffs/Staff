<template> 
    <div @click.prevent="back" class="category_change_btn">Назад</div>
    <div class="category_title">Вакансия для сиделки:</div>   
    <form v-if="!Nurse.nurse" @submit.prevent="createForm" class="login_form">   
        <div>Укажите Заголовок вакансии:</div>
        <input v-model="anketa.title" required class="login_form_item" type="text" placeholder="Заголовок">
        <div>Опишите вакансию:</div>
        <textarea v-model="anketa.title_about" required class="login_form_item" placeholder="about"></textarea>
        <div>Приемлемые варианты работы:</div>
        <div v-for="post in Store.joboptions" :key="post.id" class="language_item">
            <input type="checkbox" v-bind:value="post.id" v-model="anketajoboptions">
            {{ post.title }}                                    
        </div>
        <div>Укажите период работы:</div>
        <select v-model="anketa.workperiod_id" class="category_form_title">
            <option v-for="option in Store.workperiods" :value="option.id">
                {{ option.title }}                
            </option>
        </select>
        <div>Укажите занятость:</div>
        <select v-model="anketa.employment_id" class="category_form_title">
            <option v-for="option in Store.employments" :value="option.id">
                {{ option.title }}                
            </option>
        </select> 
        <div>Наличие у работника водительского удостоверения:</div>
        <select v-model="anketa.drive" class="category_form_title">
            <option v-for="option in work" :value="option.value">
                {{ option.value }}                
            </option>
        </select>
        <div>Позволять компаниям и агентствам связываться со мной по данной вакансии:</div>
        <select v-model="anketa.agents" class="category_form_title">
            <option v-for="option in work" :value="option.value">
                {{ option.value }}                
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
    <div>{{ Nurse.nurse }}</div> 
    <span v-if="Nurse.nurse" class="category_change_btn" @click.prevent="change_nurse()">Изменить анкету</span>
    <span v-if="Nurse.nurse" class="category_change_btn red" @click.prevent="delete_nurse()">Удалить анкету</span>
</template>

<script>
import { useClient_NurseStore } from '../../../stores/client_nurse';
import { useDataStore } from '../../../stores/variables';
export default {
    name: "Client_urse",
    data() {
        return {
            anketa: {},            
            anketajoboptions: [],
            anketaduties: [],
            work: [
                { value: 'Да' },
                { value: 'Нет' }
            ],            
        }
    },
    setup() {
        const Nurse = useClient_NurseStore();
        const Store = useDataStore();
        return { Store, Nurse };
    },
    methods: {
        back() {
            this.$router.push({name: "Account"})
        },        
        createForm() {
            this.anketa.user_id = localStorage.userID;
            this.anketa.confirmed = true;
            this.Nurse.CREATE_NURSE([this.anketa, this.anketajoboptions, this.anketaduties]);
        },
        change_nurse() {
            this.$router.push({name: "Change-client_nurse"})
        },
        delete_nurse() {
            this.Nurse.DELETE_NURSE([this.Nurse.nurse.user_id, this.Nurse.nurse.id]);
        }
    },
    mounted() {
        this.Nurse.GET_NURSE(localStorage.userID);
        this.Store.GET_JOBOPTIONS(); this.Store.GET_WORKPERIODS(); this.Store.GET_EMPLOYMENTS(); 
        this.Store.GET_NURSEDUTIES(); this.Store.GET_HOURLYPAYMENTS(); this.Store.GET_MONTHLYPAYMENTS();                                      
    },
}
</script>

