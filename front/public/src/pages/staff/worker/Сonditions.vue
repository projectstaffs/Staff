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
                <ul>
                    <li class="conditions_start_item">{{ $t('conditions.start_item1') }}</li>
                    <li class="conditions_start_item">{{ $t('conditions.start_item2') }}</li>
                    <li class="conditions_start_item">{{ $t('conditions.start_item3') }}</li>
                    <li class="conditions_start_item">{{ $t('conditions.start_item4') }}</li>
                    <li class="conditions_start_item">{{ $t('conditions.start_item5') }}</li>
                </ul>
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
                        <div class="conditions_bottom_start">
                            <div class="conditions_bottom_title">{{ $t('conditions.bottom_title') }}</div>
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
                        <div class="conditions_bottom_end">{{ $t('conditions.bottom_end') }}</div>
                    </div>
                </div>
            </div>
            <div class="conditions_end">
                <div class="conditions_end_title">{{ $t('conditions.end_title') }}</div>
                <div class="conditions_end_text">{{ $t('conditions.end_text') }}</div>
                <div class="btn">{{ $t('conditions.end_button') }}</div>
            </div>
        </div>
    </div>
</template>

<script>
import { useI18n } from 'vue-i18n';
export default {
    name: "Conditions",
    setup() {
        const { t, locale } = useI18n({ useScope: 'global' });
        return { t, locale };
    },
}
</script>

<style></style>