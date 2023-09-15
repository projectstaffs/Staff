<template>
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
        <button class="pagination_btn" @click="prevPage" :disabled="currentPage === 1">Назад</button>
        <span>{{ currentPage }}</span>
        <button class="pagination_btn" @click="nextPage" :disabled="currentPage === totalPages">Вперед</button>
    </div>   
</template>

<script>
import { useViewsStore } from '../../../stores/views';
import { useUserStore } from '../../../stores/user';
export default {
    name: 'ClientBabyAll',
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
            this.Views.clientBabyitemUser = item.User;
            localStorage.clientBabyitemUser = JSON.stringify(item.User);

            this.Views.clientBabyitem = item;
            localStorage.clientBabyitem = JSON.stringify(item);
            this.$router.push({name: "ClientBabyItem"});
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
            const keys = Object.keys(this.Views.clientBaby);
            const startIndex = (this.currentPage - 1) * this.itemsPerPage;
            const endIndex = startIndex + this.itemsPerPage;
            return keys.slice(startIndex, endIndex).map(key => this.Views.clientBaby[key]);
        },
        totalPages() {
            return Math.ceil(this.Views.clientBaby.length / this.itemsPerPage);
        },
    },
    mounted() {
        this.User.GET_TOKEN();
        this.Views.GET_CLIENTBABY();
    },
}
</script>