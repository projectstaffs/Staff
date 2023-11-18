<template>
    <div @click.prevent="back()" class="category_change_btn">Назад</div>
    <div class="category_title">Изменение почасовую оплату:</div>
    <form @submit.prevent="changeHourlypayment" class="category_form">
        <div>Введите новую почасовую оплату:</div>
        <input class="category_form_title" v-model="Store.hourlypayment.title" type="text" required placeholder="Напишите что-нибудь">                
        <button class="category_form_btn" type="submit">Изменить почасовую оплату</button>
    </form>
</template>

<script>
import { useDataStore } from '../../stores/variables'
export default {
    name: 'Change-hourlypayment',
    setup() {
        const Store = useDataStore();
        return { Store };
    },
    methods: {
        back() {
            this.$router.push({name: "Hourlypayment"})
        },
        changeHourlypayment() {            
            this.Store.CHANGE_HOURLYPAYMENT(this.Store.hourlypayment);
            this.$router.push({name: "Hourlypayment"})
        }
    },
}
</script>