<template>
    <div @click.prevent="back()" class="category_change_btn">Назад</div>
    <div class="category_title">Изменение вид занятости:</div>
    <form @submit.prevent="changeEmployment" class="category_form">
        <div>Введите новое название вида занятости:</div>
        <input class="category_form_title" v-model="Store.employment.title" type="text" required placeholder="Напишите что-нибудь">                
        <button class="category_form_btn" type="submit">Изменить вид занятости</button>
    </form>
</template>

<script>
import { useDataStore } from '../../stores/variables'
export default {
    name: 'Change-employment',
    setup() {
        const Store = useDataStore();
        return { Store };
    }, 
    methods: {
        back() {
            this.$router.push({name: "Employment"})
        },
        changeEmployment() {            
            this.Store.CHANGE_EMPLOYMENT(this.Store.employment);
            this.$router.push({name: "Employment"})
        }
    },
}
</script>