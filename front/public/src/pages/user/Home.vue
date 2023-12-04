<template>
    <section class="main_top">
        <div class="container">
            <div class="main_top_inner">
                <div class="main_top_title"> {{ $t('main.top_title') }} </div>
                <div class="main_top_subtitle"> {{ $t('main.top_subtitle') }} </div>
            </div>
        </div>
    </section>

    <section class="main_info">
        <div class="main_info_top">
            <div class="container">
                <div class="main_info_text"> {{ $t('main.top_text') }} </div>
            </div>
        </div>
        <div class="main_info_bottom"></div>
        <div class="main_info_client"></div>
        <div class="main_info_worker"></div>
    </section>

    <!--
    <ul>
        <li v-for="post in Review.reviews" :key="post.id" class="category_item">
            {{ post.name[locale] }} {{ post.surname[locale] }} {{ post.city[locale] }} {{ post.content[locale] }}
        </li>

    </ul>
    <div @click.prevent="test" class="category_change_btn">test</div>
    -->
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
.main_top {
    min-height: 400px;
    height: 100vh;
    background: #5C4538 url(../../assets/img/main/video.jpg) no-repeat center;
    background-size: cover;
    color: #FFF0D2;
}

.main_top_inner {
    padding-top: 120px;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.main_top_title {
    font-family: Playfair Display;
    font-size: 64px;
    font-weight: 700;
    line-height: 120%;
    margin-bottom: 16px;
}

.main_top_subtitle {
    font-size: 40px;
    line-height: 130%;
}

.main_info_top {
    height: 340px;
    background: #FFF0D2;
}

.main_info_bottom {
    height: 454px;
    background: #1E1510;
}

@media (max-width: 992px) {
    .main_top_title {
        font-size: 52px;
    }

    .main_top_subtitle {
        font-size: 32px;
    }
}

@media (max-width: 576px) {
    .main_top_inner {
        padding: 60px 0px;
    }

    .main_top_title {
        font-size: 30px;
    }

    .main_top_subtitle {
        font-size: 16px;
    }
}
</style>
