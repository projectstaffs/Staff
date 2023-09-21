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
        <button class="pagination_btn" @click="prevPage" :disabled="Views.currentCKPage === 1">Назад</button>
        <span>{{ Views.currentCKPage }}</span>
        <button class="pagination_btn" @click="nextPage" :disabled="Views.currentCKPage === totalPages">Вперед</button>
    </div>
</template>

<script>
import { useViewsStore } from '../../../stores/views';
import { useUserStore } from '../../../stores/user';
import { useDataStore } from '../../../stores/variables';
export default {
    name: 'ClientKeeperAll',
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
            this.Views.WATCH_CLIENTKEEPER(localStorage.userID);
        },
        search() {
            this.Views.SEARCH_CLIENTKEEPER(this.searchData);
        },
        clear() {
            this.Views.GET_CLIENTKEEPER();
        },
        showItem(item) {  
            this.Views.clientKeeperitemUser = item.User;
            localStorage.clientKeeperitemUser = JSON.stringify(item.User);

            this.Views.clientKeeperitem = item;
            localStorage.clientKeeperitem = JSON.stringify(item);
            this.$router.push({name: "ClientKeeperItem"});
        },
        nextPage() {
            if (this.Views.currentCKPage < this.totalPages) { this.Views.currentCKPage++; }
        },
        prevPage() {
            if (this.Views.currentCKPage > 1) { this.Views.currentCKPage--; }
        },
    },
    computed: {
        displayedPosts() {
            const keys = Object.keys(this.Views.clientKeeper);
            const startIndex = (this.Views.currentCKPage - 1) * this.itemsPerPage;
            const endIndex = startIndex + this.itemsPerPage;
            return keys.slice(startIndex, endIndex).map(key => this.Views.clientKeeper[key]);
        },
        totalPages() {
            return Math.ceil(this.Views.clientKeeper.length / this.itemsPerPage);
        },
    },
    mounted() {
        this.Store.GET_JOBOPTIONS(); this.Store.GET_EMPLOYMENTS(); this.Store.GET_CITYS();
        this.User.GET_TOKEN();
        //this.Views.GET_CLIENTKEEPER();
        this.searchData.joboption = 3;
        this.searchData.employment = 1;
        this.searchData.city = 6;
    },
    beforeRouteEnter(to, from, next) { 
        const Views = useViewsStore();       
        if(from.name === 'ClientKeeperItem') {            
            const isEmpty = Object.keys(Views.clientKeeper).length === 0;
            if (isEmpty) { Views.GET_CLIENTKEEPER(); }                        
        } else { Views.GET_CLIENTKEEPER(); }
        next();        
    },
}
</script>