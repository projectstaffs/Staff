<template>
    <div class="edit_title">{{ $t('w_keeper.title') }}</div>
    <div class="anketa">
        <div class="anketa_text"> <span v-if="User.user.name">{{ User.user.name[locale] }}</span> <span
                v-if="User.user.surname">{{
                    User.user.surname[locale] }}</span> </div>
        <div class="anketa_text">
            {{ $t('baby_anketa.item1') }} {{ User.user.current_age }}
            &nbsp;&nbsp;•&nbsp;&nbsp; <span v-if="User.user.city_title">{{ User.user.city_title.title[locale] }}</span>
        </div>
        <div class="anketa_item anketa_fix">{{ $t('baby_anketa.item4') }}</div>
        <div class="anketa_text">{{ User.user.phone_number }}</div>
        <div class="anketa_item">{{ $t('baby_anketa.item5') }}</div>
        <div class="anketa_text">
            <p v-if="User.user.about">{{ User.user.about[locale] }}</p>
            <p v-if="Keeper.keeper">{{ Keeper.keeper.keeper_exp[locale] }}</p>
        </div>
        <div class="anketa_item"> {{ $t('baby_anketa.item6') }} </div>
        <div v-if="User.user.animal_work" class="anketa_text">{{ User.user.animal_work[locale] }}</div>
        <div class="anketa_item  anketa_fix">{{ $t('baby_anketa.item3') }}</div>
        <span v-if="Keeper.keeper" v-for="(item, index) in Keeper.keeper.Typeworks" :key="index" class="anketa_text">
            {{ item.title[locale] }}{{
                index < Keeper.keeper.Typeworks.length - 1 ? ', ' : '' }} </span>
                <div class="anketa_item anketa_fix">{{ $t('baby_anketa.item8') }}</div>
                <div v-if="Keeper.keeper" class="anketa_text"> {{ Keeper.keeper.experience.title[locale] }}</div>
                <div class="anketa_item  anketa_fix">{{ $t('w_keeper.item4') }}</div>
                <span v-if="Keeper.keeper" v-for="(item, index) in Keeper.keeper.Preferences" :key="index"
                    class="anketa_text">
                    {{ item.title.title[locale] }}{{
                        index < Keeper.keeper.Preferences.length - 1 ? ', ' : '' }} </span>
                        <div class="anketa_item anketa_fix">{{ $t('baby_anketa.item13') }}</div>
                        <div v-if="Keeper.keeper" class="anketa_text"> {{ Keeper.keeper.monthpay.title[locale] }}
                        </div>
                        <div class="anketa_item">{{ $t('baby_anketa.item15') }}</div>
                        <div v-if="Keeper.keeper" class="anketa_text">{{ Keeper.keeper.workperiod.title[locale] }}
                        </div>

                        <div class="anketa_item">{{ $t('baby_anketa.item16') }}</div>
                        <span v-if="Keeper.keeper" class="anketa_text" v-for="(item, index) in Keeper.keeper.Duties"
                            :key="index"> {{
                                item.title[locale] }}{{ index < Keeper.keeper.Duties.length - 1 ? ', ' : '' }} </span>
    </div>
    <div class="personal_btns">
        <span class="btn" @click.prevent="change_keeper()">{{ $t('baby_anketa.btn_1') }}</span>
        <span class="btn" @click.prevent="delete_keeper()">{{ $t('baby_anketa.btn_2') }}</span>
    </div>
</template>

<script>
import { useI18n } from 'vue-i18n';
import { useForm_HousekeeperStore } from '../../../stores/form_housekeeper';
import { useUserStore } from '../../../stores/user';
export default {
    name: "Housekeeper",
    setup() {
        const Keeper = useForm_HousekeeperStore();
        const User = useUserStore();
        const { t, locale } = useI18n({ useScope: 'global' });
        return { t, locale, Keeper, User };
    },
    methods: {
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
    },
}
</script>

