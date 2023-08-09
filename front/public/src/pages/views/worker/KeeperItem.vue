<template>    
    <div @click.prevent="back()" class="category_change_btn">Назад</div>
    <div>{{ Views.workerKeeperitem }}</div>    
    <div>{{ Views.workerKeeperitem.User }}</div>   
</template>

<script>
import { useViewsStore } from '../../../stores/views';
export default {
    name: 'KeeperItem',
    setup() {
        const Views = useViewsStore();
        return { Views };
    },
    methods: {
        back() {
            this.$router.push({name: "KeeperAll"})
        },
    },
    mounted() {
        this.Views.GET_WORKERKEEPER_ITEM();
    },
}
</script>