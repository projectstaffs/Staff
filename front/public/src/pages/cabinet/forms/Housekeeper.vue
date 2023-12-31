<template>
    <div class="edit_title">{{ $t('w_keeper.title') }}</div>

    <div class="anketa">
        <div class="anketa_content">
            <div class="anketa_content_name">
                {{ User.user.name }} {{ User.user.surname }}
            </div>
            <div v-if="Keeper.keeper" class="anketa_content_age">
                Возраст(лет): {{ User.user.current_age }} &nbsp;&nbsp;•&nbsp;&nbsp; Опыт работы: {{ Keeper.keeper.experience
                }} &nbsp;&nbsp;•&nbsp;&nbsp; {{ User.user.city }}
            </div>
            <div class="anketa_content_typeworks">
                <b>Предоставляю услуги:&nbsp;</b>
                <div v-if="Keeper.keeper" v-for="work in Keeper.keeper.Typeworks" :key="work.id"
                    class="anketa_content_typeworks_item"> {{
                        work.title }},&nbsp; </div>
            </div>

            <div class="anketa_content_phone">
                <b>Телефон:</b> {{ User.user.phone_number }}
            </div>

            <h2 class="anketa_title">Обо мне</h2>
            <p>{{ User.user.about }}</p>
            <p v-if="Keeper.keeper">{{ Keeper.keeper.keeper_exp }}</p>
            <div class="anketa_inform">

                <div class="anketa_inform_item">
                    <b>Готовность работать в доме с домашними животными:</b> <br> {{ User.user.animal_work }}
                </div>
            </div>

            <h2 class="anketa_title">Опыт работы</h2>
            <div v-if="Keeper.keeper" class="anketa_experience">
                Опыт работы: {{ Keeper.keeper.experience }}
            </div>

            <h2 class="anketa_title">Предпочтения по желаемой должности</h2>
            <div class="anketa_inform">
                <div class="anketa_inform_item">
                    <b>Должность:</b> <br>
                    <span v-if="Keeper.keeper" v-for="work in Keeper.keeper.Typeworks" :key="work.id"> {{ work.title
                    }},&nbsp; </span>
                </div>
                <div class="anketa_inform_item">
                    <b>Место работы:</b> <br>
                    <span v-if="Keeper.keeper" v-for="work in Keeper.keeper.Preferences" :key="work.id"> {{ work.title
                    }},&nbsp; </span>
                </div>
                <div v-if="Keeper.keeper" class="anketa_inform_item">
                    <b>Желаемая зарплата:</b> <br>
                    {{ Keeper.keeper.monthpay }}
                </div>
                <div v-if="Keeper.keeper" class="anketa_inform_item">
                    <b>Обязанности по присмотру за детьми:</b> <br>
                    {{ Keeper.keeper.baby_keeper }}
                </div>
                <div v-if="Keeper.keeper" class="anketa_inform_item">
                    <b>Обязанности по уходу за престарелыми/больными:</b> <br>
                    {{ Keeper.keeper.nurse_keeper }}
                </div>
                <div v-if="Keeper.keeper" class="anketa_inform_item">
                    <b>Работа на срок:</b> <br>
                    {{ Keeper.keeper.workperiod }}
                </div>
                <div v-if="Keeper.keeper" class="anketa_inform_item">
                    <b>Можете ли вы обеспечить собственную технику для уборки (пылесос, др.)?:</b> <br>
                    {{ Keeper.keeper.technique }}
                </div>
                <div v-if="Keeper.keeper" class="anketa_inform_item">
                    <b>Можете ли вы обеспечить собственные средства для уборки (моющие, чистящие, др.)?:</b> <br>
                    {{ Keeper.keeper.material }}
                </div>
                <div v-if="Keeper.keeper" class="anketa_inform_item">
                    <b>Работы по дому:</b> <br>
                    <span v-for="work in Keeper.keeper.Duties" :key="work.id"> {{ work.title }},&nbsp; </span>
                </div>
            </div>
        </div>
    </div>

    <span v-if="Keeper.keeper" class="category_change_btn" @click.prevent="change_keeper()">Изменить анкету</span>
    <span v-if="Keeper.keeper" class="category_change_btn red" @click.prevent="delete_keeper()">Удалить анкету</span>
</template>

<script>
import { useForm_HousekeeperStore } from '../../../stores/form_housekeeper';
import { useUserStore } from '../../../stores/user';
export default {
    name: "Housekeeper",
    setup() {
        const Keeper = useForm_HousekeeperStore();
        const User = useUserStore();
        return { Keeper, User };
    },
    methods: {
        createForm() {
            if ((this.anketajoboptions.length == 0) || (this.anketarpreferences.length == 0) || (this.anketaduties.length == 0) || (this.anketatypeworks.length == 0)) {
                this.errors = [];
                if (this.anketajoboptions.length == 0) { this.errors.push('Укажите приемлемые варианты работы.'); }
                if (this.anketarpreferences.length == 0) { this.errors.push('Укажите что Вы предпочитаете.'); }
                if (this.anketaduties.length == 0) { this.errors.push('Укажите обязанности для домработницы.'); }
                if (this.anketatypeworks.length == 0) { this.errors.push('Укажите какую работу вы ищите.'); }
            } else {
                this.errors = null; this.User.global_error = null;
                this.anketa.user_id = localStorage.userID;
                this.anketa.confirmed = true;
                this.Keeper.CREATE_KEEPER([this.anketa, this.anketajoboptions, this.anketarpreferences, this.anketaduties, this.anketatypeworks]);
            }
        },
        change_keeper() {
            this.$router.push({ name: "Change-housekeeper" })
        },
        delete_keeper() {
            this.Keeper.DELETE_KEEPER([this.Keeper.keeper.user_id, this.Keeper.keeper.id]);
        }
    },
    mounted() {
        this.User.GET_USER();
        this.Keeper.GET_KEEPER(localStorage.userID);

        this.errors = null;
    },
}
</script>

