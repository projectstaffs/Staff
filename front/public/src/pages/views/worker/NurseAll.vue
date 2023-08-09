<template>
    <div v-for="post in Views.workerNurse" :key="post.id">
        <div>{{ post }}</div>
        <span class="category_change_btn" @click.prevent="showItem(post)">Подробная анкета</span>
    </div>    
</template>

<script>
import { useViewsStore } from '../../../stores/views';
export default {
    name: 'NurseAll',
    setup() {
        const Views = useViewsStore();
        return { Views };
    },
    methods: {
        showItem(item) {            
            this.Views.workerNurseitem = item[0];
            localStorage.workerNurseitem = JSON.stringify(item[0]);
            this.$router.push({name: "NurseItem"});
        }
    },
    mounted() {
        this.Views.GET_WORKERNURSE();
    },
}
</script>