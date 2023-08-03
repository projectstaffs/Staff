<template>
    <div class="category_title">Добавление графика работы:</div>    
    <form @submit.prevent="createSchedule" class="category_form">
        <div>Введите графика работы:</div>
        <input class="category_form_title" v-model="schedule.title" type="text" required placeholder="Напишите что-нибудь">                
        <button class="category_form_btn" type="submit">Добавить график работы</button>
    </form>
    <div class="category_title">Все графики работы:</div>       
    <ul>                
        <li v-for="post in Store.schedules" :key="post.id" class="category_item">
            {{ post.title }} 
            <span class="category_change_btn" @click.prevent="change_schedule(post.id, post.title)">Изменить график</span>
            <span class="category_change_btn red" @click.prevent="delete_schedule(post.id)">Удалить график</span>                
        </li>   
    </ul>    
</template>

<script>
import { useDataStore } from '../../stores/variables'
    export default {
        name: 'Schedule',
        data() {
            return {
                schedule: {},
                fix_schedule: {},                
            }
        },
        setup() {
            const Store = useDataStore();
            return { Store };
        }, 
        methods: {
            createSchedule() {
                this.Store.CREATE_SCHEDULE(this.schedule);
                this.schedule.title = '';
            },
            change_schedule(id, title) {
                this.fix_schedule.id = id;
                this.fix_schedule.title = title;
                this.Store.GET_SCHEDULE(this.fix_schedule);
                this.$router.push({name: "Change-schedule"})                
            },
            delete_schedule(id) {                
                this.Store.DELETE_SCHEDULE(id);                                
            } 
        },
        mounted() {
            this.Store.GET_SCHEDULES();                        
        },
    }
</script>
