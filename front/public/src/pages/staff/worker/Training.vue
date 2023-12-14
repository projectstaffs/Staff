<template>
    <div class="block">
        <div class="block_back"></div>
        <div class="block_content">
            <div class="container">
                <div class="staff_title">{{ $t('training.title') }}</div>
                <div class="training_text">{{ $t('training.text') }}</div>
                <div class="training_item">
                    <div class="training_item_inner">
                        <div class="training_start">
                            <div class="training_item_title">{{ $t('training.item1_title') }}</div>
                            <div class="training_item_online">{{ $t('training.online') }}</div>
                            <div class="training_item_text">{{ $t('training.item1_text') }}</div>
                        </div>
                        <div class="training_end">
                            <div class="training_end_start">
                                <div class="training_item_title">{{ $t('training.start') }}</div>
                                <div class="training_item_date">{{ $t('training.item1_date') }}</div>
                                <div class="training_item_access">{{ $t('training.access') }}</div>
                            </div>
                            <div class="training_end_end">
                                <div class="training_item_cost">{{ $t('training.cost') }}</div>
                                <div class="training_item_price">{{ $t('training.item1_price') }}</div>
                            </div>
                        </div>
                    </div>
                    <div @click.prevent="popup" class="btn">{{ $t('training.button') }}</div>
                </div>
                <div class="training_item">
                    <div class="training_item_inner">
                        <div class="training_start">
                            <div class="training_item_title">{{ $t('training.item2_title') }}</div>
                            <div class="training_item_online">{{ $t('training.online') }}</div>
                            <div class="training_item_text">{{ $t('training.item2_text') }}</div>
                        </div>
                        <div class="training_end">
                            <div class="training_end_start">
                                <div class="training_item_title">{{ $t('training.start') }}</div>
                                <div class="training_item_date">{{ $t('training.item2_date') }}</div>
                                <div class="training_item_access">{{ $t('training.access') }}</div>
                            </div>
                            <div class="training_end_end">
                                <div class="training_item_cost">{{ $t('training.cost') }}</div>
                                <div class="training_item_price">{{ $t('training.item2_price') }}</div>
                            </div>
                        </div>
                    </div>
                    <div @click.prevent="popup" class="btn">{{ $t('training.button') }}</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { useI18n } from 'vue-i18n';
export default {
    name: "Training",
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
.training_text {
    margin: 48px 0px 20px 0px;
}

.training_item {
    margin-top: 64px;
    padding: 48px 10px 0px 10px;
    border-top: 1px solid #8E8E8E;
}

.training_item_inner {
    display: flex;
    justify-content: space-between;
    margin-bottom: 64px;
}

.training_start {
    width: 630px;
}

.training_end {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    width: 416px;
    height: 277px;
    padding-left: 60px;
    border-left: 1px solid #8E8E8E;
}

.training_item_title {
    font-size: 24px;
    font-weight: 300;
    text-transform: uppercase;
    margin-bottom: 8px;
}

.training_item_online {
    font-size: 12px;
}

.training_item_text {
    font-size: 16px;
}

.training_item_date {
    margin: 20px 0px 8px 0px;
    font-size: 24px;
}

.training_item_access {
    margin-bottom: 47px;
    font-size: 24px;
    font-weight: 300;
}

.training_item_cost {
    margin-bottom: 24px;
    font-size: 14px;
}

.training_item_price {
    font-size: 32px;
    font-weight: 500;
    line-height: 120%;
}

.training_item .btn {
    margin: 0;
    width: 164px;
    font-size: 14px;
    font-weight: 500;
}
</style>