<template>
    <div v-for="post in Views.clientBaby" :key="post.id">
        <div>{{ post }}</div>
    </div>
</template>

<script>
import { useViewsStore } from '../../../stores/views';
export default {
    name: 'ClientBabyAll',
    setup() {
        const Views = useViewsStore();
        return { Views };
    },
    mounted() {
        this.Views.GET_CLIENTBABY();
    },
}
</script>