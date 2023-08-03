<template>
    <div @click.prevent="back()" class="category_change_btn">Назад</div>
    <div class="category_title">Изменение вида работы для сиделки:</div>
    <form @submit.prevent="changeNursetypeofwork" class="category_form">
        <div>Введите новое название вида работы:</div>
        <input class="category_form_title" v-model="Store.nursetypeofwork.title" type="text" required placeholder="Напишите что-нибудь">                
        <button class="category_form_btn" type="submit">Изменить вида работы</button>
    </form>
</template>

<script>
import { useDataStore } from '../../stores/variables'
export default {
    name: 'Change-nursetypeofwork',
    setup() {
        const Store = useDataStore();
        return { Store };
    }, 
    methods: {
        back() {
            this.$router.push({name: "Nursetypeofwork"})
        },
        changeNursetypeofwork() {            
            this.Store.CHANGE_NURSETYPEOFWORK(this.Store.nursetypeofwork);
            this.$router.push({name: "Nursetypeofwork"})
        }
    },
}
</script>