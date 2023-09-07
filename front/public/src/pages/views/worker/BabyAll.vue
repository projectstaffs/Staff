<template>
    <div v-for="post in Views.workerBaby" :key="post.id">
        <div class="anketa">
            {{ post }}
        </div>
        <span class="category_change_btn" @click.prevent="showItem(post)">Подробная анкета</span>
    </div>    
</template>

<script>
import { useViewsStore } from '../../../stores/views';
import { useUserStore } from '../../../stores/user';
export default {
    name: 'BabyAll',
    setup() {
        const Views = useViewsStore();
        const User = useUserStore();
        return { Views, User };
    },
    methods: {
        showItem(item) {            
            this.Views.workerBabyitem = item[0];
            localStorage.workerBabyitem = JSON.stringify(item[0]);
            this.$router.push({name: "BabyItem"});
        }
    },
    mounted() {
        this.User.GET_TOKEN();
        this.Views.GET_WORKERBABY();
    },
}
</script>