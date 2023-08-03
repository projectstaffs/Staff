<template>
    <div @click.prevent="back()" class="category_change_btn">Назад</div>
    <div class="category_title">Изменение обязаность для няни:</div>
    <form @submit.prevent="changeBabysittingdutie" class="category_form">
        <div>Введите новую обязаность:</div>
        <input class="category_form_title" v-model="Store.babysittingdutie.title" type="text" required placeholder="Напишите что-нибудь">                
        <button class="category_form_btn" type="submit">Изменить обязаность</button>
    </form>
</template>

<script>
import { useDataStore } from '../../stores/variables'
export default {
    name: 'Change-babysittingdutie',
    setup() {
        const Store = useDataStore();
        return { Store };
    }, 
    methods: {
        back() {
            this.$router.push({name: "Babysittingdutie"})
        },
        changeBabysittingdutie() {            
            this.Store.CHANGE_BABYSITTINGDUTIE(this.Store.babysittingdutie);
            this.$router.push({name: "Babysittingdutie"})
        }
    },
}
</script>