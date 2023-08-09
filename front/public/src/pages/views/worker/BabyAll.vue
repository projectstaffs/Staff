<template>
    <div v-for="post in Views.workerBaby" :key="post.id">
        <div>{{ post }}</div>
        <span class="category_change_btn" @click.prevent="showItem(post)">Подробная анкета</span>
    </div>    
</template>

<script>
import { useViewsStore } from '../../../stores/views';
export default {
    name: 'BabyAll',
    setup() {
        const Views = useViewsStore();
        return { Views };
    },
    methods: {
        showItem(item) {            
            this.Views.workerBabyitem = item[0];
            localStorage.workerBabyitem = JSON.stringify(item[0]);
            this.$router.push({name: "BabyItem"});
        }
    },
    mounted() {
        this.Views.GET_WORKERBABY();
    },
}
</script>