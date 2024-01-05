<template>
    <div class="block">
        <div class="block_back"></div>
        <div class="block_content">
            <div class="container">
                <div class="search_block">
                    <button @click.prevent="watch" class="btn">{{ $t('search.item1') }}</button>
                    <form class="search" @submit.prevent="search">
                        <select v-model="searchData.typeofwork" class="login_form_item auth_arrow">
                            <option v-for="option in Store.typeofworks" :value="option.id">
                                {{ option.title[locale] }}
                            </option>
                        </select>
                        <select v-model="searchData.city" class="login_form_item auth_arrow">
                            <option v-for="option in Store.citys" :value="option.id">
                                {{ option.title[locale] }}
                            </option>
                        </select>
                        <button type="submit" class="btn">{{ $t('search.item2') }}</button>
                    </form>
                    <button @click.prevent="clear" class="btn">{{ $t('search.item3') }}</button>
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
                                    {{ post.User.country_title.title[locale] }} &nbsp;&nbsp;•&nbsp;&nbsp;
                                    {{ post.User.city_title.title[locale] }}
                                </div>
                                <span v-for="(item, index) in post.Typeworks" :key="index" class="anketa_text">
                                    {{ item.title.title[locale] }}{{ index < post.Typeworks.length - 1 ? ', ' : '' }}
                                        </span>
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

                <div v-if="totalPages > 1" class="pagination">
                    <button class="btn pagination_prew" @click="prevPage" :disabled="Views.currentWBPage === 1">
                        <svg class="view_arrow" xmlns="http://www.w3.org/2000/svg" width="24" height="18"
                            viewBox="0 0 24 18" fill="none" transform="scale(-1, 1)">
                            <path class="view_svg"
                                d="M13.2688 0.668776C13.5689 0.368822 13.9758 0.200317 14.4 0.200317C14.8243 0.200317 15.2312 0.368822 15.5312 0.668776L22.7312 7.86878C23.0312 8.16882 23.1997 8.57571 23.1997 8.99998C23.1997 9.42424 23.0312 9.83113 22.7312 10.1312L15.5312 17.3312C15.2295 17.6226 14.8253 17.7839 14.4058 17.7803C13.9863 17.7766 13.585 17.6083 13.2883 17.3117C12.9917 17.015 12.8234 16.6137 12.8198 16.1942C12.8161 15.7747 12.9774 15.3705 13.2688 15.0688L17.6 10.6H2.40005C1.9757 10.6 1.56874 10.4314 1.26868 10.1313C0.96862 9.83129 0.800049 9.42432 0.800049 8.99998C0.800049 8.57563 0.96862 8.16866 1.26868 7.86861C1.56874 7.56855 1.9757 7.39998 2.40005 7.39998H17.6L13.2688 2.93118C12.9689 2.63113 12.8004 2.22424 12.8004 1.79998C12.8004 1.37571 12.9689 0.96882 13.2688 0.668776Z"
                                fill="black" />
                        </svg>{{ $t('c_keeper.btn_prew') }}
                    </button>
                    <button class="btn pagination_next" @click="nextPage" :disabled="Views.currentWBPage === totalPages">
                        <svg class="view_arrow" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path class="view_svg"
                                d="M13.2696 3.6689C13.5696 3.36894 13.9765 3.20044 14.4008 3.20044C14.825 3.20044 15.2319 3.36894 15.532 3.6689L22.732 10.8689C23.0319 11.1689 23.2004 11.5758 23.2004 12.0001C23.2004 12.4244 23.0319 12.8313 22.732 13.1313L15.532 20.3313C15.2302 20.6228 14.8261 20.784 14.4065 20.7804C13.987 20.7767 13.5857 20.6085 13.2891 20.3118C12.9924 20.0152 12.8241 19.6139 12.8205 19.1943C12.8169 18.7748 12.9781 18.3707 13.2696 18.0689L17.6008 13.6001H2.40078C1.97643 13.6001 1.56947 13.4315 1.26941 13.1315C0.969352 12.8314 0.800781 12.4244 0.800781 12.0001C0.800781 11.5758 0.969352 11.1688 1.26941 10.8687C1.56947 10.5687 1.97643 10.4001 2.40078 10.4001H17.6008L13.2696 5.9313C12.9696 5.63125 12.8011 5.22436 12.8011 4.8001C12.8011 4.37584 12.9696 3.96894 13.2696 3.6689Z"
                                fill="#1E1510" />
                        </svg>{{ $t('c_keeper.btn_next') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { useI18n } from 'vue-i18n';
import { useViewsStore } from '../../../stores/views';
import { useUserStore } from '../../../stores/user';
import { useDataStore } from '../../../stores/variables';
export default {
    name: 'BabyAll',
    data() {
        return {
            searchData: {},
            itemsPerPage: 2, // Количество постов на странице
        }
    },
    setup() {
        const Views = useViewsStore();
        const User = useUserStore();
        const Store = useDataStore();
        const { t, locale } = useI18n({ useScope: 'global' });
        return { Views, User, Store, t, locale };
    },
    methods: {
        watch() {
            this.Views.WATCH_WORKERBABY(localStorage.userID);
        },
        search() {
            this.Views.SEARCH_WORKERBABY(this.searchData);
            //console.log(this.searchData);
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