<template>
    <div class="block">
        <div class="block_back"></div>
        <div class="block_content">
            <div class="container">
                <div class="staff_title">{{ $t('servicepackages.title') }}</div>
                <div class="servicepackages_inner">
                    <div class="container">
                        <div class="servicepackages_text">{{ $t('servicepackages.text1') }}</div>
                        <div class="servicepackages_text">{{ $t('servicepackages.text2') }}</div>
                    </div>
                    <div class="servicepackages_block">
                        <div class="container">
                            <div class="servicepackages_block_inner">
                                <div class="servicepackages_start">
                                    <div class="servicepackages_title">{{ $t('servicepackages.item1') }}</div>
                                    <ul>
                                        <li>{{ $t('servicepackages.subitem1') }}</li>
                                        <li>{{ $t('servicepackages.subitem2') }}</li>
                                        <li>{{ $t('servicepackages.subitem3') }}</li>
                                        <li>{{ $t('servicepackages.subitem4') }}</li>
                                    </ul>
                                </div>
                                <div class="servicepackages_end">
                                    <div class="servicepackages_title">{{ $t('servicepackages.item2') }}</div>
                                    <ul>
                                        <li>{{ $t('servicepackages.subitem5') }}</li>
                                        <li>{{ $t('servicepackages.subitem6') }}</li>
                                        <li>{{ $t('servicepackages.subitem7') }}</li>
                                        <li>{{ $t('servicepackages.subitem8') }}</li>
                                        <li>{{ $t('servicepackages.subitem9') }}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="btn">{{ $t('servicepackages.button') }}</div>
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
    name: "ServicePackages",
    setup() {
        const { t, locale } = useI18n({ useScope: 'global' });
        return { t, locale };
    },
}

</script>
<style></style>