<template>
    <div @click.prevent="back()" class="category_change_btn">Назад</div>
    <div class="category_title">Изменение умения для сиделки:</div>
    <form @submit.prevent="changeNursingskill" class="category_form">
        <div>Введите новое умение для сиделки:</div>
        <input class="category_form_title" v-model="Store.nursingskill.title" type="text" required placeholder="Напишите что-нибудь">                
        <button class="category_form_btn" type="submit">Изменить умение</button>
    </form>
</template>

<script>
import { useDataStore } from '../../stores/variables'
export default {
    name: 'Change-nursingskill',
    setup() {
        const Store = useDataStore();
        return { Store };
    },
    methods: {
        back() {
            this.$router.push({name: "Nursingskill"})
        },
        changeNursingskill() {            
            this.Store.CHANGE_NURSINGSKILL(this.Store.nursingskill);
            this.$router.push({name: "Nursingskill"})
        }
    },
}
</script>