<template> 
    <div @click.prevent="back" class="category_change_btn">Назад</div>
    <div class="category_title">Изменение анкеты для сиделки:</div>   
    <form @submit.prevent="changeForm" class="login_form">   
        <div>Измените Ваш опыт работы с пристарелыми:</div>
        <textarea v-model="nurse.nurse_exp" required class="login_form_item" placeholder="about"></textarea>
        <div>Отметьте умения и навыки, которыми вы владеете в работе с престарелыми:</div>
        <div v-for="post in nursingskills" :key="post.id" class="language_item">
            <input type="checkbox" v-bind:value="post.id" v-model="nurse_options.anketaskills">
            {{ post.title }}                                    
        </div>
        <div>Отметьте диагнозы пациентов, с которыми вам приходилось работать:</div>
        <div v-for="post in diagnoses" :key="post.id" class="language_item">
            <input type="checkbox" v-bind:value="post.id" v-model="nurse_options.anketadiagnoses">
            {{ post.title }}                                    
        </div>
        <div>Укажите свой опыт работы с пристарелыми:</div>
        <select v-model="nurse.experience_id" class="category_form_title">
            <option v-for="option in experiences" :value="option.id">
                {{ option.title }}                
            </option>
        </select>
        <div>Укажите количество рекомендаций:</div>
        <select v-model="nurse.recommendation_id" class="category_form_title">
            <option v-for="option in recommendations" :value="option.id">
                {{ option.title }}                
            </option>
        </select>
        <div>Укажите Ваше образование:</div>
        <div v-for="post in educations" :key="post.id" class="language_item">
            <input type="checkbox" v-bind:value="post.id" v-model="nurse_options.anketaeducations">
            {{ post.title }}                                    
        </div>
        <div>Подробнее о полученном образовании:</div>
        <textarea v-model="nurse.education_about" required class="login_form_item" placeholder="about"></textarea>
        <div>Какую работу вы ищите:</div>
        <div v-for="post in nursetypeofworks" :key="post.id" class="language_item">
            <input type="checkbox" v-bind:value="post.id" v-model="nurse_options.anketatypeworks">
            {{ post.title }}                                    
        </div>
        <div>Приемлемые варианты работы:</div>
        <div v-for="post in joboptions" :key="post.id" class="language_item">
            <input type="checkbox" v-bind:value="post.id" v-model="nurse_options.anketajoboptions">
            {{ post.title }}                                    
        </div>
        <div>Укажите период работы:</div>
        <select v-model="nurse.workperiod_id" class="category_form_title">
            <option v-for="option in workperiods" :value="option.id">
                {{ option.title }}                
            </option>
        </select>
        <div>Укажите занятость:</div>
        <select v-model="nurse.employment_id" class="category_form_title">
            <option v-for="option in employments" :value="option.id">
                {{ option.title }}                
            </option>
        </select>
        <div>Где Вы предпочитаете работать :</div>
        <div v-for="post in worklocations" :key="post.id" class="language_item">
            <input type="checkbox" v-bind:value="post.id" v-model="nurse_options.anketaworklocations">
            {{ post.title }}                                    
        </div>         
        <div>Какие обязанности вы готовы выполнять:</div>
        <div v-for="post in nurseduties" :key="post.id" class="language_item">
            <input type="checkbox" v-bind:value="post.id" v-model="nurse_options.anketaduties">
            {{ post.title }}                                    
        </div>
        <div>Ожидаемая почасовая оплата:</div>
        <select v-model="nurse.hourpay_id" class="category_form_title">
            <option v-for="option in hourlypayments" :value="option.id">
                {{ option.title }}                
            </option>
        </select> 
        <div>Ожидаемая помесячная оплата:</div>
        <select v-model="nurse.monthpay_id" class="category_form_title">
            <option v-for="option in monthlypayments" :value="option.id">
                {{ option.title }}                
            </option>
        </select> 
        <div>Дополнительная информация:</div>
        <textarea v-model="nurse.additional" required class="login_form_item" placeholder="about"></textarea>          
                
        <button type="submit" class="login_form_btn">Изменить анкету</button>
    </form>    
</template>

<script>
import {mapActions, mapState} from 'vuex';
export default {
    name: "Change-nurse",    
    methods: {
        ...mapActions([
            'GET_TOKEN', 'GET_USER', 'GET_NURSE', 'GET_NURSINGSKILLS', 'GET_DIAGNOSES',
            'GET_EXPERIENCES', 'GET_RECOMMENDATIONS', 'GET_EDUCATIONS', 'GET_NURSETYPEOFWORKS',
            'GET_JOBOPTIONS', 'GET_WORKPERIODS', 'GET_EMPLOYMENTS', 'GET_WORKLOCATIONS', 
            'GET_NURSEDUTIES', 'GET_HOURLYPAYMENTS', 'GET_MONTHLYPAYMENTS', 'CHANGE_NURSE'  
        ]),
        back() {
            this.$router.push({name: "Nurse"})
        },        
        changeForm() {            
            this.CHANGE_NURSE([this.nurse, this.nurse_options.anketaeducations, this.nurse_options.anketajoboptions, this.nurse_options.anketadiagnoses, this.nurse_options.anketaduties, this.nurse_options.anketaskills, this.nurse_options.anketatypeworks, this.nurse_options.anketaworklocations]);
            this.$router.push({name: "Nurse"})            
        },               
    },
    mounted() {
        this.GET_TOKEN(); this.GET_USER(); this.GET_NURSE(this.user.id);
        this.GET_NURSINGSKILLS(); this.GET_DIAGNOSES(); this.GET_EXPERIENCES(); this.GET_RECOMMENDATIONS(); this.GET_EDUCATIONS(); 
        this.GET_NURSETYPEOFWORKS(); this.GET_JOBOPTIONS(); this.GET_WORKPERIODS(); this.GET_EMPLOYMENTS(); this.GET_WORKLOCATIONS();
        this.GET_NURSEDUTIES(); this.GET_HOURLYPAYMENTS(); this.GET_MONTHLYPAYMENTS();                               
    },
    computed: {
        ...mapState([
            'user', 'nursingskills', 'diagnoses', 'experiences', 'recommendations', 'educations', 
            'nursetypeofworks', 'joboptions', 'workperiods', 'employments', 'worklocations',
            'nurseduties', 'hourlypayments', 'monthlypayments', 'nurse', 'nurse_options' 
        ])
    },
}
</script>

