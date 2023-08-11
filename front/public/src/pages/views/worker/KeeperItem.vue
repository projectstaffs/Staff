<template>    
    <div @click.prevent="back()" class="category_change_btn">Назад</div>
    <div>{{ Views.workerKeeperitem }}</div>    
    <div>{{ Views.workerKeeperitem.User }}</div>   
</template>

<script>
import { useViewsStore } from '../../../stores/views';
import { useUserStore } from '../../../stores/user';
export default {
    name: 'KeeperItem',
    setup() {
        const Views = useViewsStore();
        const User = useUserStore();
        return { Views, User };
    },
    methods: {
        back() {
            this.$router.push({name: "KeeperAll"})
        },
    },
    mounted() {
        this.User.GET_TOKEN();
        this.Views.GET_WORKERKEEPER_ITEM();
    },
}
</script>