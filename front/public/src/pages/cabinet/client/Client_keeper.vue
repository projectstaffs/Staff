<template>
    <div class="edit_title">{{ $t('c_keeper.title') }}</div>
    <div class="anketa">
        <div class="anketa_content_age">
            <b>Имя работодателя:</b> {{ User.user.name }} {{ User.user.patronymic }} {{ User.user.surname }}
        </div>
        <div class="anketa_content_typeworks">
            <b>Место работы: </b> {{ User.user.city }}
        </div>
        <div class="anketa_content_phone">
            <b>Телефон:</b> {{ User.user.phone_number }}
        </div>

        <h2 class="anketa_title">Описание работы</h2>
        <p class="anketa_client_about">{{ Keeper.keeper.title_about }}</p>

        <div class="anketa_inform_item">
            <b>Заработная плата:</b> <br>
            {{ Keeper.keeper.monthpay }}
        </div>
        <div class="anketa_inform_item">
            <b>Работа на срок:</b> <br>
            {{ Keeper.keeper.workperiod }}
        </div>
        <div class="anketa_inform_item">
            <b>Готовность выполнять следующие обязанности:</b> <br>
            <span v-for="work in Keeper.keeper.Duties" :key="work.id"> {{ work.title }},&nbsp; </span>
        </div>
    </div>

    <span v-if="Keeper.keeper" class="category_change_btn" @click.prevent="change_keeper()">Изменить анкету</span>
    <span v-if="Keeper.keeper" class="category_change_btn red" @click.prevent="delete_keeper()">Удалить анкету</span>
</template>

<script>
import { useClient_KeeperStore } from '../../../stores/client_keeper';
import { useUserStore } from '../../../stores/user';
export default {
    name: "Client_keeper",

    setup() {
        const Keeper = useClient_KeeperStore();
        const User = useUserStore();
        return { Keeper, User };
    },
    methods: {
        change_keeper() {
            this.$router.push({ name: "Change-client_keeper" })
        },
        delete_keeper() {
            this.Keeper.DELETE_KEEPER([this.Keeper.keeper.user_id, this.Keeper.keeper.id]);
        }
    },
    mounted() {
        this.User.GET_USER();
        this.Keeper.GET_KEEPER(localStorage.userID);
    },
}
</script>

