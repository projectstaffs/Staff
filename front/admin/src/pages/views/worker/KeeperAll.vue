<template>
    <div v-for="post in displayedPosts" :key="post.id">
        <div class="view">
            <div class="view_content">
                <div class="view_inner">
                    <div class="edit_title">
                        {{ post.User.name.ua }} {{ post.User.surname.ua }}
                    </div>
                    <div class="view_date">

                    </div>
                    <div class="anketa_text">
                        {{ post.monthpay.title.ua }} &nbsp;&nbsp;•&nbsp;&nbsp;
                        {{ post.User.city_title.title.ua }}
                    </div>

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
    name: 'KeeperAll',
    data() {
        return {
            itemsPerPage: 2,
            pageValue: "currentWKPage"
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
            const keys = Object.keys(this.Views.workerKeeper);
            const startIndex = (this.Views.currentWKPage - 1) * this.itemsPerPage;
            const endIndex = startIndex + this.itemsPerPage;
            return keys.slice(startIndex, endIndex).map(key => this.Views.workerKeeper[key]);
        },
        totalPages() {
            return Math.ceil(this.Views.workerKeeper.length / this.itemsPerPage);
        },
    },
    mounted() {
        this.Views.GET_WORKERKEEPER();
    },
}
</script>