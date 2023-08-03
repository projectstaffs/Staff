<template> 
    <div @click.prevent="back" class="category_change_btn">Назад</div>
    <div class="category_title">Изменение анкеты для домработницы:</div>   
    <form @submit.prevent="changeForm" class="login_form">   
        <div>Измените Ваш опыт работы:</div>
        <textarea v-model="keeper.keeper_exp" required class="login_form_item" placeholder="about"></textarea>
        <div>Измените свой опыт работы:</div>
        <select v-model="keeper.experience_id" class="category_form_title">
            <option v-for="option in experiences" :value="option.id">
                {{ option.title }}                
            </option>
        </select>
        <div>Укажите количество рекомендаций:</div>
        <select v-model="keeper.recommendation_id" class="category_form_title">
            <option v-for="option in recommendations" :value="option.id">
                {{ option.title }}                
            </option>
        </select>
        <div>Какую работу вы ищите:</div>
        <div v-for="post in housekeepertypeofworks" :key="post.id" class="language_item">
            <input type="checkbox" v-bind:value="post.id" v-model="keeper_options.anketatypeworks">
            {{ post.title }}                                    
        </div>
        <div>Приемлемые варианты работы:</div>
        <div v-for="post in joboptions" :key="post.id" class="language_item">
            <input type="checkbox" v-bind:value="post.id" v-model="keeper_options.anketajoboptions">
            {{ post.title }}                                    
        </div>
        <div>Укажите период работы:</div>
        <select v-model="keeper.workperiod_id" class="category_form_title">
            <option v-for="option in workperiods" :value="option.id">
                {{ option.title }}                
            </option>
        </select>
        <div>Укажите занятость:</div>
        <select v-model="keeper.employment_id" class="category_form_title">
            <option v-for="option in employments" :value="option.id">
                {{ option.title }}                
            </option>
        </select>
        <div>Вы предпочитаете:</div>
        <div v-for="post in housekeeperpreferences" :key="post.id" class="language_item">
            <input type="checkbox" v-bind:value="post.id" v-model="keeper_options.anketarpreferences">
            {{ post.title }}                                    
        </div>
        <div>Какие обязанности вы готовы выполнять:</div>
        <div v-for="post in housekeeperduties" :key="post.id" class="language_item">
            <input type="checkbox" v-bind:value="post.id" v-model="keeper_options.anketaduties">
            {{ post.title }}                                    
        </div>
        <div>Можете ли вы обеспечить собственную технику для уборки:</div>
        <select v-model="keeper.technique" class="category_form_title">
            <option v-for="option in work" :value="option.value">
                {{ option.value }}                
            </option>
        </select>
        <div>Можете ли вы обеспечить собственную технику для уборки:</div>
        <select v-model="keeper.material" class="category_form_title">
            <option v-for="option in work" :value="option.value">
                {{ option.value }}                
            </option>
        </select>
        <div>Можете ли вы обеспечить собственную технику для уборки:</div>
        <select v-model="keeper.baby_keeper" class="category_form_title">
            <option v-for="option in work" :value="option.value">
                {{ option.value }}                
            </option>
        </select>
        <div>Можете ли вы обеспечить собственную технику для уборки:</div>
        <select v-model="keeper.nurse_keeper" class="category_form_title">
            <option v-for="option in work" :value="option.value">
                {{ option.value }}                
            </option>
        </select>      
        <div>Ожидаемая почасовая оплата:</div>
        <select v-model="keeper.hourpay_id" class="category_form_title">
            <option v-for="option in hourlypayments" :value="option.id">
                {{ option.title }}                
            </option>
        </select> 
        <div>Ожидаемая помесячная оплата:</div>
        <select v-model="keeper.monthpay_id" class="category_form_title">
            <option v-for="option in monthlypayments" :value="option.id">
                {{ option.title }}                
            </option>
        </select> 
        <div>Дополнительная информация:</div>
        <textarea v-model="keeper.additional" required class="login_form_item" placeholder="about"></textarea>          
                
        <button type="submit" class="login_form_btn">Изменить анкету</button>
    </form>
</template>

<script>
import {mapActions, mapState} from 'vuex';
export default {
    name: "Change-housekeeper",
    data() {
        return {            
            work: [
                { value: 'Да' },
                { value: 'Нет' }
            ],            
        }
    },
    methods: {
        ...mapActions([
            'GET_TOKEN', 'GET_USER', 'GET_KEEPER', 'CHANGE_KEEPER', 'DELETE_KEEPER',
            'GET_EXPERIENCES', 'GET_RECOMMENDATIONS', 'GET_HOUSEKEEPERTYPEOFWORKS',             
            'GET_JOBOPTIONS', 'GET_WORKPERIODS', 'GET_EMPLOYMENTS', 'GET_HOUSEKEEPERPREFERENCES',
            'GET_HOUSEKEEPERDUTIES', 'GET_HOURLYPAYMENTS', 'GET_MONTHLYPAYMENTS',  
        ]),
        back() {
            this.$router.push({name: "Housekeeper"})
        },        
        changeForm() {            
            this.CHANGE_KEEPER([this.keeper, this.keeper_options.anketajoboptions, this.keeper_options.anketarpreferences, this.keeper_options.anketaduties, this.keeper_options.anketatypeworks]);
            this.$router.push({name: "Housekeeper"})
        }
    },
    mounted() {
        this.GET_TOKEN(); this.GET_USER(); this.GET_KEEPER(this.user.id);        
        this.GET_EXPERIENCES(); this.GET_RECOMMENDATIONS(); this.GET_HOUSEKEEPERTYPEOFWORKS();
        this.GET_JOBOPTIONS(); this.GET_WORKPERIODS(); this.GET_EMPLOYMENTS();
        this.GET_HOUSEKEEPERPREFERENCES(); this.GET_HOUSEKEEPERDUTIES();        
        this.GET_HOURLYPAYMENTS(); this.GET_MONTHLYPAYMENTS();                                     
    },
    computed: {
        ...mapState([
            'user', 'experiences', 'recommendations', 'housekeepertypeofworks',
            'joboptions', 'workperiods', 'employments', 'housekeeperpreferences',
            'housekeeperduties', 'hourlypayments', 'monthlypayments', 'keeper', 'keeper_options' 
        ])
    },
}
</script>

