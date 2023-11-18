<template>
    <div @click.prevent="back()" class="category_change_btn">Назад</div>
    <div class="category_title">Изменение информации о несудимости:</div>
    <form @submit.prevent="changeCriminal" class="category_form">
        <div>Введите новую информацию о несудимости:</div>
        <input class="category_form_title" v-model="Store.criminal.title" type="text" required placeholder="Напишите что-нибудь">                
        <button class="category_form_btn" type="submit">Изменить информацию о несудимости</button>
    </form>
</template>

<script>
import { useDataStore } from '../../stores/variables'
export default {
    name: 'Change-criminal',
    setup() {
        const Store = useDataStore();
        return { Store };
    },
    methods: {
        back() {
            this.$router.push({name: "Criminal"})
        },
        changeCriminal() {            
            this.Store.CHANGE_CRIMINAL(this.Store.criminal);
            this.$router.push({name: "Criminal"})
        }
    },
}
</script>