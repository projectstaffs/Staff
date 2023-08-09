<template>
    <div v-for="post in Views.workerKeeper" :key="post.id">
        <div>{{ post }}</div>
        <span class="category_change_btn" @click.prevent="showItem(post)">Подробная анкета</span>
    </div>    
</template>

<script>
import { useViewsStore } from '../../../stores/views';
export default {
    name: 'KeeperAll',
    setup() {
        const Views = useViewsStore();
        return { Views };
    },
    methods: {
        showItem(item) {            
            this.Views.workerKeeperitem = item[0];
            localStorage.workerKeeperitem = JSON.stringify(item[0]);
            this.$router.push({name: "KeeperItem"});
        }
    },
    mounted() {
        this.Views.GET_WORKERKEEPER();
    },
}
</script>