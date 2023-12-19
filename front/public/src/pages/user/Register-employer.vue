<template>
    <div class="block">
        <div class="block_back"></div>
        <div class="block_content">
            <div class="container">
                <div class="staff_title">{{ $t('auth.title') }}</div>
                <div class="login_text">{{ $t('auth.text') }}</div>
            </div>
            <div class="login_inner">
                <div class="container">
                    <div class="login_content">
                        <form @submit.prevent="register" class="login_form">
                            <div class="login_start">
                                <div class="login_form_text">{{ $t('auth.item1') }}</div>
                                <input v-model="user.email" required class="login_form_item" type="email"
                                    :placeholder="$t('auth.item1_holder')">
                                <div class="login_form_text">{{ $t('auth.item2') }}</div>
                                <input v-model="user.password" required class="login_form_item" type="password"
                                    :placeholder="$t('auth.item2_holder')">
                                <label class="login_checkbox">
                                    <input type="checkbox" v-model="rememberMe"> <span>{{ $t('auth.remember') }}</span>
                                </label>
                            </div>
                            <div v-if="User.login_error" class="login_middle">
                                <ul>
                                    <li>{{ $t('auth.error') }}</li>
                                </ul>
                            </div>
                            <div class="login_end">
                                <button type="submit" class="btn">{{ $t('auth.enter') }}</button>
                                <div @click.prevent="employer" class="btn">{{ $t('auth.register_client') }}</div>
                                <div @click.prevent="executor" class="btn">{{ $t('auth.register_worker') }}</div>
                                <div @click.prevent="forgot" class="login_forgot"><span>{{ $t('auth.forgot') }}</span></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form @submit.prevent="register" class="login_form">
        <div>Укажите свое имя:</div>
        <input v-model="user.name" required class="login_form_item" type="text" placeholder="имя">
        <div>Укажите свою фамилию:</div>
        <input v-model="user.surname" required class="login_form_item" type="text" placeholder="фамилия">
        <div>Укажите свой телефон:</div>
        <div> +380 <input v-model="user.phone" required class="login_form_item" type="tel" placeholder="телефон"> </div>
        <div>Укажите свой email:</div>
        <input v-model="user.email" required class="login_form_item" type="email" placeholder="email">
        <div>Укажите страну проживания:</div>
        <select v-model="user.country" class="category_form_title">
            <option v-for="option in Store.countrys" :value="option.id">
                {{ option.title }}
            </option>
        </select>
        <div>Укажите свой город:</div>
        <select v-model="user.city" class="category_form_title">
            <option v-for="option in Store.citys" :value="option.id">
                {{ option.title }}
            </option>
        </select>
        <div>Укажите свой пароль:</div>
        <input v-model="user.password" required class="login_form_item" type="password" placeholder="password">
        <div>Подтвердите свой пароль:</div>
        <input v-model="user.password_confirmation" required class="login_form_item" type="password"
            placeholder="confirm password">
        <button type="submit" class="login_form_btn">register</button>
    </form>
    <div class="register_error" v-for="item in User.register_error" :key="item">
        {{ item[0] }}
    </div>
</template>

<script>
import { useUserStore } from '../../stores/user';
import { useDataStore } from '../../stores/variables';
export default {
    name: "Register-employer",
    data() {
        return {
            user: {}
        }
    },
    setup() {
        const User = useUserStore();
        const Store = useDataStore();
        return { User, Store };
    },
    methods: {
        register() {
            this.user.role = "Наниматель";
            this.user.confirmed = true;
            this.User.CREATE_USER(this.user);
        }
    },
    mounted() {
        this.User.GET_TOKEN();
        this.Store.GET_COUNTRYS(); this.Store.GET_CITYS();
        this.User.register_error = null;
    },
}
</script>
