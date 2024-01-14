<template>
    <div class="block">
        <div class="block_back"></div>
        <div class="block_content">
            <div class="container">
                <div class="staff_title">{{ $t('interview.title') }}</div>
                <div class="interview_text">{{ $t('interview.text') }}</div>
                <div class="interview_subtitle">{{ $t('interview.subtitle') }}</div>
                <div class="interview_item">
                    <div class="interview_item_title">{{ $t('interview.item1_title') }}</div>
                    <div class="interview_item_text">{{ $t('interview.item1_text') }}</div>
                </div>
                <div class="interview_item">
                    <div class="interview_item_title">{{ $t('interview.item2_title') }}</div>
                    <div class="interview_item_text">{{ $t('interview.item2_text') }}</div>
                </div>
                <div class="interview_item">
                    <div class="interview_item_title">{{ $t('interview.item3_title') }}</div>
                    <ul>
                        <li class="interview_item_text">{{ $t('interview.item3_text1') }}</li>
                        <li class="interview_item_text">{{ $t('interview.item3_text2') }}</li>
                    </ul>
                </div>
                <div class="interview_item">
                    <div class="interview_item_title">{{ $t('interview.item4_title') }}</div>
                    <div class="interview_item_text">{{ $t('interview.item4_text') }}</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Interview",
}
</script>

<style>
.interview_text {
    margin: 48px 0px 64px 0px;
}

.interview_subtitle {
    margin-bottom: 8px;
    font-size: 32px;
    font-weight: 500;
    line-height: 120%;
    text-align: center;
}

.interview_item {
    padding: 36px 15px 36px 48px;
    border-radius: 20px;
    border: 1px solid #8E8E8E;
    margin-top: 40px;
}

.interview_item_title {
    color: #000;
    font-size: 24px;
    font-weight: 500;
    line-height: 120%;
    margin-bottom: 24px;
}

@media (max-width: 992px) {
    .interview_text {
        margin: 32px 0;
    }

    .interview_item {
        margin-top: 20px;
    }
}

@media (max-width: 767px) {
    .interview_text {
        margin: 16px 0;
    }

    .interview_item {
        padding: 20px;
    }

    .interview_item ul {
        margin-bottom: 0;
        padding-left: 20px;
    }

    .interview_subtitle {
        font-size: 24px;
    }

    .interview_item_title {
        margin-bottom: 12px;
    }
}

@media (max-width: 576px) {
    .interview_text {
        font-size: 16px;
    }

    .interview_item_title {
        font-size: 18px;
    }

    .interview_item_text {
        font-size: 16px;
    }
}
</style>