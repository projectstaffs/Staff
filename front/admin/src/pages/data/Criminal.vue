<template>
    <div class="category_title">Добавление информации о несудимости:</div>    
    <form @submit.prevent="createCriminal" class="category_form">
        <div>Введите информацию о несудимости:</div>
        <input class="category_form_title" v-model="criminal.title" type="text" required placeholder="Напишите что-нибудь">                
        <button class="category_form_btn" type="submit">Добавить информацию о несудимости</button>
    </form>
    <div class="category_title">Вся информация о несудимости:</div>       
    <ul>                
        <li v-for="post in Store.criminals" :key="post.id" class="category_item">
            {{ post.title }} 
            <span class="category_change_btn" @click.prevent="change_criminal(post.id, post.title)">Изменить информацию о несудимости</span>
            <span class="category_change_btn red" @click.prevent="delete_criminal(post.id)">Удалить информацию о несудимости</span>                
        </li>   
    </ul>    
</template>

<script>
import { useDataStore } from '../../stores/variables'
    export default {
        name: 'Criminal',
        data() {
            return {
                criminal: {},
                fix_criminal: {},                
            }
        },
        setup() {
            const Store = useDataStore();
            return { Store };
        },
        methods: {            
            createCriminal() {
                this.Store.CREATE_CRIMINAL(this.criminal);
                this.criminal.title = '';
            },
            change_criminal(id, title) {
                this.fix_criminal.id = id;
                this.fix_criminal.title = title;
                this.Store.GET_CRIMINAL(this.fix_criminal);
                this.$router.push({name: "Change-criminal"})                
            },
            delete_criminal(id) {                
                this.Store.DELETE_CRIMINAL(id);                                
            } 
        },
        mounted() {
            this.Store.GET_CRIMINALS();                        
        },        
    }
</script>
