<template> 
    <div @click.prevent="back" class="category_change_btn">Назад</div>
    <div class="category_title">Вакансия для домработницы:</div>   
    <form v-if="!Keeper.keeper" @submit.prevent="createForm" class="login_form">   
        <div>Укажите Заголовок вакансии:</div>
        <input v-model="anketa.title" required class="login_form_item" type="text" placeholder="Заголовок">
        <div>Опишите вакансию:</div>
        <textarea v-model="anketa.title_about" required class="login_form_item" placeholder="about"></textarea>
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
        <div>Наличие у работника водительского удостоверения:</div>
        <select v-model="anketa.drive" class="category_form_title">
            <option v-for="option in work" :value="option.value">
                {{ option.value }}                
            </option>
        </select>
        <div>Позволять компаниям и агентствам связываться со мной по данной вакансии:</div>
        <select v-model="anketa.agents" class="category_form_title">
            <option v-for="option in work" :value="option.value">
                {{ option.value }}                
            </option>
        </select>                
        <div>Какие обязанности вы готовы выполнять:</div>
        <div v-for="post in Store.housekeeperduties" :key="post.id" class="language_item">
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
                
        <button type="submit" class="login_form_btn">Добавить анкету</button>
    </form> 

    <div class="register_error" v-for="item in errors" :key="item">
        {{ item }}
    </div>
    <div class="register_error" v-for="item in User.global_error" :key="item">
        {{ item[0] }}
    </div>

    <div v-if="Keeper.keeper" class="anketa">
        <div v-if="photo" class="anketaitem_img"> <img :src="photo" alt="photo"> </div>
        <div class="anketa_content">
            <div class="anketa_content_name">
                {{ Keeper.keeper.title }} 
            </div>
            <div class="anketa_content_age">
                <b>Имя работодателя:</b> {{ User.user.name }} {{ User.user.patronymic }} {{ User.user.surname }}
            </div>
            <div class="anketa_content_typeworks">
                <b>Место работы: </b> {{ User.user.city }}                    
            </div>
            <div class="anketa_content_phone">
                <b>Телефон:</b> {{ User.user.phone_number }}
            </div>

            <h2 class="anketa_title">Описание работы</h2>
            <p class="anketa_client_about">{{ Keeper.keeper.title_about }}</p>
                        
            <div class="anketa_inform">
                <div class="anketa_inform_item">
                    <b>Занятость:</b> <br> 
                    <span v-for="work in Keeper.keeper.Joboptions" :key="work.id"> {{ work.title }},&nbsp; </span>
                    {{ Keeper.keeper.employment }}
                </div>
                <div class="anketa_inform_item">
                    <b>Заработная плата:</b> <br> 
                    {{ Keeper.keeper.monthpay }}
                </div>
                <div class="anketa_inform_item">
                    <b>Работа на срок:</b> <br> 
                    {{ Keeper.keeper.workperiod }}
                </div>
                <div class="anketa_inform_item">
                    <b>Наличие водительского удостоверения:</b> <br> {{ Keeper.keeper.drive }}
                </div>
                <div class="anketa_inform_item">
                    <b>Готовность выполнять следующие обязанности:</b> <br> 
                    <span v-for="work in Keeper.keeper.Duties" :key="work.id"> {{ work.title }},&nbsp; </span>
                </div>                
            </div>            
        </div>
    </div>

    <span v-if="Keeper.keeper" class="category_change_btn" @click.prevent="change_keeper()">Изменить анкету</span>
    <span v-if="Keeper.keeper" class="category_change_btn red" @click.prevent="delete_keeper()">Удалить анкету</span>
</template>

<script>
import { useClient_KeeperStore } from '../../../stores/client_keeper';
import { useDataStore } from '../../../stores/variables';
import { useUserStore } from '../../../stores/user';
export default {
    name: "Client_keeper",
    data() {
        return {
            anketa: {},          
            anketaduties: [],
            anketajoboptions: [],
            work: [
                { value: 'Да' },
                { value: 'Нет' }
            ],  
            errors: null,
            photo: ''          
        }
    },
    setup() {
        const Keeper = useClient_KeeperStore();
        const Store = useDataStore();
        const User = useUserStore();
        return { Store, Keeper, User };
    },
    methods: {
        back() {
            this.$router.push({name: "Account"})
        },        
        createForm() {
            if((this.anketajoboptions.length == 0) || (this.anketaduties.length == 0)) {
                this.errors = [];
                if(this.anketajoboptions.length == 0) {this.errors.push('Укажите приемлемые варианты работы.');}
                if(this.anketaduties.length == 0) {this.errors.push('Укажите обязанности для домработницы.');}                
            } else {
                this.errors = null; this.User.global_error = null;
                this.anketa.user_id = localStorage.userID;
            this.anketa.confirmed = true;
            this.Keeper.CREATE_KEEPER([this.anketa, this.anketajoboptions, this.anketaduties,]);
            }
            
        },
        change_keeper() {
            this.$router.push({name: "Change-client_keeper"})
        },
        delete_keeper() {
            this.Keeper.DELETE_KEEPER([this.Keeper.keeper.user_id, this.Keeper.keeper.id]);
        }
    },
    mounted() {
        this.User.GET_TOKEN();
        this.User.GET_USER();
        this.Keeper.GET_KEEPER(localStorage.userID);
        this.Store.GET_JOBOPTIONS(); this.Store.GET_WORKPERIODS(); 
        this.Store.GET_HOUSEKEEPERDUTIES(); this.Store.GET_EMPLOYMENTS();       
        this.Store.GET_HOURLYPAYMENTS(); this.Store.GET_MONTHLYPAYMENTS();                                      
        this.User.global_error = null; this.errors = null;
        this.photo = localStorage.user_image;
    },
}
</script>

