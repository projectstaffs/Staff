<template> 
    <div @click.prevent="back" class="category_change_btn">Назад</div>
    <div class="category_title">Изменение анкеты для домработницы:</div>   
    <form @submit.prevent="changeForm" class="login_form">   
        <div>Измените Ваш опыт работы:</div>
        <textarea v-model="Keeper.keeper.keeper_exp" class="login_form_item" placeholder="about"></textarea>
        <div>Измените свой опыт работы:</div>
        <select v-model="Keeper.keeper.experience_id" class="category_form_title">
            <option v-for="option in Store.experiences" :value="option.id">
                {{ option.title }}                
            </option>
        </select>
        <div>Укажите количество рекомендаций:</div>
        <select v-model="Keeper.keeper.recommendation_id" class="category_form_title">
            <option v-for="option in Store.recommendations" :value="option.id">
                {{ option.title }}                
            </option>
        </select>
        <div>Какую работу вы ищите:</div>
        <div v-for="post in Store.housekeepertypeofworks" :key="post.id" class="language_item">
            <input type="checkbox" v-bind:value="post.id" v-model="Keeper.keeper_options.anketatypeworks">
            {{ post.title }}                                    
        </div>
        <div>Приемлемые варианты работы:</div>
        <div v-for="post in Store.joboptions" :key="post.id" class="language_item">
            <input type="checkbox" v-bind:value="post.id" v-model="Keeper.keeper_options.anketajoboptions">
            {{ post.title }}                                    
        </div>
        <div>Укажите период работы:</div>
        <select v-model="Keeper.keeper.workperiod_id" class="category_form_title">
            <option v-for="option in Store.workperiods" :value="option.id">
                {{ option.title }}                
            </option>
        </select>
        <div>Укажите занятость:</div>
        <select v-model="Keeper.keeper.employment_id" class="category_form_title">
            <option v-for="option in Store.employments" :value="option.id">
                {{ option.title }}                
            </option>
        </select>
        <div>Вы предпочитаете:</div>
        <div v-for="post in Store.housekeeperpreferences" :key="post.id" class="language_item">
            <input type="checkbox" v-bind:value="post.id" v-model="Keeper.keeper_options.anketarpreferences">
            {{ post.title }}                                    
        </div>
        <div>Какие обязанности вы готовы выполнять:</div>
        <div v-for="post in Store.housekeeperduties" :key="post.id" class="language_item">
            <input type="checkbox" v-bind:value="post.id" v-model="Keeper.keeper_options.anketaduties">
            {{ post.title }}                                    
        </div>
        <div>Можете ли вы обеспечить собственную технику для уборки:</div>
        <select v-model="Keeper.keeper.technique" class="category_form_title">
            <option v-for="option in work" :value="option.value">
                {{ option.value }}                
            </option>
        </select>
        <div>Можете ли вы обеспечить собственные средства для уборки:</div>
        <select v-model="Keeper.keeper.material" class="category_form_title">
            <option v-for="option in work" :value="option.value">
                {{ option.value }}                
            </option>
        </select>
        <div>Можете ли вы присматривать за детьми:</div>
        <select v-model="Keeper.keeper.baby_keeper" class="category_form_title">
            <option v-for="option in work" :value="option.value">
                {{ option.value }}                
            </option>
        </select>
        <div>Можете ли вы присматривать за пристарелыми:</div>
        <select v-model="Keeper.keeper.nurse_keeper" class="category_form_title">
            <option v-for="option in work" :value="option.value">
                {{ option.value }}                
            </option>
        </select>      
        <div>Ожидаемая почасовая оплата:</div>
        <select v-model="Keeper.keeper.hourpay_id" class="category_form_title">
            <option v-for="option in Store.hourlypayments" :value="option.id">
                {{ option.title }}                
            </option>
        </select> 
        <div>Ожидаемая помесячная оплата:</div>
        <select v-model="Keeper.keeper.monthpay_id" class="category_form_title">
            <option v-for="option in Store.monthlypayments" :value="option.id">
                {{ option.title }}                
            </option>
        </select> 
        <div>Дополнительная информация:</div>
        <textarea v-model="Keeper.keeper.additional" required class="login_form_item" placeholder="about"></textarea>          
                
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
import { useForm_HousekeeperStore } from '../../../stores/form_housekeeper';
import { useDataStore } from '../../../stores/variables';
import { useUserStore } from '../../../stores/user';
export default {
    name: "Change-housekeeper",
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
        const Keeper = useForm_HousekeeperStore();
        const Store = useDataStore();
        const User = useUserStore();
        return { Store, Keeper, User };
    },
    methods: {
        back() {
            this.$router.push({name: "Housekeeper"})
        },        
        changeForm() { 
            if((this.Keeper.keeper_options.anketajoboptions.length == 0) || (this.Keeper.keeper_options.anketarpreferences.length == 0) || (this.Keeper.keeper_options.anketaduties.length == 0) || (this.Keeper.keeper_options.anketatypeworks.length == 0)) {
                this.errors = [];
                if(this.Keeper.keeper_options.anketajoboptions.length == 0) {this.errors.push('Укажите приемлемые варианты работы.');}
                if(this.Keeper.keeper_options.anketarpreferences.length == 0) {this.errors.push('Укажите что Вы предпочитаете.');}
                if(this.Keeper.keeper_options.anketaduties.length == 0) {this.errors.push('Укажите обязанности для домработницы.');}
                if(this.Keeper.keeper_options.anketatypeworks.length == 0) {this.errors.push('Укажите какую работу вы ищите.');}
            } else {
                this.errors = null; this.User.global_error = null;
                this.Keeper.CHANGE_KEEPER([this.Keeper.keeper, this.Keeper.keeper_options.anketajoboptions, this.Keeper.keeper_options.anketarpreferences, this.Keeper.keeper_options.anketaduties, this.Keeper.keeper_options.anketatypeworks]);
            }
        }
    },
    mounted() {
        this.User.GET_TOKEN();
        this.Keeper.GET_KEEPER(localStorage.userID);        
        this.Store.GET_EXPERIENCES(); this.Store.GET_RECOMMENDATIONS(); this.Store.GET_HOUSEKEEPERTYPEOFWORKS();
        this.Store.GET_JOBOPTIONS(); this.Store.GET_WORKPERIODS(); this.Store.GET_EMPLOYMENTS();
        this.Store.GET_HOUSEKEEPERPREFERENCES(); this.Store.GET_HOUSEKEEPERDUTIES();        
        this.Store.GET_HOURLYPAYMENTS(); this.Store.GET_MONTHLYPAYMENTS();                                     
        this.User.global_error = null; this.errors = null;
    },
}
</script>