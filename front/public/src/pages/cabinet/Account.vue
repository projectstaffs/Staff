<template>
    <div class="account">
        <div v-if="User.user.role === 'Исполнитель'">
            <div v-if="(User.user.is_babysitting === 1) || (User.user.is_babysitting === true)" @click.prevent="babysitting"
                class="admin_sidebar_item">Анкета для няни </div>
            <div v-if="User.user.is_nurse === 1 || (User.user.is_nurse === true)" @click.prevent="nurse"
                class="admin_sidebar_item">Анкета для сиделки </div>
            <div v-if="User.user.is_housekeeper === 1 || (User.user.is_housekeeper === true)" @click.prevent="housekeeper"
                class="admin_sidebar_item">Анкета для домработницы </div>
        </div>

        <div v-if="User.user.role === 'Наниматель'">
            <div @click.prevent="client_babysitting" class="admin_sidebar_item">Вакансия для няни </div>
            <div @click.prevent="client_nurse" class="admin_sidebar_item">Вакансия для сиделки </div>
            <div @click.prevent="client_housekeeper" class="admin_sidebar_item">Вакансия для домработницы </div>
        </div>
        <div class="cabinet_sidebar_title">{{ name[locale] }}</div>

    </div>
</template>

<script>
import { useI18n } from 'vue-i18n';
import { useUserStore } from '../../stores/user';
export default {
    name: "Account",
    data() {
        return {
            photo: '',
            name: {},
        }
    },
    setup() {
        const { t, locale } = useI18n({ useScope: 'global' });
        const User = useUserStore();
        return { t, locale, User };
    },
    methods: {
        babysitting() {
            this.$router.push({ name: "Babysitting" })
        },
        nurse() {
            this.$router.push({ name: "Nurse" })
        },
        housekeeper() {
            this.$router.push({ name: "Housekeeper" })
        },

        client_babysitting() {
            this.$router.push({ name: "Client_baby" })
        },
        client_nurse() {
            this.$router.push({ name: "Client_nurse" })
        },
        client_housekeeper() {
            this.$router.push({ name: "Client_keeper" })
        },
    },
    mounted() {
        this.User.GET_USER();
        this.User.GET_TOKEN();
        this.User.GET_ADMINID();
        this.name = this.User.user.name;
    },
}
</script>

<style>
.account_img {
    width: 400px;
    height: 400px;
}
</style>