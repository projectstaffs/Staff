<template>
    <div class="account">
        <div class="account_name">{{ name[locale] }} {{ surname[locale] }}</div>
        <div class="account_adress">{{ $t('cabinet.country') }} {{ country[locale] }}</div>
        <div class="account_adress">{{ $t('cabinet.city') }} {{ city[locale] }}</div>
        <div class="account_adress">{{ $t('cabinet.phone') }} {{ User.user.phone_number }}</div>
        <div>{{ about[locale] }}</div>
        <div>{{ gender[locale] }}</div>
        <div>{{ animal_work[locale] }}</div>

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
            gender: {},
            animal_work: {},
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
        this.gender = this.User.user.gender;
        this.animal_work = this.User.user.animal_work;
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

.account_adress {
    margin-bottom: 15px;
}
</style>