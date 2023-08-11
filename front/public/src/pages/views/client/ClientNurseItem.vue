<template> 
    <div @click.prevent="back()" class="category_change_btn">Назад</div>   
    <div>{{ Views.clientNurseitem }}</div>    
    <div>{{ Views.clientNurseitem.User }}</div>   
</template>

<script>
import { useViewsStore } from '../../../stores/views';
import { useUserStore } from '../../../stores/user';
export default {
    name: 'ClientNurseItem',
    setup() {
        const Views = useViewsStore();
        const User = useUserStore();
        return { Views, User };
    },
    methods: {
        back() {
            this.$router.push({name: "ClientNurseAll"})
        },
    },
    mounted() {
        this.Views.GET_CLIENTNURSE_ITEM();
        this.User.GET_TOKEN();
    },
}
</script>