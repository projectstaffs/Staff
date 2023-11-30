<template>
    <div @click.prevent="changeLang" class="category_change_btn">{{ $t('swithLang') }}</div>
    <h1>{{ $t('title') }}</h1>

    <div class="category_title">{{ $t('reviews.title') }}</div>
    <div>{{ $t('reviews.text') }}</div>
    <div class="test2">Some hello Український</div>
    <div class="test">Some hello</div>
    <ul>
        <li v-for="post in Review.reviews" :key="post.id" class="category_item">
            {{ post.name }} {{ post.surname }} {{ post.city }} {{ post.content }}
        </li>

    </ul>
</template>

<script>
import { useI18n } from 'vue-i18n';
import { useUserStore } from '../../stores/user';
import { useReviewStore } from '../../stores/review';
import { useViewsStore } from '../../stores/views';
import { useDataStore } from '../../stores/variables';
export default {
    name: "Home",
    setup() {
        const { t, locale } = useI18n({ useScope: 'global' });
        const User = useUserStore();
        const Review = useReviewStore();
        const Views = useViewsStore();
        const Store = useDataStore();
        return { t, locale, User, Review, Views, Store };
    },
    methods: {
        changeLang() {
            this.locale === 'ua' ? this.locale = 'en' : this.locale = 'ua'
            localStorage.lang = this.locale;
        }
    },
    mounted() {
        this.User.GET_TOKEN();
        this.Review.GET_REVIEWS();
        //this.Views.GET_WORKERBABY();
        //this.Views.GET_WORKERNURSE();
        //this.Views.GET_WORKERKEEPER();
        //this.Views.GET_CLIENTBABY();
        //this.Views.GET_CLIENTNURSE();
        //this.Views.GET_CLIENTKEEPER();
        //this.Store.GET_JOBOPTIONS(); this.Store.GET_TYPEOFWORKS(); this.Store.GET_NURSETYPEOFWORKS(); this.Store.GET_HOUSEKEEPERTYPEOFWORKS();
        //this.Store.GET_EMPLOYMENTS(); this.Store.GET_CITYS();
    },
}
</script>

<style>
.test {
    font-family: Playfair Display;
    font-weight: 500;
}

.test2 {
    font-family: Roboto;
    font-weight: 500;
}
</style>
