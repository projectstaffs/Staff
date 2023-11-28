<template>
    <div @click.prevent="back()" class="category_change_btn">Назад</div>
    <div class="category_title">Изменение диагноза:</div>
    <form @submit.prevent="changeDiagnose" class="category_form">
        <div>Введите новое название диагноза:</div>
        <input class="category_form_title" v-model="Store.diagnose.title" type="text" required placeholder="Напишите что-нибудь">                
        <button class="category_form_btn" type="submit">Изменить диагноз</button>
    </form>
</template>

<script>
import { useDataStore } from '../../stores/variables'
export default {
    name: 'Change-diagnose',
    setup() {
        const Store = useDataStore();
        return { Store };
    },
    methods: {
        back() {
            this.$router.push({name: "Diagnose"})
        },
        changeDiagnose() {            
            this.Store.CHANGE_DIAGNOSE(this.Store.diagnose);
            this.$router.push({name: "Diagnose"})
        }
    },
}
</script>