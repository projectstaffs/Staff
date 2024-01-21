<template>
    <div class="block">
        <div class="block_back"></div>
        <div class="block_content">
            <div class="container">
                <div class="staff_title"> {{ $t('c_keeper.view_title') }} </div>
                <button @click.prevent="back" class="btn btn_search">{{ $t('search.item4') }}</button>
                <div class="anketa">
                    <div class="anketa_block">
                        <div class="anketa_inner">
                            <div v-if="Views.workerNurseitemUser.name" class="anketa_text">
                                {{ Views.workerNurseitemUser.name[locale] }}
                                {{ Views.workerNurseitemUser.surname[locale] }}
                            </div>
                            <div v-if="Views.workerNurseitemUser.city_title" class="anketa_text">
                                {{ $t('baby_anketa.item1') }} {{ Views.workerNurseitemUser.current_age }}
                                &nbsp;&nbsp;•&nbsp;&nbsp; {{ Views.workerNurseitemUser.city_title.title[locale] }}
                            </div>
                            <div class="anketa_item anketa_fix">{{ $t('baby_anketa.item4') }}</div>
                            <div class="anketa_text">{{ Views.workerNurseitemUser.phone_number }}</div>
                            <div class="anketa_item">{{ $t('baby_anketa.item5') }}</div>
                            <div class="anketa_text">
                                <p v-if="Views.workerNurseitemUser.about">{{ Views.workerNurseitemUser.about[locale] }}
                                </p>
                                <p v-if="Views.workerNurseitem.nurse_exp">{{ Views.workerNurseitem.nurse_exp[locale] }}</p>
                            </div>
                        </div>
                        <div class="cabinet_box">
                            <img v-if="Views.workerNurseitemUser.image" class="cabinet_img"
                                :src="Views.workerNurseitemUser.image" alt="">
                            <div v-else class="cabinet_noimg">{{ $t('cabinet.no_img') }}</div>
                        </div>
                    </div>
                    <div class="anketa_item"> {{ $t('baby_anketa.item6') }} </div>
                    <div v-if="Views.workerNurseitemUser.animal_work" class="anketa_text">{{
                        Views.workerNurseitemUser.animal_work[locale] }}</div>
                    <div class="anketa_item">{{ $t('baby_anketa.item3') }}</div>
                    <span v-if="Views.workerNurseitem.Typeworks" v-for="(item, index) in Views.workerNurseitem.Typeworks"
                        :key="index" class="anketa_text">
                        {{ item.title.title[locale] }}
                        {{ index < Views.workerNurseitem.Typeworks.length - 1 ? ', ' : '' }} </span>
                            <div class="anketa_item anketa_fix">{{ $t('baby_anketa.item8') }}</div>
                            <div v-if="Views.workerNurseitem.experience" class="anketa_text"> {{
                                Views.workerNurseitem.experience.title[locale] }}
                            </div>
                            <div class="anketa_item">{{ $t('baby_anketa.n_item18') }}</div>
                            <span v-if="Views.workerNurseitem.Diagnoses"
                                v-for="(item, index) in Views.workerNurseitem.Diagnoses" :key="index" class="anketa_text">
                                {{ item.title.title[locale] }}{{
                                    index < Views.workerNurseitem.Diagnoses.length - 1 ? ', ' : '' }} </span>
                                    <div class="anketa_item anketa_fix">{{ $t('baby_anketa.item10') }}</div>
                                    <span v-if="Views.workerNurseitem.Educations" class="anketa_text"
                                        v-for="(item, index) in Views.workerNurseitem.Educations" :key="index">
                                        {{ item.title.title[locale] }}
                                        {{ index < Views.workerNurseitem.Educations.length - 1 ? ', ' : '' }} </span>
                                            <div class="anketa_item anketa_fix">{{ $t('baby_anketa.item13') }}</div>
                                            <div v-if="Views.workerNurseitem.monthpay" class="anketa_text">
                                                {{ Views.workerNurseitem.monthpay.title[locale] }}
                                            </div>
                                            <div class="anketa_item">{{ $t('baby_anketa.item15') }}</div>
                                            <div v-if="Views.workerNurseitem.workperiod" class="anketa_text">
                                                {{ Views.workerNurseitem.workperiod.title[locale] }}
                                            </div>
                                            <div class="anketa_item">{{ $t('baby_anketa.item16') }}</div>
                                            <span v-if="Views.workerNurseitem.Duties" class="anketa_text"
                                                v-for="(item, index) in Views.workerNurseitem.Duties" :key="index">
                                                {{ item.title.title[locale] }}{{ index < Views.workerNurseitem.Duties.length
                                                    - 1 ? ', ' : '' }}</span>
                </div>

                <div class="view_fixmargin">
                    <div @click.prevent="join" class="btn">{{ $t('c_keeper.view_join') }}</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { useI18n } from 'vue-i18n';
import { useViewsStore } from '../../../stores/views';
import { useUserStore } from '../../../stores/user';
export default {
    name: 'NurseItem',
    setup() {
        const Views = useViewsStore();
        const User = useUserStore();
        const { t, locale } = useI18n({ useScope: 'global' });
        return { Views, User, t, locale };
    },
    methods: {
        back() { this.$router.push({ name: "NurseAll" }) },
        join() { this.$router.push({ name: "Popup" }); }
    },
    mounted() {
        this.Views.GET_WORKERNURSE_ITEM();
        this.User.GET_USER();
        let watch = {};
        watch.user_id = localStorage.userID;
        watch.anketa_id = this.Views.workerNurseitem.id;
        this.Views.ADD_WORKERNURSE(watch);
    },
}
</script>