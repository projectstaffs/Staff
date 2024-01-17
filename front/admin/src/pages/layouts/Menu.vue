<template>
    <div class="admin">
        <div class="admin_sidebar">
            <div class="admin_sidebar_title">Главная</div>
            <div @click.prevent="users" class="admin_sidebar_item">Пользователи</div>
            <div @click.prevent="children" class="admin_sidebar_item">Количество детей</div>
            <div @click.prevent="languages" class="admin_sidebar_item">Родной язык</div>
            <div @click.prevent="agegroup" class="admin_sidebar_item">Возрастные групы</div>
            <div @click.prevent="babysittingdutie" class="admin_sidebar_item">Обязаности для няни</div>
            <div @click.prevent="city" class="admin_sidebar_item">Родной город</div>
            <div @click.prevent="diagnose" class="admin_sidebar_item">Диагнозы</div>
            <div @click.prevent="education" class="admin_sidebar_item">Образование</div>
            <div @click.prevent="hourlypayment" class="admin_sidebar_item">Почасовая оплата</div>
            <div @click.prevent="housekeeperdutie" class="admin_sidebar_item">Обязаности домработницы</div>
            <div @click.prevent="housekeeperpreference" class="admin_sidebar_item">Предпочтения для домработницы</div>
            <div @click.prevent="housekeepertypeofwork" class="admin_sidebar_item">Вид работы для домработницы</div>
            <div @click.prevent="monthlypayment" class="admin_sidebar_item">Помесячная оплата</div>
            <div @click.prevent="nursedutie" class="admin_sidebar_item">Обязаности сиделки</div>
            <div @click.prevent="nursetypeofwork" class="admin_sidebar_item">Вид работы для сиделки</div>
            <div @click.prevent="typeofwork" class="admin_sidebar_item">Вид работы для няни</div>
            <div @click.prevent="workperiod" class="admin_sidebar_item">Периоды работы</div>
        </div>
        <div class="admin_main">
            <div class="admin_main_title">Админ-панель</div>
            <router-view />
        </div>
    </div>
</template>

<script>
import { useUserStore } from '../../stores/user';
export default {
    name: "Menu",
    setup() {
        const User = useUserStore();
        return { User };
    },
    methods: {
        users() {
            this.$router.push({ name: "Users" })
        },
        children() {
            this.$router.push({ name: "Children" })
        },
        languages() {
            this.$router.push({ name: "Languages" })
        },
        agegroup() {
            this.$router.push({ name: "Agegroup" })
        },
        babysittingdutie() {
            this.$router.push({ name: "Babysittingdutie" })
        },
        city() {
            this.$router.push({ name: "City" })
        },
        diagnose() {
            this.$router.push({ name: "Diagnose" })
        },
        education() {
            this.$router.push({ name: "Education" })
        },
        experience() {
            this.$router.push({ name: "Experience" })
        },
        hourlypayment() {
            this.$router.push({ name: "Hourlypayment" })
        },
        housekeeperdutie() {
            this.$router.push({ name: "Housekeeperdutie" })
        },
        housekeeperpreference() {
            this.$router.push({ name: "Housekeeperpreference" })
        },
        housekeepertypeofwork() {
            this.$router.push({ name: "Housekeepertypeofwork" })
        },
        monthlypayment() {
            this.$router.push({ name: "Monthlypayment" })
        },
        nursedutie() {
            this.$router.push({ name: "Nursedutie" })
        },
        nursetypeofwork() {
            this.$router.push({ name: "Nursetypeofwork" })
        },
        typeofwork() {
            this.$router.push({ name: "Typeofwork" })
        },
        workperiod() {
            this.$router.push({ name: "Workperiod" })
        },
    },
    mounted() {
        this.User.GET_TOKEN();
    },
}
</script>


