<template>
    <div class="block">
        <div class="block_back"></div>
        <div class="block_content">
            <div class="container">
                <div class="staff_title">{{ $t('study.title') }}</div>
            </div>
            <div class="study_start">
                <div class="container">
                    <div class="study_inner">
                        <div class="study_start_start">
                            <div class="study_title">{{ $t('study.item1_title') }}</div>
                            <div class="study_text">{{ $t('study.item1_text') }}</div>
                            <div class="btn">{{ $t('study.item1_btn') }}</div>
                        </div>
                        <div class="study_start_end">
                            <img class="study_img" src="../../../assets/img/study/study1.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="study_middle">
                <div class="container">
                    <div class="study_inner">
                        <div class="study_middle_start">
                            <img class="study_img" src="../../../assets/img/study/study2.jpg" alt="">
                        </div>
                        <div class="study_middle_end">
                            <div class="study_title">{{ $t('study.item2_title') }}</div>
                            <div class="study_text">{{ $t('study.item2_text') }}</div>
                            <div @click.prevent="popup" class="btn">{{ $t('study.item2_btn') }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="study_end">
                <div class="container">
                    <div class="study_inner">
                        <div class="study_end_start">
                            <div class="study_title">{{ $t('study.item3_title') }}</div>
                            <div class="study_text">{{ $t('study.item3_text') }}</div>
                            <div @click.prevent="popup" class="btn">{{ $t('study.item3_btn') }}</div>
                        </div>
                        <div class="study_end_end">
                            <img class="study_img" src="../../../assets/img/study/study3.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { useI18n } from 'vue-i18n';
export default {
    name: "Study",
    setup() {
        const { t, locale } = useI18n({ useScope: 'global' });
        return { t, locale };
    },
    methods: {
        popup() { this.$router.push({ name: "Popup" }) }
    },
}
</script>

<style>
.study_start,
.study_middle,
.study_end {
    background: rgba(30, 21, 16, 0.08);
}

.study_start {
    height: 317px;
    margin-top: 155px;
}

.study_middle {
    height: 375px;
    margin-top: 190px;
}

.study_end {
    height: 561px;
    margin-top: 175px;
}

.study_inner {
    display: flex;
    justify-content: space-between;
}

.study_start_start,
.study_middle_end,
.study_end_start {
    width: 541px;
    padding: 36px 15px 48px 52px;
    border-radius: 20px;
    border: 1px solid #8E8E8E;
}

.study_start_end,
.study_middle_start,
.study_end_end {
    width: 523px;
    height: 375px;
    border-radius: 21px;
    background: #1E1510;
    text-align: right;
}

.study_middle_start {
    text-align: left;
}

.study_start_start .btn,
.study_middle_end .btn,
.study_end_start .btn {
    width: 190px;
    padding: 16px;
    margin: 0;
    font-size: 14px;
}

.study_start_start,
.study_start_end {
    height: 375px;
    margin-top: -90px;
}

.study_middle_end {
    height: 483px;
}

.study_end_start {
    height: 651px;
}

.study_middle_start,
.study_middle_end,
.study_end_start,
.study_end_end {
    margin-top: -122px;
}

.study_img {
    border-radius: 20px;
}

.study_title {
    font-size: 24px;
    font-weight: 300;
}

.study_text {
    margin: 45px 0px;
}
</style>