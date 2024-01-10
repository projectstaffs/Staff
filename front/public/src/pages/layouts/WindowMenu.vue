<template>
    <div class="window_menu">
        <div class="window_wrapper">
            <div class="window_inner">
                <div class="window_content">
                    <button class="window_btn"></button>
                    <ul class="window_menu_items">
                        <li v-if="User.token" @click.prevent="cabinet" class="header_end_item">
                            <a class="header_btn" href="#">{{ $t('header.item3') }}</a>
                        </li>
                        <li @click.prevent="homeStaff" class="header_end_item">
                            <a class="header_btn" id="home_staff" href="#">{{ $t('header.item1') }}</a>
                        </li>
                        <li @click.prevent="service" class="header_end_item">
                            <a class="header_btn" id="service" href="#">{{ $t('header.item2') }}</a>
                        </li>
                        <li @click.prevent="seekers" class="header_end_item">
                            <a class="header_btn" id="worker" href="#">{{ $t('header.item4') }}</a>
                        </li>
                        <li @click.prevent="about" class="header_end_item">
                            <a class="header_btn" id="about" href="#">{{ $t('header.item5') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { useUserStore } from '../../stores/user'
export default {
    name: "WindowMenu",
    setup() {
        const User = useUserStore();
        return { User };
    },
    mounted() {
        this.User.GET_TOKEN();
    },
}
</script>

<style>
.window_menu_items {
    width: 100%;
    margin: 0;
    padding: 0;
}

.window_menu_items .header_btn {
    width: 100%;
}
</style>