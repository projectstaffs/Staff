<template> 
    <div @click.prevent="back" class="category_change_btn">Назад</div>
    <div class="category_title">Анкета для домработницы:</div>   
    <form v-if="!Keeper.keeper" @submit.prevent="createForm" class="login_form">   
        <div>Опишите Ваш опыт работы:</div>
        <textarea v-model="anketa.keeper_exp" required class="login_form_item" placeholder="about"></textarea>
        <div>Укажите свой опыт работы:</div>
        <select v-model="anketa.experience_id" class="category_form_title">
            <option v-for="option in Store.experiences" :value="option.id">
                {{ option.title }}                
            </option>
        </select>
        <div>Укажите количество рекомендаций:</div>
        <select v-model="anketa.recommendation_id" class="category_form_title">
            <option v-for="option in Store.recommendations" :value="option.id">
                {{ option.title }}                
            </option>
        </select>
        <div>Какую работу вы ищите:</div>
        <div v-for="post in Store.housekeepertypeofworks" :key="post.id" class="language_item">
            <input type="checkbox" v-bind:value="post.id" v-model="anketatypeworks">
            {{ post.title }}                                    
        </div>
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
        <div>Можете ли вы обеспечить собственную технику для уборки:</div>
        <select v-model="anketa.material" class="category_form_title">
            <option v-for="option in work" :value="option.value">
                {{ option.value }}                
            </option>
        </select>
        <div>Можете ли вы обеспечить собственную технику для уборки:</div>
        <select v-model="anketa.baby_keeper" class="category_form_title">
            <option v-for="option in work" :value="option.value">
                {{ option.value }}                
            </option>
        </select>
        <div>Можете ли вы обеспечить собственную технику для уборки:</div>
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
        <div>Дополнительная информация:</div>
        <textarea v-model="anketa.additional" required class="login_form_item" placeholder="about"></textarea>          
                
        <button type="submit" class="login_form_btn">Добавить анкету</button>
    </form> 
    <div>{{ Keeper.keeper }}</div> 
    <span v-if="Keeper.keeper" class="category_change_btn" @click.prevent="change_keeper()">Изменить анкету</span>
    <span v-if="Keeper.keeper" class="category_change_btn red" @click.prevent="delete_keeper()">Удалить анкету</span>
</template>

<script>
import { useForm_HousekeeperStore } from '../../../stores/form_housekeeper';
import { useDataStore } from '../../../stores/variables';
export default {
    name: "Housekeeper",
    data() {
        return {
            anketa: {},          
            anketaduties: [],
            anketarpreferences: [],          
            anketatypeworks:[],
            anketajoboptions: [],
            work: [
                { value: 'Да' },
                { value: 'Нет' }
            ],            
        }
    },
    setup() {
        const Keeper = useForm_HousekeeperStore();
        const Store = useDataStore();
        return { Store, Keeper };
    },
    methods: {
        back() {
            this.$router.push({name: "Account"})
        },        
        createForm() {
            this.anketa.user_id = localStorage.userID;
            this.anketa.confirmed = true;
            this.Keeper.CREATE_KEEPER([this.anketa, this.anketajoboptions, this.anketarpreferences, this.anketaduties, this.anketatypeworks]);
        },
        change_keeper() {
            this.$router.push({name: "Change-housekeeper"})
        },
        delete_keeper() {
            this.Keeper.DELETE_KEEPER([this.Keeper.keeper.user_id, this.Keeper.keeper.id]);
        }
    },
    mounted() {
        this.Keeper.GET_KEEPER(localStorage.userID);        
        this.Store.GET_EXPERIENCES(); this.Store.GET_RECOMMENDATIONS(); this.Store.GET_HOUSEKEEPERTYPEOFWORKS();
        this.Store.GET_JOBOPTIONS(); this.Store.GET_WORKPERIODS(); this.Store.GET_EMPLOYMENTS();
        this.Store.GET_HOUSEKEEPERPREFERENCES(); this.Store.GET_HOUSEKEEPERDUTIES();        
        this.Store.GET_HOURLYPAYMENTS(); this.Store.GET_MONTHLYPAYMENTS();                                      
    },
}
</script>

