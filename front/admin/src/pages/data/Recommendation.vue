<template>
    <div class="category_title">Добавление рекомендации:</div>    
    <form @submit.prevent="createRecommendation" class="category_form">
        <div>Введите название рекомендации:</div>
        <input class="category_form_title" v-model="recommendation.title" type="text" required placeholder="Напишите что-нибудь">                
        <button class="category_form_btn" type="submit">Добавить рекомендацию</button>
    </form>
    <div class="category_title">Все рекомендации:</div>       
    <ul>                
        <li v-for="post in Store.recommendations" :key="post.id" class="category_item">
            {{ post.title }} 
            <span class="category_change_btn" @click.prevent="change_recommendation(post.id, post.title)">Изменить рекомендацию</span>
            <span class="category_change_btn red" @click.prevent="delete_recommendation(post.id)">Удалить рекомендацию</span>                
        </li>   
    </ul>    
</template>

<script>
import { useDataStore } from '../../stores/variables'
    export default {
        name: 'Recommendation',
        data() {
            return {
                recommendation: {},
                fix_recommendation: {},                
            }
        },
        setup() {
            const Store = useDataStore();
            return { Store };
        },
        methods: {
            createRecommendation() {
                this.Store.CREATE_RECOMMENDATION(this.recommendation);
                this.recommendation.title = '';
            },
            change_recommendation(id, title) {
                this.fix_recommendation.id = id;
                this.fix_recommendation.title = title;
                this.Store.GET_RECOMMENDATION(this.fix_recommendation);
                this.$router.push({name: "Change-recommendation"})                
            },
            delete_recommendation(id) {                
                this.Store.DELETE_RECOMMENDATION(id);                                
            } 
        },
        mounted() {
            this.Store.GET_RECOMMENDATIONS();                        
        },
    }
</script>
