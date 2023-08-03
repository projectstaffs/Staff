<template> 
    <div @click.prevent="back" class="category_change_btn">Назад</div>
    <div class="category_title">Анкета для домработницы:</div>   
    <form v-if="!keeper" @submit.prevent="createForm" class="login_form">   
        <div>Опишите Ваш опыт работы:</div>
        <textarea v-model="anketa.keeper_exp" required class="login_form_item" placeholder="about"></textarea>
        <div>Укажите свой опыт работы:</div>
        <select v-model="anketa.experience_id" class="category_form_title">
            <option v-for="option in experiences" :value="option.id">
                {{ option.title }}                
            </option>
        </select>
        <div>Укажите количество рекомендаций:</div>
        <select v-model="anketa.recommendation_id" class="category_form_title">
            <option v-for="option in recommendations" :value="option.id">
                {{ option.title }}                
            </option>
        </select>
        <div>Какую работу вы ищите:</div>
        <div v-for="post in housekeepertypeofworks" :key="post.id" class="language_item">
            <input type="checkbox" v-bind:value="post.id" v-model="anketatypeworks">
            {{ post.title }}                                    
        </div>
        <div>Приемлемые варианты работы:</div>
        <div v-for="post in joboptions" :key="post.id" class="language_item">
            <input type="checkbox" v-bind:value="post.id" v-model="anketajoboptions">
            {{ post.title }}                                    
        </div>
        <div>Укажите период работы:</div>
        <select v-model="anketa.workperiod_id" class="category_form_title">
            <option v-for="option in workperiods" :value="option.id">
                {{ option.title }}                
            </option>
        </select>
        <div>Укажите занятость:</div>
        <select v-model="anketa.employment_id" class="category_form_title">
            <option v-for="option in employments" :value="option.id">
                {{ option.title }}                
            </option>
        </select>
        <div>Вы предпочитаете:</div>
        <div v-for="post in housekeeperpreferences" :key="post.id" class="language_item">
            <input type="checkbox" v-bind:value="post.id" v-model="anketarpreferences">
            {{ post.title }}                                    
        </div>
        <div>Какие обязанности вы готовы выполнять:</div>
        <div v-for="post in housekeeperduties" :key="post.id" class="language_item">
            <input type="checkbox" v-bind:value="post.id" v-model="anketaduties">
            {{ post.title }}                                    
        </div>
        <div>Можете ли вы обеспечить собственную технику для уборки:</div>
        <select v-model="anketa.technique" class="category_form_title">
            <option v-for="option in work" :value="option.value">
                {{ option.value }}                
            </option>
        </select>
        <div>Можете ли вы обеспечить собственную технику для уборки:</div>
        <select v-model="anketa.material" class="category_form_title">
            <option v-for="option in work" :value="option.value">
                {{ option.value }}                
            </option>
        </select>
        <div>Можете ли вы обеспечить собственную технику для уборки:</div>
        <select v-model="anketa.baby_keeper" class="category_form_title">
            <option v-for="option in work" :value="option.value">
                {{ option.value }}                
            </option>
        </select>
        <div>Можете ли вы обеспечить собственную технику для уборки:</div>
        <select v-model="anketa.nurse_keeper" class="category_form_title">
            <option v-for="option in work" :value="option.value">
                {{ option.value }}                
            </option>
        </select>      
        <div>Ожидаемая почасовая оплата:</div>
        <select v-model="anketa.hourpay_id" class="category_form_title">
            <option v-for="option in hourlypayments" :value="option.id">
                {{ option.title }}                
            </option>
        </select> 
        <div>Ожидаемая помесячная оплата:</div>
        <select v-model="anketa.monthpay_id" class="category_form_title">
            <option v-for="option in monthlypayments" :value="option.id">
                {{ option.title }}                
            </option>
        </select> 
        <div>Дополнительная информация:</div>
        <textarea v-model="anketa.additional" required class="login_form_item" placeholder="about"></textarea>          
                
        <button type="submit" class="login_form_btn">Добавить анкету</button>
    </form> 
    <div>{{ keeper }}</div> 
    <span v-if="keeper" class="category_change_btn" @click.prevent="change_keeper()">Изменить анкету</span>
    <span v-if="keeper" class="category_change_btn red" @click.prevent="delete_keeper()">Удалить анкету</span>
</template>

<script>
import {mapActions, mapState} from 'vuex';
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
        }
    },
    methods: {
        ...mapActions([
            'GET_TOKEN', 'GET_USER', 'GET_KEEPER', 'CREATE_KEEPER', 'DELETE_KEEPER',
            'GET_EXPERIENCES', 'GET_RECOMMENDATIONS', 'GET_HOUSEKEEPERTYPEOFWORKS',             
            'GET_JOBOPTIONS', 'GET_WORKPERIODS', 'GET_EMPLOYMENTS', 'GET_HOUSEKEEPERPREFERENCES',
            'GET_HOUSEKEEPERDUTIES', 'GET_HOURLYPAYMENTS', 'GET_MONTHLYPAYMENTS',  
        ]),
        back() {
            this.$router.push({name: "Account"})
        },        
        createForm() {
            this.anketa.user_id = this.user.id;
            this.anketa.confirmed = true;
            this.CREATE_KEEPER([this.anketa, this.anketajoboptions, this.anketarpreferences, this.anketaduties, this.anketatypeworks]);
        },
        change_keeper() {
            this.$router.push({name: "Change-housekeeper"})
        },
        delete_keeper() {
            this.DELETE_KEEPER([this.keeper.user_id, this.keeper.id]);
        }
    },
    mounted() {
        this.GET_TOKEN(); this.GET_USER(); this.GET_KEEPER(this.user.id);
        //if(!this.nurse){
            this.GET_EXPERIENCES(); this.GET_RECOMMENDATIONS(); this.GET_HOUSEKEEPERTYPEOFWORKS();
            this.GET_JOBOPTIONS(); this.GET_WORKPERIODS(); this.GET_EMPLOYMENTS();
            this.GET_HOUSEKEEPERPREFERENCES(); this.GET_HOUSEKEEPERDUTIES();        
             this.GET_HOURLYPAYMENTS(); this.GET_MONTHLYPAYMENTS();
        //}                              
    },
    computed: {
        ...mapState([
            'user', 'experiences', 'recommendations', 'housekeepertypeofworks',
            'joboptions', 'workperiods', 'employments', 'housekeeperpreferences',
            'housekeeperduties', 'hourlypayments', 'monthlypayments', 'keeper' 
        ])
    },
}
</script>

