<template>
    <section class="footer">
        <div class="container">
            <div class="footer_top">
                <div @click.prevent="home" class="footer_top_start">
                    <img src="../../assets/img/footer/footer_logo.svg" alt="" class="footer_img inactive">
                </div>
                <div class="footer_top_middle"> {{ $t('footer.text') }} </div>
                <div class="footer_top_end">
                    <a href="#" class="footer_top_link" aria-label="linkedin"><img
                            src="../../assets/img/footer/socials/linkedin.svg" alt="" class="footer_top_item"></a>
                    <a href="#" class="footer_top_link" aria-label="instagram"><img
                            src="../../assets/img/footer/socials/instagram.svg" alt="" class="footer_top_item"></a>
                    <a href="#" class="footer_top_link" aria-label="youtube"><img
                            src="../../assets/img/footer/socials/youtube.svg" alt="" class="footer_top_item"></a>
                    <a href="#" class="footer_top_link" aria-label="facebook"><img
                            src="../../assets/img/footer/socials/facebook.svg" alt="" class="footer_top_item"></a>
                </div>
            </div>
            <div class="footer_bottom">
                <div data-color="about" @click.prevent="about" class="footer_bottom_item"> {{ $t('footer.item1') }} </div>
                <div @click.prevent="homeStaff" data-color="home_staff" class="footer_bottom_item"> {{ $t('footer.item2') }}
                </div>
                <div data-color="worker" @click.prevent="seekers" class="footer_bottom_item"> {{ $t('footer.item3') }}
                </div>
                <div @click.prevent="privacy" class="footer_bottom_item"> {{ $t('footer.item4') }} </div>
                <div @click.prevent="contacts" class="footer_bottom_item"> {{ $t('footer.item5') }} </div>
                <div @click.prevent="service" data-color="service" class="footer_bottom_item"> {{ $t('footer.item6') }}
                </div>
                <div @click.prevent="homeStaff" data-color="home_staff" class="footer_bottom_item"> {{ $t('footer.item7') }}
                </div>
                <div @click.prevent="contract" class="footer_bottom_item"> {{ $t('footer.item8') }} </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: "Footer",
    methods: {
        home() { this.$router.push({ name: "Home" }) },
        about() { this.$router.push({ name: "About" }) },
        contacts() { this.$router.push({ name: "Contacts" }) },
        privacy() { this.$router.push({ name: "Privacy" }) },
        contract() { this.$router.push({ name: "Contract" }) },
        service() { this.$router.push({ name: "Service" }) },
        seekers() { this.$router.push({ name: "Seekers" }) },
        homeStaff() { this.$router.push({ name: "HomeStaff" }) },
    },
}
</script>

<style>
.footer {
    width: 100%;
    background: var(--bgbg-brown, #1E1510);
    height: 0px;
    overflow: hidden;
}

.footer.footer_show {
    height: 389px;
    padding: 80px 24px;
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

.footer_top_link {
    height: 32px;
}

.footer_top_item {
    width: 32px;
    height: 32px;
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

@media (max-width: 992px) {
    .footer {
        padding-top: 40px;
        padding-bottom: 40px;
    }

    .footer_img {
        width: 80px;
        height: 80px;
    }

    .footer_top_end {
        width: 150px;
    }

    .footer_top_middle {
        font-size: 16px;
    }

    .footer_bottom_item {
        width: 200px;
    }
}

@media (max-width: 767px) {
    .footer {
        padding: 20px 0px;
    }

    .footer_top_middle {
        text-align: center;
        margin: 0 10px;
    }

    .footer_top {
        height: 80px;
        margin-bottom: 16px;
    }

    .footer_bottom {
        padding-top: 16px;
    }
}

@media (max-width: 576px) {
    .footer {
        padding-top: 10px;
    }

    .footer_top {
        height: auto;
        align-items: center;
        flex-direction: column;
    }

    .footer_top_middle {
        margin-bottom: 15px;
    }

    .footer_top_end {
        width: 182px;
    }

    .footer_bottom {
        justify-content: center;
    }
}

@media (max-width: 436px) {
    .footer_bottom {
        text-align: center;
    }
}
</style>
