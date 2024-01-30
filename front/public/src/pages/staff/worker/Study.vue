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
                            <div @click.prevent="training" class="btn">{{ $t('study.item1_btn') }}</div>
                        </div>
                        <div class="study_start_end_prew">
                            <div class="study_start_end"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="study_middle">
                <div class="container">
                    <div class="study_inner">
                        <div class="study_middle_start_prew">
                            <div class="study_middle_start">
                            </div>
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
                        <div class="study_end_end_prew">
                            <div class="study_end_end"></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Study",
    methods: {
        popup() { this.$router.push({ name: "Popup" }) },
        training() { this.$router.push({ name: "Training" }) }
    },
}
</script>

<style>
.study_start {
    height: 317px;
    margin-top: 155px;
    background: #5C4538;
}

.study_middle {
    height: 375px;
    margin-top: 190px;
    background: #1E1510;
}

.study_end {
    height: 365px;
    margin-top: 175px;
    background: #5C4538;
    margin-bottom: 125px;
}

.study_inner {
    display: flex;
    justify-content: space-between;
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
.study_middle_end,
.study_end_start {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    width: 541px;
    padding: 36px 15px 48px 52px;
    border-radius: 20px;
    border: 1px solid #8E8E8E;
}

.study_end_start {
    height: 651px;
    background: #FFF0D2;
    margin-top: -122px;
}

.study_start_start {
    background: #FFF0D2;
    margin-top: -90px;
}

.study_middle_end {
    height: 470px;
    color: #FFF0D2;
    background: #5C4538;
    margin-top: -122px;
}

.study_end_end_prew {
    width: 498px;
    height: 375px;
    border-radius: 22px;
    background: #1E1510;
    margin-left: 15px;
    padding-left: 25px;
    margin-top: -122px;
}

.study_end_end {
    width: 100%;
    height: 100%;
    background: url(../../../assets/img/study/study3.jpg) no-repeat center;
    border-radius: 20px;
}

.study_middle_start_prew {
    width: 518px;
    height: 375px;
    border-radius: 22px;
    margin-top: -122px;
    margin-right: 15px;
    background: #1E1510;
    padding-right: 20px;
}

.study_middle_start {
    width: 100%;
    height: 100%;
    background: url(../../../assets/img/study/study2.jpg) no-repeat center;
    border-radius: 20px;
}

.study_start_end_prew {
    width: 523px;
    height: 375px;
    background: #1E1510;
    margin-left: 15px;
    margin-top: -90px;
    padding-left: 25px;
    border-radius: 20px;
}

.study_start_end {
    width: 100%;
    height: 100%;
    background: url(../../../assets/img/study/study1.jpg) no-repeat center;
    border-radius: 20px;
    overflow: hidden;
}

.study_title {
    font-size: 24px;
    font-weight: 300;
}

.study_text {
    margin: 15px 0px;
}

@media (max-width: 1150px) {

    .study_start_start,
    .study_middle_end,
    .study_end_start {
        padding: 20px;
    }
}

@media (max-width: 992px) {
    .study_start {
        margin-top: 130px;
    }

    .study_middle {
        margin-top: 180px;
    }

    .study_end_start {
        height: 700px;
        font-size: 16px;
    }

    .study_text {
        margin: 10px 0;
    }

    .study_end {
        margin-bottom: 205px;
    }
}

@media (max-width: 767px) {
    .study_middle {
        margin-top: 400px;
    }

    .study_end {
        margin-top: 390px;
        height: 580px;
    }

    .study_inner {
        flex-direction: column;
        align-items: center;
    }

    .study_start_start,
    .study_middle_start_prew,
    .study_end_start {
        margin-top: 20px;
    }

    .study_start_end_prew,
    .study_end_end_prew {
        margin-left: 0;
    }

    .study_middle_start_prew {
        margin-right: 0;
    }

    .study_start_start,
    .study_start_end_prew,
    .study_middle_start_prew,
    .study_middle_end,
    .study_end_start,
    .study_end_end_prew {
        width: 100%;
    }

    .study_start_end,
    .study_middle_start {
        max-width: 498px;
        margin: 0 auto;
    }

    .study_end_end {
        max-width: 473px;
        margin: 0 auto;
    }

    .study_end_start {
        height: 500px;
    }

    .study_middle_end {
        height: 350px;
    }

    .study_start_end_prew,
    .study_end_end_prew,
    .study_middle_end {
        order: 1;
    }

    .study_start_start,
    .study_end_start,
    .study_middle_start_prew {
        order: 2;
    }
}

@media (max-width: 576px) {
    .study_start {
        margin-top: 110px;
    }

    .study_middle,
    .study_end {
        margin-top: 490px;
    }

    .study_end {
        height: 860px;
    }

    .study_start_start,
    .study_middle_end,
    .study_end_start {
        padding: 10px;
    }

    .study_middle_end {
        height: 450px;
    }

    .study_start_start {
        height: 358px;
    }

    .study_middle_end {
        height: 448px;
    }

    .study_end_start {
        height: 790px;
    }

    .study_title {
        font-size: 18px;
        text-align: center;
    }

    .study_text {
        font-size: 16px;
    }
}
</style>