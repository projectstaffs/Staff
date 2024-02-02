<template>
    <div class="block">
        <div class="block_back"></div>
        <div class="block_content">
            <div class="container">
                <div class="staff_title">{{ $t('conditions.title') }}</div>
                <div class="conditions_text">{{ $t('conditions.text') }}</div>
                <div class="staff_title">{{ $t('conditions.subtitle') }}</div>
            </div>
            <div class="conditions_start">
                <div class="container">
                    <ul>
                        <li class="conditions_start_item">{{ $t('conditions.start_item1') }}</li>
                        <li class="conditions_start_item">{{ $t('conditions.start_item2') }}</li>
                        <li class="conditions_start_item">{{ $t('conditions.start_item3') }}</li>
                        <li class="conditions_start_item">{{ $t('conditions.start_item4') }}</li>
                        <li class="conditions_start_item">{{ $t('conditions.start_item5') }}</li>
                    </ul>
                </div>
            </div>
            <div class="conditions_middle">
                <div class="container">
                    <div class="conditions_middle_inner">
                        <div class="conditions_middle_start">
                            <div class="conditions_middle_title">{{ $t('conditions.middle_item1_title') }}</div>
                            <ul>
                                <li class="conditions_middle_item">{{ $t('conditions.middle_item1_text1') }}</li>
                                <li class="conditions_middle_item">{{ $t('conditions.middle_item1_text2') }}</li>
                                <li class="conditions_middle_item">{{ $t('conditions.middle_item1_text3') }}</li>
                            </ul>
                        </div>
                        <div class="conditions_middle_end">
                            <div class="conditions_middle_title">{{ $t('conditions.middle_item2_title') }}</div>
                            <ul>
                                <li class="conditions_middle_item">{{ $t('conditions.middle_item2_text1') }}</li>
                                <li class="conditions_middle_item">{{ $t('conditions.middle_item2_text2') }}</li>
                                <li class="conditions_middle_item">{{ $t('conditions.middle_item2_text3') }}</li>
                                <li class="conditions_middle_item">{{ $t('conditions.middle_item2_text4') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="conditions_bottom">
                <div class="container">
                    <div class="conditions_bottom_inner">
                        <div class="conditions_bottom_picture">
                            <picture>
                                <source srcset="../../../assets/img/condition.webp" type="image/webp">
                                <img class="conditions_img" src="../../../assets/img/condition.jpg" alt="">
                            </picture>
                        </div>
                        <div class="conditions_bottom_start">
                            <div class="conditions_bottom_title">{{ $t('conditions.bottom_title') }}</div>
                            <div class="conditions_bottom_vertical">
                                <div class="conditions_bottom_subtitle">{{ $t('conditions.bottom_subtitle') }}</div>
                                <div class="conditions_bottom_block">
                                    <div class="conditions_bottom_block_start">
                                        <div class="conditions_bottom_item">{{ $t('conditions.bottom_begin') }}</div>
                                        <div class="conditions_bottom_item">{{ $t('conditions.bottom_date') }}</div>
                                        <div class="conditions_bottom_item">{{ $t('conditions.bottom_access') }}</div>
                                    </div>
                                    <div class="conditions_bottom_block_end">
                                        <div class="conditions_bottom_block_text">{{ $t('conditions.bottom_price') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="conditions_bottom_end">{{ $t('conditions.bottom_end') }}</div>
                    </div>
                </div>
            </div>
            <div class="conditions_end">
                <div class="container">
                    <div class="conditions_end_title">{{ $t('conditions.end_title') }}</div>
                    <div class="conditions_end_text">{{ $t('conditions.end_text') }}</div>
                    <div @click.prevent="training" class="btn">{{ $t('conditions.end_button') }}</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Сonditions",
    methods: {
        training() { this.$router.push({ name: "Training" }) }
    },
}
</script>

<style>
.conditions_text {
    margin: 48px 0px 64px 0px;
}

.conditions_start {
    margin-top: 64px;
    height: 383px;
    background: #1E1510;
    color: #FFF0D2;
    padding: 50px 0px;
}

.conditions_middle {
    height: 371px;
    margin-bottom: 110px;
}

.conditions_middle_inner {
    display: flex;
    justify-content: space-between;
}

.conditions_middle_start {
    width: 556px;
    height: 390px;
    padding: 64px;
    background: #FFF0D2;
    border-radius: 10px;
    border: 1px solid #8E8E8E;
    margin-top: -111px;
}

.conditions_middle_end {
    width: 520px;
    height: 446px;
    border-radius: 10px;
    background: #5C4538;
    padding: 64px 46px;
    color: #FFF0D2;
    margin-top: -75px;
}

.conditions_middle_title {
    font-family: Playfair Display;
    font-size: 30px;
    font-weight: 800;
    line-height: 130%;
    text-align: center;
    margin-bottom: 64px;
}

.conditions_bottom {
    height: 430px;
    background: url(../../../assets/img/main/stripes.svg), #FFF0D2 50% / cover no-repeat;
    margin-bottom: 20px;
}

.conditions_bottom_inner {
    display: flex;
    flex-direction: column;
    position: relative;
}

.conditions_bottom_picture {
    width: 398px;
    height: 201px;
    position: absolute;
    right: 79px;
    top: 18px;
    border-radius: 10px;
    background: #FFF0D2;
}

.conditions_img {
    width: 398px;
    height: 201px;
    border-radius: 10px;
    border: 1px #8E8E8E;
    margin-top: -20px;
    margin-left: 20px;
}

.conditions_bottom_start {
    height: 388px;
    background: #1E1510;
    color: #FFF0D2;
    border-radius: 10px 10px 0px 0px;
    border: 1px solid #717171;
    margin-top: -49px;
    padding: 20px 79px 34px 74px;
}

.conditions_bottom_end {
    height: 73px;
    border-radius: 0px 0px 10px 10px;
    border: 1px solid #8E8E8E;
    background: #FFF0D2;
    margin-top: -29px;
    padding: 18px 0px;
    text-align: center;
    font-size: 24px;
    font-weight: 300;
}

.conditions_bottom_title {
    margin-bottom: 25px;
    font-size: 24px;
    font-weight: 300;
}

.conditions_bottom_vertical {
    height: 251px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.conditions_bottom_subtitle {
    font-size: 32px;
    font-weight: 500;
    line-height: 120%;
}

.conditions_bottom_block {
    display: flex;
    justify-content: space-between;
    width: 670px;
}

.conditions_bottom_block_start {
    width: 317px;
    font-size: 24px;
}

.conditions_bottom_block_end {
    width: 290px;
    padding-left: 20px;
    margin-top: auto;
    font-size: 36px;
    position: relative;
}

.conditions_bottom_block_end::before {
    content: '';
    width: 1px;
    height: 99px;
    position: absolute;
    left: 0;
    bottom: 0;
    background: rgba(255, 255, 255, 0.20);
}

.conditions_end {
    height: 324px;
    background: #5C4538;
    padding: 46px 0px;
    color: #FFF0D2;
}

.conditions_end .btn {
    width: 200px;
    font-size: 14px;
    margin: 0;
    transition: scale 0.3s;
}

.conditions_end .btn:hover {
    background: #1E1510;
    scale: 1.2;
}

.conditions_end_title {
    display: inline-block;
    font-size: 40px;
    font-weight: 500;
    line-height: 120%;
    border-bottom: 1px solid #FFF0D2;
    margin-bottom: 42px;
}

.conditions_end_text {
    font-size: 24px;
    margin-bottom: 65px;
}

@media (max-width: 1125px) {
    .conditions_bottom_start {
        padding: 20px 32px;
    }
}

@media (max-width: 992px) {
    .conditions_middle {
        height: 320px;
    }

    .conditions_text {
        margin: 24px 0;
    }

    .conditions_start {
        height: auto;
        margin-top: 32px;
        padding: 25px 0;
    }

    .conditions_middle_start {
        width: 556px;
        height: 320px;
        padding: 16px;
        margin-top: -20px;
    }

    .conditions_middle_title {
        margin-bottom: 16px;
    }

    .conditions_middle_end {
        width: 520px;
        height: auto;
        padding: 16px;
        margin-top: 0px;
    }

    .conditions_middle_start ul,
    .conditions_middle_end ul {
        padding-left: 20px;
    }

    .conditions_bottom_vertical {
        height: 150px;
    }

    .conditions_bottom_block {
        width: 100%;
    }

    .conditions_bottom_start {
        height: 550px;
    }

    .conditions_bottom_picture {
        left: 32px;
        top: 240px;
    }

    .conditions_end {
        height: auto;
        margin-top: 150px;
        padding: 22px 0;
    }

    .conditions_end_title {
        margin-bottom: 21px;
    }

    .conditions_end_text {
        margin-bottom: 30px;
    }
}

@media (max-width: 767px) {
    .conditions_text {
        margin: 12px 0;
    }

    .conditions_start {
        margin-top: 16px;
        padding: 12px 0;
    }

    .conditions_middle_title {
        margin-bottom: 10px;
        font-size: 24px;
    }

    .conditions_middle_start ul,
    .conditions_middle_end ul {
        margin-top: 10px;
        margin-bottom: 0;
        font-size: 16px;
    }

    .conditions_middle_start {
        height: 270px;
        padding-left: 5px;
        padding-right: 5px;
    }

    .conditions_middle_end {
        padding-left: 5px;
        padding-right: 5px;
    }

    .conditions_bottom_start {
        padding: 15px;
        height: 500px;
    }

    .conditions_bottom_title {
        margin-bottom: 12px;
    }

    .conditions_bottom_subtitle,
    .conditions_bottom_block_text,
    .conditions_end_title {
        font-size: 24px;
    }

    .conditions_bottom_block_start,
    .conditions_end_text,
    .conditions_bottom_end {
        font-size: 18px;
    }

    .conditions_bottom_picture {
        top: 200px;
    }

    .conditions_end {
        margin-top: 100px;
    }
}

@media (max-width: 576px) {
    .conditions_text {
        font-size: 16px;
    }

    .staff_title,
    .conditions_bottom_title,
    .conditions_bottom_subtitle,
    .conditions_bottom_block_text {
        font-size: 18px;
    }

    .conditions_start {
        padding: 5px 0;
    }

    .conditions_start ul {
        margin: 10px 0;
        padding-left: 20px;
        font-size: 16px;
    }

    .conditions_middle_inner {
        flex-direction: column;
    }

    .conditions_middle_start,
    .conditions_middle_end {
        width: 100%;
    }

    .conditions_middle_start {
        margin-top: -10px;
        margin-bottom: 10px;
    }

    .conditions_middle {
        margin-bottom: 250px;
    }

    .conditions_bottom_end {
        height: auto;
        padding: 8px 0;
        font-size: 16px;
    }

    .conditions_bottom_block {
        flex-direction: column;
    }

    .conditions_bottom_block_start,
    .conditions_bottom_block_end {
        width: 100%;
        padding-left: 10px;
    }

    .conditions_bottom_start {
        height: 520px;
    }

    .conditions_bottom_picture {
        left: 0;
        top: 220px;
        width: 283px;
    }

    .conditions_img {
        margin-left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
}

@media (max-width: 523px) {
    .conditions_middle {
        margin-bottom: 300px;
    }
}

@media (max-width: 348px) {
    .conditions_middle {
        margin-bottom: 330px;
    }
}
</style>