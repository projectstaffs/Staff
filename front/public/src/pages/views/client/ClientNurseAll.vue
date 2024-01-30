<template>
    <div class="block">
        <div class="block_back"></div>
        <div class="block_content">
            <div class="container">
                <Links :data="link" />
                <div class="search_block">
                    <div class="search_block_btns">
                        <button @click.prevent="watch" class="btn btn_search">{{ $t('search.item1') }}</button>
                        <button @click.prevent="clear" class="btn btn_search">{{ $t('search.item3') }}</button>
                    </div>
                    <form class="search" @submit.prevent="search">
                        <Search :data="searchData" :typework="Store.nurseduties" :city="Store.citys" />
                        <button type="submit" class="btn btn_search">{{ $t('search.item2') }}</button>
                    </form>
                </div>

                <div v-for="post in displayedPosts" :key="post.id">
                    <div class="view">
                        <div class="view_content">
                            <div class="view_inner">
                                <div class="edit_title">
                                    {{ post.User.name[locale] }} {{ post.User.surname[locale] }}
                                </div>
                                <div class="view_date">
                                    <img src="../../../assets/img/view/clock-time.svg" alt="">{{ post.date }}
                                </div>
                                <div class="anketa_text">
                                    {{ post.monthpay.title[locale] }} &nbsp;&nbsp;•&nbsp;&nbsp;
                                    {{ post.User.city_title.title[locale] }}
                                </div>
                                <div class="anketa_text"> {{ post.title_about[locale] }} </div>
                            </div>
                            <div class="btn" @click.prevent="showItem(post)">
                                <svg class="view_arrow" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path class="view_svg"
                                        d="M13.2696 3.6689C13.5696 3.36894 13.9765 3.20044 14.4008 3.20044C14.825 3.20044 15.2319 3.36894 15.532 3.6689L22.732 10.8689C23.0319 11.1689 23.2004 11.5758 23.2004 12.0001C23.2004 12.4244 23.0319 12.8313 22.732 13.1313L15.532 20.3313C15.2302 20.6228 14.8261 20.784 14.4065 20.7804C13.987 20.7767 13.5857 20.6085 13.2891 20.3118C12.9924 20.0152 12.8241 19.6139 12.8205 19.1943C12.8169 18.7748 12.9781 18.3707 13.2696 18.0689L17.6008 13.6001H2.40078C1.97643 13.6001 1.56947 13.4315 1.26941 13.1315C0.969352 12.8314 0.800781 12.4244 0.800781 12.0001C0.800781 11.5758 0.969352 11.1688 1.26941 10.8687C1.56947 10.5687 1.97643 10.4001 2.40078 10.4001H17.6008L13.2696 5.9313C12.9696 5.63125 12.8011 5.22436 12.8011 4.8001C12.8011 4.37584 12.9696 3.96894 13.2696 3.6689Z"
                                        fill="#1E1510" />
                                </svg>{{ $t('c_keeper.btn_details') }}
                            </div>
                        </div>
                        <div class="cabinet_box">
                            <img v-if="post.User.image" class="cabinet_img" :src="post.User.image" alt="">
                            <div v-else class="cabinet_noimg">{{ $t('cabinet.no_img') }}</div>
                        </div>
                    </div>
                </div>

                <Pagination :totalPages="totalPages" :namePage="pageValue" />
            </div>
        </div>
    </div>
</template>

<script>
import { useI18n } from 'vue-i18n';
import { useViewsStore } from '../../../stores/views';
import { useUserStore } from '../../../stores/user';
import { useDataStore } from '../../../stores/variables';
import Search from '../../layouts/Search.vue';
import Pagination from '../../layouts/Pagination.vue';
import Links from '../../layouts/Link.vue';
export default {
    name: 'ClientNurseAll',
    data() {
        return {
            itemsPerPage: 5, // Количество постов на странице
            searchData: {},
            pageValue: "currentCNPage",
            link: 'item2'
        }
    },
    components: { Search, Pagination, Links },
    setup() {
        const Views = useViewsStore();
        const User = useUserStore();
        const Store = useDataStore();
        const { t, locale } = useI18n({ useScope: 'global' });
        return { Views, User, Store, t, locale };
    },
    methods: {
        watch() { this.Views.WATCH_CLIENTNURSE(localStorage.userID); },
        search() { this.Views.SEARCH_CLIENTNURSE(this.searchData); },
        clear() { this.Views.GET_CLIENTNURSE(); },
        showItem(item) {
            this.Views.clientNurseitemUser = item.User;
            localStorage.clientNurseitemUser = JSON.stringify(item.User);

            this.Views.clientNurseitem = item;
            localStorage.clientNurseitem = JSON.stringify(item);
            this.$router.push({ name: "ClientNurseItem" });
        },
    },
    computed: {
        displayedPosts() {
            const keys = Object.keys(this.Views.clientNurse);
            const startIndex = (this.Views.currentCNPage - 1) * this.itemsPerPage;
            const endIndex = startIndex + this.itemsPerPage;
            return keys.slice(startIndex, endIndex).map(key => this.Views.clientNurse[key]);
        },
        totalPages() {
            return Math.ceil(this.Views.clientNurse.length / this.itemsPerPage);
        },
    },
    mounted() {
        this.Store.GET_NURSEDUTIES(); this.Store.GET_CITYS();

        this.searchData.typeofwork = 2;
        this.searchData.city = 6;
    },
    beforeRouteEnter(to, from, next) {
        const Views = useViewsStore();
        if (from.name === 'ClientNurseItem') {
            const isEmpty = Object.keys(Views.clientNurse).length === 0;
            if (isEmpty) { Views.GET_CLIENTNURSE(); }
        } else { Views.GET_CLIENTNURSE(); }
        next();
    },
}
</script>