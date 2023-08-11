<template>
    <div>
        vacancies
    </div>
</template>

<script>
import { useUserStore } from '../../stores/user';
export default {
    name: "Vacancies",
    setup() {
        const User = useUserStore();
        return { User };
    }, 
    mounted() {
        this.User.GET_TOKEN();
    },
}
</script>