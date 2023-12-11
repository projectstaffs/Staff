<template>
    <div class="block">
        <div class="block_back"></div>
        <div class="block_content">
            <div class="container">
                <div class="staff_title">{{ $t('privacy.title') }}</div>
                <div class="privacy_inner">
                    <div class="privacy_item">{{ $t('privacy.item1') }}</div>
                    <div class="privacy_item">{{ $t('privacy.item2') }}</div>
                    <div class="privacy_item">{{ $t('privacy.item3') }}</div>
                    <div class="privacy_item">{{ $t('privacy.item4') }}</div>
                    <div class="privacy_item">{{ $t('privacy.item5') }}</div>
                    <div class="privacy_item">{{ $t('privacy.item6') }}</div>
                    <div class="privacy_item">{{ $t('privacy.item7') }}</div>
                    <div class="privacy_item">{{ $t('privacy.item8') }}</div>
                    <ol>
                        <li>{{ $t('privacy.subitem1') }}</li>
                        <li>{{ $t('privacy.subitem2') }}</li>
                        <li>{{ $t('privacy.subitem3') }}</li>
                        <li>{{ $t('privacy.subitem4') }}</li>
                        <li>{{ $t('privacy.subitem5') }}</li>
                        <li>{{ $t('privacy.subitem6') }}</li>
                        <li>{{ $t('privacy.subitem7') }}</li>
                        <li>{{ $t('privacy.subitem8') }}</li>
                        <li>{{ $t('privacy.subitem9') }}</li>
                        <li>{{ $t('privacy.subitem10') }}</li>
                        <li>{{ $t('privacy.subitem11') }}</li>
                        <li>{{ $t('privacy.subitem12') }}</li>
                        <li>{{ $t('privacy.subitem13') }}</li>
                    </ol>
                    <div class="privacy_item">{{ $t('privacy.item9') }}</div>
                    <div class="privacy_item">{{ $t('privacy.item10') }}</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { useI18n } from 'vue-i18n';
export default {
    name: "Privacy",
    setup() {
        const { t, locale } = useI18n({ useScope: 'global' });
        return { t, locale };
    },
}
</script>

<style>
.privacy_inner {
    margin-top: 48px;
}

.privacy_item {
    margin-bottom: 20px;
}
</style>