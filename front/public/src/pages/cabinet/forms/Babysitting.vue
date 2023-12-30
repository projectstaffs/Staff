<template>
    <div class="edit_title">{{ $t('w_baby.title') }}</div>
    <div class="anketa">
        <div class="anketa_text"> {{ name[locale] }} {{ surname[locale] }} </div>
        <div class="anketa_text">{{ $t('baby_anketa.item2') }} {{ country[locale] }}</div>
        <div class="anketa_text">
            {{ $t('baby_anketa.item1') }} {{ User.user.current_age }}
            &nbsp;&nbsp;•&nbsp;&nbsp; {{ city[locale] }}
        </div>
        <div class="anketa_item anketa_fix">{{ $t('baby_anketa.item4') }}</div>
        <div class="anketa_text">{{ User.user.phone_number }}</div>
        <div class="anketa_item">{{ $t('baby_anketa.item5') }}</div>
        <div class="anketa_text">
            <p>{{ about[locale] }}</p>
            <p>{{ baby_experience[locale] }}</p>
        </div>
        <div class="anketa_item"> {{ $t('baby_anketa.item6') }} </div>
        <div class="anketa_text">{{ animal_work[locale] }}</div>
        <div class="anketa_item">{{ $t('baby_anketa.item7') }}</div>
        <span class="anketa_text" v-for="(item, index) in languages" :key="index"> {{ item.title.title[locale] }}{{
            index < languages.length - 1 ? ', ' : '' }} </span>
                <div class="anketa_item  anketa_fix">{{ $t('baby_anketa.item3') }}</div>
                <span v-for="(item, index) in typeworks" :key="index" class="anketa_text">{{ item.title.title[locale] }}{{
                    index < typeworks.length - 1 ? ', ' : '' }} </span>
                        <div class="anketa_item anketa_fix">{{ $t('baby_anketa.item8') }}</div>
                        <div class="anketa_text"> {{ experience[locale] }}</div>
                        <div class="anketa_item">{{ $t('baby_anketa.item9') }}</div>
                        <span class="anketa_text" v-for="(item, index) in agegroups" :key="index"> {{
                            item.title.title[locale] }}{{ index < agegroups.length - 1 ? ', ' : '' }} </span>
                                <div class="anketa_item anketa_fix">{{ $t('baby_anketa.item10') }}</div>
                                <span class="anketa_text" v-for="(item, index) in educations" :key="index"> {{
                                    item.title.title[locale]
                                }}{{ index < educations.length - 1 ? ', ' : '' }} </span>
                                        <div class="anketa_item anketa_fix">{{ $t('baby_anketa.item13') }}</div>
                                        <div class="anketa_text"> {{ monthpay[locale] }} </div>

                                        <div class="anketa_item">{{ $t('baby_anketa.item14') }}</div>
                                        <div class="anketa_text"> {{ childrencount[locale] }}</div>
                                        <div class="anketa_item">{{ $t('baby_anketa.item15') }}</div>
                                        <div class="anketa_text">{{ workperiod[locale] }}</div>
                                        <div class="anketa_item">{{ $t('baby_anketa.item16') }}</div>
                                        <span class="anketa_text" v-for="(item, index) in duties" :key="index"> {{
                                            item.title.title[locale] }}{{ index < duties.length - 1 ? ', ' : '' }} </span>
                                                <div class="anketa_item anketa_fix">{{ $t('baby_anketa.item17') }}</div>
                                                <div class="anketa_text">{{ children_invalid[locale] }}</div>
    </div>
    <div v-if="Baby.baby" class="personal_btns">
        <div class="btn" @click.prevent="change_baby()">Изменить анкету</div>
        <div class="btn" @click.prevent="delete_baby()">Удалить анкету</div>
    </div>
</template>

<script>
import { useI18n } from 'vue-i18n';
import { useForm_BabyStore } from '../../../stores/form_baby';
import { useUserStore } from '../../../stores/user';
export default {
    name: "Babysitting",
    data() {
        return {
            name: {},
            surname: {},
            about: {},
            country: {},
            city: {},
            animal_work: {},

            experience: {},
            typeworks: {},
            languages: {},
            baby_experience: {},
            agegroups: {},
            educations: {},
            monthpay: {},
            childrencount: {},
            workperiod: {},
            duties: {},
            children_invalid: {}
        }
    },
    setup() {
        const Baby = useForm_BabyStore();
        const User = useUserStore();
        const { t, locale } = useI18n({ useScope: 'global' });
        return { t, locale, Baby, User };
    },
    methods: {
        change_baby() {
            //localStorage.personalWBaby = JSON.stringify(this.Baby.baby);
            //localStorage.babyOptions = JSON.stringify(this.Baby.baby_options);
            this.$router.push({ name: "Change-babysitting" });
        },
        delete_baby() {
            this.Baby.DELETE_BABY([this.Baby.baby.user_id, this.Baby.baby.id]);
        }
    },
    mounted() {
        this.User.GET_USER();
        this.Baby.GET_BABY(localStorage.userID);

        this.name = this.User.user.name;
        this.surname = this.User.user.surname;
        this.about = this.User.user.about;
        this.country = this.User.user.country_title.title;
        this.city = this.User.user.city_title.title;
        this.animal_work = this.User.user.animal_work;

        setTimeout(() => {
            this.experience = this.Baby.baby.experience.title; // Вывод количества лет опыта
            this.typeworks = this.Baby.baby.Typeworks;
            this.languages = this.Baby.baby.Languages;
            this.baby_experience = this.Baby.baby.baby_exp; // Вывод описания опыта на двух языках
            this.agegroups = this.Baby.baby.Agegroups;
            this.educations = this.Baby.baby.Educations;
            this.monthpay = this.Baby.baby.monthpay.title;
            this.childrencount = this.Baby.baby.childrencount.title;
            this.workperiod = this.Baby.baby.workperiod.title;
            this.duties = this.Baby.baby.Duties;
            this.children_invalid = this.Baby.baby.children_invalid;
        }, 250);
    },
}
</script>
