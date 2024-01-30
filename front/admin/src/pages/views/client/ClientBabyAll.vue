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
                                        <p class="text-muted text-sm user_fix"><b>Місто: </b>
                                            {{ user.User.city_title.title.ua }}
                                        </p>
                                        <p class="text-muted text-sm user_fix"><b>Телефон: </b> {{ user.User.phone_number }}
                                        </p>
                                        <p class="text-muted text-sm user_fix"><b>Електронна пошта: </b>
                                            {{ user.User.email }}
                                        </p>
                                        <p class="text-muted text-sm user_fix"><b>Про вакансію(укр.): </b>
                                            {{ user.title_about.ua }}
                                        </p>
                                        <p class="text-muted text-sm user_fix"><b>Про вакансію(англ.): </b>
                                            {{ user.title_about.en }}
                                        </p>
                                        <p class="text-muted text-sm user_fix"><b>Максимум дітей в сім'ї для роботи: </b>
                                            {{ user.childrencount.title.ua }}
                                        </p>
                                        <p class="text-muted text-sm user_fix"><b>Досвід роботи з дітьми наступних вікових
                                                груп: </b>
                                            <span v-for="(item, index) in user.Agegroups" :key="index">
                                                {{ item.title.title.ua }}
                                                {{ index < user.Agegroups.length - 1 ? ', ' : '' }} </span>
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
    name: 'ClientBabyAll',
    data() {
        return {
            itemsPerPage: 5,
            pageValue: "currentCBPage",
            temp: {}
        }
    },
    components: { Pagination, },
    setup() {
        const Views = useViewsStore();
        const User = useUserStore();
        return { Views, User };
    },
    methods: {
        block(id) {
            this.temp.id = id;
            this.Views.BLOCK_CLIENTBABY(this.temp);
        },
        restore(id) {
            this.temp.id2 = id;
            this.Views.RESTORE_CLIENTBABY(this.temp);
        },
    },
    computed: {
        displayedPosts() {
            const keys = Object.keys(this.Views.clientBaby);
            const startIndex = (this.Views.currentCBPage - 1) * this.itemsPerPage;
            const endIndex = startIndex + this.itemsPerPage;
            return keys.slice(startIndex, endIndex).map(key => this.Views.clientBaby[key]);
        },
        totalPages() {
            return Math.ceil(this.Views.clientBaby.length / this.itemsPerPage);
        },
    },
    mounted() {
        this.Views.GET_CLIENTBABY();
    },
}
</script>