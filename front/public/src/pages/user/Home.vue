<template>
    <h1>Home page</h1>    
    <div class="category_title">Все отзывы:</div>       
    <ul>                
        <li v-for="post in Review.reviews" :key="post.id" class="category_item">
            {{ post.name }} {{ post.surname }} {{ post.city }} {{ post.content }}                
        </li>   
    </ul>
</template>

<script>
import { useUserStore } from '../../stores/user';
import { useReviewStore } from '../../stores/review';
export default {
    name: "Home",
    setup() {
        const User = useUserStore();
        const Review = useReviewStore();
        return { User, Review };
    }, 
    mounted() {
        this.User.GET_TOKEN();
        this.Review.GET_REVIEWS();
    },      
}
</script>

