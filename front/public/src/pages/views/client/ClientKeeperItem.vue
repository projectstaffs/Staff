<template>   
    <div @click.prevent="back()" class="category_change_btn">Назад</div> 
    <div>{{ Views.clientKeeperitem }}</div>    
    <div>{{ Views.clientKeeperitem.User }}</div>   
</template>

<script>
import { useViewsStore } from '../../../stores/views';
import { useUserStore } from '../../../stores/user';
export default {
    name: 'ClientKeeperItem',
    setup() {
        const Views = useViewsStore();
        const User = useUserStore();
        return { Views, User };
    },
    methods: {
        back() {
            this.$router.push({name: "ClientKeeperAll"})
        },
    },
    mounted() {
        this.User.GET_TOKEN();
        this.Views.GET_CLIENTKEEPER_ITEM();
    },
}
</script>