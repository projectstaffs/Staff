<template>
    <div v-for="post in Views.clientKeeper" :key="post.id">
        <div>{{ post }}</div>
        <span class="category_change_btn" @click.prevent="showItem(post)">Подробная анкета</span>
    </div>
</template>

<script>
import { useViewsStore } from '../../../stores/views';
import { useUserStore } from '../../../stores/user';
export default {
    name: 'ClientBabyAll',
    setup() {
        const Views = useViewsStore();
        const User = useUserStore();
        return { Views, User };
    },
    methods: {
        showItem(item) {            
            this.Views.clientKeeperitem = item[0];
            localStorage.clientKeeperitem = JSON.stringify(item[0]);
            this.$router.push({name: "ClientKeeperItem"});
        }
    },
    mounted() {
        this.User.GET_TOKEN();
        this.Views.GET_CLIENTKEEPER();
    },
}
</script>