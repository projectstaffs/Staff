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
    
    <div class="register_error" v-for="item in errors" :key="item">
        {{ item }}
    </div>
    <div class="register_error" v-for="item in User.global_error" :key="item">
        {{ item[0] }}
    </div>

    <div v-if="Baby.baby" class="anketa">
        <div v-if="User.user.image" class="anketaitem_img"> <img :src="User.user.image" alt="photo"> </div>
        <div class="anketa_content">
            <div class="anketa_content_name">
                {{ User.user.name }} {{ User.user.patronymic }} {{ User.user.surname }}
            </div>
            <div class="anketa_content_age">
                Возраст(лет): {{ User.user.current_age }} &nbsp;&nbsp;•&nbsp;&nbsp; Опыт работы: {{ Baby.baby.experience }} &nbsp;&nbsp;•&nbsp;&nbsp; {{ User.user.city }}
            </div>
            <div class="anketa_content_typeworks">
                <b>Предоставляю услуги:&nbsp;</b> <div v-for="work in Baby.baby.Typeworks" :key="work.id" class="anketa_content_typeworks_item"> {{ work.title }},&nbsp; </div>                    
            </div>
            <div class="anketa_content_employment">
                <b>Занятость:</b> {{ Baby.baby.employment }}
            </div>
            <div class="anketa_content_phone">
                <b>Телефон:</b> {{ User.user.phone_number }}
            </div>

            <h2 class="anketa_title">Обо мне</h2>
            <p>{{ User.user.about }}</p>
            <p>{{ Baby.baby.baby_exp }}</p>
            <p>{{ Baby.baby.additional }}</p>
            <div class="anketa_inform">
                <div class="anketa_inform_item">
                    <b>Гражданство:</b> <br> {{ User.user.citizen }}
                </div>
                <div class="anketa_inform_item">
                    <b>Наличие водительского удостоверения:</b> <br> {{ User.user.drive }}
                </div>
                <div class="anketa_inform_item">
                    <b>Право работать на территории Украины?:</b> <br> {{ User.user.right_work }}
                </div>
                <div class="anketa_inform_item">
                    <b>Справка об отсутствии судимости:</b> <br> {{ User.user.criminal }}
                </div>
                <div class="anketa_inform_item">
                    <b>Умение плавать:</b> <br> {{ User.user.swimming }}
                </div>
                <div class="anketa_inform_item">
                    <b>Семейное положение:</b> <br> {{ User.user.status }}
                </div>
                <div class="anketa_inform_item">
                    <b>Религия:</b> <br> {{ User.user.religion }}
                </div>
                <div class="anketa_inform_item">
                    <b>Курение:</b> <br> {{ User.user.smoking }}
                </div>
                <div class="anketa_inform_item">
                    <b>Готовность работать в доме с домашними животными:</b> <br> {{ User.user.animal_work }}
                </div>
                <div class="anketa_inform_item">
                    <b>Знание языков:</b> <br> 
                    <span v-for="lang in Baby.baby.Languages" :key="lang.id"> {{ lang.title }},&nbsp; </span>
                </div>
            </div>
            
            <h2 class="anketa_title">Опыт работы и Образование</h2>
            <div class="anketa_experience">
                Опыт работы: {{ Baby.baby.experience }}, Рекомендации с прежних мест работы: {{ Baby.baby.recommendation }}
            </div>
            <div class="anketa_agegroup">
                <b>Опыт работы с детьми следующих возрастных групп:</b> <br> 
                <span v-for="agegroup in Baby.baby.Agegroups" :key="agegroup.id"> {{ agegroup.title }},&nbsp; </span>
            </div>
            <div class="anketa_education">
                <b>Образование / курсы:</b> <br> 
                <span v-for="education in Baby.baby.Educations" :key="education.id"> {{ education.title }},&nbsp; </span>
            </div>
            <p class="anketa_education_about"> {{ Baby.baby.education_about }} </p>

            <h2 class="anketa_title">Предпочтения по желаемой должности</h2>
            <div class="anketa_inform">
                <div class="anketa_inform_item">
                    <b>Должность:</b> <br> 
                    <span v-for="work in Baby.baby.Typeworks" :key="work.id"> {{ work.title }},&nbsp; </span>
                </div>
                <div class="anketa_inform_item">
                    <b>Приемлемые варианты работы:</b> <br> 
                    <span v-for="work in Baby.baby.Joboptions" :key="work.id"> {{ work.title }},&nbsp; </span>
                    {{ Baby.baby.employment }}
                </div>
                <div class="anketa_inform_item">
                    <b>Желаемая зарплата:</b> <br> 
                    {{ Baby.baby.monthpay }}
                </div>
                <div class="anketa_inform_item">
                    <b>Максимум детей в семье для одновременной работы:</b> <br> 
                    {{ Baby.baby.childrencount }}
                </div>
                <div class="anketa_inform_item">
                    <b>Работа на срок:</b> <br> 
                    {{ Baby.baby.workperiod }}
                </div>
                <div class="anketa_inform_item">
                    <b>Согласны ли вы на переезд:</b> <br> 
                    {{ User.user.moving }}
                </div>
                <div class="anketa_inform_item">
                    <b>Готовность выполнять следующие обязанности:</b> <br> 
                    <span v-for="work in Baby.baby.Duties" :key="work.id"> {{ work.title }},&nbsp; </span>
                </div>
                <div class="anketa_inform_item">
                    <b>Готовность работать с детьми-инвалидами:</b> <br> 
                    {{ Baby.baby.children_invalid }}
                </div>
            </div>
        </div>
    </div> 
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
            this.$router.push({name: "Account"})
        },        
        createForm() {
            if((this.anketatypeworks.length == 0) || (this.anketaeducations.length == 0) || (this.anketalanguages.length == 0) || (this.anketajoboptions.length == 0) || (this.anketaduties.length == 0) || (this.anketaagegroups.length == 0)) {
                this.errors = [];
                if(this.anketalanguages.length == 0) {this.errors.push('Укажите знание иностранных языков.');}
                if(this.anketaeducations.length == 0) {this.errors.push('Укажите Ваше образование.');}
                if(this.anketatypeworks.length == 0) {this.errors.push('Укажите какую работу вы ищите.');}
                if(this.anketajoboptions.length == 0) {this.errors.push('Укажите приемлемые варианты работы.');}
                if(this.anketaduties.length == 0) {this.errors.push('Укажите обязанности для няни.');}
                if(this.anketaagegroups.length == 0) {this.errors.push('Укажите опыт работы с детьми по возрастным группам.');}
            } else {
                this.errors = null; this.User.global_error = null;
                this.anketa.user_id = localStorage.userID;
                this.anketa.confirmed = true;
                this.Baby.CREATE_BABY([this.anketa, this.anketalanguages, this.anketaeducations, this.anketatypeworks, this.anketajoboptions, this.anketaduties, this.anketaagegroups]);
            }
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
        this.User.GET_USER();
        this.Baby.GET_BABY(localStorage.userID);        
        this.Store.GET_LANGUAGES(); this.Store.GET_EXPERIENCES(); this.Store.GET_RECOMMENDATIONS(); this.Store.GET_EDUCATIONS(); this.Store.GET_TYPEOFWORKS();
        this.Store.GET_JOBOPTIONS(); this.Store.GET_WORKPERIODS(); this.Store.GET_EMPLOYMENTS(); this.Store.GET_CHILDRENS(); this.Store.GET_BABYSITTINGDUTIES();
        this.Store.GET_HOURLYPAYMENTS(); this.Store.GET_MONTHLYPAYMENTS(); this.Store.GET_AGEGROUPS();                              
        this.User.global_error = null; this.errors = null;
    },
}
</script>
