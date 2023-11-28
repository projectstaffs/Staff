<template>
    <div class="category_title">Добавление семейного положения:</div>    
    <form @submit.prevent="createStatus" class="category_form">
        <div>Введите название семейного положения:</div>
        <input class="category_form_title" v-model="status.title" type="text" required placeholder="Напишите что-нибудь">                
        <button class="category_form_btn" type="submit">Добавить семейное положение</button>
    </form>
    <div class="category_title">Все семейные положения:</div>       
    <ul>                
        <li v-for="post in Store.statuss" :key="post.id" class="category_item">
            {{ post.title }} 
            <span class="category_change_btn" @click.prevent="change_status(post.id, post.title)">Изменить положение</span>
            <span class="category_change_btn red" @click.prevent="delete_status(post.id)">Удалить положение</span>                
        </li>   
    </ul>    
</template>

<script>
import { useDataStore } from '../../stores/variables'
    export default {
        name: 'Status',
        data() {
            return {
                status: {},
                fix_status: {},                
            }
        },
        setup() {
            const Store = useDataStore();
            return { Store };
        }, 
        methods: {
            createStatus() {
                this.Store.CREATE_STATUS(this.status);
                this.status.title = '';
            },
            change_status(id, title) {
                this.fix_status.id = id;
                this.fix_status.title = title;
                this.Store.GET_STATUS(this.fix_status);
                this.$router.push({name: "Change-status"})                
            },
            delete_status(id) {                
                this.Store.DELETE_STATUS(id);                                
            } 
        },
        mounted() {
            this.Store.GET_STATUSS();                        
        },
    }
</script>
