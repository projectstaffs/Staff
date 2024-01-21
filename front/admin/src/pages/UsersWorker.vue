<template>
    <section class="content">
        <div class="card card-solid">
            <div class="card-body pb-0">
                <div v-for="user in displayedPosts" :key="user.id" class="row">
                    <div class="col-12 col-sm-6 col-md-12 d-flex align-items-stretch flex-column">
                        <div class="card bg-light d-flex flex-fill">
                            <div class="card-header text-muted border-bottom-0">
                                {{ user.name.en }} {{ user.surname.en }}
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="lead"><b>{{ user.name.ua }} {{ user.surname.ua }}</b></h2>
                                        <p class="text-muted text-sm user_fix"><b>Телефон: </b> {{ user.phone_number }} </p>
                                        <p class="text-muted text-sm user_fix"><b>Електронна пошта: </b> {{ user.email }}
                                        </p>
                                        <p class="text-muted text-sm user_fix"><b>Місто: </b>
                                            {{ user.city_title.title.ua }}
                                        </p>
                                        <p class="text-muted text-sm user_fix"><b>Стать: </b>
                                            {{ user.gender.ua }}
                                        </p>
                                        <p class="text-muted text-sm user_fix"><b>Вік(років): </b>
                                            {{ user.current_age }}
                                        </p>
                                        <p class="text-muted text-sm user_fix"><b>Готовність працювати в будинку з домашніми
                                                тваринами: </b>
                                            {{ user.animal_work.ua }}
                                        </p>
                                        <p class="text-muted text-sm user_fix"><b>Про себе(укр.): </b>
                                            {{ user.about.ua }}
                                        </p>
                                        <p class="text-muted text-sm user_fix"><b>Про себе(англ.): </b>
                                            {{ user.about.en }}
                                        </p>
                                    </div>
                                    <div class="col-5 text-center">
                                        <img :src="user.image" alt="user-avatar" class="img-circle img-fluid">
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

            <div v-if="totalPages > 1" class="card-footer">
                <nav aria-label="Contacts Page Navigation">
                    <ul class="pagination justify-content-center m-0">
                        <li class="page-item">
                            <button @click="prevPage" :disabled="User.currentWPage === 1" class="page-link"
                                href="#">Назад</button>
                        </li>
                        <li class="page-item active p_fix"><a class="page-link" href="#">{{ User.currentWPage }}</a></li>
                        <li class="page-item">
                            <button @click="nextPage" :disabled="User.currentWPage === totalPages" class="page-link"
                                href="#">Вперед</button>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </section>
</template>

<script>
import { useUserStore } from '../stores/user';
export default {
    name: "UsersWorker",
    data() {
        return {
            temp: {},
            itemsPerPage: 2,
        }
    },
    setup() {
        const User = useUserStore();
        return { User };
    },
    methods: {
        block(id) {
            this.temp.id = id;
            this.User.BLOCK_USER_WORKER(this.temp);
        },
        restore(id) {
            this.temp.id2 = id;
            this.User.RESTORE_USER_WORKER(this.temp);
        },
        nextPage() {
            if (this.User.currentWPage < this.totalPages) { this.User.currentWPage++; }
        },
        prevPage() {
            if (this.User.currentWPage > 1) { this.User.currentWPage--; }
        },
    },
    computed: {
        displayedPosts() {
            const keys = Object.keys(this.User.users_worker);
            const startIndex = (this.User.currentWPage - 1) * this.itemsPerPage;
            const endIndex = startIndex + this.itemsPerPage;
            return keys.slice(startIndex, endIndex).map(key => this.User.users_worker[key]);
        },
        totalPages() {
            return Math.ceil(Object.values(this.User.users_worker).length / this.itemsPerPage);
        },
    },
    mounted() {
        this.User.GET_USERS_WORKER();
    },
}
</script>