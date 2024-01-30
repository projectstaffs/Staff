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
export default {
    name: "Privacy",
}
</script>

<style>
.privacy_inner {
    margin-top: 48px;
}

.privacy_item {
    margin-bottom: 20px;
}

@media (max-width: 992px) {
    .privacy_inner {
        margin-top: 24px;
    }
}

@media (max-width: 767px) {
    .privacy_item {
        margin-bottom: 10px;
    }

    .privacy_inner ol {
        margin: 9px 0;
        padding-left: 20px;
    }
}

@media (max-width: 576px) {
    .privacy_inner {
        margin-top: 12px;
        font-size: 16px;
    }
}
</style>