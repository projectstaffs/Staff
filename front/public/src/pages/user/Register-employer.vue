<template>
    <div class="block">
        <div class="block_back"></div>
        <div class="block_content">
            <div class="container">
                <div class="staff_title">{{ $t('register.title') }}</div>
                <div class="login_text">{{ $t('register.text') }}</div>
            </div>
            <div class="login_inner register_inner">
                <div class="container">
                    <div class="login_content">
                        <form @submit.prevent="register" class="login_form register_form">
                            <div class="login_start">
                                <div class="login_form_text">{{ $t('register.item1') }}</div>
                                <input v-model="name.ua" required class="login_form_item" type="text"
                                    :placeholder="$t('register.item1_holder')">
                                <div class="login_form_text">{{ $t('register.item1_en') }}</div>
                                <input v-model="name.en" required class="login_form_item" type="text"
                                    :placeholder="$t('register.item1_holder_en')">
                                <div class="login_form_text">{{ $t('register.item2') }}</div>
                                <input v-model="surname.ua" required class="login_form_item" type="text"
                                    :placeholder="$t('register.item2_holder')">
                                <div class="login_form_text">{{ $t('register.item2_en') }}</div>
                                <input v-model="surname.en" required class="login_form_item" type="text"
                                    :placeholder="$t('register.item2_holder_en')">
                                <div class="login_form_text">{{ $t('register.item3') }}</div>
                                <div class="register_phone">
                                    <div class="login_form_item login_form_phone auth_arrow">
                                        <div class="login_form_dropdown">
                                            <img :src="selectedOption.icon" alt="" class="login_form_dropdown-icon">
                                            {{ selectedOption.title }}
                                        </div>
                                        <ul class="login_form_dropdown-list">
                                            <li v-for="option in Credential.credentials" :key="option.id"
                                                @click.prevent="selectOption(option)">
                                                <img :src="option.icon" alt="" class="login_form_dropdown-icon">
                                                {{ option.title }}
                                            </li>
                                        </ul>
                                    </div> &nbsp;&nbsp; <input v-model="user.phone" required class="login_form_item"
                                        type="tel" :placeholder="$t('register.item3_holder')">
                                </div>
                                <div class="login_form_text">{{ $t('register.item4') }}</div>
                                <input v-model="user.email" required class="login_form_item" type="email"
                                    :placeholder="$t('register.item4_holder')">
                                <div class="login_form_text">{{ $t('register.item5') }}</div>
                                <select v-model="user.country" class="login_form_item auth_arrow">
                                    <option v-for="option in Store.countrys" :value="option.id">
                                        {{ option.title[locale] }}
                                    </option>
                                </select>
                                <div class="login_form_text">{{ $t('register.item6') }}</div>
                                <select v-model="user.city" class="login_form_item auth_arrow">
                                    <option v-for="option in Store.citys" :value="option.id">
                                        {{ option.title[locale] }}
                                    </option>
                                </select>
                                <div class="login_form_text">{{ $t('register.item7') }}</div>
                                <input v-model="user.password" required class="login_form_item" type="password"
                                    :placeholder="$t('register.item7_holder')">
                                <div class="login_form_text">{{ $t('register.item8') }}</div>
                                <input v-model="user.password_confirmation" required class="login_form_item" type="password"
                                    :placeholder="$t('register.item8_holder')">
                            </div>
                            <div v-if="User.register_error" class="login_middle">
                                <ul v-for="item in User.register_error" :key="item">
                                    <li>{{ item[0][locale] }}</li>
                                </ul>
                            </div>
                            <div class="login_end">
                                <button type="submit" class="btn">{{ $t('register.button') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { useI18n } from 'vue-i18n';
import { useUserStore } from '../../stores/user';
import { useDataStore } from '../../stores/variables';
import { useCredentialStore } from '../../stores/credential';
export default {
    name: "Register-employer",
    data() {
        return {
            user: {},
            name: {},
            surname: {},
            about: { en: "some", ua: "some" },
            gender: { en: "some", ua: "some" },
            animal_work: { en: "some", ua: "some" },
            selectedOption: {},
        }
    },
    setup() {
        const User = useUserStore();
        const Store = useDataStore();
        const Credential = useCredentialStore();
        const { t, locale } = useI18n({ useScope: 'global' });
        return { t, locale, User, Store, Credential };
    },
    methods: {
        register() {
            this.user.name = this.name;
            this.user.surname = this.surname;
            this.user.about = this.about;
            this.user.gender = this.gender;
            this.user.animal_work = this.animal_work;
            this.user.role = "Наниматель";
            this.user.confirmed = true;
            this.user.age = "2023-12-15";
            this.user.phone_code = this.selectedOption.id;

            this.User.CREATE_USER(this.user);
        },
        selectOption(option) {
            this.selectedOption = option;
            //console.log(this.selectedOption.id);
        },
    },
    mounted() {
        this.User.GET_TOKEN();
        this.Store.GET_COUNTRYS(); this.Store.GET_CITYS();
        this.Credential.GET_CREDENTIALS();
        this.User.register_error = null;
    },
}
</script>

<style>
.register_inner {
    min-height: 1040px;
}

.register_form {
    min-height: 1140px;
}
</style>
