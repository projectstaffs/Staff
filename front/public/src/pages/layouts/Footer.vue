<template>
    <section class="footer">
        <div class="container">
            <div class="footer_top">
                <div class="footer_top_start">
                    <img src="../../assets/img/footer/footer_logo.svg" alt="" class="footer_img">
                </div>
                <div class="footer_top_middle"> {{ $t('footer.text') }} </div>
                <div class="footer_top_end">
                    <img src="../../assets/img/footer/socials/linkedin.svg" alt="" class="footer_top_item">
                    <img src="../../assets/img/footer/socials/instagram.svg" alt="" class="footer_top_item">
                    <img src="../../assets/img/footer/socials/youtube.svg" alt="" class="footer_top_item">
                    <img src="../../assets/img/footer/socials/facebook.svg" alt="" class="footer_top_item">
                </div>
            </div>
            <div class="footer_bottom">
                <div class="footer_bottom_item"> {{ $t('footer.item1') }} </div>
                <div class="footer_bottom_item"> {{ $t('footer.item2') }} </div>
                <div class="footer_bottom_item"> {{ $t('footer.item3') }} </div>
                <div class="footer_bottom_item"> {{ $t('footer.item4') }} </div>
                <div class="footer_bottom_item"> {{ $t('footer.item5') }} </div>
                <div class="footer_bottom_item"> {{ $t('footer.item5') }} </div>
                <div class="footer_bottom_item"> {{ $t('footer.item7') }} </div>
                <div class="footer_bottom_item"> {{ $t('footer.item8') }} </div>
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
    display: flex;
    justify-content: space-between;
    color: #FFF0D2;
    height: 110px;
    margin-bottom: 32px;
}

.footer_top_start,
.footer_top_middle,
.footer_top_end {
    display: flex;
    align-items: center;
}

.footer_img {
    cursor: pointer;
}

.footer_top_end {
    width: 182px;
    justify-content: space-between;
}

.footer_top_item {
    cursor: pointer;
    transition: scale 0.3s;
}

.footer_top_item:hover {
    scale: 1.2;
}

.footer_bottom {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    padding-top: 32px;
    color: rgba(255, 240, 210, 0.70);
    font-size: 16px;
    font-weight: 300;
    border-top: 1px solid #8E8E8E;
}

.footer_bottom_item {
    cursor: pointer;
    width: 262px;
    transition: color 0.3s;
}

.footer_bottom_item:hover {
    color: #FFF0D2;
}
</style>