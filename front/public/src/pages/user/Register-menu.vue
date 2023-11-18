<template>
    <div>
        <div @click.prevent="employer" class="user_btn">регистрация для нанимателя</div> 
        <div @click.prevent="executor" class="user_btn">регистрация для исполнителя</div>
    </div>    
</template>

<script>
import { useUserStore } from '../../stores/user';
export default {
    name: "Register-menu",
    setup() {
        const User = useUserStore();
        return { User };
    }, 
    methods: {
        employer() {
            this.$router.push({name: "Register-employer"});
        },
        executor() {
            this.$router.push({name: "Register"});
        }
    },
    mounted() {
        this.User.GET_TOKEN();
    },
}
</script>
