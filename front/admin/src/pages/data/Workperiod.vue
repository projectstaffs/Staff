<template>
    <div class="category_title">Добавление периода работы:</div>    
    <form @submit.prevent="createWorkperiod" class="category_form">
        <div>Введите период работы:</div>
        <input class="category_form_title" v-model="workperiod.title" type="text" required placeholder="Напишите что-нибудь">                
        <button class="category_form_btn" type="submit">Добавить период работы</button>
    </form>
    <div class="category_title">Все периоды работы:</div>       
    <ul>                
        <li v-for="post in Store.workperiods" :key="post.id" class="category_item">
            {{ post.title }} 
            <span class="category_change_btn" @click.prevent="change_workperiod(post.id, post.title)">Изменить период работы</span>
            <span class="category_change_btn red" @click.prevent="delete_workperiod(post.id)">Удалить период работы</span>                
        </li>   
    </ul>    
</template>

<script>
import { useDataStore } from '../../stores/variables'
    export default {
        name: 'Workperiod',
        data() {
            return {
                workperiod: {},
                fix_workperiod: {},                
            }
        },
        setup() {
            const Store = useDataStore();
            return { Store };
        },
        methods: {
            createWorkperiod() {
                this.Store.CREATE_WORKPERIOD(this.workperiod);
                this.workperiod.title = '';
            },
            change_workperiod(id, title) {
                this.fix_workperiod.id = id;
                this.fix_workperiod.title = title;
                this.Store.GET_WORKPERIOD(this.fix_workperiod);
                this.$router.push({name: "Change-workperiod"})                
            },
            delete_workperiod(id) {                
                this.Store.DELETE_WORKPERIOD(id);                                
            } 
        },
        mounted() {
            this.Store.GET_WORKPERIODS();                        
        },
    }
</script>
