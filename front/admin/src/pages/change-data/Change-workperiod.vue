<template>
    <div @click.prevent="back()" class="category_change_btn">Назад</div>
    <div class="category_title">Изменение периода работы:</div>
    <form @submit.prevent="changeWorkperiod" class="category_form">
        <div>Введите новый период работы:</div>
        <input class="category_form_title" v-model="Store.workperiod.title" type="text" required placeholder="Напишите что-нибудь">                
        <button class="category_form_btn" type="submit">Изменить период работы</button>
    </form>
</template>

<script>
import { useDataStore } from '../../stores/variables'
export default {
    name: 'Change-workperiod',
    setup() {
        const Store = useDataStore();
        return { Store };
    },
    methods: {
        back() {
            this.$router.push({name: "Workperiod"})
        },
        changeWorkperiod() {            
            this.Store.CHANGE_WORKPERIOD(this.Store.workperiod);
            this.$router.push({name: "Workperiod"})
        }
    },
}
</script>