<template>    
    <div @click.prevent="back()" class="category_change_btn">Назад</div>
    <div>{{ Views.workerNurseitem }}</div>    
    <div>{{ Views.workerNurseitem.User }}</div>   
</template>

<script>
import { useViewsStore } from '../../../stores/views';
export default {
    name: 'NurseItem',
    setup() {
        const Views = useViewsStore();
        return { Views };
    },
    methods: {
        back() {
            this.$router.push({name: "NurseAll"})
        },
    },
    mounted() {
        this.Views.GET_WORKERNURSE_ITEM();
    },
}
</script>