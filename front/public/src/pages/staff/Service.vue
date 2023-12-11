<template>
    <div class="block">
        <div class="block_back"></div>
        <div class="block_content">
            <div class="container">
                <div class="staff_title">{{ $t('service.title') }}</div>
                <div class="service_text">{{ $t('service.text') }}</div>
                <div class="service_inner">
                    <div @mouseover="handleMouseOver1" @mouseout="handleMouseOut1" class="service_item">
                        <div class="btn"><img src="../../assets/img/main/arrow.svg" alt=""></div>
                        <div class="service_item__block"><img :src="isHovered1 ? hoveredImageSrc1 : originalImageSrc1"
                                class="service_item_img" alt=""></div>
                        <div class="service_item_title">{{ $t('service.item1_title') }}</div>
                        <div class="service_item_text">{{ $t('service.item1_text') }}</div>
                    </div>
                    <div @mouseover="handleMouseOver2" @mouseout="handleMouseOut2" class="service_item">
                        <div class="btn"><img src="../../assets/img/main/arrow.svg" alt=""></div>
                        <div class="service_item__block"><img class="service_item_img"
                                :src="isHovered2 ? hoveredImageSrc2 : originalImageSrc2" alt=""></div>
                        <div class="service_item_title">{{ $t('service.item2_title') }}</div>
                        <div class="service_item_text">{{ $t('service.item2_text') }}</div>
                    </div>
                    <div @mouseover="handleMouseOver3" @mouseout="handleMouseOut3" class="service_item">
                        <div class="btn"><img src="../../assets/img/main/arrow.svg" alt=""></div>
                        <div class="service_item__block"><img class="service_item_img"
                                :src="isHovered3 ? hoveredImageSrc3 : originalImageSrc3" alt=""></div>
                        <div class="service_item_title">{{ $t('service.item3_title') }}</div>
                        <div class="service_item_text">{{ $t('service.item3_text') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { useI18n } from 'vue-i18n';
export default {
    name: "Service",
    data() {
        return {
            originalImageSrc1: '../../src/assets/img/service/item1.jpg',
            hoveredImageSrc1: '../../src/assets/img/service/item1hover.jpg',
            originalImageSrc2: '../../src/assets/img/service/item2.jpg',
            hoveredImageSrc2: '../../src/assets/img/service/item2hover.jpg',
            originalImageSrc3: '../../src/assets/img/service/item3.jpg',
            hoveredImageSrc3: '../../src/assets/img/service/item3hover.jpg',
            isHovered1: false, isHovered2: false, isHovered3: false,
        }
    },
    setup() {
        const { t, locale } = useI18n({ useScope: 'global' });
        return { t, locale };
    },
    methods: {
        handleMouseOver1() {
            this.isHovered1 = true;
        },
        handleMouseOut1() {
            this.isHovered1 = false;
        },
        handleMouseOver2() {
            this.isHovered2 = true;
        },
        handleMouseOut2() {
            this.isHovered2 = false;
        },
        handleMouseOver3() {
            this.isHovered3 = true;
        },
        handleMouseOut3() {
            this.isHovered3 = false;
        },
    },
}
</script>

<style>
.service_text {
    margin-top: 48px;
}

.service_inner {
    display: flex;
    justify-content: space-between;
    margin-top: 84px;
}

.service_item {
    display: flex;
    flex-direction: column;
    width: 356px;
    height: 521px;
    padding-bottom: 60px;
    border-radius: 11px;
    background: #1E1510;
    color: #FFF0D2;
    position: relative;
}

.service_item .btn {
    width: 46px;
    padding: 8px 24px;
    position: absolute;
    right: 31px;
    top: 190px;
    border: 1px solid rgba(255, 240, 210, 0.50);
    background: #5C4538;
    z-index: 2;
}

.service_item .btn:hover {
    background: #1E1510;
}

.service_item__block {
    width: 356px;
    height: 213px;
    border-radius: 10px 10px 0px 0px;
    overflow: hidden;
    position: relative;
}

.service_item_img {
    width: 100%;
    height: 100%;
    transition: scale 0.7s;
}

.service_item:hover .service_item_img {
    scale: 1.25;
}

.service_item_title {
    font-size: 24px;
    font-weight: 300;
    margin: 30px 40px 62px 40px;
}

.service_item_text {
    font-size: 16px;
    margin: 0 40px;
}
</style>