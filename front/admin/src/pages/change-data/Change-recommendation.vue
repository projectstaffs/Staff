<template>
    <div @click.prevent="back()" class="category_change_btn">Назад</div>
    <div class="category_title">Изменение рекомендации:</div>
    <form @submit.prevent="changeRecommendation" class="category_form">
        <div>Введите новое название рекомендации:</div>
        <input class="category_form_title" v-model="Store.recommendation.title" type="text" required placeholder="Напишите что-нибудь">                
        <button class="category_form_btn" type="submit">Изменить рекомендацию</button>
    </form>
</template>

<script>
import { useDataStore } from '../../stores/variables'
export default {
    name: 'Change-recommendation',
    setup() {
        const Store = useDataStore();
        return { Store };
    }, 
    methods: {
        back() {
            this.$router.push({name: "Recommendation"})
        },
        changeRecommendation() {            
            this.Store.CHANGE_RECOMMENDATION(this.Store.recommendation);
            this.$router.push({name: "Recommendation"})
        }
    },
}
</script>