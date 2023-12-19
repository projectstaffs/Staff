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

<style>
.register_inner {
    min-height: 840px;
}

.register_form {
    min-height: 947px;
}
</style>
