<template>
    <div @click.prevent="back()" class="category_change_btn">Назад</div>
    <div class="category_title">Изменение обязаность сиделки:</div>
    <form @submit.prevent="changeNursedutie" class="category_form">
        <div>Введите новое название обязаности сиделки:</div>
        <input class="category_form_title" v-model="Store.nursedutie.title" type="text" required placeholder="Напишите что-нибудь">                
        <button class="category_form_btn" type="submit">Изменить обязаность сиделки</button>
    </form>
</template>

<script>
import { useDataStore } from '../../stores/variables'
export default {
    name: 'Change-nursedutie',
    setup() {
        const Store = useDataStore();
        return { Store };
    },
    methods: {
        back() {
            this.$router.push({name: "Nursedutie"})
        },
        changeNursedutie() {            
            this.Store.CHANGE_NURSEDUTIE(this.Store.nursedutie);
            this.$router.push({name: "Nursedutie"})
        }
    },
}
</script>