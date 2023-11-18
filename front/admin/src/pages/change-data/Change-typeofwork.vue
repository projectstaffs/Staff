<template>
    <div @click.prevent="back()" class="category_change_btn">Назад</div>
    <div class="category_title">Изменение вида работы для няни:</div>
    <form @submit.prevent="changeTypeofwork" class="category_form">
        <div>Введите новое название вида работы:</div>
        <input class="category_form_title" v-model="Store.typeofwork.title" type="text" required placeholder="Напишите что-нибудь">                
        <button class="category_form_btn" type="submit">Изменить вид работы</button>
    </form>
</template>

<script>
import { useDataStore } from '../../stores/variables'
export default {
    name: 'Change-typeofwork',
    setup() {
        const Store = useDataStore();
        return { Store };
    },
    methods: {
        back() {
            this.$router.push({name: "Typeofwork"})
        },
        changeTypeofwork() {            
            this.Store.CHANGE_TYPEOFWORK(this.Store.typeofwork);
            this.$router.push({name: "Typeofwork"})
        }
    },
}
</script>