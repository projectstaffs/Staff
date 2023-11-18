<template>
    <div @click.prevent="back" class="category_change_btn">Назад</div>
    <div class="category_title">Изменение анкеты для няни:</div>
    <form @submit.prevent="changeForm" class="login_form">   
        <div>Измените Ваш опыт работы с детьми:</div>
        <textarea v-model="Baby.baby.baby_exp" required class="login_form_item" placeholder="about"></textarea>
        <div>Измените опыт работы с детьми по возрастным группам:</div>
        <div v-for="post in Store.agegroups" :key="post.id" class="language_item">
            <input type="checkbox" v-bind:value="post.id" v-model="Baby.baby_options.anketaagegroups">
            {{ post.title }}                                    
        </div>
        <div>Измените знание иностранных языков:</div>
        <div v-for="post in Store.languages" :key="post.id" class="language_item">
            <input type="checkbox" v-bind:value="post.id" v-model="Baby.baby_options.anketalanguages">
            {{ post.title }}                                    
        </div>
        <div>Измените свой опыт работы с детьми:</div>
        <select v-model="Baby.baby.experience_id" class="category_form_title">
            <option v-for="option in Store.experiences" :value="option.id">
                {{ option.title }}                
            </option>
        </select>
        <div>Измените количество рекомендаций:</div>
        <select v-model="Baby.baby.recommendation_id" class="category_form_title">
            <option v-for="option in Store.recommendations" :value="option.id">
                {{ option.title }}                
            </option>
        </select>
        <div>Измените Ваше образование:</div>
        <div v-for="post in Store.educations" :key="post.id" class="language_item">
            <input type="checkbox" v-bind:value="post.id" v-model="Baby.baby_options.anketaeducations">
            {{ post.title }}                                    
        </div>
        <div>Подробнее о полученном образовании:</div>
        <textarea v-model="Baby.baby.education_about" required class="login_form_item" placeholder="about"></textarea>
        <div>Какую работу вы ищите:</div>
        <div v-for="post in Store.typeofworks" :key="post.id" class="language_item">
            <input type="checkbox" v-bind:value="post.id" v-model="Baby.baby_options.anketatypeworks">
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
        <div>Измените количество детей:</div>
        <select v-model="Baby.baby.childrencount_id" class="category_form_title">
            <option v-for="option in Store.childrens" :value="option.id">
                {{ option.title }}                
            </option>
        </select>
        <div>Измените готовность работать с детьми-инвалидами:</div>
        <select v-model="Baby.baby.children_invalid" class="category_form_title">
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
        <div>Дополнительная информация:</div>
        <textarea v-model="Baby.baby.additional" required class="login_form_item" placeholder="about"></textarea>          
                
        <button type="submit" class="login_form_btn">Изменить анкету</button>
    </form>

    <div class="register_error" v-for="item in errors" :key="item">
        {{ item }}
    </div>
    <div class="register_error" v-for="item in User.global_error" :key="item">
        {{ item[0] }}
    </div>
</template>

<script>
import { useForm_BabyStore } from '../../../stores/form_baby';
import { useDataStore } from '../../../stores/variables';
import { useUserStore } from '../../../stores/user';
export default {
    name: "Change-babysitting",
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
        const Baby = useForm_BabyStore();
        const Store = useDataStore();
        const User = useUserStore();
        return { Store, Baby, User };
    },
    methods: {
        back() {
            this.$router.push({name: "Babysitting"})
        },
        changeForm() {  
            if((this.Baby.baby_options.anketatypeworks.length == 0) || (this.Baby.baby_options.anketaeducations.length == 0) || (this.Baby.baby_options.anketalanguages.length == 0) || (this.Baby.baby_options.anketajoboptions.length == 0) || (this.Baby.baby_options.anketaduties.length == 0) || (this.Baby.baby_options.anketaagegroups.length == 0)) {
                this.errors = [];
                if(this.Baby.baby_options.anketalanguages.length == 0) {this.errors.push('Укажите знание иностранных языков.');}
                if(this.Baby.baby_options.anketaeducations.length == 0) {this.errors.push('Укажите Ваше образование.');}
                if(this.Baby.baby_options.anketatypeworks.length == 0) {this.errors.push('Укажите какую работу вы ищите.');}
                if(this.Baby.baby_options.anketajoboptions.length == 0) {this.errors.push('Укажите приемлемые варианты работы.');}
                if(this.Baby.baby_options.anketaduties == 0) {this.errors.push('Укажите обязанности для няни.');}
                if(this.Baby.baby_options.anketaagegroups.length == 0) {this.errors.push('Укажите опыт работы с детьми по возрастным группам.');}
            } else {
                this.errors = null; this.User.global_error = null;
                this.Baby.CHANGE_BABY([this.Baby.baby, this.Baby.baby_options.anketalanguages, this.Baby.baby_options.anketaeducations, this.Baby.baby_options.anketatypeworks, this.Baby.baby_options.anketajoboptions, this.Baby.baby_options.anketaduties, this.Baby.baby_options.anketaagegroups]);
            }
        },                
    },
    mounted() {
        this.User.GET_TOKEN();
        this.Baby.GET_BABY(localStorage.userID);   
        this.Store.GET_LANGUAGES(); this.Store.GET_EXPERIENCES(); this.Store.GET_RECOMMENDATIONS(); this.Store.GET_EDUCATIONS(); this.Store.GET_TYPEOFWORKS();
        this.Store.GET_JOBOPTIONS(); this.Store.GET_WORKPERIODS(); this.Store.GET_EMPLOYMENTS(); this.Store.GET_CHILDRENS(); this.Store.GET_BABYSITTINGDUTIES();
        this.Store.GET_HOURLYPAYMENTS(); this.Store.GET_MONTHLYPAYMENTS(); this.Store.GET_AGEGROUPS();                            
        this.User.global_error = null; this.errors = null;
    },
}
</script>