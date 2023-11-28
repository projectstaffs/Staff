<template>
    <div @click.prevent="back()" class="category_change_btn">Назад</div>
    <div class="category_title">Изменение город:</div>
    <form @submit.prevent="changeCity" class="category_form">
        <div>Введите новое название города:</div>
        <input class="category_form_title" v-model="Store.city.title" type="text" required placeholder="Напишите что-нибудь">                
        <button class="category_form_btn" type="submit">Изменить город</button>
    </form>
</template>

<script>
import { useDataStore } from '../../stores/variables'
export default {
    name: 'Change-City',
    setup() {
        const Store = useDataStore();
        return { Store };
    }, 
    methods: {        
        back() {
            this.$router.push({name: "City"})
        },
        changeCity() {            
            this.Store.CHANGE_CITY(this.Store.city);
            this.$router.push({name: "City"})
        }
    },    
}
</script>