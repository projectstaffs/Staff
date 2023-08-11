<template>
    <div class="login_title"> Изменение учетных данных: </div>    
    <form v-if="User.user.role === 'Исполнитель'" @submit.prevent="change_User" class="login_form">
        <div>Какую работу Вы ищите?:</div>
        <div> <input type="checkbox" v-model="is_babysitting"> <span>по уходу за детьми</span> </div>
        <div> <input type="checkbox" v-model="is_nurse"> <span>по уходу за престарелыми</span> </div>
        <div> <input type="checkbox" v-model="is_housekeeper"> <span>по ведению домашнего хозяйства</span> </div>        
        
        <div>Укажите свое имя:</div>
        <input v-model="User.user.name" required class="login_form_item" type="text" placeholder="имя">
        <div>Укажите свое отчество:</div>
        <input v-model="User.user.patronymic" required class="login_form_item" type="text" placeholder="отчество">
        <div>Укажите свою фамилию:</div>
        <input v-model="User.user.surname" required class="login_form_item" type="text" placeholder="фамилия">
        <div>Укажите свой телефон:</div>
        <input v-model="User.user.phone" required class="login_form_item" type="tel" placeholder="телефон">
        <div>Укажите свой дополнительный телефон:</div>
        <input v-model="User.user.additional_phone" required class="login_form_item" type="tel" placeholder="телефон">
        <div>Укажите свой email:</div>
        <input v-model="User.user.email" required class="login_form_item" type="email" placeholder="email">        
        <div>Укажите свой пол:</div>
        <select v-model="User.user.gender" class="category_form_title">
            <option v-for="option in gender" :value="option.value">
                {{ option.value }}                
            </option>
        </select>
        <div>Укажите дату своего рождения:</div>
        <input v-model="User.user.age" required class="login_form_item" type="date" placeholder="возраст">
        <div>Право работать на территории Украины?:</div>
        <select v-model="User.user.right_work" class="category_form_title">
            <option v-for="option in work" :value="option.value">
                {{ option.value }}                
            </option>
        </select>
        <div>Наличие водительского удостоверения?:</div>
        <select v-model="User.user.drive" class="category_form_title">
            <option v-for="option in work" :value="option.value">
                {{ option.value }}                
            </option>
        </select>
        <div>Согласны ли вы работать в ночное время?:</div>
        <select v-model="User.user.night_work" class="category_form_title">
            <option v-for="option in work" :value="option.value">
                {{ option.value }}                
            </option>
        </select>
        <div>Готовы ли вы работать в доме с домашними животными?:</div>
        <select v-model="User.user.animal_work" class="category_form_title">
            <option v-for="option in work" :value="option.value">
                {{ option.value }}                
            </option>
        </select>
        <div>Умеете ли вы плавать?:</div>
        <select v-model="User.user.swimming" class="category_form_title">
            <option v-for="option in work" :value="option.value">
                {{ option.value }}                
            </option>
        </select>
        <div>Напишите немного о себе:</div>        
        <textarea v-model="User.user.about" required class="login_form_item" placeholder="about"></textarea>

        <div>Укажите страну проживания:</div>
        <select v-model="User.user.country_id" class="category_form_title">
            <option v-for="option in Store.countrys" :value="option.id">
                {{ option.title }}                
            </option>
        </select>
        <div>Укажите свой город:</div>
        <select v-model="User.user.city_id" class="category_form_title">
            <option v-for="option in Store.citys" :value="option.id">
                {{ option.title }}                
            </option>
        </select>
        <div>Укажите гражданство(страна):</div>
        <select v-model="User.user.citizen_id" class="category_form_title">
            <option v-for="option in Store.countrys" :value="option.id">
                {{ option.title }}                
            </option>
        </select>
        <div>Наличие справки из полиция об отсутствии судимости:</div>
        <select v-model="User.user.criminal_id" class="category_form_title">
            <option v-for="option in Store.criminals" :value="option.id">
                {{ option.title }}                
            </option>
        </select>
        <div>Согласны ли вы на переезд:</div>
        <select v-model="User.user.moving_id" class="category_form_title">
            <option v-for="option in Store.movings" :value="option.id">
                {{ option.title }}                
            </option>
        </select>
        <div>Укажите отношение к курению:</div>
        <select v-model="User.user.smoking_id" class="category_form_title">
            <option v-for="option in Store.smokings" :value="option.id">
                {{ option.title }}                
            </option>
        </select>
        <div>Укажите отношение к алкоголю:</div>
        <select v-model="User.user.alcohol_id" class="category_form_title">
            <option v-for="option in Store.alcohols" :value="option.id">
                {{ option.title }}                
            </option>
        </select>
        <div>Укажите семейное положение:</div>
        <select v-model="User.user.status_id" class="category_form_title">
            <option v-for="option in Store.statuss" :value="option.id">
                {{ option.title }}                
            </option>
        </select>
        <div>Укажите свою религию:</div>
        <select v-model="User.user.religion_id" class="category_form_title">
            <option v-for="option in Store.religions" :value="option.id">
                {{ option.title }}                
            </option>
        </select>
        <div>Укажите свой пароль:</div>
        <input v-model="User.user.password" required class="login_form_item" type="password" placeholder="password">
        <div>Подтвердите свой пароль:</div>
        <input v-model="User.user.password_confirm" required class="login_form_item" type="password" placeholder="confirm password">
        <button type="submit" class="login_form_btn">Изменить данные</button>
    </form>

    <form v-else @submit.prevent="change_ClientUser" class="login_form">
        <div>Укажите свое имя:</div>
        <input v-model="User.user.name" required class="login_form_item" type="text" placeholder="имя">
        <div>Укажите свое отчество:</div>
        <input v-model="User.user.patronymic" required class="login_form_item" type="text" placeholder="отчество">
        <div>Укажите свою фамилию:</div>
        <input v-model="User.user.surname" required class="login_form_item" type="text" placeholder="фамилия">
        <div>Укажите свой телефон:</div>
        <input v-model="User.user.phone" required class="login_form_item" type="tel" placeholder="телефон">
        <div>Укажите свой дополнительный телефон:</div>
        <input v-model="User.user.additional_phone" required class="login_form_item" type="tel" placeholder="телефон">
        <div>Укажите свой email:</div>
        <input v-model="User.user.email" required class="login_form_item" type="email" placeholder="email">        
        <div>Укажите страну проживания:</div>
        <select v-model="User.user.country_id" class="category_form_title">
            <option v-for="option in Store.countrys" :value="option.id">
                {{ option.title }}                
            </option>
        </select>
        <div>Укажите свой город:</div>
        <select v-model="User.user.city_id" class="category_form_title">
            <option v-for="option in Store.citys" :value="option.id">
                {{ option.title }}                
            </option>
        </select>
        <div>Укажите свой пароль:</div>
        <input v-model="User.user.password" required class="login_form_item" type="password" placeholder="password">
        <div>Подтвердите свой пароль:</div>
        <input v-model="User.user.password_confirm" required class="login_form_item" type="password" placeholder="confirm password">
        <button type="submit" class="login_form_btn">Изменить данные</button>
    </form>
</template>

<script>
import { useUserStore } from '../../stores/user';
import { useDataStore } from '../../stores/variables';
export default {
    name: "Edit",
    data() {
        return {
            is_babysitting: false,
            is_nurse: false,
            is_housekeeper: false,            
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
        change_User() {
            if(this.User.user.password !== this.User.user.password_confirm) {
                console.log('wrong confirm');
            } else {                
                this.User.user.is_babysitting = this.is_babysitting;
                this.User.user.is_nurse = this.is_nurse;
                this.User.user.is_housekeeper = this.is_housekeeper;                
                
                this.User.UPDATE_USER(this.User.user);                           
            }                       
        },
        change_ClientUser() {
            if(this.User.user.password !== this.User.user.password_confirm) {
                console.log('wrong confirm');
            } else {               
                this.User.UPDATE_USER(this.User.user);                           
            }                       
        }
    },
    mounted() {    
        this.User.GET_TOKEN();        
        this.User.GET_USER(); 
        this.Store.GET_COUNTRYS(); 
        this.Store.GET_CITYS(); 
        this.Store.GET_CRIMINALS();
        this.Store.GET_MOVINGS();
        this.Store.GET_SMOKINGS();    
        this.Store.GET_ALCOHOLS(); 
        this.Store.GET_STATUSS(); 
        this.Store.GET_RELIGIONS();
        if(this.User.user.is_babysitting === 1 || this.User.user.is_babysitting === true) {this.is_babysitting = true;}
        if(this.User.user.is_nurse === 1 || this.User.user.is_nurse === true) {this.is_nurse = true;}
        if(this.User.user.is_housekeeper === 1 || this.User.user.is_housekeeper === true) {this.is_housekeeper = true;}                         
    },
}
</script>
