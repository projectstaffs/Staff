<template>
    <div class="wrapper">
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="../../assets/js/dist1/img/AdminLTELogo.png" alt="AdminLTELogo" height="60"
                width="60">
        </div>

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li v-if="!User.token" @click.prevent="login" class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Авторизація</a>
                </li>
                <li v-if="User.token" @click.prevent="logout" class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Вихід</a>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="#" class="brand-link">
                <span class="brand-text font-weight-light">Адмін-панель</span>
            </a>

            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Користувачі
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Роботодавці</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Шукачі роботи</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Анкети для роботодавців
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Няні</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Доглядальниці</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Домробітниці</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Анкети для шукачів роботи
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Няні</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Доглядальниці</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Домробітниці</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    Дані для заповнення анкет
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a @click.prevent="children" href="pages/tables/simple.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Кількість дітей</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a @click.prevent="languages" href="pages/tables/data.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Рідна мова</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a @click.prevent="agegroup" href="pages/tables/jsgrid.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Вікові групи</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a @click.prevent="city" href="pages/tables/data.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Місто</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a @click.prevent="diagnose" href="pages/tables/data.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Діагнози</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a @click.prevent="education" href="pages/tables/data.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Освіта</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a @click.prevent="experience" href="pages/tables/data.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Досвід роботи</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a @click.prevent="monthlypayment" href="pages/tables/data.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Щомісячна оплата</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a @click.prevent="hourlypayment" href="pages/tables/data.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Погодинна оплата</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a @click.prevent="babysittingdutie" href="pages/tables/data.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Обов'язки для няні</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a @click.prevent="nursedutie" href="pages/tables/data.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Обов'язки для доглядальниці</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a @click.prevent="housekeeperdutie" href="pages/tables/data.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Обов'язки для домробітниці</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a @click.prevent="typeofwork" href="pages/tables/data.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Види робіт для няні</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a @click.prevent="nursetypeofwork" href="pages/tables/data.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Види робіт для доглядальниці</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a @click.prevent="housekeepertypeofwork" href="pages/tables/data.html"
                                        class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Види робіт для домробітниці</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a @click.prevent="housekeeperpreference" href="pages/tables/data.html"
                                        class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Вподобання для домробітниці</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a @click.prevent="workperiod" href="pages/tables/data.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Періоди роботи</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <router-view />
                </div>
            </div>
        </div>

        <footer class="main-footer">
            <strong>&copy; 2023 <a href="http://localhost/"> HouseHub Agency</a>.</strong>
            Всі права захищені.
            <div class="float-right d-none d-sm-inline-block">
                <b>Версія</b> 1.1.0
            </div>
        </footer>
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
        login() {
            this.$router.push({ name: "Login" })
        },
        logout() {
            this.User.LOGOUT_USER();
        },
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


