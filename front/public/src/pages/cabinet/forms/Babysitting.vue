<template>
    <div class="edit_title">{{ $t('w_baby.title') }}</div>
    <div class="anketa">
        <div class="anketa_text"> <span v-if="User.user.name">{{ User.user.name[locale] }}</span> <span
                v-if="User.user.surname">{{
                    User.user.surname[locale] }}</span> </div>
        <div v-if="User.user.country_title" class="anketa_text">{{ $t('baby_anketa.item2') }} {{
            User.user.country_title.title[locale] }}</div>
        <div class="anketa_text">
            {{ $t('baby_anketa.item1') }} {{ User.user.current_age }}
            &nbsp;&nbsp;•&nbsp;&nbsp; <span v-if="User.user.city_title">{{ User.user.city_title.title[locale] }}</span>
        </div>
        <div class="anketa_item anketa_fix">{{ $t('baby_anketa.item4') }}</div>
        <div class="anketa_text">{{ User.user.phone_number }}</div>
        <div class="anketa_item">{{ $t('baby_anketa.item5') }}</div>
        <div class="anketa_text">
            <p v-if="User.user.about">{{ User.user.about[locale] }}</p>
            <p v-if="Baby.baby">{{ Baby.baby.baby_exp[locale] }}</p>
        </div>
        <div class="anketa_item"> {{ $t('baby_anketa.item6') }} </div>
        <div v-if="User.user.animal_work" class="anketa_text">{{ User.user.animal_work[locale] }}</div>
        <div class="anketa_item">{{ $t('baby_anketa.item7') }}</div>
        <span v-if="Baby.baby" class="anketa_text" v-for="(item, index) in Baby.baby.Languages" :key="index"> {{
            item.title.title[locale] }}{{
        index < Baby.baby.Languages.length - 1 ? ', ' : '' }} </span>
                <div class="anketa_item  anketa_fix">{{ $t('baby_anketa.item3') }}</div>
                <span v-if="Baby.baby" v-for="(item, index) in Baby.baby.Typeworks" :key="index" class="anketa_text">{{
                    item.title.title[locale] }}{{
        index < Baby.baby.Typeworks.length - 1 ? ', ' : '' }} </span>
                        <div class="anketa_item anketa_fix">{{ $t('baby_anketa.item8') }}</div>
                        <div v-if="Baby.baby" class="anketa_text"> {{ Baby.baby.experience.title[locale] }}</div>
                        <div class="anketa_item">{{ $t('baby_anketa.item9') }}</div>
                        <span v-if="Baby.baby" class="anketa_text" v-for="(item, index) in Baby.baby.Agegroups"
                            :key="index"> {{
                                item.title.title[locale] }}{{ index < Baby.baby.Agegroups.length - 1 ? ', ' : '' }} </span>
                                <div class="anketa_item anketa_fix">{{ $t('baby_anketa.item10') }}</div>
                                <span v-if="Baby.baby" class="anketa_text" v-for="(item, index) in Baby.baby.Educations"
                                    :key="index"> {{
                                        item.title.title[locale]
                                    }}{{ index < Baby.baby.Educations.length - 1 ? ', ' : '' }} </span>
                                        <div class="anketa_item anketa_fix">{{ $t('baby_anketa.item13') }}</div>
                                        <div v-if="Baby.baby" class="anketa_text"> {{ Baby.baby.monthpay.title[locale] }}
                                        </div>

                                        <div class="anketa_item">{{ $t('baby_anketa.item14') }}</div>
                                        <div v-if="Baby.baby" class="anketa_text"> {{ Baby.baby.childrencount.title[locale]
                                        }}</div>
                                        <div class="anketa_item">{{ $t('baby_anketa.item15') }}</div>
                                        <div v-if="Baby.baby" class="anketa_text">{{ Baby.baby.workperiod.title[locale] }}
                                        </div>
                                        <div class="anketa_item">{{ $t('baby_anketa.item16') }}</div>
                                        <span v-if="Baby.baby" class="anketa_text" v-for="(item, index) in Baby.baby.Duties"
                                            :key="index"> {{
                                                item.title.title[locale] }}{{ index < Baby.baby.Duties.length - 1 ? ', ' : '' }}
                                                </span>
                                                <div class="anketa_item anketa_fix">{{ $t('baby_anketa.item17') }}</div>
                                                <div v-if="Baby.baby" class="anketa_text">{{
                                                    Baby.baby.children_invalid[locale]
                                                }}</div>
    </div>
    <div class="personal_btns">
        <div class="btn" @click.prevent="change_baby()">{{ $t('baby_anketa.btn_1') }}</div>
        <div class="btn" @click.prevent="delete_baby()">{{ $t('baby_anketa.btn_2') }}</div>
    </div>
</template>

<script>
import { useI18n } from 'vue-i18n';
import { useForm_BabyStore } from '../../../stores/form_baby';
import { useUserStore } from '../../../stores/user';
export default {
    name: "Babysitting",
    setup() {
        const Baby = useForm_BabyStore();
        const User = useUserStore();
        const { t, locale } = useI18n({ useScope: 'global' });
        return { t, locale, Baby, User };
    },
    methods: {
        change_baby() {
            this.$router.push({ name: "Change-babysitting" });
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
