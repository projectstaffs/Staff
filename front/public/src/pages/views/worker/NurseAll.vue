<template>
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
        <button class="pagination_btn" @click="prevPage" :disabled="currentPage === 1">Назад</button>
        <span>{{ currentPage }}</span>
        <button class="pagination_btn" @click="nextPage" :disabled="currentPage === totalPages">Вперед</button>
    </div>   
</template>

<script>
import { useViewsStore } from '../../../stores/views';
import { useUserStore } from '../../../stores/user';
export default {
    name: 'NurseAll',
    data() {
        return {
            itemsPerPage: 3, // Количество постов на странице
            currentPage: 1, // Текущая страница
        }
    },
    setup() {
        const Views = useViewsStore();
        const User = useUserStore();
        return { Views, User };
    },
    methods: {
        showItem(item) { 
            this.Views.workerNurseitemUser = item.User;
            localStorage.workerNurseitemUser = JSON.stringify(item.User);           
            
            this.Views.workerNurseitem = item;
            localStorage.workerNurseitem = JSON.stringify(item);
            this.$router.push({name: "NurseItem"});
        },        
        nextPage() {
            if (this.currentPage < this.totalPages) { this.currentPage++; }
        },
        prevPage() {
            if (this.currentPage > 1) { this.currentPage--; }
        },
    },
    computed: {
        displayedPosts() {
            const keys = Object.keys(this.Views.workerNurse);
            const startIndex = (this.currentPage - 1) * this.itemsPerPage;
            const endIndex = startIndex + this.itemsPerPage;
            return keys.slice(startIndex, endIndex).map(key => this.Views.workerNurse[key]);
        },
        totalPages() {
            return Math.ceil(this.Views.workerNurse.length / this.itemsPerPage);
        },
    },
    mounted() {
        this.User.GET_TOKEN();
        this.Views.GET_WORKERNURSE();
    },
}
</script>