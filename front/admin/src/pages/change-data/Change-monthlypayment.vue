<template>
    <div @click.prevent="back()" class="category_change_btn">Назад</div>
    <div class="category_title">Изменение помесячной оплаты:</div>
    <form @submit.prevent="changeMonthlypayment" class="category_form">
        <div>Введите новое название помесячной оплаты:</div>
        <input class="category_form_title" v-model="Store.monthlypayment.title" type="text" required placeholder="Напишите что-нибудь">                
        <button class="category_form_btn" type="submit">Изменить помесячную оплату</button>
    </form>
</template>

<script>
import { useDataStore } from '../../stores/variables'
export default {
    name: 'Change-monthlypayment',
    setup() {
        const Store = useDataStore();
        return { Store };
    },
    methods: {
        back() {
            this.$router.push({name: "Monthlypayment"})
        },
        changeMonthlypayment() {            
            this.Store.CHANGE_MONTHLYPAYMENT(this.Store.monthlypayment);
            this.$router.push({name: "Monthlypayment"})
        }
    },
}
</script>