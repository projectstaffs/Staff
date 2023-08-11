<template>    
    <div @click.prevent="back()" class="category_change_btn">Назад</div>
    <div>{{ Views.workerBabyitem }}</div>    
    <div>{{ Views.workerBabyitem.User }}</div>   
</template>

<script>
import { useViewsStore } from '../../../stores/views';
import { useUserStore } from '../../../stores/user';
export default {
    name: 'BabyItem',
    setup() {
        const Views = useViewsStore();
        const User = useUserStore();
        return { Views, User };
    },
    methods: {
        back() {
            this.$router.push({name: "BabyAll"})
        },
    },
    mounted() {
        this.User.GET_TOKEN();
        this.Views.GET_WORKERBABY_ITEM();
    },
}
</script>