<template>
    <div class="window">
        <div class="window_content">
            <div class="window_title"> {{ $t('window.title') }} </div>
            <div class="window_subtitle"> {{ $t('window.subtitle') }} </div>
            <div class="window_end"> {{ $t('window.end') }} </div>
            <div class="btn"> {{ $t('window.button') }} </div>
        </div>
    </div>
</template>

<script>
import { useI18n } from 'vue-i18n';
export default {
    name: "Window",
    setup() {
        const { t, locale } = useI18n({ useScope: 'global' });
        return { t, locale };
    },
}
</script>

<style>
.window {
    position: fixed;
    z-index: 10;
    top: 0;
    left: 0;
    background: rgba(30, 21, 16, .7);
    width: 100%;
    height: 100%;
    overflow: auto;
}

.window_content {
    display: flex;
    width: 720px;
    padding: 40px 64px;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    border-radius: 20px;
    background: #5C4538;
    color: #FFF0D2;
}
</style>