<template> 
    <div @click.prevent="back" class="category_change_btn">Назад</div>
    <div class="category_title">Анкета для сиделки:</div>   
    <form v-if="!Nurse.nurse" @submit.prevent="createForm" class="login_form">   
        <div>Опишите Ваш опыт работы с пристарелыми:</div>
        <textarea v-model="anketa.nurse_exp" required class="login_form_item" placeholder="about"></textarea>
        <div>Отметьте умения и навыки, которыми вы владеете в работе с престарелыми:</div>
        <div v-for="post in Store.nursingskills" :key="post.id" class="language_item">
            <input type="checkbox" v-bind:value="post.id" v-model="anketaskills">
            {{ post.title }}                                    
        </div>
        <div>Отметьте диагнозы пациентов, с которыми вам приходилось работать:</div>
        <div v-for="post in Store.diagnoses" :key="post.id" class="language_item">
            <input type="checkbox" v-bind:value="post.id" v-model="anketadiagnoses">
            {{ post.title }}                                    
        </div>
        <div>Укажите свой опыт работы с пристарелыми:</div>
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
        <div v-for="post in Store.nursetypeofworks" :key="post.id" class="language_item">
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
        <div>Где Вы предпочитаете работать:</div>
        <div v-for="post in Store.worklocations" :key="post.id" class="language_item">
            <input type="checkbox" v-bind:value="post.id" v-model="anketaworklocations">
            {{ post.title }}                                    
        </div>         
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
        <div>Дополнительная информация:</div>
        <textarea v-model="anketa.additional" required class="login_form_item" placeholder="about"></textarea>          
                
        <button type="submit" class="login_form_btn">Добавить анкету</button>
    </form> 

    <div class="register_error" v-for="item in errors" :key="item">
        {{ item }}
    </div>
    <div class="register_error" v-for="item in User.global_error" :key="item">
        {{ item[0] }}
    </div>

    <div>{{ Nurse.nurse }}</div> 
    <span v-if="Nurse.nurse" class="category_change_btn" @click.prevent="change_nurse()">Изменить анкету</span>
    <span v-if="Nurse.nurse" class="category_change_btn red" @click.prevent="delete_nurse()">Удалить анкету</span>
</template>

<script>
import { useForm_NurseStore } from '../../../stores/form_nurse';
import { useDataStore } from '../../../stores/variables';
import { useUserStore } from '../../../stores/user';
export default {
    name: "Nurse",
    data() {
        return {
            anketa: {},
            anketaskills:[],
            anketadiagnoses: [],            
            anketaeducations:[], 
            anketatypeworks:[],
            anketajoboptions: [],
            anketaduties: [],
            anketaworklocations: [],
            errors: null            
        }
    },
    setup() {
        const Nurse = useForm_NurseStore();
        const Store = useDataStore();
        const User = useUserStore();
        return { Store, Nurse, User };
    },
    methods: {
        back() {
            this.$router.push({name: "Account"})
        },        
        createForm() {
            if((this.anketaworklocations.length == 0) || (this.anketaskills.length == 0) || (this.anketaduties.length == 0) || (this.anketadiagnoses.length == 0) || (this.anketajoboptions.length == 0) || (this.anketaeducations.length == 0) || (this.anketatypeworks.length == 0)) {
                this.errors = [];
                if(this.anketaeducations.length == 0) {this.errors.push('Укажите Ваше образование.');}
                if(this.anketajoboptions.length == 0) {this.errors.push('Укажите приемлемые варианты работы.');}
                if(this.anketadiagnoses.length == 0) {this.errors.push('Отметьте диагнозы пациентов, с которыми вам приходилось работать.');}
                if(this.anketaduties.length == 0) {this.errors.push('Укажите обязанности для сиделки.');}
                if(this.anketaskills.length == 0) {this.errors.push('Отметьте умения и навыки, которыми вы владеете в работе с престарелыми.');}
                if(this.anketatypeworks.length == 0) {this.errors.push('Укажите какую работу вы ищите.');}
                if(this.anketaworklocations.length == 0) {this.errors.push('Укажите где Вы предпочитаете работать.');}
            } else {
                this.errors = null; this.User.global_error = null;
                this.anketa.user_id = localStorage.userID;
                this.anketa.confirmed = true;
                this.Nurse.CREATE_NURSE([this.anketa, this.anketaeducations, this.anketajoboptions, this.anketadiagnoses, this.anketaduties, this.anketaskills, this.anketatypeworks, this.anketaworklocations]);
            }            
        },
        change_nurse() {
            this.$router.push({name: "Change-nurse"})
        },
        delete_nurse() {
            this.Nurse.DELETE_NURSE([this.Nurse.nurse.user_id, this.Nurse.nurse.id]);
        }
    },
    mounted() {
        this.User.GET_TOKEN();
        this.Nurse.GET_NURSE(localStorage.userID);        
        this.Store.GET_NURSINGSKILLS(); this.Store.GET_DIAGNOSES(); this.Store.GET_EXPERIENCES(); this.Store.GET_RECOMMENDATIONS(); this.Store.GET_EDUCATIONS(); 
        this.Store.GET_NURSETYPEOFWORKS(); this.Store.GET_JOBOPTIONS(); this.Store.GET_WORKPERIODS(); this.Store.GET_EMPLOYMENTS(); this.Store.GET_WORKLOCATIONS();
        this.Store.GET_NURSEDUTIES(); this.Store.GET_HOURLYPAYMENTS(); this.Store.GET_MONTHLYPAYMENTS();                                      
        this.User.global_error = null; this.errors = null;
    },
}
</script>

