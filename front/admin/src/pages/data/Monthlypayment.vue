<template>
    <div class="category_title">Добавление помесячной оплаты:</div>    
    <form @submit.prevent="createMonthlypayment" class="category_form">
        <div>Введите помесячную оплату:</div>
        <input class="category_form_title" v-model="monthlypayment.title" type="text" required placeholder="Напишите что-нибудь">                
        <button class="category_form_btn" type="submit">Добавить помесячную оплату</button>
    </form>
    <div class="category_title">Все помесячные оплаты:</div>       
    <ul>                
        <li v-for="post in Store.monthlypayments" :key="post.id" class="category_item">
            {{ post.title }} 
            <span class="category_change_btn" @click.prevent="change_monthlypayment(post.id, post.title)">Изменить помесячную оплату</span>
            <span class="category_change_btn red" @click.prevent="delete_monthlypayment(post.id)">Удалить помесячную оплату</span>                
        </li>   
    </ul>    
</template>

<script>
import { useDataStore } from '../../stores/variables'
    export default {
        name: 'Monthlypayment',
        data() {
            return {
                monthlypayment: {},
                fix_monthlypayment: {},                
            }
        },
        setup() {
            const Store = useDataStore();
            return { Store };
        },
        methods: {
            createMonthlypayment() {
                this.Store.CREATE_MONTHLYPAYMENT(this.monthlypayment);
                this.monthlypayment.title = '';
            },
            change_monthlypayment(id, title) {
                this.fix_monthlypayment.id = id;
                this.fix_monthlypayment.title = title;
                this.Store.GET_MONTHLYPAYMENT(this.fix_monthlypayment);
                this.$router.push({name: "Change-monthlypayment"})                
            },
            delete_monthlypayment(id) {                
                this.Store.DELETE_MONTHLYPAYMENT(id);                                
            } 
        },
        mounted() {
            this.Store.GET_MONTHLYPAYMENTS();                        
        },
    }
</script>
