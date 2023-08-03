<template>
    <div @click.prevent="back()" class="category_change_btn">Назад</div>
    <div class="category_title">Изменение возрастную групу:</div>
    <form @submit.prevent="changeAgegroup" class="category_form">
        <div>Введите новое название возрастной групы:</div>
        <input class="category_form_title" v-model="Store.agegroup.title" type="text" required placeholder="Напишите что-нибудь">                
        <button class="category_form_btn" type="submit">Изменить возрастную групу</button>
    </form>
</template>

<script>
import { useDataStore } from '../../stores/variables'
export default {
    name: 'Change-agegroup',
    setup() {
        const Store = useDataStore();        
        return { Store };
    },
    methods: {
        back() {
            this.$router.push({name: "Agegroup"})
        },
        changeAgegroup() {            
            this.Store.CHANGE_AGEGROUP(this.Store.agegroup);
            this.$router.push({name: "Agegroup"})
        }
    },
}
</script>