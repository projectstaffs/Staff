<template>
    <div @click.prevent="back()" class="category_change_btn">Назад</div>
    <div class="category_title">Изменение предпочтение:</div>
    <form @submit.prevent="changeHousekeeperpreference" class="category_form">
        <div>Введите новое предпочтение:</div>
        <input class="category_form_title" v-model="Store.housekeeperpreference.title" type="text" required placeholder="Напишите что-нибудь">                
        <button class="category_form_btn" type="submit">Изменить предпочтение</button>
    </form>
</template>

<script>
import { useDataStore } from '../../stores/variables'
export default {
    name: 'Change-housekeeperpreference',
    setup() {
        const Store = useDataStore();
        return { Store };
    },
    methods: {
        back() {
            this.$router.push({name: "Housekeeperpreference"})
        },
        changeHousekeeperpreference() {            
            this.Store.CHANGE_HOUSEKEEPERPREFERENCE(this.Store.housekeeperpreference);
            this.$router.push({name: "Housekeeperpreference"})
        }
    },
}
</script>