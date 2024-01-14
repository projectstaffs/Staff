<template>
    <div class="block">
        <div class="block_back"></div>
        <div class="block_content">
            <div class="container">
                <div class="staff_title">{{ $t('main.staff_title') }}</div>
            </div>
            <div class="homestaff">
                <div class="homestaff_test">
                    <div class="homestaff_test_grad"></div>
                </div>
                <div class="container">
                    <div class="homestaff_content">
                        <div class="homestaff_inner">
                            <div class="staff_item" @click.prevent="baby">
                                <img class="staff_img" src="../../../assets/img/main/category/home/item1.jpg" alt="">
                                <div class="staff_text"> {{ $t('main.staff_item1') }} </div>
                            </div>
                            <div class="staff_item" @click.prevent="keeper">
                                <img class="staff_img" src="../../../assets/img/main/category/home/item2.jpg" alt="">
                                <div class="staff_text"> {{ $t('main.staff_item2') }} </div>
                            </div>
                            <div class="staff_item" data-window="window">
                                <img class="staff_img" src="../../../assets/img/main/category/home/item3.jpg" alt="">
                                <div class="staff_text"> {{ $t('main.staff_item3') }} </div>
                            </div>
                            <div class="staff_item" data-window="window">
                                <img class="staff_img" src="../../../assets/img/main/category/home/item4.jpg" alt="">
                                <div class="staff_text"> {{ $t('main.staff_item4') }} </div>
                            </div>
                            <div class="staff_item" @click.prevent="nurse">
                                <img class="staff_img" src="../../../assets/img/main/category/home/item5.jpg" alt="">
                                <div class="staff_text"> {{ $t('main.staff_item5') }} </div>
                            </div>
                            <div class="staff_item" data-window="window">
                                <img class="staff_img" src="../../../assets/img/main/category/home/item6.jpg" alt="">
                                <div class="staff_text"> {{ $t('main.staff_item6') }} </div>
                            </div>
                            <div class="staff_item" data-window="window">
                                <img class="staff_img" src="../../../assets/img/main/category/home/item7.jpg" alt="">
                                <div class="staff_text"> {{ $t('main.staff_item7') }} </div>
                            </div>
                            <div class="staff_item" data-window="window">
                                <img class="staff_img" src="../../../assets/img/main/category/home/item8.jpg" alt="">
                                <div class="staff_text"> {{ $t('main.staff_item8') }} </div>
                            </div>
                            <div class="staff_item" data-window="window">
                                <img class="staff_img" src="../../../assets/img/main/category/home/item9.jpg" alt="">
                                <div class="staff_text"> {{ $t('main.staff_item9') }} </div>
                            </div>
                            <div class="staff_item" data-window="window">
                                <img class="staff_img" src="../../../assets/img/main/category/home/item10.jpg" alt="">
                                <div class="staff_text"> {{ $t('main.staff_item10') }} </div>
                            </div>
                            <div class="staff_item" data-window="window">
                                <img class="staff_img" src="../../../assets/img/main/category/home/item11.jpg" alt="">
                                <div class="staff_text"> {{ $t('main.staff_item11') }} </div>
                            </div>
                            <div class="staff_item" data-window="window">
                                <img class="staff_img" src="../../../assets/img/main/category/home/item12.jpg" alt="">
                                <div class="staff_text"> {{ $t('main.staff_item12') }} </div>
                            </div>
                            <div class="staff_item" data-window="window">
                                <img class="staff_img" src="../../../assets/img/main/category/home/item13.jpg" alt="">
                                <div class="staff_text"> {{ $t('main.staff_item13') }} </div>
                            </div>
                            <div class="staff_item" data-window="window">
                                <img class="staff_img" src="../../../assets/img/main/category/home/item14.jpg" alt="">
                                <div class="staff_text"> {{ $t('main.staff_item14') }} </div>
                            </div>
                            <div class="staff_item" data-window="window">
                                <img class="staff_img" src="../../../assets/img/main/category/home/item15.jpg" alt="">
                                <div class="staff_text"> {{ $t('main.staff_item15') }} </div>
                            </div>
                            <div class="staff_item" data-window="window">
                                <img class="staff_img" src="../../../assets/img/main/category/home/item16.jpg" alt="">
                                <div class="staff_text"> {{ $t('main.staff_item16') }} </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "HomeStaff",
    methods: {
        baby() {
            this.$router.push({ name: "BabyAll" })
        },
        nurse() {
            this.$router.push({ name: "NurseAll" })
        },
        keeper() {
            this.$router.push({ name: "KeeperAll" })
        }
    },
}
</script>

<style>
.homestaff {
    background: url(../../../assets/img/main/stripes.svg), #FFF0D2 50% / cover no-repeat;
}

.homestaff_test {
    height: 127px;
    background: #FFF0D2;
}

.homestaff_test_grad {
    height: 100%;
    background: linear-gradient(180deg, #e4d3b7 0%, rgba(255, 240, 210, 0.50) 95.67%);
}

.homestaff_content {
    margin-top: -63px;
}

.homestaff_inner {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

@media (max-width: 1125px) {
    .homestaff_inner {
        justify-content: center;
    }
}

@media (max-width: 992px) {
    .homestaff_test {
        height: 107px;
    }

    .homestaff_test_grad {
        background: linear-gradient(180deg, #d4c3a8 0%, rgba(255, 240, 210, 0.50) 95.67%);
    }
}

@media (max-width: 767px) {
    .homestaff_test_grad {
        background: linear-gradient(180deg, #d0bfa5 0%, rgba(255, 240, 210, 0.50) 95.67%);
    }
}

@media (max-width: 576px) {
    .homestaff_test {
        height: 92px;
    }

    .homestaff_test_grad {
        background: linear-gradient(180deg, #ccbaa0 0%, rgba(255, 240, 210, 0.50) 95.67%);
    }
}
</style>