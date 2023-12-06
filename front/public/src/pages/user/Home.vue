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
        <div class="container">
            <div class="staff_title"> {{ $t('main.staff_title') }} </div>
            <div class="main_homestaff_items">
                <div class="staff_item">
                    <img class="staff_img" src="../../assets/img/main/category/home/item1.jpg" alt="">
                    <div class="staff_text"> {{ $t('main.staff_item1') }} </div>
                </div>
                <div class="staff_item">
                    <img class="staff_img" src="../../assets/img/main/category/home/item2.jpg" alt="">
                    <div class="staff_text"> {{ $t('main.staff_item2') }} </div>
                </div>
                <div class="staff_item">
                    <img class="staff_img" src="../../assets/img/main/category/home/item3.jpg" alt="">
                    <div class="staff_text"> {{ $t('main.staff_item3') }} </div>
                </div>
                <div class="staff_item">
                    <img class="staff_img" src="../../assets/img/main/category/home/item4.jpg" alt="">
                    <div class="staff_text"> {{ $t('main.staff_item4') }} </div>
                </div>
                <div class="staff_item">
                    <img class="staff_img" src="../../assets/img/main/category/home/item5.jpg" alt="">
                    <div class="staff_text"> {{ $t('main.staff_item5') }} </div>
                </div>
                <div class="staff_item">
                    <img class="staff_img" src="../../assets/img/main/category/home/item6.jpg" alt="">
                    <div class="staff_text"> {{ $t('main.staff_item6') }} </div>
                </div>
                <div class="staff_item">
                    <img class="staff_img" src="../../assets/img/main/category/home/item7.jpg" alt="">
                    <div class="staff_text"> {{ $t('main.staff_item7') }} </div>
                </div>
                <div class="staff_item">
                    <img class="staff_img" src="../../assets/img/main/category/home/item8.jpg" alt="">
                    <div class="staff_text"> {{ $t('main.staff_item8') }} </div>
                </div>
            </div>
            <div class="btn"> {{ $t('main.staff_btn') }} <img class="main_info_arrow" src="../../assets/img/main/arrow.svg"
                    alt=""></div>
        </div>
        <div class="main_homestaff_back"></div>
    </section>

    <section class="main_business_staff">
        <div class="container">
            <div class="staff_title"> {{ $t('main.business_title') }} </div>
            <div class="main_homestaff_items">
                <div class="staff_item">
                    <img class="staff_img" src="../../assets/img/main/category/business/item1.jpg" alt="">
                    <div class="staff_text"> {{ $t('main.business_item1') }} </div>
                </div>
                <div class="staff_item">
                    <img class="staff_img" src="../../assets/img/main/category/business/item2.jpg" alt="">
                    <div class="staff_text"> {{ $t('main.business_item2') }} </div>
                </div>
                <div class="staff_item">
                    <img class="staff_img" src="../../assets/img/main/category/business/item3.jpg" alt="">
                    <div class="staff_text"> {{ $t('main.business_item3') }} </div>
                </div>
                <div class="staff_item">
                    <img class="staff_img" src="../../assets/img/main/category/business/item4.jpg" alt="">
                    <div class="staff_text"> {{ $t('main.business_item4') }} </div>
                </div>
            </div>
            <div class="btn"> {{ $t('main.staff_btn') }} <img class="main_info_arrow" src="../../assets/img/main/arrow.svg"
                    alt=""></div>
        </div>
        <div class="main_business_staff_back"></div>
    </section>

    <section class="main_about">
        <div class="container">
            <div class="staff_title"> {{ $t('main.bottom_title') }} </div>
            <div class="main_about_content">
                <div class="main_about_text"> {{ $t('main.bottom_text') }} </div>
                <ul class="main_about_items">
                    <li class="main_about_item"> {{ $t('main.bottom_item1') }} </li>
                    <li class="main_about_item"> {{ $t('main.bottom_item2') }} </li>
                    <li class="main_about_item"> {{ $t('main.bottom_item3') }} </li>
                    <li class="main_about_item"> {{ $t('main.bottom_item4') }} </li>
                    <li class="main_about_item"> {{ $t('main.bottom_item5') }} </li>
                </ul>
            </div>
            <div class="main_about_end"> {{ $t('main.bottom_about') }} </div>
        </div>
    </section>

    <section class="main_point">
        <div class="container">
            <div class="staff_title"> {{ $t('main.end_title') }} </div>
        </div>
        <div class="main_point_items">
            <div class="container">
                <div class="main_point_inner">
                    <div class="main_point_item">
                        <img src="../../assets/img/main/icons/users.svg" alt="" class="main_point_logo">
                        <div class="main_point_text"> {{ $t('main.end_item1') }} </div>
                    </div>
                    <div class="main_point_item">
                        <img src="../../assets/img/main/icons/organization.svg" alt="" class="main_point_logo">
                        <div class="main_point_text"> {{ $t('main.end_item2') }} </div>
                    </div>
                    <div class="main_point_item">
                        <img src="../../assets/img/main/icons/phonebook-contacts.svg" alt="" class="main_point_logo">
                        <div class="main_point_text"> {{ $t('main.end_item3') }} </div>
                    </div>
                    <div class="main_point_item">
                        <img src="../../assets/img/main/icons/user-check.svg" alt="" class="main_point_logo">
                        <div class="main_point_text"> {{ $t('main.end_item4') }} </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="main_point_business">
                <div class="main_point_business_start">
                    <div class="main_point_business_img"></div>
                </div>
                <div class="main_point_business_end">
                    <div class="main_point_business_title"> {{ $t('main.end_business_title') }} </div>
                    <div class="main_point_business_subtitle"> {{ $t('main.end_business_subtitle') }} </div>
                    <div class="main_point_business_text"> {{ $t('main.end_business_text') }} </div>
                    <div class="btn"> <img src="../../assets/img/main/arrow.svg" alt=""> </div>
                </div>
            </div>
            <div class="main_point_business">
                <div class="main_point_business_end">
                    <div class="main_point_business_title"> {{ $t('main.end_staff_title') }} </div>
                    <div class="main_point_business_subtitle"> {{ $t('main.end_staff_subtitle') }} </div>
                    <div class="main_point_business_text"> {{ $t('main.end_staff_text') }} </div>
                    <div class="btn"> <img src="../../assets/img/main/arrow.svg" alt=""> </div>
                </div>
                <div class="main_point_business_start">
                    <div class="main_point_staff_img"></div>
                </div>
            </div>
            <div class="staff_title main_point_border"> {{ $t('main.footer_title') }} </div>
        </div>
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
    height: 56px;
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
    background: #FFF0D2;
    padding: 80px 0px;
    position: relative;
}

.main_homestaff_back,
.main_business_staff_back {
    position: absolute;
    left: 0;
    bottom: 150px;
    width: 100%;
    height: 527px;
    flex-shrink: 0;
    background: url(../../assets/img/main/stripes.svg), #FFF0D2 50% / cover no-repeat;
    z-index: 1;
}

.main_business_staff_back {
    height: 268px;
}

.main_homestaff_fone {
    width: 100%;
    position: absolute;
    left: 0;
    bottom: 0;
    background: #FFF0D2;
}

.main_homestaff .btn,
.main_business_staff .btn {
    width: 164px;
    font-size: 14px;
    transition: scale 0.3s;
}

.main_homestaff .btn:hover,
.main_business_staff .btn:hover {
    scale: 1.1;
}

.main_homestaff_items {
    margin: 64px 0px 32px 0px;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    position: relative;
    z-index: 2;
}

.main_business_staff {
    background: #FFF0D2;
    padding-bottom: 80px;
    position: relative;
}

/* main_about */
.main_about {
    background: #FFF0D2;
    padding-bottom: 80px;
}

.main_about_text {
    margin-bottom: 30px;
}

.main_about_content {
    margin: 64px 0px;
    padding: 80px;
    border-radius: 10px;
    background: #5C4538;
    color: #FFF0D2;
}

/* main_point */
.main_point {
    background: #FFF0D2;
    padding-bottom: 120px;
}

.main_point_items {
    color: #FFF0D2;
    margin: 64px 0px;
    padding: 64px 0px;
    background: #1E1510;
}

.main_point_inner {
    display: flex;
    justify-content: space-between;
}

.main_point_item {
    display: flex;
    width: 262px;
    height: 150px;
    padding: 16px 24px;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    border-radius: 5px;
    border: 1px solid rgba(255, 240, 210, 0.50);
}

.main_point_logo {
    margin-bottom: 24px;
}

.main_point_text {
    font-size: 12px;
    font-weight: 400;
    text-align: center;
}

.main_point_business {
    display: flex;
    justify-content: space-between;
    margin-bottom: 64px;
    height: 315px;
}

.main_point_business_start {
    width: 658px;
    height: 261px;
    border-radius: 10px;
    background: #5C4538;
    position: relative;
    margin-top: 45px;
}

.main_point_business_img,
.main_point_staff_img {
    position: absolute;
    left: 40px;
    bottom: 32px;
    width: 618px;
    height: 274px;
    border-radius: 5px 0px 0px 5px;
    border: 1px solid #FFF0D2;
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
}

.main_point_business_img {
    background: url(../../assets/img/main/for_business.jpg) no-repeat center;
}

.main_point_staff_img {
    background: url(../../assets/img/main/for_staff.jpg) no-repeat center;
}

.main_point_business_end {
    width: 376px;
    position: relative;
}

.main_point_business_end .btn {
    position: absolute;
    left: 0;
    bottom: -10px;

    width: 164px;
    height: 40px;
    padding: 8px 24px;
    background: #5C4538;
}

.main_point_business_end .btn:hover {
    background: #1E1510;
}

.main_point_business_title {
    font-size: 32px;
    font-weight: 500;
    line-height: 120%;
    margin-bottom: 8px;
}

.main_point_business_subtitle {
    font-size: 24px;
    font-weight: 300;
    margin-bottom: 24px;
}

.main_point_border {
    padding-top: 64px;
    border-top: 1px solid #8E8E8E;
}

/* media */
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
