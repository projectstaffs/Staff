<template>
    <section class="footer">
        <div class="container">
            <div class="footer_top">
                <div class="footer_top_start"></div>
                <div class="footer_top_middle"> {{ $t('footer.text') }} </div>
                <div class="footer_top_end"></div>
            </div>
            <div class="footer_bottom">
                <div class="footer_bottom_item"> {{ $t('footer.item1') }} </div>
                <div class="footer_bottom_item"> {{ $t('footer.item1') }} </div>
                <div class="footer_bottom_item"> {{ $t('footer.item1') }} </div>
                <div class="footer_bottom_item"> {{ $t('footer.item1') }} </div>
                <div class="footer_bottom_item"> {{ $t('footer.item1') }} </div>
                <div class="footer_bottom_item"> {{ $t('footer.item1') }} </div>
                <div class="footer_bottom_item"> {{ $t('footer.item1') }} </div>
                <div class="footer_bottom_item"> {{ $t('footer.item1') }} </div>
            </div>
        </div>
    </section>
</template>

<script>
import { useI18n } from 'vue-i18n';
export default {
    name: "Footer",
    setup() {
        const { t, locale } = useI18n({ useScope: 'global' });
        return { t, locale };
    },
}
</script>

<style>
.footer {
    padding: 80px 24px;
    background: var(--bgbg-brown, #1E1510);
}

.footer_top {
    color: #FFF0D2;
    text-align: center;
}

.footer_bottom {
    color: rgba(255, 240, 210, 0.70);
    font-size: 16px;
    font-weight: 300;
}
</style>