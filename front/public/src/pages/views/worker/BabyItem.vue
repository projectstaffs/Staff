<template>    
    <div @click.prevent="back()" class="category_change_btn">Назад</div>
    <div>{{ Views.workerBabyitem }}</div>    
    <div>{{ Views.workerBabyitem.User }}</div>   
</template>

<script>
import { useViewsStore } from '../../../stores/views';
export default {
    name: 'BabyItem',
    setup() {
        const Views = useViewsStore();
        return { Views };
    },
    methods: {
        back() {
            this.$router.push({name: "BabyAll"})
        },
    },
    mounted() {
        this.Views.GET_WORKERBABY_ITEM();
    },
}
</script>