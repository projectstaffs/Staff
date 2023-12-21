<template >
    <form @submit.prevent="change_ClientUser" class="login_form">
        <div>Укажите свое имя:</div>
        <input v-model="User.user.name" required class="login_form_item" type="text" placeholder="имя">
        <div>Укажите свое отчество:</div>
        <input v-model="User.user.patronymic" required class="login_form_item" type="text" placeholder="отчество">
        <div>Укажите свою фамилию:</div>
        <input v-model="User.user.surname" required class="login_form_item" type="text" placeholder="фамилия">
        <div>Укажите свой телефон:</div>
        <div> +380 <input v-model="User.user.phone" required class="login_form_item" type="tel" placeholder="телефон">
        </div>
        <div>Укажите свой дополнительный телефон:</div>
        <div> +380 <input v-model="User.user.additional_phone" required class="login_form_item" type="tel"
                placeholder="телефон"> </div>
        <div>Укажите свой email:</div>
        <input v-model="User.user.email" required class="login_form_item" type="email" placeholder="email">
        <div>Укажите страну проживания:</div>
        <select v-model="User.user.country_id" class="category_form_title">
            <option v-for="option in Store.countrys" :value="option.id">
                {{ option.title }}
            </option>
        </select>
        <div>Укажите свой город:</div>
        <select v-model="User.user.city_id" class="category_form_title">
            <option v-for="option in Store.citys" :value="option.id">
                {{ option.title }}
            </option>
        </select>
        <div>Укажите свой пароль:</div>
        <input v-model="User.user.password" required class="login_form_item" type="password" placeholder="password">
        <div>Подтвердите свой пароль:</div>
        <input v-model="User.user.password_confirmation" required class="login_form_item" type="password"
            placeholder="confirm password">
        <button type="submit" class="login_form_btn">Изменить данные</button>
    </form>

    <div class="register_error" v-for="item in User.register_error" :key="item">
        {{ item[0] }}
    </div>
</template>

<script>
import { useUserStore } from '../../stores/user';
import { useDataStore } from '../../stores/variables';
export default {
    name: "EditClient",
    data() {
        return {
            gender: [
                { value: 'Мужчина' },
                { value: 'Женщина' }
            ],
            work: [
                { value: 'Да' },
                { value: 'Нет' }
            ],
        }
    },
    methods: {
        change_User() {
            this.User.user.is_babysitting = this.is_babysitting;
            this.User.user.is_nurse = this.is_nurse;
            this.User.user.is_housekeeper = this.is_housekeeper;

            this.User.UPDATE_USER(this.User.user);
        },
        change_ClientUser() {
            this.User.UPDATE_USER(this.User.user);
        }
    },
    mounted() {
        this.User.GET_TOKEN();
        this.User.GET_USER();
        this.Store.GET_COUNTRYS();
        this.Store.GET_CITYS();
        this.User.register_error = null;
    },
}
</script>

<style></style>