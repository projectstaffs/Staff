<template>
    <div class="category_title">Добавление диагноза:</div>    
    <form @submit.prevent="createDiagnose" class="category_form">
        <div>Введите название диагноза:</div>
        <input class="category_form_title" v-model="diagnose.title" type="text" required placeholder="Напишите что-нибудь">                
        <button class="category_form_btn" type="submit">Добавить диагноз</button>
    </form>
    <div class="category_title">Все диагнозы:</div>       
    <ul>                
        <li v-for="post in Store.diagnoses" :key="post.id" class="category_item">
            {{ post.title }} 
            <span class="category_change_btn" @click.prevent="change_diagnose(post.id, post.title)">Изменить диагноз</span>
            <span class="category_change_btn red" @click.prevent="delete_diagnose(post.id)">Удалить диагноз</span>                
        </li>   
    </ul>    
</template>

<script>
import { useDataStore } from '../../stores/variables'
    export default {
        name: 'Diagnose',
        data() {
            return {
                diagnose: {},
                fix_diagnose: {},                
            }
        },
        setup() {
            const Store = useDataStore();
            return { Store };
        },
        methods: {            
            createDiagnose() {
                this.Store.CREATE_DIAGNOSE(this.diagnose);
                this.diagnose.title = '';
            },
            change_diagnose(id, title) {
                this.fix_diagnose.id = id;
                this.fix_diagnose.title = title;
                this.Store.GET_DIAGNOSE(this.fix_diagnose);
                this.$router.push({name: "Change-diagnose"})                
            },
            delete_diagnose(id) {                
                this.Store.DELETE_DIAGNOSE(id);                                
            } 
        },
        mounted() {
            this.Store.GET_DIAGNOSES();                        
        },        
    }
</script>
