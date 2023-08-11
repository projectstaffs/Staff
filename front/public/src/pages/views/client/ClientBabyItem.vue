<template>    
    <div @click.prevent="back()" class="category_change_btn">Назад</div>
    <div>{{ Views.clientBabyitem }}</div>    
    <div>{{ Views.clientBabyitem.User }}</div>   
</template>

<script>
import { useViewsStore } from '../../../stores/views';
import { useUserStore } from '../../../stores/user';
export default {
    name: 'ClientBabyItem',
    setup() {
        const Views = useViewsStore();
        const User = useUserStore();
        return { Views, User };
    },
    methods: {
        back() {
            this.$router.push({name: "ClientBabyAll"})
        },
    },
    mounted() {
        this.User.GET_TOKEN();
        this.Views.GET_CLIENTBABY_ITEM();
    },
}
</script>