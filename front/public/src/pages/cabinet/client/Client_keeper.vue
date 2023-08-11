<template> 
    <div @click.prevent="back" class="category_change_btn">Назад</div>
    <div class="category_title">Вакансия для домработницы:</div>   
    <form v-if="!Keeper.keeper" @submit.prevent="createForm" class="login_form">   
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
        <div v-for="post in Store.housekeeperduties" :key="post.id" class="language_item">
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
    <div>{{ Keeper.keeper }}</div> 
    <span v-if="Keeper.keeper" class="category_change_btn" @click.prevent="change_keeper()">Изменить анкету</span>
    <span v-if="Keeper.keeper" class="category_change_btn red" @click.prevent="delete_keeper()">Удалить анкету</span>
</template>

<script>
import { useClient_KeeperStore } from '../../../stores/client_keeper';
import { useDataStore } from '../../../stores/variables';
import { useUserStore } from '../../../stores/user';
export default {
    name: "Client_keeper",
    data() {
        return {
            anketa: {},          
            anketaduties: [],
            anketajoboptions: [],
            work: [
                { value: 'Да' },
                { value: 'Нет' }
            ],            
        }
    },
    setup() {
        const Keeper = useClient_KeeperStore();
        const Store = useDataStore();
        const User = useUserStore();
        return { Store, Keeper, User };
    },
    methods: {
        back() {
            this.$router.push({name: "Account"})
        },        
        createForm() {
            this.anketa.user_id = localStorage.userID;
            this.anketa.confirmed = true;
            this.Keeper.CREATE_KEEPER([this.anketa, this.anketajoboptions, this.anketaduties,]);
        },
        change_keeper() {
            this.$router.push({name: "Change-client_keeper"})
        },
        delete_keeper() {
            this.Keeper.DELETE_KEEPER([this.Keeper.keeper.user_id, this.Keeper.keeper.id]);
        }
    },
    mounted() {
        this.User.GET_TOKEN();
        this.Keeper.GET_KEEPER(localStorage.userID);
        this.Store.GET_JOBOPTIONS(); this.Store.GET_WORKPERIODS(); 
        this.Store.GET_HOUSEKEEPERDUTIES(); this.Store.GET_EMPLOYMENTS();       
        this.Store.GET_HOURLYPAYMENTS(); this.Store.GET_MONTHLYPAYMENTS();                                      
    },
}
</script>

