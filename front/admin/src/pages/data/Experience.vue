<template>
    <div class="category_title">Добавление опыта работы:</div>    
    <form @submit.prevent="createExperience" class="category_form">
        <div>Введите название опыта работы:</div>
        <input class="category_form_title" v-model="experience.title" type="text" required placeholder="Напишите что-нибудь">                
        <button class="category_form_btn" type="submit">Добавить опыт работы</button>
    </form>
    <div class="category_title">Весь опыт работы:</div>       
    <ul>                
        <li v-for="post in Store.experiences" :key="post.id" class="category_item">
            {{ post.title }} 
            <span class="category_change_btn" @click.prevent="change_experience(post.id, post.title)">Изменить опыт работы</span>
            <span class="category_change_btn red" @click.prevent="delete_experience(post.id)">Удалить опыт работы</span>                
        </li>   
    </ul>    
</template>

<script>
import { useDataStore } from '../../stores/variables'
    export default {
        name: 'Experience',
        data() {
            return {
                experience: {},
                fix_experience: {},                
            }
        },
        setup() {
            const Store = useDataStore();
            return { Store };
        }, 
        methods: {            
            createExperience() {
                this.Store.CREATE_EXPERIENCE(this.experience);
                this.experience.title = '';
            },
            change_experience(id, title) {
                this.fix_experience.id = id;
                this.fix_experience.title = title;
                this.Store.GET_EXPERIENCE(this.fix_experience);
                this.$router.push({name: "Change-experience"})                
            },
            delete_experience(id) {                
                this.Store.DELETE_EXPERIENCE(id);                                
            } 
        },
        mounted() {
            this.Store.GET_EXPERIENCES();                        
        },        
    }
</script>
