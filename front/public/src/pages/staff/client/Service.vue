<template>
    <div class="block">
        <div class="block_back"></div>
        <div class="block_content">
            <div class="container">
                <div class="staff_title">{{ $t('service.title') }}</div>
                <div class="service_text">{{ $t('service.text') }}</div>
                <div class="service_inner">
                    <div @mouseover="handleMouseOver1" @mouseout="handleMouseOut1" class="service_item">
                        <div @click.prevent="servicepackages" class="btn"><img src="../../../assets/img/main/arrow.svg"
                                alt=""></div>
                        <div class="service_item__block"><img :src="isHovered1 ? hoveredImageSrc1 : originalImageSrc1"
                                class="service_item_img" alt=""></div>
                        <div class="service_item_title">{{ $t('service.item1_title') }}</div>
                        <div class="service_item_text">{{ $t('service.item1_text') }}</div>
                    </div>
                    <div @mouseover="handleMouseOver2" @mouseout="handleMouseOut2" class="service_item">
                        <div @click.prevent="study" class="btn"><img src="../../../assets/img/main/arrow.svg" alt=""></div>
                        <div class="service_item__block"><img class="service_item_img"
                                :src="isHovered2 ? hoveredImageSrc2 : originalImageSrc2" alt=""></div>
                        <div class="service_item_title">{{ $t('service.item2_title') }}</div>
                        <div class="service_item_text">{{ $t('service.item2_text') }}</div>
                    </div>
                    <div @mouseover="handleMouseOver3" @mouseout="handleMouseOut3" class="service_item">
                        <div class="btn" data-window="window"><img src="../../../assets/img/main/arrow.svg" alt="">
                        </div>
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
export default {
    name: "Service",
    data() {
        return {
            originalImageSrc1: '../../src/assets/img/service/item1.png',
            hoveredImageSrc1: '../../src/assets/img/service/item1hover.png',
            originalImageSrc2: '../../src/assets/img/service/item2.png',
            hoveredImageSrc2: '../../src/assets/img/service/item2hover.png',
            originalImageSrc3: '../../src/assets/img/service/item3.png',
            hoveredImageSrc3: '../../src/assets/img/service/item3hover.png',
            isHovered1: false, isHovered2: false, isHovered3: false,
        }
    },
    methods: {
        handleMouseOver1() { this.isHovered1 = true; },
        handleMouseOut1() { this.isHovered1 = false; },
        handleMouseOver2() { this.isHovered2 = true; },
        handleMouseOut2() { this.isHovered2 = false; },
        handleMouseOver3() { this.isHovered3 = true; },
        handleMouseOut3() { this.isHovered3 = false; },
        servicepackages() { this.$router.push({ name: "ServicePackages" }) },
        study() { this.$router.push({ name: "Study" }) }
    },
}
</script>