<template>
    <section v-if="User.users" class="content">
        <div class="card card-solid">
            <div class="card-body pb-0">
                <div v-for="user in User.users_client" :key="user.id" class="row">
                    <div class="col-12 col-sm-6 col-md-12 d-flex align-items-stretch flex-column">
                        <div class="card bg-light d-flex flex-fill">
                            <div class="card-header text-muted border-bottom-0">
                                {{ user.name.en }} {{ user.surname.en }}
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="lead"><b>{{ user.name.ua }} {{ user.surname.ua }}</b></h2>
                                        <p class="text-muted text-sm"><b>Телефон: </b> {{ user.phone_number }} </p>
                                        <p class="text-muted text-sm"><b>Електронна пошта: </b> {{ user.email }} </p>
                                        <p class="text-muted text-sm"><b>Місто (укр.): </b> {{ user.country_title.title.ua
                                        }}
                                        </p>
                                        <p class="text-muted text-sm"><b>Місто (англ.): </b> {{ user.country_title.title.en
                                        }} </p>
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
        </div>
    </section>
</template>

<script>
import { useUserStore } from '../stores/user';
export default {
    name: "Users",
    data() {
        return {
            temp: {}
        }
    },
    setup() {
        const User = useUserStore();
        return { User };
    },
    methods: {
        block(id) {
            this.temp.id = id;
            this.User.BLOCK_USER_CLIENT(this.temp);
        },
        restore(id) {
            this.temp.id2 = id;
            this.User.RESTORE_USER_CLIENT(this.temp);
        }
    },
    mounted() {
        this.User.GET_USERS_CLIENT();
    },
}
</script>
