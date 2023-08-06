<template> 
    <div @click.prevent="back()" class="category_change_btn">Назад</div>   
    <div>{{ Views.clientNurseitem }}</div>    
    <div>{{ Views.clientNurseitem.User }}</div>   
</template>

<script>
import { useViewsStore } from '../../../stores/views';
export default {
    name: 'ClientNurseItem',
    setup() {
        const Views = useViewsStore();
        return { Views };
    },
    methods: {
        back() {
            this.$router.push({name: "ClientNurseAll"})
        },
    },
    mounted() {
        this.Views.GET_CLIENTNURSE_ITEM();
    },
}
</script>