<template>
    <div class="block">
        <div class="block_back"></div>
        <div class="block_content">
            <div class="container">
                <div class="staff_title">{{ $t('information.title') }}</div>
                <div class="information_text">{{ $t('information.text') }}</div>
                <div class="information_inner">
                    <div @mouseover="handleMouseOver1" @mouseout="handleMouseOut1" class="information_item">
                        <div data-window="window" class="btn"><img class="inactive" src="../../assets/img/main/arrow.svg"
                                alt="">
                        </div>
                        <div class="information_item_block"><img :src="isHovered1 ? hoveredImageSrc1 : originalImageSrc1"
                                class="information_item_img" alt=""></div>
                        <div class="information_item_content">
                            <div class="information_item_date"><img src="../../assets/img/information/bell-reminder.svg"
                                    alt=""> {{ $t('information.item1_date') }}</div>
                            <div class="information_item_title">{{ $t('information.item1_title') }}</div>
                            <div class="information_item_text"> {{ $t('information.item1_text') }}</div>
                        </div>
                    </div>
                    <div @mouseover="handleMouseOver2" @mouseout="handleMouseOut2" class="information_item">
                        <div data-window="window" class="btn"><img class="inactive" src="../../assets/img/main/arrow.svg"
                                alt="">
                        </div>
                        <div class="information_item_block"><img :src="isHovered2 ? hoveredImageSrc2 : originalImageSrc2"
                                class="information_item_img" alt=""></div>
                        <div class="information_item_content">
                            <div class="information_item_date"><img src="../../assets/img/information/bell-reminder.svg"
                                    alt=""> {{ $t('information.item2_date') }}</div>
                            <div class="information_item_title">{{ $t('information.item2_title') }}</div>
                            <div class="information_item_text">{{ $t('information.item2_text') }}</div>
                        </div>
                    </div>
                    <div @mouseover="handleMouseOver3" @mouseout="handleMouseOut3" class="information_item">
                        <div data-window="window" class="btn"><img class="inactive" src="../../assets/img/main/arrow.svg"
                                alt="">
                        </div>
                        <div class="information_item_block"><img :src="isHovered3 ? hoveredImageSrc3 : originalImageSrc3"
                                class="information_item_img" alt=""></div>
                        <div class="information_item_content">
                            <div class="information_item_date"><img src="../../assets/img/information/bell-reminder.svg"
                                    alt=""> {{ $t('information.item3_date') }}</div>
                            <div class="information_item_title">{{ $t('information.item3_title') }}</div>
                            <div class="information_item_text">{{ $t('information.item3_text') }}</div>
                        </div>
                    </div>
                    <div @mouseover="handleMouseOver4" @mouseout="handleMouseOut4" class="information_item">
                        <div data-window="window" class="btn"><img class="inactive" src="../../assets/img/main/arrow.svg"
                                alt="">
                        </div>
                        <div class="information_item_block"><img :src="isHovered4 ? hoveredImageSrc4 : originalImageSrc4"
                                class="information_item_img" alt=""></div>
                        <div class="information_item_content">
                            <div class="information_item_date"><img src="../../assets/img/information/bell-reminder.svg"
                                    alt=""> {{ $t('information.item4_date') }}</div>
                            <div class="information_item_title">{{ $t('information.item4_title') }}</div>
                            <div class="information_item_text">{{ $t('information.item4_text') }}</div>
                        </div>
                    </div>
                    <div @mouseover="handleMouseOver5" @mouseout="handleMouseOut5" class="information_item">
                        <div data-window="window" class="btn"><img class="inactive" src="../../assets/img/main/arrow.svg"
                                alt="">
                        </div>
                        <div class="information_item_block"><img :src="isHovered5 ? hoveredImageSrc5 : originalImageSrc5"
                                class="information_item_img" alt=""></div>
                        <div class="information_item_content">
                            <div class="information_item_date"><img src="../../assets/img/information/bell-reminder.svg"
                                    alt=""> {{ $t('information.item5_date') }}</div>
                            <div class="information_item_title">{{ $t('information.item5_title') }}</div>
                            <div class="information_item_text">{{ $t('information.item5_text') }}</div>
                        </div>
                    </div>
                    <div @mouseover="handleMouseOver6" @mouseout="handleMouseOut6" class="information_item">
                        <div data-window="window" class="btn"><img class="inactive" src="../../assets/img/main/arrow.svg"
                                alt="">
                        </div>
                        <div class="information_item_block"><img :src="isHovered6 ? hoveredImageSrc6 : originalImageSrc6"
                                class="information_item_img" alt=""></div>
                        <div class="information_item_content">
                            <div class="information_item_date"><img src="../../assets/img/information/bell-reminder.svg"
                                    alt=""> {{ $t('information.item6_date') }}</div>
                            <div class="information_item_title">{{ $t('information.item6_title') }}</div>
                            <div class="information_item_text">{{ $t('information.item6_text') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Information",
    data() {
        return {
            originalImageSrc1: '../../src/assets/img/information/inform1.png',
            hoveredImageSrc1: '../../src/assets/img/information/inform1hover.png',
            originalImageSrc2: '../../src/assets/img/information/inform2.png',
            hoveredImageSrc2: '../../src/assets/img/information/inform2hover.png',
            originalImageSrc3: '../../src/assets/img/information/inform3.png',
            hoveredImageSrc3: '../../src/assets/img/information/inform3hover.png',
            originalImageSrc4: '../../src/assets/img/information/inform4.png',
            hoveredImageSrc4: '../../src/assets/img/information/inform4hover.png',
            originalImageSrc5: '../../src/assets/img/information/inform5.png',
            hoveredImageSrc5: '../../src/assets/img/information/inform5hover.png',
            originalImageSrc6: '../../src/assets/img/information/inform6.png',
            hoveredImageSrc6: '../../src/assets/img/information/inform6hover.png',
            isHovered1: false, isHovered2: false, isHovered3: false, isHovered4: false, isHovered5: false, isHovered6: false
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
        handleMouseOver6() { this.isHovered6 = true; },
        handleMouseOut6() { this.isHovered6 = false; },
    },
}
</script>

<style>
.information_text {
    margin-top: 48px;
}

.information_inner {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin-top: 44px;
}

.information_item {
    margin-top: 20px;
    display: flex;
    flex-direction: column;
    width: 356px;
    height: 423px;
    border-radius: 10px;
    border: 1px solid #8E8E8E;
    position: relative;
}

.information_item .btn {
    width: 46px;
    padding: 8px 24px;
    position: absolute;
    right: 31px;
    top: 187px;
    border: 1px solid rgba(255, 240, 210, 0.50);
    background: #5C4538;
    z-index: 2;
}

.information_item .btn:hover {
    background: #1E1510;
}

.information_item_block {
    width: 356px;
    height: 213px;
    border-radius: 10px 10px 0px 0px;
    overflow: hidden;
    position: relative;
    margin: -1px 0px 0px -1px;
}

.information_item_img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: scale 0.7s;
}

.information_item:hover .information_item_img {
    scale: 1.25;
}

.information_item_content {
    padding: 30px 40px;
    height: 210px;
}

.information_item_date {
    font-size: 12px;
    margin-bottom: 12px;
}

.information_item_title {
    font-size: 16px;
    margin-bottom: 12px;
    line-height: 140%;
}

.information_item_text {
    font-size: 14px;
    line-height: 140%;
}
</style>