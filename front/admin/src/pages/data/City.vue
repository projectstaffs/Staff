<template>
    <div class="category_title">Добавление города:</div>    
    <form @submit.prevent="createCity" class="category_form">
        <div>Введите название города:</div>
        <input class="category_form_title" v-model="city.title" type="text" required placeholder="Напишите что-нибудь">                
        <button class="category_form_btn" type="submit">Добавить город</button>
    </form>
    <div class="category_title">Все города:</div>       
    <ul>                
        <li v-for="post in Store.citys" :key="post.id" class="category_item">
            {{ post.title }} 
            <span class="category_change_btn" @click.prevent="change_city(post.id, post.title)">Изменить город</span>
            <span class="category_change_btn red" @click.prevent="delete_city(post.id)">Удалить город</span>                
        </li>   
    </ul>       
</template>

<script>
import { useDataStore } from '../../stores/variables'
    export default {
        name: 'City',
        data() {
            return {
                city: {},
                fix_city: {},                
            }
        },
        setup() {
            const Store = useDataStore();
            return { Store };
        }, 
        methods: {            
            createCity() {
                this.Store.CREATE_CITY(this.city);
                this.city.title = '';
            },
            change_city(id, title) {
                this.fix_city.id = id;
                this.fix_city.title = title;
                this.Store.GET_CITY(this.fix_city);
                this.$router.push({name: "Change-city"})                
            },
            delete_city(id) {                
                this.Store.DELETE_CITY(id);                                
            },
        },
        mounted() {
            this.Store.GET_CITYS();                        
        },        
    }
</script>
