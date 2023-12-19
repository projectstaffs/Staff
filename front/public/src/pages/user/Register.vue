<template>
    <div class="block">
        <div class="block_back"></div>
        <div class="block_content">
            <div class="container">
                <div class="staff_title">{{ $t('register.title') }}</div>
                <div class="login_text">{{ $t('register.text') }}</div>
            </div>
            <div class="login_inner register_fix_inner">
                <div class="container">
                    <div class="login_content">
                        <form @submit.prevent="register" class="login_form register_fix_form">
                            <div class="login_start">
                                <div class="register_title">{{ $t('register.ask') }}</div>
                                <div class="register_boxitem"> <input type="checkbox" v-model="user.is_babysitting">
                                    <span>{{
                                        $t('register.ask_item1') }}</span>
                                </div>
                                <div class="register_boxitem"> <input type="checkbox" v-model="user.is_nurse">
                                    <span>{{
                                        $t('register.ask_item2') }}</span>
                                </div>
                                <div class="register_boxitem reg_last"> <input type="checkbox"
                                        v-model="user.is_housekeeper">
                                    <span>{{
                                        $t('register.ask_item3') }} </span>
                                </div>

                                <div class="login_form_text">{{ $t('register.item1') }}</div>
                                <input v-model="user.name" required class="login_form_item" type="text"
                                    :placeholder="$t('register.item1_holder')">
                                <div class="login_form_text">{{ $t('register.item2') }}</div>
                                <input v-model="user.surname" required class="login_form_item" type="text"
                                    :placeholder="$t('register.item2_holder')">
                                <div class="login_form_text">{{ $t('register.item3') }}</div>
                                <div class="register_phone">
                                    <span>+380</span> &nbsp;&nbsp; <input v-model="user.phone" required
                                        class="login_form_item" type="tel" :placeholder="$t('register.item3_holder')">
                                </div>
                                <div class="login_form_text">{{ $t('register.item4') }}</div>
                                <input v-model="user.email" required class="login_form_item" type="email"
                                    :placeholder="$t('register.item4_holder')">
                                <div class="login_form_text">{{ $t('register.item9') }}</div>
                                <select v-model="user.gender" class="login_form_item auth_arrow">
                                    <option v-for="option in gender" :value="option.value">
                                        {{ option.value[locale] }}
                                    </option>
                                </select>
                                <div class="login_form_text">{{ $t('register.item10') }}</div>
                                <input v-model="user.age" required class="login_form_item" type="date"
                                    :placeholder="$t('register.item10_holder')">
                                <div class="login_form_text">{{ $t('register.item11') }}</div>
                                <select v-model="user.animal_work" class="login_form_item auth_arrow">
                                    <option v-for="option in work" :value="option.value">
                                        {{ option.value[locale] }}
                                    </option>
                                </select>
                                <div class="login_form_text">{{ $t('register.item12') }}</div>
                                <textarea v-model="user.about" required class="login_form_item register_textarea"
                                    :placeholder="$t('register.item12_holder')"></textarea>
                                <div class="login_form_text">{{ $t('register.item5') }}</div>
                                <select v-model="user.country" class="login_form_item auth_arrow">
                                    <option v-for="option in Store.countrys" :value="option.id">
                                        {{ option.title }}
                                    </option>
                                </select>
                                <div class="login_form_text">{{ $t('register.item6') }}</div>
                                <select v-model="user.city" class="login_form_item auth_arrow">
                                    <option v-for="option in Store.citys" :value="option.id">
                                        {{ option.title }}
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
                                    <li>{{ item[0] }}</li>
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
export default {
    name: "Register",
    data() {
        return {
            user: {},
            gender: [
                { value: { en: "Man", ua: "Чоловік" } },
                { value: { en: "Woman", ua: "Жінка" } }
            ],
            work: [
                { value: { en: "Yes", ua: "Так" } },
                { value: { en: "No", ua: "Ні" } }
            ],
        }
    },
    setup() {
        const User = useUserStore();
        const Store = useDataStore();
        const { t, locale } = useI18n({ useScope: 'global' });
        return { t, locale, User, Store };
    },
    methods: {
        register() {
            this.user.role = "Исполнитель";
            this.user.confirmed = true;
            this.User.CREATE_USER(this.user);
            console.log(this.user);
        },
    },
    mounted() {
        this.user.is_babysitting = false; this.user.is_nurse = false; this.user.is_housekeeper = false;
        this.User.GET_TOKEN();
        this.Store.GET_COUNTRYS();
        this.Store.GET_CITYS();
        this.User.register_error = null;
    },
}
</script>

<style>
.register_fix_inner {
    min-height: 1410px;
}

.register_fix_form {
    min-height: 1517px;
}

.register_title {
    text-align: center;
    margin-bottom: 5px;
}

.register_boxitem {
    font-size: 16px;
    display: flex;
    align-items: center;
}

.register_boxitem input {
    width: 20px;
    height: 20px;
    margin-right: 10px;
}

.reg_last {
    margin-bottom: 10px;
}
</style>