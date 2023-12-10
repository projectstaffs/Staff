<template>
    <div class="about">
        <div class="about_back"></div>
        <div class="about_content">
            <div class="container">
                <div class="staff_title">{{ $t('about.title') }}</div>
                <div class="about_description">
                    <div class="about_start">
                        <img src="../../assets/img/about/prev.jpg" alt="" class="about_start_img">
                    </div>
                    <div class="about_end">
                        <p>{{ $t('about.item1') }}</p>
                        <p>{{ $t('about.item2') }}</p>
                        <p>{{ $t('about.item3') }}</p>
                    </div>
                </div>
                <div class="staff_title">{{ $t('about.title_middle') }}</div>
            </div>
            <div class="main_point_items">
                <div class="container">
                    <div class="main_point_inner">
                        <div class="main_point_item">
                            <img src="../../assets/img/main/icons/users.svg" alt="" class="main_point_logo">
                            <div class="main_point_text"> {{ $t('main.end_item1') }} </div>
                        </div>
                        <div class="main_point_item">
                            <img src="../../assets/img/main/icons/organization.svg" alt="" class="main_point_logo">
                            <div class="main_point_text"> {{ $t('main.end_item2') }} </div>
                        </div>
                        <div class="main_point_item">
                            <img src="../../assets/img/main/icons/phonebook-contacts.svg" alt="" class="main_point_logo">
                            <div class="main_point_text"> {{ $t('main.end_item3') }} </div>
                        </div>
                        <div class="main_point_item">
                            <img src="../../assets/img/main/icons/user-check.svg" alt="" class="main_point_logo">
                            <div class="main_point_text"> {{ $t('main.end_item4') }} </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="staff_title">{{ $t('about.title_bottom') }}</div>
                <div class="about_clients">
                    <img src="../../assets/img/about/client1.jpg" alt="" class="about_clients_item">
                    <img src="../../assets/img/about/client2.jpg" alt="" class="about_clients_item">
                    <img src="../../assets/img/about/client3.jpg" alt="" class="about_clients_item">
                    <img src="../../assets/img/about/client4.jpg" alt="" class="about_clients_item">
                </div>
            </div>

        </div>
    </div>
</template>

<script>
import { useI18n } from 'vue-i18n';
export default {
    name: "About",
    setup() {
        const { t, locale } = useI18n({ useScope: 'global' });
        return { t, locale };
    },
}
</script>

<style>
.about {
    background: var(--bgbg-0, #FFF0D2);
    padding: 120px 0px;
    position: relative;
}

.about_back {
    width: 100%;
    height: 393px;
    position: absolute;
    left: 0;
    top: 0;
    background: linear-gradient(180deg, #AE9B83 0%, rgba(255, 240, 210, 0.50) 95.67%);
}

.about_content {
    position: relative;
    padding-top: 80px;
    border-top: 1px solid rgba(0, 0, 0, 0.20);
}

.about_description {
    display: flex;
    justify-content: space-between;
    margin: 48px 0px 70px 0px;
}

.about_start {
    width: 503px;
    height: 310px;
    margin-top: 10px;
    padding: 10px;
    border-radius: 10px;
    background: #1E1510;
}

.about_start_img {
    border-radius: 10px;
}

.about_end {
    width: 564px;
}

.about_end p {
    margin-bottom: 20px;
}

.about_clients {
    margin-top: 64px;
    display: flex;
    justify-content: space-between;
}
</style>