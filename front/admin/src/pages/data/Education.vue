<template>
    <div class="category_title">Добавление образование:</div>    
    <form @submit.prevent="createEducation" class="category_form">
        <div>Введите название образования:</div>
        <input class="category_form_title" v-model="education.title" type="text" required placeholder="Напишите что-нибудь">                
        <button class="category_form_btn" type="submit">Добавить образование</button>
    </form>
    <div class="category_title">Все образования:</div>       
    <ul>                
        <li v-for="post in Store.educations" :key="post.id" class="category_item">
            {{ post.title }} 
            <span class="category_change_btn" @click.prevent="change_education(post.id, post.title)">Изменить образование</span>
            <span class="category_change_btn red" @click.prevent="delete_education(post.id)">Удалить образование</span>                
        </li>   
    </ul>    
</template>

<script>
import { useDataStore } from '../../stores/variables'
    export default {
        name: 'Education',
        data() {
            return {
                education: {},
                fix_education: {},                
            }
        },
        setup() {
            const Store = useDataStore();
            return { Store };
        }, 
        methods: {            
            createEducation() {
                this.Store.CREATE_EDUCATION(this.education);
                this.education.title = '';
            },
            change_education(id, title) {
                this.fix_education.id = id;
                this.fix_education.title = title;
                this.Store.GET_EDUCATION(this.fix_education);
                this.$router.push({name: "Change-education"})                
            },
            delete_education(id) {                
                this.Store.DELETE_EDUCATION(id);                                
            } 
        },
        mounted() {
            this.Store.GET_EDUCATIONS();                        
        },        
    }
</script>
