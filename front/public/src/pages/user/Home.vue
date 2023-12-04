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
                <div class="main_info_client">
                    <div class="main_client_title"> {{ $t('main.client_title') }} </div>
                    <div class="main_client_subtitle"> {{ $t('main.client_subtitle') }} </div>
                    <ul class="main_client_items">
                        <li class="main_client_item"> {{ $t('main.client_item1') }} </li>
                        <li class="main_client_item"> {{ $t('main.client_item2') }} </li>
                        <li class="main_client_item"> {{ $t('main.client_item3') }} </li>
                        <li class="main_client_item"> {{ $t('main.client_item4') }} </li>
                    </ul>
                    <div class="btn"> {{ $t('main.client_btn') }} <img class="main_info_arrow"
                            src="../../assets/img/main/arrow.svg" alt=""></div>
                </div>
                <div class="main_info_worker">
                    <div class="main_worker_title"> {{ $t('main.worker_title') }} </div>
                    <div class="main_worker_subtitle"> {{ $t('main.worker_subtitle') }} </div>
                    <ul class="main_worker_items">
                        <li class="main_worker_item"> {{ $t('main.worker_item1') }} </li>
                        <li class="main_worker_item"> {{ $t('main.worker_item2') }} </li>
                        <li class="main_worker_item"> {{ $t('main.worker_item3') }} </li>
                        <li class="main_worker_item"> {{ $t('main.worker_item4') }} </li>
                    </ul>
                    <div class="btn"> {{ $t('main.worker_btn') }}
                        <svg class="main_info_svg" width="25" height="24" viewBox="0 0 25 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path class="main_info_svg_inner"
                                d="M13.7688 3.66881C14.0689 3.36885 14.4758 3.20035 14.9 3.20035C15.3243 3.20035 15.7312 3.36885 16.0312 3.66881L23.2312 10.8688C23.5312 11.1689 23.6997 11.5757 23.6997 12C23.6997 12.4243 23.5312 12.8312 23.2312 13.1312L16.0312 20.3312C15.7295 20.6227 15.3253 20.7839 14.9058 20.7803C14.4863 20.7766 14.085 20.6084 13.7883 20.3117C13.4917 20.0151 13.3234 19.6138 13.3198 19.1942C13.3161 18.7747 13.4774 18.3706 13.7688 18.0688L18.1 13.6H2.90005C2.4757 13.6 2.06874 13.4314 1.76868 13.1314C1.46862 12.8313 1.30005 12.4244 1.30005 12C1.30005 11.5757 1.46862 11.1687 1.76868 10.8686C2.06874 10.5686 2.4757 10.4 2.90005 10.4H18.1L13.7688 5.93121C13.4689 5.63116 13.3004 5.22427 13.3004 4.80001C13.3004 4.37574 13.4689 3.96885 13.7688 3.66881Z"
                                fill="#FFF0D2" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="main_info_bottom"></div>
    </section>

    <section class="main_homestaff">
        <div class="main_homestaff_title"></div>
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

/* main_info */
.main_info_top {
    height: 280px;
    background: #FFF0D2;
}

.main_info_text {
    padding-top: 40px;
    width: 638px;
    color: #1C1C1C;
    font-size: 24px;
    margin-bottom: 47px;
}

.main_info_bottom {
    height: 454px;
    background: #1E1510;
}

.main_info_client {
    position: absolute;

    width: 550px;
    height: 454px;
    padding: 64px;
    background: #FFF0D2;
    border-radius: 10px;
    border: 1px solid var(--default-default-50, #8E8E8E);
    color: #1E1510;
}

.main_info_worker {
    margin: -130px 0px 0px 600px;
    position: relative;
    width: 520px;
    height: 490px;
    padding: 64px;
    background: #5C4538;
    border-radius: 10px;
    color: #FFF0D2;
}

.main_client_title,
.main_worker_title {
    margin-bottom: 16px;
    font-size: 32px;
    font-weight: 500;
    line-height: 120%;
}

.main_client_subtitle,
.main_worker_subtitle {
    margin-bottom: 24px;
    font-size: 24px;
    font-weight: 300;
}

.main_client_items,
.main_worker_items {
    margin-bottom: 24px;
}

.main_client_item,
.main_worker_item {
    font-size: 16px;
}

.main_info_client .btn,
.main_info_worker .btn {
    width: 280px;
    padding: 16px 24px;
    margin: 0 auto;
    color: #FFF0D2;
    font-size: 18px;
}

.main_info_client .btn:hover {
    color: #FFF0D2;
    background: #5C4538;
}

.main_info_worker .btn:hover {
    color: #1E1510;
    background: rgba(255, 240, 210, 0.50);
}

.main_info_arrow,
.main_info_svg {
    margin-left: 10px;
}

.main_info_svg_inner {
    transition: fill 0.3s;
}

.main_info_worker .btn:hover .main_info_svg_inner {
    fill: #1E1510;
}

/* main_homestaff */
.main_homestaff {
    height: 860px;
    background: #FFF0D2;
    padding-top: 80px;
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
