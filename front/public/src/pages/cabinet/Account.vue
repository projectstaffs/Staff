<template>
    <div class="account">
        <div class="account_name">{{ name[locale] }} {{ surname[locale] }}</div>
        <div class="account_item">{{ $t('cabinet.country') }} {{ country[locale] }}</div>
        <div class="account_item">{{ $t('cabinet.city') }} {{ city[locale] }}</div>
        <div class="account_item">{{ $t('cabinet.phone') }} {{ User.user.phone_number }}</div>
        <div class="account_item">{{ $t('cabinet.email') }} {{ User.user.email }}</div>
        <div v-if="User.user.role === 'Исполнитель'">
            <div class="account_item">{{ $t('cabinet.gender') }} {{ User.user.gender[locale] }}</div>
            <div class="account_item">{{ $t('cabinet.age') }} {{ User.user.current_age }}</div>
            <div class="account_item">{{ $t('cabinet.animal') }} {{ User.user.animal_work[locale] }}</div>
            <div class="account_item">
                <div class="account_item_title">{{ $t('cabinet.about') }}</div>
                <div class="account_item_text">{{ about[locale] }}</div>
            </div>
        </div>
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
            surname: {},
            about: {},
            country: {},
            city: {},
        }
    },
    setup() {
        const { t, locale } = useI18n({ useScope: 'global' });
        const User = useUserStore();
        return { t, locale, User };
    },
    methods: {

    },
    mounted() {
        this.User.GET_USER();
        this.User.GET_TOKEN();
        this.name = this.User.user.name;
        this.surname = this.User.user.surname;
        this.about = this.User.user.about;
        this.country = this.User.user.country_title.title;
        this.city = this.User.user.city_title.title;
    },
}
</script>

<style>
.account_name {
    font-size: 24px;
    font-weight: 300;
    text-transform: uppercase;
    margin-bottom: 15px;
}

.account_item {
    margin-bottom: 15px;
}

.account_item_title {
    text-align: center;
    margin-bottom: 16px;
}

.account_item_text {
    font-size: 16px;
}
</style>