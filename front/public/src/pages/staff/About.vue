<template>
    <div class="block">
        <div class="block_back"></div>
        <div class="block_content">
            <div class="container">
                <div class="staff_title">{{ $t('about.title') }}</div>
                <div class="about_description">
                    <div class="about_start">
                        <div class="about_start_img"></div>
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
            </div>
            <div class="about_clients">
                <Carousel :items-to-show="visibleItems" :wrap-around="false">
                    <Slide v-for="slide in clients" :key="slide">
                        <div class="carousel__item">
                            <img :src="slide" class="about_clients_item" alt="">
                        </div>
                    </Slide>
                </Carousel>
            </div>
        </div>
    </div>
</template>

<script>
import { Carousel, Navigation, Slide } from 'vue3-carousel'
import 'vue3-carousel/dist/carousel.css'

export default {
    name: "About",
    data() {
        return {
            clients: ["../../src/assets/img/about/client1.jpg", "../../src/assets/img/about/client2.jpg", "../../src/assets/img/about/client3.jpg", "../../src/assets/img/about/client4.jpg", "../../src/assets/img/about/client5.jpg", "../../src/assets/img/about/client6.jpg",],
            visibleItems: 5,
        }
    },
    components: {
        Carousel,
        Slide,
        Navigation,
    },
    methods: {
        updateVisibleItems() {
            // обновляем значение visibleItems в зависимости от ширины окна
            const windowWidth = window.innerWidth;

            if (windowWidth < 550) {
                this.visibleItems = 1;
            } else if (windowWidth < 825) {
                this.visibleItems = 2;
            } else if (windowWidth < 1100) {
                this.visibleItems = 3;
            } else if (windowWidth < 1350) {
                this.visibleItems = 4;
            } else {
                this.visibleItems = 5;
            }
        },
    },
    mounted() {
        this.updateVisibleItems(); // вызывается при монтировании компонента
        window.addEventListener('resize', this.updateVisibleItems); // подписываемся на событие изменения размера окна
    },
}
</script>

<style>
.about_description {
    display: flex;
    justify-content: space-between;
    margin: 48px 0px 70px 0px;
}

.about_start {
    width: 503px;
    height: 310px;
    margin-top: 10px;
    margin-right: 10px;
    padding: 10px;
    border-radius: 10px;
    background: #1E1510;
}

.about_start_img {
    width: 100%;
    height: 100%;
    background: url(../../assets/img/about/prev.jpg) no-repeat center;
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
    position: relative;
    height: 106px;
}

.about_clients ol {
    margin: 0;
}

.about_clients::before,
.about_clients::after {
    content: '';
    width: calc((100% - 1108px)/2);
    height: 106px;
    position: absolute;
    top: 0;
}

.about_clients::before {
    left: 0;
    background: linear-gradient(90deg, #FFF0D2 29.52%, rgba(255, 240, 210, 0.52) 71.69%, rgba(255, 240, 210, 0.00) 100%);
    z-index: 2;
}

.about_clients::after {
    right: 0;
    background: linear-gradient(270deg, #FFF0D2 29.52%, rgba(255, 240, 210, 0.52) 71.69%, rgba(255, 240, 210, 0.00) 100%);
}

.about_clients_item {
    width: 262px;
    height: 106px;
    border: 1px solid #5C4538;
}

.carousel:hover {
    cursor: grab;
}

.carousel:active {
    cursor: grabbing;
}

.carousel__item {
    height: 106px;
}

@media (max-width: 1400px) {}

@media (max-width: 992px) {
    .about_description {
        margin: 30px 0 10px;
    }

    .about_clients {
        margin-top: 32px;
    }
}

@media (max-width: 767px) {
    .about_description {
        flex-direction: column;
    }

    .about_start {
        width: 100%;
        margin: 0 0 10px 0;
    }

    .about_end {
        width: 100%;
    }

    .about_start_img {
        max-width: 483px;
        margin: 0 auto;
    }

    .about_end p {
        margin-bottom: 10px;
    }
}

@media (max-width: 576px) {
    .about_description {
        margin-top: 20px;
    }

    .about_end {
        font-size: 16px;
    }
}
</style>