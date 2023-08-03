<template>
    <div @click.prevent="back()" class="category_change_btn">Назад</div>
    <div class="category_title">Изменение языка:</div>
    <form @submit.prevent="changeLanguage" class="category_form">
        <div>Введите новое название языка:</div>
        <input class="category_form_title" v-model="Store.language.title" type="text" required placeholder="Напишите что-нибудь">                
        <button class="category_form_btn" type="submit">Изменить язык</button>
    </form>
</template>

<script>
import { useDataStore } from '../../stores/variables'
export default {
    name: 'Change-language',
    setup() {
        const Store = useDataStore();
        return { Store };
    }, 
    methods: {
        back() {
            this.$router.push({name: "Languages"})
        },
        changeLanguage() {            
            this.Store.CHANGE_LANGUAGE(this.Store.language);
            this.$router.push({name: "Languages"})
        }
    },
}
</script>