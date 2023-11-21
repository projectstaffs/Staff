<template>
    <div class="category_title">Добавление обязаности для няни:</div>    
    <form @submit.prevent="createBabysittingdutie" class="category_form">
        <div>Введите название обязаности:</div>
        <input class="category_form_title" v-model="babysittingdutie.title" type="text" required placeholder="Напишите что-нибудь">                
        <button class="category_form_btn" type="submit">Добавить обязаность</button>
    </form>
    <div class="category_title">Все обязаности:</div>       
    <ul>                
        <li v-for="post in Store.babysittingduties" :key="post.id" class="category_item">
            {{ post.title }} 
            <span class="category_change_btn" @click.prevent="change_babysittingdutie(post.id, post.title)">Изменить обязаность</span>
            <span class="category_change_btn red" @click.prevent="delete_babysittingdutie(post.id)">Удалить обязаность</span>                
        </li>   
    </ul>    
</template>

<script>
import { useDataStore } from '../../stores/variables'
    export default {
        name: 'Babysittingdutie',
        data() {
            return {
                babysittingdutie: {},
                fix_babysittingdutie: {},                
            }
        },
        setup() {
            const Store = useDataStore();
            return { Store };
        },
        methods: {            
            createBabysittingdutie() {
                this.Store.CREATE_BABYSITTINGDUTIE(this.babysittingdutie);
                this.babysittingdutie.title = '';
            },
            change_babysittingdutie(id, title) {
                this.fix_babysittingdutie.id = id;
                this.fix_babysittingdutie.title = title;
                this.Store.GET_BABYSITTINGDUTIE(this.fix_babysittingdutie);
                this.$router.push({name: "Change-babysittingdutie"})                
            },
            delete_babysittingdutie(id) {                
                this.Store.DELETE_BABYSITTINGDUTIE(id);                                
            } 
        },
        mounted() {
            this.Store.GET_BABYSITTINGDUTIES();                        
        },        
    }
</script>
