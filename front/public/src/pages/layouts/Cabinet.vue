<template>
    <div class="block">
        <div class="block_back"></div>
        <div class="block_content">
            <div class="container">
                <div class="staff_title">{{ $t('personal.title') }}</div>
                <div class="cabinet">
                    <div class="cabinet_sidebar">
                        <div class="cabinet_box">

                        </div>
                        <img v-if="photo" class="cabinet_img" :src="photo" alt="">
                        <div @click.prevent="account" class="admin_sidebar_item">Учетная запись</div>
                        <div @click.prevent="edit" class="admin_sidebar_item">Редактировать профиль</div>
                        <div @click.prevent="myphoto" class="admin_sidebar_item">Моя фотография</div>
                    </div>
                    <div class="cabinet_main">
                        <router-view />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Cabinet",
    data() {
        return {
            photo: '',
        }
    },
    methods: {
        back() {
            this.$router.push({ name: "Home" })
        },
        account() {
            this.$router.push({ name: "Account" })
        },
        mailbox() {
            this.$router.push({ name: "Mailbox" })
        },
        myphoto() {
            this.$router.push({ name: "Myphoto" })
        },
        edit() {
            this.$router.push({ name: "Edit" })
        },
        vacancies() {
            this.$router.push({ name: "Vacancies" })
        },
        credentials() {
            this.$router.push({ name: "Credentials" })
        },
        logout() {
            this.User.LOGOUT_USER();
        },
    },
    mounted() {
        this.photo = localStorage.user_image;
    },
}
</script>

<style>
.cabinet {
    width: 100%;
    display: flex;
    margin-top: 48px;
    border-top: 1px solid #8E8E8E;
    padding-top: 32px;
}

.cabinet_sidebar {
    width: 307px;
    padding-right: 37px;
    border-right: 1px solid #8E8E8E;
}

.cabinet_box {
    width: 250px;
    height: 250px;
}

.cabinet_main {
    padding: 0 64px;
    flex: 1;
}
</style>

