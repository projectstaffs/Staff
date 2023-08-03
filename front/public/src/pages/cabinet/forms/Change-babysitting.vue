<template>
    <div @click.prevent="back" class="category_change_btn">Назад</div>
    <div class="category_title">Изменение анкеты для няни:</div>
    <form @submit.prevent="changeForm" class="login_form">   
        <div>Измените Ваш опыт работы с детьми:</div>
        <textarea v-model="baby.baby_exp" required class="login_form_item" placeholder="about"></textarea>
        <div>Измените опыт работы с детьми по возрастным группам:</div>
        <div v-for="post in agegroups" :key="post.id" class="language_item">
            <input type="checkbox" v-bind:value="post.id" v-model="baby_options.anketaagegroups">
            {{ post.title }}                                    
        </div>
        <div>Измените знание иностранных языков:</div>
        <div v-for="post in languages" :key="post.id" class="language_item">
            <input type="checkbox" v-bind:value="post.id" v-model="baby_options.anketalanguages">
            {{ post.title }}                                    
        </div>
        <div>Измените свой опыт работы с детьми:</div>
        <select v-model="baby.experience_id" class="category_form_title">
            <option v-for="option in experiences" :value="option.id">
                {{ option.title }}                
            </option>
        </select>
        <div>Измените количество рекомендаций:</div>
        <select v-model="baby.recommendation_id" class="category_form_title">
            <option v-for="option in recommendations" :value="option.id">
                {{ option.title }}                
            </option>
        </select>
        <div>Измените Ваше образование:</div>
        <div v-for="post in educations" :key="post.id" class="language_item">
            <input type="checkbox" v-bind:value="post.id" v-model="baby_options.anketaeducations">
            {{ post.title }}                                    
        </div>
        <div>Подробнее о полученном образовании:</div>
        <textarea v-model="baby.education_about" required class="login_form_item" placeholder="about"></textarea>
        <div>Какую работу вы ищите:</div>
        <div v-for="post in typeofworks" :key="post.id" class="language_item">
            <input type="checkbox" v-bind:value="post.id" v-model="baby_options.anketatypeworks">
            {{ post.title }}                                    
        </div>
        <div>Приемлемые варианты работы:</div>
        <div v-for="post in joboptions" :key="post.id" class="language_item">
            <input type="checkbox" v-bind:value="post.id" v-model="baby_options.anketajoboptions">
            {{ post.title }}                                    
        </div>
        <div>Измените период работы:</div>
        <select v-model="baby.workperiod_id" class="category_form_title">
            <option v-for="option in workperiods" :value="option.id">
                {{ option.title }}                
            </option>
        </select>
        <div>Измените занятость:</div>
        <select v-model="baby.employment_id" class="category_form_title">
            <option v-for="option in employments" :value="option.id">
                {{ option.title }}                
            </option>
        </select>
        <div>Измените количество детей:</div>
        <select v-model="baby.childrencount_id" class="category_form_title">
            <option v-for="option in childrens" :value="option.id">
                {{ option.title }}                
            </option>
        </select>
        <div>Измените готовность работать с детьми-инвалидами:</div>
        <select v-model="baby.children_invalid" class="category_form_title">
            <option v-for="option in work" :value="option.value">
                {{ option.value }}                
            </option>
        </select>
        <div>Какие обязанности вы готовы выполнять:</div>
        <div v-for="post in babysittingduties" :key="post.id" class="language_item">
            <input type="checkbox" v-bind:value="post.id" v-model="baby_options.anketaduties">
            {{ post.title }}                                    
        </div>
        <div>Ожидаемая почасовая оплата:</div>
        <select v-model="baby.hourpay_id" class="category_form_title">
            <option v-for="option in hourlypayments" :value="option.id">
                {{ option.title }}                
            </option>
        </select> 
        <div>Ожидаемая помесячная оплата:</div>
        <select v-model="baby.monthpay_id" class="category_form_title">
            <option v-for="option in monthlypayments" :value="option.id">
                {{ option.title }}                
            </option>
        </select> 
        <div>Дополнительная информация:</div>
        <textarea v-model="baby.additional" required class="login_form_item" placeholder="about"></textarea>          
                
        <button type="submit" class="login_form_btn">Изменить анкету</button>
    </form>

    <div> {{ baby }} </div>
</template>

<script>
import {mapActions, mapState} from 'vuex';
export default {
    name: "Change-babysitting",
    data() {
        return {          
            work: [
                { value: 'Да' },
                { value: 'Нет' }
            ],
        }
    },
    methods: {
        ...mapActions([
            'GET_TOKEN', 'GET_USER', 'GET_BABY',
            'GET_LANGUAGES', 'GET_EXPERIENCES', 'GET_RECOMMENDATIONS', 'GET_EDUCATIONS',
            'GET_TYPEOFWORKS', 'GET_JOBOPTIONS', 'GET_WORKPERIODS', 'GET_EMPLOYMENTS', 'GET_CHILDRENS', 'GET_BABYSITTINGDUTIES',
            'GET_HOURLYPAYMENTS', 'GET_MONTHLYPAYMENTS', 'GET_AGEGROUPS', 'CHANGE_BABY' 
        ]),
        back() {
            this.$router.push({name: "Babysitting"})
        },
        changeForm() {            
            this.CHANGE_BABY([this.baby, this.baby_options.anketalanguages, this.baby_options.anketaeducations, this.baby_options.anketatypeworks, this.baby_options.anketajoboptions, this.baby_options.anketaduties, this.baby_options.anketaagegroups]);
            this.$router.push({name: "Babysitting"})
        },                
    },
    mounted() {
        this.GET_TOKEN(); this.GET_USER(); this.GET_BABY(this.user.id);   
        this.GET_LANGUAGES(); this.GET_EXPERIENCES(); this.GET_RECOMMENDATIONS(); this.GET_EDUCATIONS(); this.GET_TYPEOFWORKS();
        this.GET_JOBOPTIONS(); this.GET_WORKPERIODS(); this.GET_EMPLOYMENTS(); this.GET_CHILDRENS(); this.GET_BABYSITTINGDUTIES();
        this.GET_HOURLYPAYMENTS(); this.GET_MONTHLYPAYMENTS(); this.GET_AGEGROUPS();                            
    },
    computed: {
        ...mapState([
            'user', 'baby', 'baby_options',
            'languages', 'experiences', 'recommendations', 'educations', 'typeofworks', 'joboptions', 'workperiods',
            'employments', 'childrens', 'babysittingduties', 'hourlypayments', 'monthlypayments', 'agegroups',             
        ])
    },
}
</script>

<style>
    
</style>