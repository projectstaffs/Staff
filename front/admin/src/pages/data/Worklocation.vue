<template>
    <div class="category_title">Добавление местоположения работы для сиделки:</div>    
    <form @submit.prevent="createWorklocation" class="category_form">
        <div>Введите название местоположения работы:</div>
        <input class="category_form_title" v-model="worklocation.title" type="text" required placeholder="Напишите что-нибудь">                
        <button class="category_form_btn" type="submit">Добавить местоположения работы</button>
    </form>
    <div class="category_title">Все местоположения работы для сиделки:</div>       
    <ul>                
        <li v-for="post in Store.worklocations" :key="post.id" class="category_item">
            {{ post.title }} 
            <span class="category_change_btn" @click.prevent="change_worklocation(post.id, post.title)">Изменить местоположение</span>
            <span class="category_change_btn red" @click.prevent="delete_worklocation(post.id)">Удалить местоположение</span>                
        </li>   
    </ul>    
</template>

<script>
import { useDataStore } from '../../stores/variables'
    export default {
        name: 'Worklocation',
        data() {
            return {
                worklocation: {},
                fix_worklocation: {},                
            }
        },
        setup() {
            const Store = useDataStore();
            return { Store };
        },
        methods: {
            createWorklocation() {
                this.Store.CREATE_WORKLOCATION(this.worklocation);
                this.worklocation.title = '';
            },
            change_worklocation(id, title) {
                this.fix_worklocation.id = id;
                this.fix_worklocation.title = title;
                this.Store.GET_WORKLOCATION(this.fix_worklocation);
                this.$router.push({name: "Change-worklocation"})                
            },
            delete_worklocation(id) {                
                this.Store.DELETE_WORKLOCATION(id);                                
            } 
        },
        mounted() {
            this.Store.GET_WORKLOCATIONS();                        
        },
    }
</script>
