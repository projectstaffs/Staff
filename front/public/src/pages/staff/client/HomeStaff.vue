<template>
    <div class="block">
        <div class="block_back"></div>
        <div class="block_content">
            <div class="container">
                <div class="staff_title">{{ $t('main.staff_title') }}</div>
            </div>
            <div class="homestaff">
                <div class="container">
                    <div class="homestaff_content">
                        <div class="homestaff_inner">
                            <div class="staff_item" @click.prevent="baby">
                                <img class="staff_img" src="../../../assets/img/main/category/home/item1.jpg" alt="">
                                <div class="staff_text"> {{ $t('main.staff_item1') }} </div>
                            </div>
                            <div class="staff_item">
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
                            <div class="staff_item">
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
        baby() { this.$router.push({ name: "BabyAll" }) }
    },
}
</script>

<style>
.homestaff {
    margin-top: 127px;
    height: 1132px;
    background: url(../../../assets/img/main/stripes.svg), #FFF0D2 50% / cover no-repeat;
}

.homestaff_content {
    position: relative;
}

.homestaff_inner {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    position: absolute;
    left: 0;
    top: -63px;
}
</style>