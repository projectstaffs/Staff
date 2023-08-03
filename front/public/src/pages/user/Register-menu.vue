<template>
    <div>
        <div @click.prevent="employer" class="user_btn">регистрация для нанимателя</div> 
        <div @click.prevent="executor" class="user_btn">регистрация для исполнителя</div>
    </div>    
</template>

<script>
export default {
    name: "Register-menu",
    methods: {
        employer() {
            this.$router.push({name: "Register-employer"});
        },
        executor() {
            this.$router.push({name: "Register"});
        }
    }
}
</script>
