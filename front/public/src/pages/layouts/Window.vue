<template>
    <div class="window">
        <div class="window_wrapper">
            <div class="window_inner">
                <div class="window_content">
                    <img src="../../assets/img/info-circle.svg" alt="" class="window_img">
                    <button class="window_btn"></button>
                    <div class="window_title"> {{ $t('window.title') }} </div>
                    <div class="window_subtitle"> {{ $t('window.subtitle') }} </div>
                    <div class="window_end"> {{ $t('window.end') }} </div>
                    <div class="btn"> {{ $t('window.button') }} </div>
                </div>
            </div>
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

    pointer-events: none;
    opacity: 0;
    visibility: hidden;
}

.window.is_active {
    pointer-events: auto;
    opacity: 1;
    visibility: visible;
}

.window_wrapper {
    display: table;
    height: 100%;
    width: 100%;
}

.window_inner {
    display: table-cell;
    vertical-align: middle;
    padding: 30px;
}

.window_content {
    display: flex;
    max-width: 720px;
    padding: 40px 64px;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    border-radius: 20px;
    background: #5C4538;
    color: #FFF0D2;
    position: relative;
    margin: 0 auto;
}

.window_img {
    position: absolute;
    left: 41px;
    top: 24px;
}

.window_btn {
    position: relative;
    border: none;
    cursor: pointer;
    background: none;
    padding: 0;
    width: 50px;
    height: 50px;
    display: inline-block;
    margin-left: auto;
    margin-top: -15px;
}

.window_btn::before,
.window_btn::after {
    content: '';
    background: rgba(255, 240, 210, 0.30);
    width: 3px;
    height: 45px;
    position: absolute;
    border-radius: 10px;
    top: 50%;
    transition: background 0.3s;
}

.window_btn::before {
    transform: translateY(-50%) rotate(45deg);
}

.window_btn::after {
    transform: translateY(-50%) rotate(-45deg);
}

.window_btn:hover::before,
.window_btn:hover::after {
    background: rgba(255, 240, 210, 1);
}

.window_title {
    margin-top: 15px;
}

.window_title,
.window_subtitle,
.window_end {
    margin-bottom: 40px;
    font-size: 24px;
    font-weight: 300;
}

.window_content .btn {
    width: 122px;
    font-size: 14px;
    font-weight: 500;
    transition: scale 0.3s;
}

.window_content .btn:hover {
    scale: 1.2;
    background: #1E1510;
}
</style>