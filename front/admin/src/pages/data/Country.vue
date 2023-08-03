<template>
    <div class="category_title">Добавление страны:</div>    
    <form @submit.prevent="createCountry" class="category_form">
        <div>Введите название страны:</div>
        <input class="category_form_title" v-model="country.title" type="text" required placeholder="Напишите что-нибудь">                
        <button class="category_form_btn" type="submit">Добавить страну</button>
    </form>
    <div class="category_title">Все страны:</div>       
    <ul>                
        <li v-for="post in Store.countrys" :key="post.id" class="category_item">
            {{ post.title }} 
            <span class="category_change_btn" @click.prevent="change_country(post.id, post.title)">Изменить страну</span>
            <span class="category_change_btn red" @click.prevent="delete_country(post.id)">Удалить страну</span>                
        </li>   
    </ul>    
</template>

<script>
import { useDataStore } from '../../stores/variables'
    export default {
        name: 'Country',
        data() {
            return {
                country: {},
                fix_country: {},                
            }
        },
        setup() {
            const Store = useDataStore();
            return { Store };
        },
        methods: {            
            createCountry() {
                this.Store.CREATE_COUNTRY(this.country);
                this.country.title = '';
            },
            change_country(id, title) {
                this.fix_country.id = id;
                this.fix_country.title = title;
                this.Store.GET_COUNTRY(this.fix_country);
                this.$router.push({name: "Change-country"})                
            },
            delete_country(id) {                
                this.Store.DELETE_COUNTRY(id);                                
            } 
        },
        mounted() {
            this.Store.GET_COUNTRYS();                        
        },        
    }
</script>
