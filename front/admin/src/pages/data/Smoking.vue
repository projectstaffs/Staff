<template>
    <div class="category_title">Добавление отношения к курению:</div>    
    <form @submit.prevent="createSmoking" class="category_form">
        <div>Введите название отношения к курению:</div>
        <input class="category_form_title" v-model="smoking.title" type="text" required placeholder="Напишите что-нибудь">                
        <button class="category_form_btn" type="submit">Добавить отношение</button>
    </form>
    <div class="category_title">Все отношения к курению:</div>       
    <ul>                
        <li v-for="post in Store.smokings" :key="post.id" class="category_item">
            {{ post.title }} 
            <span class="category_change_btn" @click.prevent="change_smoking(post.id, post.title)">Изменить отношение</span>
            <span class="category_change_btn red" @click.prevent="delete_smoking(post.id)">Удалить отношение</span>                
        </li>   
    </ul>    
</template>

<script>
import { useDataStore } from '../../stores/variables'
    export default {
        name: 'Smoking',
        data() {
            return {
                smoking: {},
                fix_smoking: {},                
            }
        },
        setup() {
            const Store = useDataStore();
            return { Store };
        }, 
        methods: {
            createSmoking() {
                this.Store.CREATE_SMOKING(this.smoking);
                this.smoking.title = '';
            },
            change_smoking(id, title) {
                this.fix_smoking.id = id;
                this.fix_smoking.title = title;
                this.Store.GET_SMOKING(this.fix_smoking);
                this.$router.push({name: "Change-smoking"})                
            },
            delete_smoking(id) {                
                this.Store.DELETE_SMOKING(id);                                
            } 
        },
        mounted() {
            this.Store.GET_SMOKINGS();                        
        },
    }
</script>
