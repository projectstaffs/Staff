<template>
    <div class="block">
        <div class="block_back"></div>
        <div class="block_content">
            <div class="container">
                <div class="staff_title">{{ $t('main.business_title') }}</div>
                <div class="business_subtitle">{{ $t('business.subtitle') }}</div>
                <div class="business_text">{{ $t('business.text') }}</div>
            </div>
            <div class="business_inner">
                <div class="container">
                    <div class="business_content">
                        <div class="business_items">
                            <div class="staff_item" data-window="window">
                                <img class="staff_img" src="../../../assets/img/main/category/business/item1.jpg" alt="">
                                <div class="staff_text"> {{ $t('main.business_item1') }} </div>
                            </div>
                            <div class="staff_item" data-window="window">
                                <img class="staff_img" src="../../../assets/img/main/category/business/item2.jpg" alt="">
                                <div class="staff_text"> {{ $t('main.business_item2') }} </div>
                            </div>
                            <div class="staff_item" data-window="window">
                                <img class="staff_img" src="../../../assets/img/main/category/business/item3.jpg" alt="">
                                <div class="staff_text"> {{ $t('main.business_item3') }} </div>
                            </div>
                            <div class="staff_item" data-window="window">
                                <img class="staff_img" src="../../../assets/img/main/category/business/item4.jpg" alt="">
                                <div class="staff_text"> {{ $t('main.business_item4') }} </div>
                            </div>
                        </div>
                        <div class="business_about">
                            <div class="business_about_item">{{ $t('business.item1') }}</div>
                            <ol>
                                <li class="business_about_item">{{ $t('business.item2') }}</li>
                                <li class="business_about_item">{{ $t('business.item3') }}</li>
                                <li class="business_about_item">{{ $t('business.item4') }}</li>
                                <li class="business_about_item">{{ $t('business.item5') }}</li>
                            </ol>
                            <div class="business_about_item">{{ $t('business.item6') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "BusinessStaff",
}
</script>

<style>
.business_subtitle {
    margin: 48px 0px 24px 0px;
    font-size: 24px;
    font-weight: 500;
    line-height: 120%;
    text-align: center;
}

.business_inner {
    margin-top: 99px;
    height: 825px;
    background: url(../../../assets/img/main/stripes.svg), #FFF0D2 50% / cover no-repeat;
}

.business_content {
    position: relative;
    height: 825px;
}

.business_items {
    display: flex;
    justify-content: space-between;
    width: 100%;
    position: absolute;
    left: 0;
    top: -35px;
}

.business_about {
    position: absolute;
    left: 67px;
    bottom: 32px;
    max-width: 974px;
    height: 502px;
    padding: 40px 80px;
    border-radius: 20px;
    border: 1px solid #8E8E8E;
    background: #FFF0D2;
    box-shadow: 0px 4px 10px 0px rgba(30, 21, 16, 0.50);
}

.business_about ol {
    padding-inline-start: 20px;
}
</style>