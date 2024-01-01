<template>
    <div class="edit_title">{{ $t('c_baby.title') }}</div>
    <div class="anketa">
        <div v-if="photo" class="anketaitem_img"> <img :src="photo" alt="photo"> </div>
        <div class="anketa_content">
            <div class="anketa_content_name">
                {{ Baby.baby.title }}
            </div>
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
            <p class="anketa_client_about">{{ Baby.baby.title_about }}</p>

            <div class="anketa_content_phone">
                <b>Количество детей: </b> {{ Baby.baby.childrencount }}
            </div>
            <div class="anketa_content_phone">
                <b>Возраст детей: </b> <span v-for="age in Baby.baby.Agegroups" :key="age.id"> {{ age.title }},&nbsp;
                </span>
            </div>

            <div class="anketa_inform">
                <div class="anketa_inform_item">
                    <b>Занятость:</b> <br>
                    <span v-for="work in Baby.baby.Joboptions" :key="work.id"> {{ work.title }},&nbsp; </span>
                    {{ Baby.baby.employment }}
                </div>
                <div class="anketa_inform_item">
                    <b>Заработная плата:</b> <br>
                    {{ Baby.baby.monthpay }}
                </div>
                <div class="anketa_inform_item">
                    <b>Работа на срок:</b> <br>
                    {{ Baby.baby.workperiod }}
                </div>
                <div class="anketa_inform_item">
                    <b>Наличие водительского удостоверения:</b> <br> {{ Baby.baby.drive }}
                </div>
                <div class="anketa_inform_item">
                    <b>Готовность выполнять следующие обязанности:</b> <br>
                    <span v-for="work in Baby.baby.Duties" :key="work.id"> {{ work.title }},&nbsp; </span>
                </div>
            </div>
        </div>
    </div>

    <span v-if="Baby.baby" class="category_change_btn" @click.prevent="change_baby()">Изменить анкету</span>
    <span v-if="Baby.baby" class="category_change_btn red" @click.prevent="delete_baby()">Удалить анкету</span>
</template>

<script>
import { useClient_BabyStore } from '../../../stores/client_baby';
import { useUserStore } from '../../../stores/user';
export default {
    name: "Client_baby",
    setup() {
        const Baby = useClient_BabyStore();
        const User = useUserStore();
        return { Baby, User };
    },
    methods: {
        back() {
            this.$router.push({ name: "Account" })
        },
        createForm() {
            if ((this.anketajoboptions.length == 0) || (this.anketaduties.length == 0) || (this.anketaagegroups.length == 0)) {
                this.errors = [];
                if (this.anketajoboptions.length == 0) { this.errors.push('Укажите приемлемые варианты работы.'); }
                if (this.anketaduties.length == 0) { this.errors.push('Укажите обязанности для няни.'); }
                if (this.anketaagegroups.length == 0) { this.errors.push('Укажите опыт работы с детьми по возрастным группам.'); }
            } else {
                this.errors = null; this.User.global_error = null;
                this.anketa.user_id = localStorage.userID;
                this.anketa.confirmed = true;
                this.Baby.CREATE_BABY([this.anketa, this.anketajoboptions, this.anketaduties, this.anketaagegroups]);
            }
        },
        change_baby() {
            this.$router.push({ name: "Change-client_baby" });
        },
        delete_baby() {
            this.Baby.DELETE_BABY([this.Baby.baby.user_id, this.Baby.baby.id]);
        }
    },
    mounted() {
        this.User.GET_USER();
        this.Baby.GET_BABY(localStorage.userID);
    },
}
</script>