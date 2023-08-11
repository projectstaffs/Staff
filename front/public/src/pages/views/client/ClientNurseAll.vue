<template>
    <div v-for="post in Views.clientNurse" :key="post.id">
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
            this.Views.clientNurseitem = item[0];
            localStorage.clientNurseitem = JSON.stringify(item[0]);
            this.$router.push({name: "ClientNurseItem"});
        }
    },
    mounted() {
        this.User.GET_TOKEN();
        this.Views.GET_CLIENTNURSE();
    },
}
</script>