<template>
    <div v-for="post in displayedPosts" :key="post.id">
        <div class="view">
            <div class="view_content">
                <div class="view_inner">
                    <div class="edit_title">
                        {{ post.User.name.ua }} {{ post.User.surname.ua }}
                    </div>
                    <div class="view_date">
                        {{ post.date }}
                    </div>
                    <div class="anketa_text">
                        {{ post.monthpay.title.ua }} &nbsp;&nbsp;•&nbsp;&nbsp;
                        {{ post.User.city_title.title.ua }}
                    </div>
                    <span v-for="(item, index) in post.Typeworks" :key="index" class="anketa_text">
                        {{ item.title.title.ua }}{{ index < post.Typeworks.length - 1 ? ', ' : '' }} </span>
                </div>
            </div>
            <div class="cabinet_box">
                <img v-if="post.User.image" class="cabinet_img" :src="post.User.image" alt="">
                <div v-else class="cabinet_noimg">no img</div>
            </div>
        </div>
    </div>

    <Pagination :totalPages="totalPages" :namePage="pageValue" />
</template>

<script>
import { useViewsStore } from '../../../stores/views';
import { useUserStore } from '../../../stores/user';
import Pagination from '../../layouts/Pagination.vue';
export default {
    name: 'BabyAll',
    data() {
        return {
            itemsPerPage: 2, // Количество постов на странице
            pageValue: "currentWBPage"
        }
    },
    components: { Pagination },
    setup() {
        const Views = useViewsStore();
        const User = useUserStore();
        return { Views, User };
    },
    computed: {
        displayedPosts() {
            const keys = Object.keys(this.Views.workerBaby);
            const startIndex = (this.Views.currentWBPage - 1) * this.itemsPerPage;
            const endIndex = startIndex + this.itemsPerPage;
            return keys.slice(startIndex, endIndex).map(key => this.Views.workerBaby[key]);
        },
        totalPages() {
            return Math.ceil(this.Views.workerBaby.length / this.itemsPerPage);
        },
    },
    mounted() {
        this.Views.GET_WORKERBABY();
    },
}
</script>