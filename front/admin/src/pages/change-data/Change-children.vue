<template>
    <div @click.prevent="back()" class="category_change_btn">Назад</div>
    <div class="category_title">Изменение количества детей для работы:</div>
    <form @submit.prevent="changeChildren" class="category_form">
        <div>Введите новое количества детей:</div>
        <input class="category_form_title" v-model="Store.children.title" type="text" required placeholder="Напишите что-нибудь">                
        <button class="category_form_btn" type="submit">Изменить количество детей</button>
    </form>
</template>

<script>
import { useDataStore } from '../../stores/variables'
export default {
    name: 'Change-children',
    setup() {
        const Store = useDataStore();
        return { Store };
    },
    methods: {
        back() {
            this.$router.push({name: "Children"})
        },
        changeChildren() {            
            this.Store.CHANGE_CHILDREN(this.Store.children);
            this.$router.push({name: "Children"})
        }
    },
}
</script>