<template>
    <div v-for="post in Views.clientBaby" :key="post.id">
        <div>{{ post }}</div>
        <span class="category_change_btn" @click.prevent="showItem(post)">Подробная анкета</span>
    </div>
</template>

<script>
import { useViewsStore } from '../../../stores/views';
export default {
    name: 'ClientBabyAll',
    setup() {
        const Views = useViewsStore();
        return { Views };
    },
    methods: {
        showItem(item) {            
            this.Views.clientBabyitem = item[0];
            localStorage.clientBabyitem = JSON.stringify(item[0]);
            this.$router.push({name: "ClientBabyItem"});
        }
    },
    mounted() {
        this.Views.GET_CLIENTBABY();
    },
}
</script>