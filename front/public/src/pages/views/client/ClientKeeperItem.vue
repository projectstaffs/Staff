<template>   
    <div @click.prevent="back()" class="category_change_btn">Назад</div> 
    <div>{{ Views.clientKeeperitem }}</div>    
    <div>{{ Views.clientKeeperitem.User }}</div>   
</template>

<script>
import { useViewsStore } from '../../../stores/views';
export default {
    name: 'ClientKeeperItem',
    setup() {
        const Views = useViewsStore();
        return { Views };
    },
    methods: {
        back() {
            this.$router.push({name: "ClientKeeperAll"})
        },
    },
    mounted() {
        this.Views.GET_CLIENTKEEPER_ITEM();
    },
}
</script>