<template>
    <div @click.prevent="back()" class="category_change_btn">Назад</div>
    <div class="category_title">Изменение религии:</div>
    <form @submit.prevent="changeReligion" class="category_form">
        <div>Введите новое название религии:</div>
        <input class="category_form_title" v-model="Store.religion.title" type="text" required placeholder="Напишите что-нибудь">                
        <button class="category_form_btn" type="submit">Изменить религию</button>
    </form>
</template>

<script>
import { useDataStore } from '../../stores/variables'
export default {
    name: 'Change-religion',
    setup() {
        const Store = useDataStore();
        return { Store };
    },
    methods: {
        back() {
            this.$router.push({name: "Religion"})
        },
        changeReligion() {            
            this.Store.CHANGE_RELIGION(this.Store.religion);
            this.$router.push({name: "Religion"})
        }
    },
}
</script>