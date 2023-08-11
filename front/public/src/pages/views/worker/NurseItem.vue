<template>    
    <div @click.prevent="back()" class="category_change_btn">Назад</div>
    <div>{{ Views.workerNurseitem }}</div>    
    <div>{{ Views.workerNurseitem.User }}</div>   
</template>

<script>
import { useViewsStore } from '../../../stores/views';
import { useUserStore } from '../../../stores/user';
export default {
    name: 'NurseItem',
    setup() {
        const Views = useViewsStore();
        const User = useUserStore();
        return { Views, User };
    },
    methods: {
        back() {
            this.$router.push({name: "NurseAll"})
        },
    },
    mounted() {
        this.User.GET_TOKEN();
        this.Views.GET_WORKERNURSE_ITEM();
    },
}
</script>