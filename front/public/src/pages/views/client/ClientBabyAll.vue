<template>
    <div class="search_block">
        <button @click.prevent="watch" class="login_form_btn">Просмотренные</button>
        <form class="search" @submit.prevent="search">
            <select v-model="searchData.joboption">
                <option v-for="option in Store.joboptions" :value="option.id">
                    {{ option.title }}                
                </option>
            </select>    
            <select v-model="searchData.employment">
                <option v-for="option in Store.employments" :value="option.id">
                    {{ option.title }}                
                </option>
            </select>    
            <select v-model="searchData.city">
                <option v-for="option in Store.citys" :value="option.id">
                    {{ option.title }}                
                </option>
            </select>
            <button type="submit" class="login_form_btn">Найти</button>
        </form>
        <button @click.prevent="clear" class="login_form_btn">Сбросить</button>
    </div>

    <div v-for="post in displayedPosts" :key="post.id">
        <div class="anketa">
            <div v-if="post.User.image" class="anketa_img"> <img :src="post.User.image" alt=""> </div>
            <div class="anketa_content">
                <div class="anketa_content_name" @click.prevent="showItem(post)">
                    {{ post.title }} 
                </div>
                <div class="anketa_content_age">
                    <b> Город: </b> {{ post.User.city }}
                </div>
                <div class="anketa_content_employment"> <b>Занятость:</b> {{ post.employment }} </div>
                <div class="anketa_content_about"> {{ post.title_about }} </div>
                <div class="anketa_content_more">
                    <div class="anketa_content_payment"> <b>Оплата:</b> {{ post.monthpay }} </div>
                    <div class="category_change_btn" @click.prevent="showItem(post)">Подробная анкета</div>
                </div>
            </div>
        </div>        
    </div> 

    <div v-if="totalPages > 1" class="pagination">
        <button class="pagination_btn" @click="prevPage" :disabled="Views.currentCBPage === 1">Назад</button>
        <span>{{ Views.currentCBPage }}</span>
        <button class="pagination_btn" @click="nextPage" :disabled="Views.currentCBPage === totalPages">Вперед</button>
    </div>   
</template>

<script>
import { useViewsStore } from '../../../stores/views';
import { useUserStore } from '../../../stores/user';
import { useDataStore } from '../../../stores/variables';
export default {
    name: 'ClientBabyAll',
    data() {
        return {
            itemsPerPage: 3, // Количество постов на странице
            searchData: {},
        }
    },
    setup() {
        const Views = useViewsStore();
        const User = useUserStore();
        const Store = useDataStore();
        return { Views, User, Store };
    },
    methods: {
        watch() {
            this.Views.WATCH_CLIENTBABY(localStorage.userID);
        },
        search() {
            this.Views.SEARCH_CLIENTBABY(this.searchData);
        },
        clear() {
            this.Views.GET_CLIENTBABY();
        },
        showItem(item) {  
            this.Views.clientBabyitemUser = item.User;
            localStorage.clientBabyitemUser = JSON.stringify(item.User);

            this.Views.clientBabyitem = item;
            localStorage.clientBabyitem = JSON.stringify(item);
            this.$router.push({name: "ClientBabyItem"});
        },
        nextPage() {
            if (this.Views.currentCBPage < this.totalPages) { this.Views.currentCBPage++; }
        },
        prevPage() {
            if (this.Views.currentCBPage > 1) { this.Views.currentCBPage--; }
        },
    },
    computed: {
        displayedPosts() {
            const keys = Object.keys(this.Views.clientBaby);
            const startIndex = (this.Views.currentCBPage - 1) * this.itemsPerPage;
            const endIndex = startIndex + this.itemsPerPage;
            return keys.slice(startIndex, endIndex).map(key => this.Views.clientBaby[key]);
        },
        totalPages() {
            return Math.ceil(this.Views.clientBaby.length / this.itemsPerPage);
        },
    },
    mounted() {
        this.Store.GET_JOBOPTIONS(); this.Store.GET_EMPLOYMENTS(); this.Store.GET_CITYS();
        this.User.GET_TOKEN();
        if(localStorage.wbCheck === 'wbSearch') {}
        //this.Views.GET_CLIENTBABY();
        this.searchData.joboption = 3;
        this.searchData.employment = 1;
        this.searchData.city = 6;
    },
    beforeRouteEnter(to, from, next) { 
        const Views = useViewsStore();       
        if(from.name === 'ClientBabyItem') {            
            const isEmpty = Object.keys(Views.clientBaby).length === 0;
            if (isEmpty) { Views.GET_CLIENTBABY(); }                        
        } else { Views.GET_CLIENTBABY(); }
        next();        
    },
}
</script>