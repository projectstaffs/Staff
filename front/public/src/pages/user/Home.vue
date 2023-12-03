<template>
    <section class="main-top">
        <div class="main-top_container">
            <div class="main-top_inner">
                <div class="main-top_title"> {{ $t('main.top_title') }} </div>
                <div class="main-top_subtitle"> {{ $t('main.top_subtitle') }} </div>
            </div>
        </div>
    </section>


    <div @click.prevent="changeLang" class="category_change_btn">{{ $t('header.swithLang') }}</div>
    <h1>{{ $t('title') }}</h1>

    <div class="category_title">{{ $t('reviews.title') }}</div>
    <div>{{ $t('reviews.text') }}</div>
    <div class="test2">Some hello Український</div>
    <div class="test">Some hello</div>
    <ul>
        <li v-for="post in Review.reviews" :key="post.id" class="category_item">
            {{ post.name[locale] }} {{ post.surname[locale] }} {{ post.city[locale] }} {{ post.content[locale] }}
        </li>

    </ul>

    <div @click.prevent="test" class="category_change_btn">test</div>
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
        },
        test() {
            this.Review.TEST_REVIEW('Some');
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
.main-top {
    height: 100vh;
    background: #5C4538 url(../../assets/img/main/video.jpg) no-repeat center;
    background-size: cover;
    color: #FFF0D2;
}

.main-top_container {
    padding: 0 15px;
    width: 1108px;
    max-width: 100%;
    height: 100%;
    margin: 0 auto;
    padding-top: 120px;
}

.main-top_inner {
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.main-top_title {
    font-family: Playfair Display;
    font-size: 64px;
    font-weight: 700;
    line-height: 120%;
    margin-bottom: 16px;
}

.main-top_subtitle {
    font-size: 40px;
    line-height: 130%;
}



.test {
    font-family: Playfair Display;
    font-weight: 500;
}

.test2 {
    font-family: Roboto;
    font-weight: 500;
}
</style>
