<template>
    <div class="category_title">Добавление варианта переезда:</div>    
    <form @submit.prevent="createMoving" class="category_form">
        <div>Введите название варианта:</div>
        <input class="category_form_title" v-model="moving.title" type="text" required placeholder="Напишите что-нибудь">                
        <button class="category_form_btn" type="submit">Добавить вариант переезда</button>
    </form>
    <div class="category_title">Все варианты переезда:</div>       
    <ul>                
        <li v-for="post in Store.movings" :key="post.id" class="category_item">
            {{ post.title }} 
            <span class="category_change_btn" @click.prevent="change_moving(post.id, post.title)">Изменить вариант</span>
            <span class="category_change_btn red" @click.prevent="delete_moving(post.id)">Удалить вариант</span>                
        </li>   
    </ul>    
</template>

<script>
import { useDataStore } from '../../stores/variables'
    export default {
        name: 'Moving',
        data() {
            return {
                moving: {},
                fix_moving: {},                
            }
        },
        setup() {
            const Store = useDataStore();
            return { Store };
        }, 
        methods: {
            createMoving() {
                this.Store.CREATE_MOVING(this.moving);
                this.moving.title = '';
            },
            change_moving(id, title) {
                this.fix_moving.id = id;
                this.fix_moving.title = title;
                this.Store.GET_MOVING(this.fix_moving);
                this.$router.push({name: "Change-moving"})                
            },
            delete_moving(id) {                
                this.Store.DELETE_MOVING(id);                                
            } 
        },
        mounted() {
            this.Store.GET_MOVINGS();                        
        },
    }
</script>
