<template>
    <section class="content">
        <div class="card card-solid">
            <div class="card-body pb-0">
                <div v-for="user in displayedPosts" :key="user.id" class="row">
                    <div class="col-12 col-sm-6 col-md-12 d-flex align-items-stretch flex-column">
                        <div class="card bg-light d-flex flex-fill">
                            <div class="card-header text-muted border-bottom-0">
                                {{ user.User.name.en }} {{ user.User.surname.en }}
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="lead"><b>{{ user.User.name.ua }} {{ user.User.surname.ua }}</b></h2>
                                        <p class="text-muted text-sm user_fix"><b>Вік(років): </b>
                                            {{ user.User.current_age }}
                                        </p>
                                        <p class="text-muted text-sm user_fix"><b>Стать: </b>
                                            {{ user.User.gender.ua }}
                                        </p>
                                        <p class="text-muted text-sm user_fix"><b>Місто: </b>
                                            {{ user.User.city_title.title.ua }}
                                        </p>
                                        <p class="text-muted text-sm user_fix"><b>Телефон: </b> {{ user.User.phone_number }}
                                        </p>
                                        <p class="text-muted text-sm user_fix"><b>Електронна пошта: </b>
                                            {{ user.User.email }}
                                        </p>
                                        <p class="text-muted text-sm user_fix"><b>Про себе(укр.): </b>
                                            {{ user.User.about.ua }}
                                        </p>
                                        <p class="text-muted text-sm user_fix"><b>Про себе(англ.): </b>
                                            {{ user.User.about.en }}
                                        </p>
                                        <p class="text-muted text-sm user_fix"><b>Досвід роботи домробітницею(укр.): </b>
                                            {{ user.keeper_exp.ua }}
                                        </p>
                                        <p class="text-muted text-sm user_fix"><b>Досвід роботи домробітницею(англ.): </b>
                                            {{ user.keeper_exp.en }}
                                        </p>
                                        <p class="text-muted text-sm user_fix"><b>Готовність працювати в будинку з домашніми
                                                тваринами: </b>
                                            {{ user.User.animal_work.ua }}
                                        </p>
                                        <p class="text-muted text-sm user_fix"><b>Послуги: </b>
                                            <span v-for="(item, index) in user.Typeworks" :key="index">
                                                {{ item.title.title.ua }}
                                                {{ index < user.Typeworks.length - 1 ? ', ' : '' }} </span>
                                        </p>
                                        <p class="text-muted text-sm user_fix"><b>Досвід роботи(років): </b>
                                            {{ user.experience.title.ua }}
                                        </p>
                                        <p class="text-muted text-sm user_fix"><b>Бажане місце роботи: </b>
                                            <span v-for="(item, index) in user.Preferences" :key="index">
                                                {{ item.title.title.ua }}
                                                {{ index < user.Preferences.length - 1 ? ', ' : '' }} </span>
                                        </p>
                                        <p class="text-muted text-sm user_fix"><b>Щомісячна оплата: </b>
                                            {{ user.monthpay.title.ua }}
                                        </p>
                                        <p class="text-muted text-sm user_fix"><b>Погодинна оплата: </b>
                                            {{ user.hourpay.title.ua }}
                                        </p>
                                        <p class="text-muted text-sm user_fix"><b>Робота на термін: </b>
                                            {{ user.workperiod.title.ua }}
                                        </p>
                                        <p class="text-muted text-sm user_fix"><b>Готовність виконувати такі обов'язки: </b>
                                            <span v-for="(item, index) in user.Duties" :key="index">
                                                {{ item.title.title.ua }}
                                                {{ index < user.Duties.length - 1 ? ', ' : '' }} </span>
                                        </p>
                                    </div>
                                    <div class="col-5 text-center">
                                        <img :src="user.User.image" alt="Без фото" class="img-circle img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-right">
                                    <a v-if="user.confirmed === 0" @click.prevent="restore(user.id)" href="#"
                                        class="btn btn-sm bg-teal">
                                        Відновити
                                    </a>
                                    <a v-else @click.prevent="block(user.id)" href="#" class="btn btn-sm btn-danger">
                                        Заблокувати
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <Pagination :totalPages="totalPages" :namePage="pageValue" />
        </div>
    </section>
</template>

<script>
import { useViewsStore } from '../../../stores/views';
import { useUserStore } from '../../../stores/user';
import Pagination from '../../layouts/Pagination.vue';
export default {
    name: 'KeeperAll',
    data() {
        return {
            itemsPerPage: 5,
            pageValue: "currentWKPage",
            temp: {}
        }
    },
    components: { Pagination },
    setup() {
        const Views = useViewsStore();
        const User = useUserStore();
        return { Views, User };
    },
    methods: {
        block(id) {
            this.temp.id = id;
            this.Views.BLOCK_KEEPER(this.temp);
        },
        restore(id) {
            this.temp.id2 = id;
            this.Views.RESTORE_KEEPER(this.temp);
        },
    },
    computed: {
        displayedPosts() {
            const keys = Object.keys(this.Views.workerKeeper);
            const startIndex = (this.Views.currentWKPage - 1) * this.itemsPerPage;
            const endIndex = startIndex + this.itemsPerPage;
            return keys.slice(startIndex, endIndex).map(key => this.Views.workerKeeper[key]);
        },
        totalPages() {
            return Math.ceil(this.Views.workerKeeper.length / this.itemsPerPage);
        },
    },
    mounted() {
        this.Views.GET_WORKERKEEPER();
    },
}
</script>