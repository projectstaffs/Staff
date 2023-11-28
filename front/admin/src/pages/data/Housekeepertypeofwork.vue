<template>
    <div class="category_title">Добавление вида работы для домработницы:</div>    
    <form @submit.prevent="createHousekeepertypeofwork" class="category_form">
        <div>Введите название вида работы:</div>
        <input class="category_form_title" v-model="housekeepertypeofwork.title" type="text" required placeholder="Напишите что-нибудь">                
        <button class="category_form_btn" type="submit">Добавить вид работы</button>
    </form>
    <div class="category_title">Все виды работы:</div>       
    <ul>                
        <li v-for="post in Store.housekeepertypeofworks" :key="post.id" class="category_item">
            {{ post.title }} 
            <span class="category_change_btn" @click.prevent="change_housekeepertypeofwork(post.id, post.title)">Изменить вид работы</span>
            <span class="category_change_btn red" @click.prevent="delete_housekeepertypeofwork(post.id)">Удалить вид работы</span>                
        </li>   
    </ul>    
</template>

<script>
import { useDataStore } from '../../stores/variables'
    export default {
        name: 'Housekeepertypeofwork',
        data() {
            return {
                housekeepertypeofwork: {},
                fix_housekeepertypeofwork: {},                
            }
        },
        setup() {
            const Store = useDataStore();
            return { Store };
        },
        methods: {
            createHousekeepertypeofwork() {
                this.Store.CREATE_HOUSEKEEPERTYPEOFWORK(this.housekeepertypeofwork);
                this.housekeepertypeofwork.title = '';
            },
            change_housekeepertypeofwork(id, title) {
                this.fix_housekeepertypeofwork.id = id;
                this.fix_housekeepertypeofwork.title = title;
                this.Store.GET_HOUSEKEEPERTYPEOFWORK(this.fix_housekeepertypeofwork);
                this.$router.push({name: "Change-housekeepertypeofwork"})                
            },
            delete_housekeepertypeofwork(id) {                
                this.Store.DELETE_HOUSEKEEPERTYPEOFWORK(id);                                
            } 
        },
        mounted() {
            this.Store.GET_HOUSEKEEPERTYPEOFWORKS();                        
        },
    }
</script>
