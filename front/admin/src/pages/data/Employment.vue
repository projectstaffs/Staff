<template>
    <div class="category_title">Добавление вида занятости:</div>    
    <form @submit.prevent="createEmployment" class="category_form">
        <div>Введите название вида занятости:</div>
        <input class="category_form_title" v-model="employment.title" type="text" required placeholder="Напишите что-нибудь">                
        <button class="category_form_btn" type="submit">Добавить вид занятости</button>
    </form>
    <div class="category_title">Все виды занятости:</div>       
    <ul>                
        <li v-for="post in Store.employments" :key="post.id" class="category_item">
            {{ post.title }} 
            <span class="category_change_btn" @click.prevent="change_employment(post.id, post.title)">Изменить вид занятости</span>
            <span class="category_change_btn red" @click.prevent="delete_employment(post.id)">Удалить вид занятости</span>                
        </li>   
    </ul>    
</template>

<script>
import { useDataStore } from '../../stores/variables'
    export default {
        name: 'Employment',
        data() {
            return {
                employment: {},
                fix_employment: {},                
            }
        },
        setup() {
            const Store = useDataStore();
            return { Store };
        }, 
        methods: {            
            createEmployment() {
                this.Store.CREATE_EMPLOYMENT(this.employment);
                this.employment.title = '';
            },
            change_employment(id, title) {
                this.fix_employment.id = id;
                this.fix_employment.title = title;
                this.Store.GET_EMPLOYMENT(this.fix_employment);
                this.$router.push({name: "Change-employment"})                
            },
            delete_employment(id) {                
                this.Store.DELETE_EMPLOYMENT(id);                                
            } 
        },
        mounted() {
            this.Store.GET_EMPLOYMENTS();                        
        },        
    }
</script>
