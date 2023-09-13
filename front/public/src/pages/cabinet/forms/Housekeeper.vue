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
        <div>Можете ли вы обеспечить собственные средства для уборки:</div>
        <select v-model="anketa.material" class="category_form_title">
            <option v-for="option in work" :value="option.value">
                {{ option.value }}                
            </option>
        </select>
        <div>Можете ли вы присматривать за детьми:</div>
        <select v-model="anketa.baby_keeper" class="category_form_title">
            <option v-for="option in work" :value="option.value">
                {{ option.value }}                
            </option>
        </select>
        <div>Можете ли вы присматривать за пристарелыми:</div>
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

    <div class="register_error" v-for="item in errors" :key="item">
        {{ item }}
    </div>
    <div class="register_error" v-for="item in User.global_error" :key="item">
        {{ item[0] }}
    </div>

    <div v-if="Keeper.keeper" class="anketa">
        <div v-if="User.user.image" class="anketaitem_img"> <img :src="User.user.image" alt="photo"> </div>
        <div class="anketa_content">
            <div class="anketa_content_name">
                {{ User.user.name }} {{ User.user.patronymic }} {{ User.user.surname }}
            </div>
            <div class="anketa_content_age">
                Возраст(лет): {{ User.user.current_age }} &nbsp;&nbsp;•&nbsp;&nbsp; Опыт работы: {{ Keeper.keeper.experience }} &nbsp;&nbsp;•&nbsp;&nbsp; {{ User.user.city }}
            </div>
            <div class="anketa_content_typeworks">
                <b>Предоставляю услуги:&nbsp;</b> <div v-for="work in Keeper.keeper.Typeworks" :key="work.id" class="anketa_content_typeworks_item"> {{ work.title }},&nbsp; </div>                    
            </div>
            <div class="anketa_content_employment">
                <b>Занятость:</b> {{ Keeper.keeper.employment }}
            </div>
            <div class="anketa_content_phone">
                <b>Телефон:</b> {{ User.user.phone_number }}
            </div>

            <h2 class="anketa_title">Обо мне</h2>
            <p>{{ User.user.about }}</p>
            <p>{{ Keeper.keeper.keeper_exp }}</p>            
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
            </div>
            
            <h2 class="anketa_title">Опыт работы</h2>
            <div class="anketa_experience">
                Опыт работы: {{ Keeper.keeper.experience }}, Рекомендации с прежних мест работы: {{ Keeper.keeper.recommendation }}
            </div>
            <p>{{ Keeper.keeper.additional }}</p>

            <h2 class="anketa_title">Предпочтения по желаемой должности</h2>
            <div class="anketa_inform">
                <div class="anketa_inform_item">
                    <b>Должность:</b> <br> 
                    <span v-for="work in Keeper.keeper.Typeworks" :key="work.id"> {{ work.title }},&nbsp; </span>
                </div>
                <div class="anketa_inform_item">
                    <b>Место работы:</b> <br> 
                    <span v-for="work in Keeper.keeper.Preferences" :key="work.id"> {{ work.title }},&nbsp; </span>
                </div>
                <div class="anketa_inform_item">
                    <b>Желаемая зарплата:</b> <br> 
                    {{ Keeper.keeper.monthpay }}
                </div>
                <div class="anketa_inform_item">
                    <b>Приемлемые варианты работы:</b> <br> 
                    <span v-for="work in Keeper.keeper.Joboptions" :key="work.id"> {{ work.title }},&nbsp; </span>
                    {{ Keeper.keeper.employment }}
                </div>
                <div class="anketa_inform_item">
                    <b>Обязанности по присмотру за детьми:</b> <br> 
                    {{ Keeper.keeper.baby_keeper }}
                </div>
                <div class="anketa_inform_item">
                    <b>Обязанности по уходу за престарелыми/больными:</b> <br> 
                    {{ Keeper.keeper.nurse_keeper }}
                </div>
                <div class="anketa_inform_item">
                    <b>Работа на срок:</b> <br> 
                    {{ Keeper.keeper.workperiod }}
                </div>
                <div class="anketa_inform_item">
                    <b>Можете ли вы обеспечить собственную технику для уборки (пылесос, др.)?:</b> <br> 
                    {{ Keeper.keeper.technique }}
                </div>
                <div class="anketa_inform_item">
                    <b>Можете ли вы обеспечить собственные средства для уборки (моющие, чистящие, др.)?:</b> <br> 
                    {{ Keeper.keeper.material }}
                </div>                
                <div class="anketa_inform_item">
                    <b>Работы по дому:</b> <br> 
                    <span v-for="work in Keeper.keeper.Duties" :key="work.id"> {{ work.title }},&nbsp; </span>
                </div>
            </div>
        </div>
    </div>
     
    <span v-if="Keeper.keeper" class="category_change_btn" @click.prevent="change_keeper()">Изменить анкету</span>
    <span v-if="Keeper.keeper" class="category_change_btn red" @click.prevent="delete_keeper()">Удалить анкету</span>
</template>

<script>
import { useForm_HousekeeperStore } from '../../../stores/form_housekeeper';
import { useDataStore } from '../../../stores/variables';
import { useUserStore } from '../../../stores/user';
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
            errors: null             
        }
    },
    setup() {
        const Keeper = useForm_HousekeeperStore();
        const Store = useDataStore();
        const User = useUserStore();
        return { Store, Keeper, User };
    },
    methods: {
        back() {
            this.$router.push({name: "Account"})
        },        
        createForm() {
            if((this.anketajoboptions.length == 0) || (this.anketarpreferences.length == 0) || (this.anketaduties.length == 0) || (this.anketatypeworks.length == 0)) {
                this.errors = [];
                if(this.anketajoboptions.length == 0) {this.errors.push('Укажите приемлемые варианты работы.');}
                if(this.anketarpreferences.length == 0) {this.errors.push('Укажите что Вы предпочитаете.');}
                if(this.anketaduties.length == 0) {this.errors.push('Укажите обязанности для домработницы.');}
                if(this.anketatypeworks.length == 0) {this.errors.push('Укажите какую работу вы ищите.');}
            } else {
                this.errors = null; this.User.global_error = null;
                this.anketa.user_id = localStorage.userID;
                this.anketa.confirmed = true;
                this.Keeper.CREATE_KEEPER([this.anketa, this.anketajoboptions, this.anketarpreferences, this.anketaduties, this.anketatypeworks]);
            }
        },
        change_keeper() {
            this.$router.push({name: "Change-housekeeper"})
        },
        delete_keeper() {
            this.Keeper.DELETE_KEEPER([this.Keeper.keeper.user_id, this.Keeper.keeper.id]);
        }
    },
    mounted() {
        this.User.GET_TOKEN();
        this.User.GET_USER();
        this.Keeper.GET_KEEPER(localStorage.userID);        
        this.Store.GET_EXPERIENCES(); this.Store.GET_RECOMMENDATIONS(); this.Store.GET_HOUSEKEEPERTYPEOFWORKS();
        this.Store.GET_JOBOPTIONS(); this.Store.GET_WORKPERIODS(); this.Store.GET_EMPLOYMENTS();
        this.Store.GET_HOUSEKEEPERPREFERENCES(); this.Store.GET_HOUSEKEEPERDUTIES();        
        this.Store.GET_HOURLYPAYMENTS(); this.Store.GET_MONTHLYPAYMENTS();                                      
        this.User.global_error = null; this.errors = null;
    },
}
</script>

