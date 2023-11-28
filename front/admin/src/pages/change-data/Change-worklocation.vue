<template>
    <div @click.prevent="back()" class="category_change_btn">Назад</div>
    <div class="category_title">Изменение местоположения работы для сиделки:</div>
    <form @submit.prevent="changeWorklocation" class="category_form">
        <div>Введите новое местоположение работы для сиделки:</div>
        <input class="category_form_title" v-model="Store.worklocation.title" type="text" required placeholder="Напишите что-нибудь">                
        <button class="category_form_btn" type="submit">Изменить местоположение</button>
    </form>
</template>

<script>
import { useDataStore } from '../../stores/variables'
export default {
    name: 'Change-worklocation',
    setup() {
        const Store = useDataStore();
        return { Store };
    },
    methods: {
        back() {
            this.$router.push({name: "Worklocation"})
        },
        changeWorklocation() {            
            this.Store.CHANGE_WORKLOCATION(this.Store.worklocation);
            this.$router.push({name: "Worklocation"})
        }
    },
}
</script>