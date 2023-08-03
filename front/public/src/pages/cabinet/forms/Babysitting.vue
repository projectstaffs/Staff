<template> 
    <div @click.prevent="back" class="category_change_btn">Назад</div>
    <div class="category_title">Анкета для няни:</div>   
    <form v-if="!baby" @submit.prevent="createForm" class="login_form">   
        <div>Опишите Ваш опыт работы с детьми:</div>
        <textarea v-model="anketa.baby_exp" required class="login_form_item" placeholder="about"></textarea>
        <div>Опыт работы с детьми по возрастным группам:</div>
        <div v-for="post in agegroups" :key="post.id" class="language_item">
            <input type="checkbox" v-bind:value="post.id" v-model="anketaagegroups">
            {{ post.title }}                                    
        </div>
        <div>Знание иностранных языков:</div>
        <div v-for="post in languages" :key="post.id" class="language_item">
            <input type="checkbox" v-bind:value="post.id" v-model="anketalanguages">
            {{ post.title }}                                    
        </div>
        <div>Укажите свой опыт работы с детьми:</div>
        <select v-model="anketa.experience_id" class="category_form_title">
            <option v-for="option in experiences" :value="option.id">
                {{ option.title }}                
            </option>
        </select>
        <div>Укажите количество рекомендаций:</div>
        <select v-model="anketa.recommendation_id" class="category_form_title">
            <option v-for="option in recommendations" :value="option.id">
                {{ option.title }}                
            </option>
        </select>
        <div>Укажите Ваше образование:</div>
        <div v-for="post in educations" :key="post.id" class="language_item">
            <input type="checkbox" v-bind:value="post.id" v-model="anketaeducations">
            {{ post.title }}                                    
        </div>
        <div>Подробнее о полученном образовании:</div>
        <textarea v-model="anketa.education_about" required class="login_form_item" placeholder="about"></textarea>
        <div>Какую работу вы ищите:</div>
        <div v-for="post in typeofworks" :key="post.id" class="language_item">
            <input type="checkbox" v-bind:value="post.id" v-model="anketatypeworks">
            {{ post.title }}                                    
        </div>
        <div>Приемлемые варианты работы:</div>
        <div v-for="post in joboptions" :key="post.id" class="language_item">
            <input type="checkbox" v-bind:value="post.id" v-model="anketajoboptions">
            {{ post.title }}                                    
        </div>
        <div>Укажите период работы:</div>
        <select v-model="anketa.workperiod_id" class="category_form_title">
            <option v-for="option in workperiods" :value="option.id">
                {{ option.title }}                
            </option>
        </select>
        <div>Укажите занятость:</div>
        <select v-model="anketa.employment_id" class="category_form_title">
            <option v-for="option in employments" :value="option.id">
                {{ option.title }}                
            </option>
        </select>
        <div>Укажите количество детей:</div>
        <select v-model="anketa.childrencount_id" class="category_form_title">
            <option v-for="option in childrens" :value="option.id">
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
        <div v-for="post in babysittingduties" :key="post.id" class="language_item">
            <input type="checkbox" v-bind:value="post.id" v-model="anketaduties">
            {{ post.title }}                                    
        </div>
        <div>Ожидаемая почасовая оплата:</div>
        <select v-model="anketa.hourpay_id" class="category_form_title">
            <option v-for="option in hourlypayments" :value="option.id">
                {{ option.title }}                
            </option>
        </select> 
        <div>Ожидаемая помесячная оплата:</div>
        <select v-model="anketa.monthpay_id" class="category_form_title">
            <option v-for="option in monthlypayments" :value="option.id">
                {{ option.title }}                
            </option>
        </select> 
        <div>Дополнительная информация:</div>
        <textarea v-model="anketa.additional" required class="login_form_item" placeholder="about"></textarea>          
                
        <button type="submit" class="login_form_btn">Добавить анкету</button>
    </form>    
    
    <div>{{ baby }}</div> 
    <span v-if="baby" class="category_change_btn" @click.prevent="change_baby()">Изменить анкету</span>
    <span v-if="baby" class="category_change_btn red" @click.prevent="delete_baby()">Удалить анкету</span>
</template>
<script>
import {mapActions, mapState} from 'vuex';
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
    methods: {
        ...mapActions([
            'GET_TOKEN', 'GET_USER', 'GET_LANGUAGES', 'GET_EXPERIENCES', 'GET_RECOMMENDATIONS', 'GET_EDUCATIONS',
            'GET_TYPEOFWORKS', 'GET_JOBOPTIONS', 'GET_WORKPERIODS', 'GET_EMPLOYMENTS', 'GET_CHILDRENS', 'GET_BABYSITTINGDUTIES',
            'GET_HOURLYPAYMENTS', 'GET_MONTHLYPAYMENTS', 'GET_AGEGROUPS', 'CREATE_BABY', 'GET_BABY', 'DELETE_BABY' 
        ]),
        back() {
            this.$router.push({name: "Account"})
        },        
        createForm() {
            this.anketa.user_id = this.user.id;
            this.anketa.confirmed = true;
            this.CREATE_BABY([this.anketa, this.anketalanguages, this.anketaeducations, this.anketatypeworks, this.anketajoboptions, this.anketaduties, this.anketaagegroups]);
        },
        change_baby() {
            this.$router.push({name: "Change-babysitting"});
        },
        delete_baby() {
            this.DELETE_BABY([this.baby.user_id, this.baby.id]);
        }
    },
    mounted() {
        this.GET_TOKEN(); this.GET_USER(); this.GET_BABY(this.user.id);
        //if(!this.baby){
            this.GET_LANGUAGES(); this.GET_EXPERIENCES(); this.GET_RECOMMENDATIONS(); this.GET_EDUCATIONS(); this.GET_TYPEOFWORKS();
            this.GET_JOBOPTIONS(); this.GET_WORKPERIODS(); this.GET_EMPLOYMENTS(); this.GET_CHILDRENS(); this.GET_BABYSITTINGDUTIES();
            this.GET_HOURLYPAYMENTS(); this.GET_MONTHLYPAYMENTS(); this.GET_AGEGROUPS();
        //}                      
    },
    computed: {
        ...mapState([
            'languages', 'user', 'experiences', 'recommendations', 'educations', 'typeofworks', 'joboptions', 'workperiods',
            'employments', 'childrens', 'babysittingduties', 'hourlypayments', 'monthlypayments', 'agegroups', 'baby' 
        ])
    },
}
</script>

<style>
.language_item {
    display: inline-block;
}
    
</style>