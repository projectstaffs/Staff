<template>
    <div class="edit_title">{{ $t('cabinet.edit_title') }}</div>

    <form @submit.prevent="change_User" class="login_form edit_fix">
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
                        <li v-for="option in Credential.credentials" :key="option.id" @click.prevent="selectOption(option)">
                            <img :src="option.icon" alt="" class="login_form_dropdown-icon">
                            {{ option.title }}
                        </li>
                    </ul>
                </div> &nbsp;&nbsp; <input v-model="User.user.phone" required class="login_form_item" type="tel"
                    :placeholder="$t('register.item3_holder')">
            </div>
            <div class="login_form_text">{{ $t('register.item4') }}</div>
            <input v-model="User.user.email" required class="login_form_item" type="email"
                :placeholder="$t('register.item4_holder')">

            <div v-if="User.user.role === 'Исполнитель'">
                <div class="login_form_text">{{ $t('register.item9') }}</div>
                <select v-model="User.user.gender" class="login_form_item auth_arrow">
                    <option v-for="option in gender_items" :value="option.value">
                        {{ option.value[locale] }}
                    </option>
                </select>
                <div class="login_form_text">{{ $t('register.item10') }}</div>
                <input v-model="User.user.age" required class="login_form_item" type="date">
                <div class="login_form_text">{{ $t('register.item11') }}</div>
                <select v-model="User.user.animal_work" class="login_form_item auth_arrow">
                    <option v-for="option in work" :value="option.value">
                        {{ option.value[locale] }}
                    </option>
                </select>
                <div class="login_form_text">{{ $t('register.item12') }}</div>
                <textarea v-model="about.ua" required class="login_form_item register_textarea"
                    :placeholder="$t('register.item12_holder')"></textarea>
                <div class="login_form_text">{{ $t('register.item12_en') }}</div>
                <textarea v-model="about.en" required class="login_form_item register_textarea"
                    :placeholder="$t('register.item12_holder_en')"></textarea>
            </div>

            <div class="login_form_text">{{ $t('register.item5') }}</div>
            <select v-model="User.user.country" class="login_form_item auth_arrow">
                <option v-for="option in Store.countrys" :value="option.id">
                    {{ option.title[locale] }}
                </option>
            </select>
            <div class="login_form_text">{{ $t('register.item6') }}</div>
            <select v-model="User.user.city" class="login_form_item auth_arrow">
                <option v-for="option in Store.citys" :value="option.id">
                    {{ option.title[locale] }}
                </option>
            </select>
            <div class="login_form_text">{{ $t('register.item7') }}</div>
            <input v-model="User.user.password" required class="login_form_item" type="password"
                :placeholder="$t('register.item7_holder')">
            <div class="login_form_text">{{ $t('register.item8') }}</div>
            <input v-model="User.user.password_confirmation" required class="login_form_item" type="password"
                :placeholder="$t('register.item8_holder')">
        </div>
        <div v-if="User.register_error" class="login_middle">
            <ul v-for="item in User.register_error" :key="item">
                <li>{{ item[0][locale] }}</li>
            </ul>
        </div>
        <div class="login_end">
            <button type="submit" class="btn">{{ $t('cabinet.edit_btn') }}</button>
        </div>
    </form>
</template>

<script>
import { useI18n } from 'vue-i18n';
import { useUserStore } from '../../stores/user';
import { useDataStore } from '../../stores/variables';
import { useCredentialStore } from '../../stores/credential';
export default {
    name: "Edit",
    data() {
        return {
            gender_items: [
                { value: { en: "Man", ua: "Чоловік" } },
                { value: { en: "Woman", ua: "Жінка" } }
            ],
            work: [
                { value: { en: "Yes", ua: "Так" } },
                { value: { en: "No", ua: "Ні" } }
            ],
            name: {},
            surname: {},
            about: {},
            test: {},
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
        change_User() {
            this.User.user.name = this.name;
            this.User.user.surname = this.surname;
            this.User.user.about = this.about;
            this.User.user.phone_code = this.selectedOption.id;
            this.User.UPDATE_USER(this.User.user);
        },
        selectOption(option) {
            this.selectedOption = option;
            //console.log(this.selectedOption.id);
        },
    },
    mounted() {
        //this.User.GET_TOKEN();
        this.User.GET_USER();
        this.Store.GET_COUNTRYS();
        this.Store.GET_CITYS();
        this.Credential.GET_CREDENTIALS();
        this.User.register_error = null;

        this.name = this.User.user.name;
        this.surname = this.User.user.surname;
        this.about = this.User.user.about;
        this.selectedOption.title = this.User.user.phone_code.title;
        this.selectedOption.icon = this.User.user.phone_code.icon;
    },
}
</script>

<style>
.edit_fix {
    position: static;
    transform: none;
    min-height: 1150px;
}
</style>
