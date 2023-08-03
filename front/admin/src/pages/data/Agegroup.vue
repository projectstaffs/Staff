<template>
    <div class="category_title">Добавление возрастной групы:</div>    
    <form @submit.prevent="createAgegroup" class="category_form">
        <div>Введите возрастную групу:</div>
        <input class="category_form_title" v-model="agegroup.title" type="text" required placeholder="Напишите что-нибудь">                
        <button class="category_form_btn" type="submit">Добавить возрастную групу</button>
    </form>
    <div class="category_title">Все возрастные групы:</div>       
    <ul>                
        <li v-for="post in Store.agegroups" :key="post.id" class="category_item">
            {{ post.title }} 
            <span class="category_change_btn" @click.prevent="change_agegroup(post.id, post.title)">Изменить возрастную групу</span>
            <span class="category_change_btn red" @click.prevent="delete_agegroup(post.id)">Удалить возрастную групу</span>                
        </li>   
    </ul>    
</template>

<script>
import { useDataStore } from '../../stores/variables'
    export default {
        name: 'Agegroup',
        data() {
            return {
                agegroup: {},
                fix_agegroup: {},                
            }
        },
        setup() {
            const Store = useDataStore();
            return { Store };
        },
        methods: {            
            createAgegroup() {
                this.Store.CREATE_AGEGROUP(this.agegroup);
                this.agegroup.title = '';
            },
            change_agegroup(id, title) {
                this.fix_agegroup.id = id;
                this.fix_agegroup.title = title;
                this.Store.GET_AGEGROUP(this.fix_agegroup);
                this.$router.push({name: "Change-agegroup"})                
            },
            delete_agegroup(id) {                
                this.Store.DELETE_AGEGROUP(id);                                
            } 
        },
        mounted() {
            this.Store.GET_AGEGROUPS();                        
        },        
    }
</script>
