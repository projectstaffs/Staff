<template>
    <div class="search_block">
        <form class="search" @submit.prevent="search">
            <select v-model="searchData.typeofwork">
                <option v-for="option in Store.nursetypeofworks" :value="option.id">
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
            <div v-if="post.User.image" class="anketa_img"> <img :src="post.User.image" alt="photo"> </div>
            <div class="anketa_content">
                <div class="anketa_content_name" @click.prevent="showItem(post)">
                    {{ post.User.name }} {{ post.User.patronymic }} {{ post.User.surname }}
                </div>
                <div class="anketa_content_age">
                    Возраст(лет): {{ post.User.current_age }} &nbsp;&nbsp;•&nbsp;&nbsp; Опыт работы: {{ post.experience }} &nbsp;&nbsp;•&nbsp;&nbsp; {{ post.User.city }}
                </div>
                <div class="anketa_content_typeworks">
                    <div v-for="work in post.Typeworks" :key="work.id" class="anketa_content_typeworks_item"> {{ work.title }},&nbsp; </div>                    
                </div>
                <div class="anketa_content_employment"> <b>Занятость:</b> {{ post.employment }} </div>
                <div class="anketa_content_about"> {{ post.nurse_exp }} </div>
                <div class="anketa_content_payment"> <b>Оплата:</b> {{ post.monthpay }} </div>
                <div class="anketa_content_more">
                    <div class="anketa_content_phone"> <b>Телефон:</b> {{ post.User.phone_number }} </div>
                    <div class="category_change_btn" @click.prevent="showItem(post)">Подробная анкета</div>
                </div>
            </div>
        </div>        
    </div> 
    <div v-if="totalPages > 1" class="pagination">
        <button class="pagination_btn" @click="prevPage" :disabled="Views.currentWNPage === 1">Назад</button>
        <span>{{ Views.currentWNPage }}</span>
        <button class="pagination_btn" @click="nextPage" :disabled="Views.currentWNPage === totalPages">Вперед</button>
    </div>   
</template>

<script>
import { useViewsStore } from '../../../stores/views';
import { useUserStore } from '../../../stores/user';
import { useDataStore } from '../../../stores/variables';
export default {
    name: 'NurseAll',
    data() {
        return {
            searchData: {},
            itemsPerPage: 3, // Количество постов на странице
        }
    },
    setup() {
        const Views = useViewsStore();
        const User = useUserStore();
        const Store = useDataStore();
        return { Views, User, Store };
    },
    methods: {
        search() {            
            this.Views.SEARCH_WORKERNURSE(this.searchData);
        },
        clear() {
            this.Views.GET_WORKERNURSE();
        },
        showItem(item) { 
            this.Views.workerNurseitemUser = item.User;
            localStorage.workerNurseitemUser = JSON.stringify(item.User);           
            
            this.Views.workerNurseitem = item;
            localStorage.workerNurseitem = JSON.stringify(item);
            this.$router.push({name: "NurseItem"});
        },        
        nextPage() {
            if (this.Views.currentWNPage < this.totalPages) { this.Views.currentWNPage++; }
        },
        prevPage() {
            if (this.Views.currentWNPage > 1) { this.Views.currentWNPage--; }
        },
    },
    computed: {
        displayedPosts() {
            const keys = Object.keys(this.Views.workerNurse);
            const startIndex = (this.Views.currentWNPage - 1) * this.itemsPerPage;
            const endIndex = startIndex + this.itemsPerPage;
            return keys.slice(startIndex, endIndex).map(key => this.Views.workerNurse[key]);
        },
        totalPages() {
            return Math.ceil(this.Views.workerNurse.length / this.itemsPerPage);
        },
    },
    mounted() {
        this.Store.GET_NURSETYPEOFWORKS(); this.Store.GET_EMPLOYMENTS(); this.Store.GET_CITYS();
        this.User.GET_TOKEN();
        this.Views.GET_WORKERNURSE();
        this.searchData.typeofwork = 4;
        this.searchData.employment = 1;
        this.searchData.city = 6;
    },
}
</script>