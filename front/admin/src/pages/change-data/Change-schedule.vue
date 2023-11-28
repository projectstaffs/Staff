<template>
    <div @click.prevent="back()" class="category_change_btn">Назад</div>
    <div class="category_title">Изменение графика работы:</div>
    <form @submit.prevent="changeSchedule" class="category_form">
        <div>Введите новое название графика работы:</div>
        <input class="category_form_title" v-model="Store.schedule.title" type="text" required placeholder="Напишите что-нибудь">                
        <button class="category_form_btn" type="submit">Изменить график</button>
    </form>
</template>

<script>
import { useDataStore } from '../../stores/variables'
export default {
    name: 'Change-schedule',
    setup() {
        const Store = useDataStore();
        return { Store };
    },
    methods: {
        back() {
            this.$router.push({name: "Schedule"})
        },
        changeSchedule() {            
            this.Store.CHANGE_SCHEDULE(this.Store.schedule);
            this.$router.push({name: "Schedule"})
        }
    },
}
</script>