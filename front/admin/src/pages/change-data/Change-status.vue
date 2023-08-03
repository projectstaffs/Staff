<template>
    <div @click.prevent="back()" class="category_change_btn">Назад</div>
    <div class="category_title">Изменение семейного положения:</div>
    <form @submit.prevent="changeStatus" class="category_form">
        <div>Введите новое семейного положения:</div>
        <input class="category_form_title" v-model="Store.status.title" type="text" required placeholder="Напишите что-нибудь">                
        <button class="category_form_btn" type="submit">Изменить положение</button>
    </form>
</template>

<script>
import { useDataStore } from '../../stores/variables'
export default {
    name: 'Change-status',
    setup() {
        const Store = useDataStore();
        return { Store };
    }, 
    methods: {
        back() {
            this.$router.push({name: "Status"})
        },
        changeStatus() {            
            this.Store.CHANGE_STATUS(this.Store.status);
            this.$router.push({name: "Status"})
        }
    },
}
</script>