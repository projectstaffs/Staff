<template>    
    <div @click.prevent="back()" class="category_change_btn">Назад</div>
    <div>{{ Views.clientBabyitem }}</div>    
    <div>{{ Views.clientBabyitem.User }}</div>   
</template>

<script>
import { useViewsStore } from '../../../stores/views';
export default {
    name: 'ClientBabyItem',
    setup() {
        const Views = useViewsStore();
        return { Views };
    },
    methods: {
        back() {
            this.$router.push({name: "ClientBabyAll"})
        },
    },
    mounted() {
        this.Views.GET_CLIENTBABY_ITEM();
    },
}
</script>