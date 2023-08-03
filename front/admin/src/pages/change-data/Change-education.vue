<template>
    <div @click.prevent="back()" class="category_change_btn">Назад</div>
    <div class="category_title">Изменение образование:</div>
    <form @submit.prevent="changeEducation" class="category_form">
        <div>Введите новое название образованиея:</div>
        <input class="category_form_title" v-model="Store.education.title" type="text" required placeholder="Напишите что-нибудь">                
        <button class="category_form_btn" type="submit">Изменить образование</button>
    </form>
</template>

<script>
import { useDataStore } from '../../stores/variables'
export default {
    name: 'Change-education',
    setup() {
        const Store = useDataStore();
        return { Store };
    },
    methods: {
        back() {
            this.$router.push({name: "Education"})
        },
        changeEducation() {            
            this.Store.CHANGE_EDUCATION(this.Store.education);
            this.$router.push({name: "Education"})
        }
    },
}
</script>