<template>
    <div class="login_title"> Регистрация для нанимателя </div>
    <form @submit.prevent="register" class="login_form"> 
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
    name: "Register-employer",
    data() {
        return {
            user: {}
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
                this.user.role = "Наниматель"; 
                this.user.confirmed = true; 
                               
                this.User.CREATE_USER(this.user); 
            }                       
        }
    },
    mounted() {            
        this.Store.GET_COUNTRYS(); this.Store.GET_CITYS();                              
    },    
}
</script>