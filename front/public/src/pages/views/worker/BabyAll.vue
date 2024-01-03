<template>
    <div class="block">
        <div class="block_back"></div>
        <div class="block_content">
            <div class="container">
                <div class="search_block">
                    <button @click.prevent="watch" class="login_form_btn">Просмотренные</button>
                    <form class="search" @submit.prevent="search">
                        <select v-model="searchData.typeofwork">
                            <option v-for="option in Store.typeofworks" :value="option.id">
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
                                {{ post.User.name }} {{ post.User.surname }}
                            </div>
                            <div class="anketa_content_age">
                                Возраст(лет): {{ post.User.current_age }} &nbsp;&nbsp;•&nbsp;&nbsp; Опыт работы: {{
                                    post.experience }}
                                &nbsp;&nbsp;•&nbsp;&nbsp; {{ post.User.city }}
                            </div>
                            <div class="anketa_content_typeworks">
                                <div v-for="work in post.Typeworks" :key="work.id" class="anketa_content_typeworks_item"> {{
                                    work.title
                                }},&nbsp; </div>
                            </div>
                            <div class="anketa_content_about"> {{ post.baby_exp }} </div>
                            <div class="anketa_content_payment"> <b>Оплата:</b> {{ post.monthpay }} </div>
                            <div class="anketa_content_more">
                                <div class="anketa_content_phone"> <b>Телефон:</b> {{ post.User.phone_number }} </div>
                                <div class="category_change_btn" @click.prevent="showItem(post)">Подробная анкета</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div v-if="totalPages > 1" class="pagination">
                    <button class="pagination_btn" @click="prevPage" :disabled="Views.currentWBPage === 1">Назад</button>
                    <span>{{ Views.currentWBPage }}</span>
                    <button class="pagination_btn" @click="nextPage"
                        :disabled="Views.currentWBPage === totalPages">Вперед</button>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
import { useViewsStore } from '../../../stores/views';
import { useUserStore } from '../../../stores/user';
import { useDataStore } from '../../../stores/variables';
export default {
    name: 'BabyAll',
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
        watch() {
            this.Views.WATCH_WORKERBABY(localStorage.userID);
        },
        search() {
            this.Views.SEARCH_WORKERBABY(this.searchData);
        },
        clear() {
            this.Views.GET_WORKERBABY();
        },
        showItem(item) {
            this.Views.workerBabyitemUser = item.User;
            localStorage.workerBabyitemUser = JSON.stringify(item.User);
            //delete item.User;
            this.Views.workerBabyitem = item;
            localStorage.workerBabyitem = JSON.stringify(item);
            this.$router.push({ name: "BabyItem" });
        },
        nextPage() {
            if (this.Views.currentWBPage < this.totalPages) { this.Views.currentWBPage++; }
        },
        prevPage() {
            if (this.Views.currentWBPage > 1) { this.Views.currentWBPage--; }
        },
    },
    computed: {
        displayedPosts() {
            const keys = Object.keys(this.Views.workerBaby);
            const startIndex = (this.Views.currentWBPage - 1) * this.itemsPerPage;
            const endIndex = startIndex + this.itemsPerPage;
            return keys.slice(startIndex, endIndex).map(key => this.Views.workerBaby[key]);
        },
        totalPages() {
            return Math.ceil(this.Views.workerBaby.length / this.itemsPerPage);
        },
    },
    mounted() {
        this.Store.GET_TYPEOFWORKS(); this.Store.GET_CITYS();
        //this.Views.GET_WORKERBABY();        
        this.searchData.typeofwork = 7;
        this.searchData.city = 4;
    },
    beforeRouteEnter(to, from, next) {
        const Views = useViewsStore();
        if (from.name === 'BabyItem') {
            const isEmpty = Object.keys(Views.workerBaby).length === 0;
            if (isEmpty) { Views.GET_WORKERBABY(); }
        } else { Views.GET_WORKERBABY(); }
        next();
    },
}
</script>