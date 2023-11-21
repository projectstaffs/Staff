<template>
    <div class="category_title">Добавление отзыва:</div>    
    <form @submit.prevent="createReview" class="category_form">
        <div>Введите текст отзыва:</div>
        <input class="category_form_title" v-model="review.content" type="text" required placeholder="Напишите что-нибудь"> 
        <button class="category_form_btn" type="submit">Добавить отзыв</button>
    </form>
    <div class="register_error" v-for="item in User.global_error" :key="item">
        {{ item[0] }}
    </div>
    <div class="msg_success">{{ Review.success }}</div>
</template>

<script>
import { useUserStore } from '../../stores/user';
import { useReviewStore } from '../../stores/review';
export default {
    name: "Vacancies",
    data() {
        return {
            review: {}
        }
    },
    setup() {
        const User = useUserStore();
        const Review = useReviewStore();
        return { User, Review };
    },
    methods: {
        createReview() {
                this.Review.success = '';
                this.User.global_error = null;
                this.review.name = this.User.user.name;
                this.review.surname = this.User.user.surname;
                this.review.city = this.User.user.city;
                this.Review.CREATE_REVIEW(this.review);
                //this.credential.full_name = ''; this.credential.phone = ''; this.credential.email = ''; this.credential.content = '';
            },
    }, 
    mounted() {
        this.User.GET_TOKEN();
        this.User.global_error = null; this.Review.success = '';
    },
}
</script>