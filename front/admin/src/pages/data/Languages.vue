<template>
    <div class="category_title">Добавление языка:</div>    
    <form @submit.prevent="createLanguage" class="category_form">
        <div>Введите название языка:</div>
        <input class="category_form_title" v-model="language.title" type="text" required placeholder="Напишите что-нибудь">                
        <button class="category_form_btn" type="submit">Добавить язык</button>
    </form>
    <div class="category_title">Все языки:</div>       
    <ul>                
        <li v-for="post in Store.languages" :key="post.id" class="category_item">
            {{ post.title }} 
            <span class="category_change_btn" @click.prevent="change_language(post.id, post.title)">Изменить язык</span>
            <span class="category_change_btn red" @click.prevent="delete_language(post.id)">Удалить язык</span>                
        </li>   
    </ul>    
</template>

<script>
import { useDataStore } from '../../stores/variables'
    export default {
        name: 'Languages',
        data() {
            return {
                language: {},
                fix_language: {},                
            }
        },
        setup() {
            const Store = useDataStore();
            return { Store };
        }, 
        methods: {
            createLanguage() {
                this.Store.CREATE_LANGUAGE(this.language);
                this.language.title = '';
            },
            change_language(id, title) {
                this.fix_language.id = id;
                this.fix_language.title = title;
                this.Store.GET_LANGUAGE(this.fix_language);
                this.$router.push({name: "Change-language"})                
            },
            delete_language(id) {                
                this.Store.DELETE_LANGUAGE(id);                                
            } 
        },
        mounted() {
            this.Store.GET_LANGUAGES();                        
        },
    }
</script>
