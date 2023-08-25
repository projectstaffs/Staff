<template> 
    <div @click.prevent="back" class="category_change_btn">Назад</div>
    <div class="category_title">Изменение вакансии для сиделки:</div>   
    <form @submit.prevent="changeForm" class="login_form">   
        <div>Измените Заголовок вакансии:</div>
        <input v-model="Keeper.keeper.title" required class="login_form_item" type="text" placeholder="Заголовок">
        <div>Опишите вакансию:</div>
        <textarea v-model="Keeper.keeper.title_about" required class="login_form_item" placeholder="about"></textarea>
        <div>Приемлемые варианты работы:</div>
        <div v-for="post in Store.joboptions" :key="post.id" class="language_item">
            <input type="checkbox" v-bind:value="post.id" v-model="Keeper.keeper_options.anketajoboptions">
            {{ post.title }}                                    
        </div>
        <div>Измените период работы:</div>
        <select v-model="Keeper.keeper.workperiod_id" class="category_form_title">
            <option v-for="option in Store.workperiods" :value="option.id">
                {{ option.title }}                
            </option>
        </select>
        <div>Измените занятость:</div>
        <select v-model="Keeper.keeper.employment_id" class="category_form_title">
            <option v-for="option in Store.employments" :value="option.id">
                {{ option.title }}                
            </option>
        </select>
        <div>Наличие у работника водительского удостоверения:</div>
        <select v-model="Keeper.keeper.drive" class="category_form_title">
            <option v-for="option in work" :value="option.value">
                {{ option.value }}                
            </option>
        </select>
        <div>Позволять компаниям и агентствам связываться со мной по данной вакансии:</div>
        <select v-model="Keeper.keeper.agents" class="category_form_title">
            <option v-for="option in work" :value="option.value">
                {{ option.value }}                
            </option>
        </select>                
        <div>Какие обязанности вы готовы выполнять:</div>
        <div v-for="post in Store.housekeeperduties" :key="post.id" class="language_item">
            <input type="checkbox" v-bind:value="post.id" v-model="Keeper.keeper_options.anketaduties">
            {{ post.title }}                                    
        </div>
        <div>Ожидаемая почасовая оплата:</div>
        <select v-model="Keeper.keeper.hourpay_id" class="category_form_title">
            <option v-for="option in Store.hourlypayments" :value="option.id">
                {{ option.title }}                
            </option>
        </select> 
        <div>Ожидаемая помесячная оплата:</div>
        <select v-model="Keeper.keeper.monthpay_id" class="category_form_title">
            <option v-for="option in Store.monthlypayments" :value="option.id">
                {{ option.title }}                
            </option>
        </select> 

        <button type="submit" class="login_form_btn">Изменить вакансию</button>
    </form> 

    <div class="register_error" v-for="item in errors" :key="item">
        {{ item }}
    </div>
    <div class="register_error" v-for="item in User.global_error" :key="item">
        {{ item[0] }}
    </div>
</template>

<script>
import { useClient_KeeperStore } from '../../../stores/client_keeper';
import { useDataStore } from '../../../stores/variables';
import { useUserStore } from '../../../stores/user';
export default {
    name: "Change-client_keeper",
    data() {
        return {
            work: [
                { value: 'Да' },
                { value: 'Нет' }
            ],
            errors: null
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
            this.$router.push({name: "Client_keeper"})
        },        
        changeForm() {  
            if((this.Keeper.keeper_options.anketajoboptions.length == 0) || (this.Keeper.keeper_options.anketaduties.length == 0)) {
                this.errors = [];
                if(this.Keeper.keeper_options.anketajoboptions.length == 0) {this.errors.push('Укажите приемлемые варианты работы.');}
                if(this.Keeper.keeper_options.anketaduties == 0) {this.errors.push('Укажите обязанности для домработницы.');}
            } else {
                this.errors = null; this.User.global_error = null;
                this.Keeper.CHANGE_KEEPER([this.Keeper.keeper, this.Keeper.keeper_options.anketajoboptions, this.Keeper.keeper_options.anketaduties]);
            }
        },
    },
    mounted() {
        this.Keeper.GET_KEEPER(localStorage.userID);
        this.Store.GET_JOBOPTIONS(); this.Store.GET_WORKPERIODS(); 
        this.Store.GET_EMPLOYMENTS(); this.Store.GET_HOUSEKEEPERDUTIES();
        this.Store.GET_HOURLYPAYMENTS(); this.Store.GET_MONTHLYPAYMENTS();                               
        this.User.global_error = null; this.errors = null;
    },
}
</script>
