<template> 
    <div @click.prevent="back" class="category_change_btn">Назад</div>
    <div class="category_title">Изменение вакансии для няни:</div>   
    <form @submit.prevent="changeForm" class="login_form">   
        <div>Измените Заголовок вакансии:</div>
        <input v-model="Baby.baby.title" required class="login_form_item" type="text" placeholder="Заголовок">
        <div>Опишите вакансию:</div>
        <textarea v-model="Baby.baby.title_about" required class="login_form_item" placeholder="about"></textarea>
        <div>Измените количество детей:</div>
        <select v-model="Baby.baby.childrencount_id" class="category_form_title">
            <option v-for="option in Store.childrens" :value="option.id">
                {{ option.title }}                
            </option>
        </select>
        <div>Опыт работы с детьми по возрастным группам:</div>
        <div v-for="post in Store.agegroups" :key="post.id" class="language_item">
            <input type="checkbox" v-bind:value="post.id" v-model="Baby.baby_options.anketaagegroups">
            {{ post.title }}                                    
        </div>
        <div>Приемлемые варианты работы:</div>
        <div v-for="post in Store.joboptions" :key="post.id" class="language_item">
            <input type="checkbox" v-bind:value="post.id" v-model="Baby.baby_options.anketajoboptions">
            {{ post.title }}                                    
        </div>
        <div>Измените период работы:</div>
        <select v-model="Baby.baby.workperiod_id" class="category_form_title">
            <option v-for="option in Store.workperiods" :value="option.id">
                {{ option.title }}                
            </option>
        </select>
        <div>Измените занятость:</div>
        <select v-model="Baby.baby.employment_id" class="category_form_title">
            <option v-for="option in Store.employments" :value="option.id">
                {{ option.title }}                
            </option>
        </select>
        <div>Наличие у работника водительского удостоверения:</div>
        <select v-model="Baby.baby.drive" class="category_form_title">
            <option v-for="option in work" :value="option.value">
                {{ option.value }}                
            </option>
        </select>
        <div>Позволять компаниям и агентствам связываться со мной по данной вакансии:</div>
        <select v-model="Baby.baby.agents" class="category_form_title">
            <option v-for="option in work" :value="option.value">
                {{ option.value }}                
            </option>
        </select>                
        <div>Какие обязанности вы готовы выполнять:</div>
        <div v-for="post in Store.babysittingduties" :key="post.id" class="language_item">
            <input type="checkbox" v-bind:value="post.id" v-model="Baby.baby_options.anketaduties">
            {{ post.title }}                                    
        </div>
        <div>Ожидаемая почасовая оплата:</div>
        <select v-model="Baby.baby.hourpay_id" class="category_form_title">
            <option v-for="option in Store.hourlypayments" :value="option.id">
                {{ option.title }}                
            </option>
        </select> 
        <div>Ожидаемая помесячная оплата:</div>
        <select v-model="Baby.baby.monthpay_id" class="category_form_title">
            <option v-for="option in Store.monthlypayments" :value="option.id">
                {{ option.title }}                
            </option>
        </select> 

        <button type="submit" class="login_form_btn">Изменить вакансию</button>
    </form>
</template>

<script>
import { useClient_BabyStore } from '../../../stores/client_baby';
import { useDataStore } from '../../../stores/variables';
export default {
    name: "Change-client_baby",
    data() {
        return {
            work: [
                { value: 'Да' },
                { value: 'Нет' }
            ],
        }
    },
    setup() {
        const Baby = useClient_BabyStore();
        const Store = useDataStore();
        return { Store, Baby };
    },
    methods: {
        back() {
            this.$router.push({name: "Client_baby"})
        },        
        changeForm() {            
            this.Baby.CHANGE_BABY([this.Baby.baby, this.Baby.baby_options.anketajoboptions, this.Baby.baby_options.anketaduties, this.Baby.baby_options.anketaagegroups]);
            this.$router.push({name: "Client_baby"})
        },
    },
    mounted() {
        this.Baby.GET_BABY(localStorage.userID);
        this.Store.GET_JOBOPTIONS(); this.Store.GET_WORKPERIODS(); this.Store.GET_EMPLOYMENTS(); this.Store.GET_CHILDRENS(); this.Store.GET_BABYSITTINGDUTIES();
        this.Store.GET_HOURLYPAYMENTS(); this.Store.GET_MONTHLYPAYMENTS(); this.Store.GET_AGEGROUPS();                              
    },
}
</script>
