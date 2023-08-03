<template>
    <div @click.prevent="back()" class="category_change_btn">Назад</div>
    <div class="category_title">Изменение страны:</div>
    <form @submit.prevent="changeCountry" class="category_form">
        <div>Введите новое название страны:</div>
        <input class="category_form_title" v-model="Store.country.title" type="text" required placeholder="Напишите что-нибудь">                
        <button class="category_form_btn" type="submit">Изменить страну</button>
    </form>
</template>

<script>
import { useDataStore } from '../../stores/variables'
export default {
    name: 'Change-country',
    setup() {
        const Store = useDataStore();
        return { Store };
    },
    methods: {        
        back() {
            this.$router.push({name: "Country"})
        },
        changeCountry() {            
            this.Store.CHANGE_COUNTRY(this.Store.country);
            this.$router.push({name: "Country"})
        }
    },    
}
</script>