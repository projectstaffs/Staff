<template>
    <div class="login_title"> Регистрация для исполнителя </div>
    <form @submit.prevent="register" class="login_form">
        <div>Какую работу Вы ищите?:</div>
        <div> <input type="checkbox" v-model="user.is_babysitting"> <span>по уходу за детьми</span> </div>
        <div> <input type="checkbox" v-model="user.is_nurse"> <span>по уходу за престарелыми</span> </div>
        <div> <input type="checkbox" v-model="user.is_housekeeper"> <span>по ведению домашнего хозяйства</span> </div>        
        
        <div>Укажите свое имя:</div>
        <input v-model="user.name" required class="login_form_item" type="text" placeholder="имя">
        <div>Укажите свое отчество:</div>
        <input v-model="user.patronymic" required class="login_form_item" type="text" placeholder="отчество">
        <div>Укажите свою фамилию:</div>
        <input v-model="user.surname" required class="login_form_item" type="text" placeholder="фамилия">
        <div>Укажите свой телефон:</div>
        <input v-model="user.phone" required class="login_form_item" type="tel" placeholder="телефон">
        <div>Укажите свой дополнительный телефон:</div>
        <input v-model="user.additional_phone" required class="login_form_item" type="tel" placeholder="телефон">
        <div>Укажите свой email:</div>
        <input v-model="user.email" required class="login_form_item" type="email" placeholder="email">        
        <div>Укажите свой пол:</div>
        <select v-model="user.gender" class="category_form_title">
            <option v-for="option in gender" :value="option.value">
                {{ option.value }}                
            </option>
        </select>
        <div>Укажите дату своего рождения:</div>
        <input v-model="user.age" required class="login_form_item" type="date" placeholder="возраст">
        <div>Право работать на территории Украины?:</div>
        <select v-model="user.right_work" class="category_form_title">
            <option v-for="option in work" :value="option.value">
                {{ option.value }}                
            </option>
        </select>
        <div>Наличие водительского удостоверения?:</div>
        <select v-model="user.drive" class="category_form_title">
            <option v-for="option in work" :value="option.value">
                {{ option.value }}                
            </option>
        </select>
        <div>Согласны ли вы работать в ночное время?:</div>
        <select v-model="user.night_work" class="category_form_title">
            <option v-for="option in work" :value="option.value">
                {{ option.value }}                
            </option>
        </select>
        <div>Готовы ли вы работать в доме с домашними животными?:</div>
        <select v-model="user.animal_work" class="category_form_title">
            <option v-for="option in work" :value="option.value">
                {{ option.value }}                
            </option>
        </select>
        <div>Умеете ли вы плавать?:</div>
        <select v-model="user.swimming" class="category_form_title">
            <option v-for="option in work" :value="option.value">
                {{ option.value }}                
            </option>
        </select>
        <div>Напишите немного о себе:</div>        
        <textarea v-model="user.about" required class="login_form_item" placeholder="about"></textarea>

        <div>Укажите страну проживания:</div>
        <select v-model="user.country" class="category_form_title">
            <option v-for="option in Store.countrys" :value="option.id">
                {{ option.title }}                
            </option>
        </select>
        <div>Укажите свой город:</div>
        <select v-model="user.city" class="category_form_title">
            <option v-for="option in Store.citys" :value="option.id">
                {{ option.title }}                
            </option>
        </select>
        <div>Укажите гражданство(страна):</div>
        <select v-model="user.citizen" class="category_form_title">
            <option v-for="option in Store.countrys" :value="option.id">
                {{ option.title }}                
            </option>
        </select>
        <div>Наличие справки из полиция об отсутствии судимости:</div>
        <select v-model="user.criminal" class="category_form_title">
            <option v-for="option in Store.criminals" :value="option.id">
                {{ option.title }}                
            </option>
        </select>
        <div>Согласны ли вы на переезд:</div>
        <select v-model="user.moving" class="category_form_title">
            <option v-for="option in Store.movings" :value="option.id">
                {{ option.title }}                
            </option>
        </select>
        <div>Укажите отношение к курению:</div>
        <select v-model="user.smoking" class="category_form_title">
            <option v-for="option in Store.smokings" :value="option.id">
                {{ option.title }}                
            </option>
        </select>
        <div>Укажите отношение к алкоголю:</div>
        <select v-model="user.alcohol" class="category_form_title">
            <option v-for="option in Store.alcohols" :value="option.id">
                {{ option.title }}                
            </option>
        </select>
        <div>Укажите семейное положение:</div>
        <select v-model="user.status" class="category_form_title">
            <option v-for="option in Store.statuss" :value="option.id">
                {{ option.title }}                
            </option>
        </select>
        <div>Укажите свою религию:</div>
        <select v-model="user.religion" class="category_form_title">
            <option v-for="option in Store.religions" :value="option.id">
                {{ option.title }}                
            </option>
        </select>
        <div>Укажите свой пароль:</div>
        <input v-model="user.password" required class="login_form_item" type="password" placeholder="password">
        <div>Подтвердите свой пароль:</div>
        <input v-model="user.password_confirm" required class="login_form_item" type="password" placeholder="confirm password">
        <button type="submit" class="login_form_btn">register</button>
    </form>
</template>

<script>
import { useUserStore } from '../../stores/user';
import { useDataStore } from '../../stores/variables';
export default {
    name: "Register",
    data() {
        return {
            user: {},            
            gender: [
                { value: 'Мужчина' },
                { value: 'Женщина' }
            ],
            work: [
                { value: 'Да' },
                { value: 'Нет' }
            ],
        }
    },
    setup() {
        const User = useUserStore();
        const Store = useDataStore();
        return { User, Store };
    }, 
    methods: {        
        register() {
            if(this.user.password !== this.user.password_confirm) {
                console.log('wrong confirm');
            } else {
                this.user.role = "Исполнитель"; 
                this.user.confirmed = true;                                
                this.User.CREATE_USER(this.user); 
            }                       
        }
    },
    mounted() {      
        this.user.is_babysitting = false; this.user.is_nurse = false; this.user.is_housekeeper = false;
        this.User.GET_TOKEN();
        this.Store.GET_COUNTRYS(); 
        this.Store.GET_CITYS(); 
        this.Store.GET_CRIMINALS();
        this.Store.GET_MOVINGS();
        this.Store.GET_SMOKINGS();    
        this.Store.GET_ALCOHOLS(); 
        this.Store.GET_STATUSS(); 
        this.Store.GET_RELIGIONS();          
    },    
}
</script>