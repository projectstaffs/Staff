<template>
    <div @click.prevent="back()" class="category_change_btn">Назад</div>
    <div class="category_title">Изменение варианта работы:</div>
    <form @submit.prevent="changeJoboption" class="category_form">
        <div>Введите новое название варианта работы:</div>
        <input class="category_form_title" v-model="Store.joboption.title" type="text" required placeholder="Напишите что-нибудь">                
        <button class="category_form_btn" type="submit">Изменить вариант работы</button>
    </form>
</template>

<script>
import { useDataStore } from '../../stores/variables'
export default {
    name: 'Change-joboption',
    setup() {
        const Store = useDataStore();
        return { Store };
    },
    methods: {
        back() {
            this.$router.push({name: "Joboption"})
        },
        changeJoboption() {            
            this.Store.CHANGE_JOBOPTION(this.Store.joboption);
            this.$router.push({name: "Joboption"})
        }
    },
}
</script>