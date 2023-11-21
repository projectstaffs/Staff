<template>
    <div @click.prevent="back()" class="category_change_btn">Назад</div>
    <div class="category_title">Изменение отношение к алкоголю:</div>
    <form @submit.prevent="changeAlcohol" class="category_form">
        <div>Введите новое название отношения к алкоголю:</div>
        <input class="category_form_title" v-model="Store.alcohol.title" type="text" required placeholder="Напишите что-нибудь">                
        <button class="category_form_btn" type="submit">Изменить отношение</button>
    </form>
</template>

<script>
import { useDataStore } from '../../stores/variables'
export default {
    name: 'Change-alcohol',
    setup() {
        const Store = useDataStore();
        return { Store };
    },
    methods: {
        back() {
            this.$router.push({name: "Alcohol"})
        },
        changeAlcohol() {            
            this.Store.CHANGE_ALCOHOL(this.Store.alcohol);
            this.$router.push({name: "Alcohol"})
        }
    },
}
</script>