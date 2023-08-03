<template>
    <div class="category_title">Добавление почасовой оплаты:</div>    
    <form @submit.prevent="createHourlypayment" class="category_form">
        <div>Введите почасовую оплату:</div>
        <input class="category_form_title" v-model="hourlypayment.title" type="text" required placeholder="Напишите что-нибудь">                
        <button class="category_form_btn" type="submit">Добавить почасовую оплату</button>
    </form>
    <div class="category_title">Все почасовые оплаты:</div>       
    <ul>                
        <li v-for="post in Store.hourlypayments" :key="post.id" class="category_item">
            {{ post.title }} 
            <span class="category_change_btn" @click.prevent="change_hourlypayment(post.id, post.title)">Изменить почасовую оплату</span>
            <span class="category_change_btn red" @click.prevent="delete_hourlypayment(post.id)">Удалить почасовую оплату</span>                
        </li>   
    </ul>    
</template>

<script>
import { useDataStore } from '../../stores/variables'
    export default {
        name: 'Hourlypayment',
        data() {
            return {
                hourlypayment: {},
                fix_hourlypayment: {},                
            }
        },
        setup() {
            const Store = useDataStore();
            return { Store };
        },
        methods: {            
            createHourlypayment() {
                this.Store.CREATE_HOURLYPAYMENT(this.hourlypayment);
                this.hourlypayment.title = '';
            },
            change_hourlypayment(id, title) {
                this.fix_hourlypayment.id = id;
                this.fix_hourlypayment.title = title;
                this.Store.GET_HOURLYPAYMENT(this.fix_hourlypayment);
                this.$router.push({name: "Change-hourlypayment"})                
            },
            delete_hourlypayment(id) {                
                this.Store.DELETE_HOURLYPAYMENT(id);                                
            } 
        },
        mounted() {
            this.Store.GET_HOURLYPAYMENTS();                        
        },        
    }
</script>
