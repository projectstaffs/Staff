<template>
    <div @click.prevent="back()" class="category_change_btn">Назад</div>
    <div class="category_title">Изменение обязаность домработницы:</div>
    <form @submit.prevent="changeHousekeeperdutie" class="category_form">
        <div>Введите новую обязаность домработницы:</div>
        <input class="category_form_title" v-model="Store.housekeeperdutie.title" type="text" required placeholder="Напишите что-нибудь">                
        <button class="category_form_btn" type="submit">Изменить обязаность домработницы</button>
    </form>
</template>

<script>
import { useDataStore } from '../../stores/variables'
export default {
    name: 'Change-housekeeperdutie',
    setup() {
        const Store = useDataStore();
        return { Store };
    },
    methods: {
        back() {
            this.$router.push({name: "Housekeeperdutie"})
        },
        changeHousekeeperdutie() {            
            this.Store.CHANGE_HOUSEKEEPERDUTIE(this.Store.housekeeperdutie);
            this.$router.push({name: "Housekeeperdutie"})
        }
    },
}
</script>