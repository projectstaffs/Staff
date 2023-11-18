<template>
    <div class="category_title">Все отзывы:</div>       
    <ul>                
        <li v-for="post in Review.reviews" :key="post.id" class="category_item">
            {{ post.name }} {{ post.surname }} {{ post.city }} {{ post.content }} <span class="category_change_btn red" @click.prevent="delete_review(post.id)">Удалить сообщение</span>               
        </li>   
    </ul>
</template>

<script>
import { useReviewStore } from '../../stores/review';
export default {
    name: "Reviews",
    setup() {
        const Review = useReviewStore();
        return { Review };
    },
    methods: {
        delete_review(id) {
            this.Review.DELETE_REVIEW(id);
        }
    },
    mounted() {
        this.Review.GET_REVIEWS();
    },
}
</script>