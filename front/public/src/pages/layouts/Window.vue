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
                    <div @click.prevent="home" class="btn close_btn"> {{ $t('window.button') }} </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Window",
    methods: {
        home() { this.$router.push({ name: "Home" }) }
    },
}
</script>