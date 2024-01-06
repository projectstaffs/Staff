<template>
    <div class="block">
        <div class="block_back"></div>
        <div class="block_content">
            <div class="container">
                <div class="staff_title">{{ $t('seekers.title') }}</div>
                <div class="service_text">{{ $t('seekers.text') }}</div>
                <div class="service_inner">
                    <div @mouseover="handleMouseOver1" @mouseout="handleMouseOut1" class="service_item">
                        <div @click.prevent="conditions" class="btn"><img src="../../../assets/img/main/arrow.svg" alt="">
                        </div>
                        <div class="service_item__block"><img :src="isHovered1 ? hoveredImageSrc1 : originalImageSrc1"
                                class="service_item_img" alt=""></div>
                        <div class="service_item_title">{{ $t('seekers.item1_title') }}</div>
                        <div class="service_item_text">{{ $t('seekers.item1_text') }}</div>
                    </div>
                    <div @mouseover="handleMouseOver2" @mouseout="handleMouseOut2" class="service_item">
                        <div @click.prevent="interview" class="btn"><img src="../../../assets/img/main/arrow.svg" alt="">
                        </div>
                        <div class="service_item__block"><img class="service_item_img"
                                :src="isHovered2 ? hoveredImageSrc2 : originalImageSrc2" alt=""></div>
                        <div class="service_item_title">{{ $t('seekers.item2_title') }}</div>
                        <div class="service_item_text">{{ $t('seekers.item2_text') }}</div>
                    </div>
                    <div @mouseover="handleMouseOver3" @mouseout="handleMouseOut3" class="service_item">
                        <div class="btn"><img src="../../../assets/img/main/arrow.svg" alt="">
                        </div>
                        <div class="service_item__block"><img class="service_item_img"
                                :src="isHovered3 ? hoveredImageSrc3 : originalImageSrc3" alt=""></div>
                        <div class="service_item_title">{{ $t('seekers.item3_title') }}</div>
                        <div class="service_item_text">{{ $t('seekers.item3_text') }}</div>
                    </div>
                    <div class="seekers_inner">
                        <div @mouseover="handleMouseOver4" @mouseout="handleMouseOut4" class="service_item"
                            @click.prevent="vacancy">
                            <div class="btn"><img src="../../../assets/img/main/arrow.svg" alt="">
                            </div>
                            <div class="service_item__block"><img class="service_item_img"
                                    :src="isHovered4 ? hoveredImageSrc4 : originalImageSrc4" alt=""></div>
                            <div class="service_item_title">{{ $t('seekers.item4_title') }}</div>
                            <div class="service_item_text">{{ $t('seekers.item4_text') }}</div>
                        </div>
                        <div @mouseover="handleMouseOver5" @mouseout="handleMouseOut5" class="service_item">
                            <div @click.prevent="information" class="btn"><img src="../../../assets/img/main/arrow.svg"
                                    alt="">
                            </div>
                            <div class="service_item__block"><img class="service_item_img"
                                    :src="isHovered5 ? hoveredImageSrc5 : originalImageSrc5" alt=""></div>
                            <div class="service_item_title">{{ $t('seekers.item5_title') }}</div>
                            <div class="service_item_text">{{ $t('seekers.item5_text') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Seekers",
    data() {
        return {
            originalImageSrc1: '../../src/assets/img/seekers/seekers1.png',
            hoveredImageSrc1: '../../src/assets/img/seekers/seekers1hover.png',
            originalImageSrc2: '../../src/assets/img/seekers/seekers2.png',
            hoveredImageSrc2: '../../src/assets/img/seekers/seekers2hover.png',
            originalImageSrc3: '../../src/assets/img/seekers/seekers3.png',
            hoveredImageSrc3: '../../src/assets/img/seekers/seekers3hover.png',
            originalImageSrc4: '../../src/assets/img/seekers/seekers4.png',
            hoveredImageSrc4: '../../src/assets/img/seekers/seekers4hover.png',
            originalImageSrc5: '../../src/assets/img/seekers/seekers5.png',
            hoveredImageSrc5: '../../src/assets/img/seekers/seekers5hover.png',
            isHovered1: false, isHovered2: false, isHovered3: false, isHovered4: false, isHovered5: false
        }
    },
    methods: {
        handleMouseOver1() { this.isHovered1 = true; },
        handleMouseOut1() { this.isHovered1 = false; },
        handleMouseOver2() { this.isHovered2 = true; },
        handleMouseOut2() { this.isHovered2 = false; },
        handleMouseOver3() { this.isHovered3 = true; },
        handleMouseOut3() { this.isHovered3 = false; },
        handleMouseOver4() { this.isHovered4 = true; },
        handleMouseOut4() { this.isHovered4 = false; },
        handleMouseOver5() { this.isHovered5 = true; },
        handleMouseOut5() { this.isHovered5 = false; },
        conditions() { this.$router.push({ name: "Сonditions" }) },
        interview() { this.$router.push({ name: "Interview" }) },
        information() { this.$router.push({ name: "Information" }) },
        vacancy() { this.$router.push({ name: "ClientBabyAll" }) }
    },
}
</script>

<style>
.seekers_inner {
    display: flex;
    justify-content: space-between;
    width: 732px;
    margin: 0px auto -32px;
}
</style>