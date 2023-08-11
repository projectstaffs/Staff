<template> 
    <div @click.prevent="back" class="category_change_btn">Назад</div>
    <div class="category_title">Анкета для няни:</div>   
    <form v-if="!Baby.baby" @submit.prevent="createForm" class="login_form">   
        <div>Опишите Ваш опыт работы с детьми:</div>
        <textarea v-model="anketa.baby_exp" required class="login_form_item" placeholder="about"></textarea>
        <div>Опыт работы с детьми по возрастным группам:</div>
        <div v-for="post in Store.agegroups" :key="post.id" class="language_item">
            <input type="checkbox" v-bind:value="post.id" v-model="anketaagegroups">
            {{ post.title }}                                    
        </div>
        <div>Знание иностранных языков:</div>
        <div v-for="post in Store.languages" :key="post.id" class="language_item">
            <input type="checkbox" v-bind:value="post.id" v-model="anketalanguages">
            {{ post.title }}                                    
        </div>
        <div>Укажите свой опыт работы с детьми:</div>
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
        <div>Укажите Ваше образование:</div>
        <div v-for="post in Store.educations" :key="post.id" class="language_item">
            <input type="checkbox" v-bind:value="post.id" v-model="anketaeducations">
            {{ post.title }}                                    
        </div>
        <div>Подробнее о полученном образовании:</div>
        <textarea v-model="anketa.education_about" required class="login_form_item" placeholder="about"></textarea>
        <div>Какую работу вы ищите:</div>
        <div v-for="post in Store.typeofworks" :key="post.id" class="language_item">
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
        <div>Укажите количество детей:</div>
        <select v-model="anketa.childrencount_id" class="category_form_title">
            <option v-for="option in Store.childrens" :value="option.id">
                {{ option.title }}                
            </option>
        </select>
        <div>Готовность работать с детьми-инвалидами:</div>
        <select v-model="anketa.children_invalid" class="category_form_title">
            <option v-for="option in work" :value="option.value">
                {{ option.value }}                
            </option>
        </select>
        <div>Какие обязанности вы готовы выполнять:</div>
        <div v-for="post in Store.babysittingduties" :key="post.id" class="language_item">
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
        <div>Дополнительная информация:</div>
        <textarea v-model="anketa.additional" required class="login_form_item" placeholder="about"></textarea>          
                
        <button type="submit" class="login_form_btn">Добавить анкету</button>
    </form>    
    
    <div>{{ Baby.baby }}</div> 
    <span v-if="Baby.baby" class="category_change_btn" @click.prevent="change_baby()">Изменить анкету</span>
    <span v-if="Baby.baby" class="category_change_btn red" @click.prevent="delete_baby()">Удалить анкету</span>
</template>

<script>
import { useForm_BabyStore } from '../../../stores/form_baby';
import { useDataStore } from '../../../stores/variables';
import { useUserStore } from '../../../stores/user';
export default {
    name: "Babysitting",
    data() {
        return {
            anketa: {},
            anketalanguages:[],
            anketaeducations:[], 
            anketatypeworks:[],
            anketajoboptions: [],
            anketaduties: [],
            anketaagegroups: [],
            work: [
                { value: 'Да' },
                { value: 'Нет' }
            ],
        }
    },
    setup() {
        const Baby = useForm_BabyStore();
        const Store = useDataStore();
        const User = useUserStore();
        return { Store, Baby, User };
    },
    methods: {
        back() {
            this.$router.push({name: "Account"})
        },        
        createForm() {
            this.anketa.user_id = localStorage.userID;
            this.anketa.confirmed = true;
            this.Baby.CREATE_BABY([this.anketa, this.anketalanguages, this.anketaeducations, this.anketatypeworks, this.anketajoboptions, this.anketaduties, this.anketaagegroups]);
        },
        change_baby() {
            this.$router.push({name: "Change-babysitting"});
        },
        delete_baby() {
            this.Baby.DELETE_BABY([this.Baby.baby.user_id, this.Baby.baby.id]);
        }
    },
    mounted() {
        this.User.GET_TOKEN();
        this.Baby.GET_BABY(localStorage.userID);        
        this.Store.GET_LANGUAGES(); this.Store.GET_EXPERIENCES(); this.Store.GET_RECOMMENDATIONS(); this.Store.GET_EDUCATIONS(); this.Store.GET_TYPEOFWORKS();
        this.Store.GET_JOBOPTIONS(); this.Store.GET_WORKPERIODS(); this.Store.GET_EMPLOYMENTS(); this.Store.GET_CHILDRENS(); this.Store.GET_BABYSITTINGDUTIES();
        this.Store.GET_HOURLYPAYMENTS(); this.Store.GET_MONTHLYPAYMENTS(); this.Store.GET_AGEGROUPS();                              
    },
}
</script>
