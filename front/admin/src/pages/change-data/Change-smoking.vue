<template>
    <div @click.prevent="back()" class="category_change_btn">Назад</div>
    <div class="category_title">Изменение отношения к курению:</div>
    <form @submit.prevent="changeSmoking" class="category_form">
        <div>Введите новое название отношения к курению:</div>
        <input class="category_form_title" v-model="Store.smoking.title" type="text" required placeholder="Напишите что-нибудь">                
        <button class="category_form_btn" type="submit">Изменить отношение</button>
    </form>
</template>

<script>
import { useDataStore } from '../../stores/variables'
export default {
    name: 'Change-smoking',
    setup() {
        const Store = useDataStore();
        return { Store };
    },
    methods: {
        back() {
            this.$router.push({name: "Smoking"})
        },
        changeSmoking() {            
            this.Store.CHANGE_SMOKING(this.Store.smoking);
            this.$router.push({name: "Smoking"})
        }
    },
}
</script>