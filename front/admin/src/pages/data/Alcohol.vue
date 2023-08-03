<template>
    <div class="category_title">Добавление отношения к алкоголю:</div>    
    <form @submit.prevent="createAlcohol" class="category_form">
        <div>Введите название:</div>
        <input class="category_form_title" v-model="alcohol.title" type="text" required placeholder="Напишите что-нибудь">                
        <button class="category_form_btn" type="submit">Добавить отношение</button>
    </form>
    <div class="category_title">Все отношения к алкоголю:</div>       
    <ul>                
        <li v-for="post in Store.alcohols" :key="post.id" class="category_item">
            {{ post.title }} 
            <span class="category_change_btn" @click.prevent="change_alcohol(post.id, post.title)">Изменить отношение</span>
            <span class="category_change_btn red" @click.prevent="delete_alcohol(post.id)">Удалить отношение</span>                
        </li>   
    </ul>    
</template>

<script>
import { useDataStore } from '../../stores/variables'
    export default {
        name: 'Alcohol',
        data() {
            return {
                alcohol: {},
                fix_alcohol: {},                
            }
        },
        setup() {
            const Store = useDataStore();
            return { Store };
        }, 
        methods: {            
            createAlcohol() {
                this.Store.CREATE_ALCOHOL(this.alcohol);
                this.alcohol.title = '';
            },
            change_alcohol(id, title) {
                this.fix_alcohol.id = id;
                this.fix_alcohol.title = title;
                this.Store.GET_ALCOHOL(this.fix_alcohol);
                this.$router.push({name: "Change-alcohol"})                
            },
            delete_alcohol(id) {                
                this.Store.DELETE_ALCOHOL(id);                                
            } 
        },
        mounted() {
            this.Store.GET_ALCOHOLS();                        
        },        
    }
</script>
