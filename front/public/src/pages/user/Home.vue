<template>
    <h1>Home page</h1>    
    
</template>

<script>
import { useUserStore } from '../../stores/user';
export default {
    name: "Home",
    setup() {
        const User = useUserStore();
        return { User };
    }, 
    mounted() {
        this.User.GET_TOKEN();
    },      
}
</script>

