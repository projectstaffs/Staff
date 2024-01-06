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
                            <div v-if="Views.workerBabyitemUser.name" class="anketa_text">
                                {{ Views.workerBabyitemUser.name[locale] }}
                                {{ Views.workerBabyitemUser.surname[locale] }}
                            </div>
                            <div v-if="Views.workerBabyitemUser.country_title" class="anketa_text">{{
                                $t('baby_anketa.item2') }}
                                {{ Views.workerBabyitemUser.country_title.title[locale] }}
                            </div>
                            <div v-if="Views.workerBabyitemUser.city_title" class="anketa_text">
                                {{ $t('baby_anketa.item1') }} {{ Views.workerBabyitemUser.current_age }}
                                &nbsp;&nbsp;•&nbsp;&nbsp; {{ Views.workerBabyitemUser.city_title.title[locale] }}
                            </div>
                            <div class="anketa_item anketa_fix">{{ $t('baby_anketa.item4') }}</div>
                            <div class="anketa_text">{{ Views.workerBabyitemUser.phone_number }}</div>
                            <div class="anketa_item">{{ $t('baby_anketa.item5') }}</div>
                            <div class="anketa_text">
                                <p v-if="Views.workerBabyitemUser.about">{{ Views.workerBabyitemUser.about[locale] }}</p>
                                <p v-if="Views.workerBabyitem.baby_exp">{{ Views.workerBabyitem.baby_exp[locale] }}</p>
                            </div>
                        </div>
                        <div class="cabinet_box">
                            <img v-if="Views.workerBabyitemUser.image" class="cabinet_img"
                                :src="Views.workerBabyitemUser.image" alt="">
                            <div v-else class="cabinet_noimg">{{ $t('cabinet.no_img') }}</div>
                        </div>
                    </div>

                    <div class="anketa_item"> {{ $t('baby_anketa.item6') }} </div>
                    <div v-if="Views.workerBabyitemUser.animal_work" class="anketa_text">{{
                        Views.workerBabyitemUser.animal_work[locale] }}</div>
                    <div class="anketa_item">{{ $t('baby_anketa.item7') }}</div>
                    <span v-if="Views.workerBabyitem.Languages" class="anketa_text"
                        v-for="(item, index) in Views.workerBabyitem.Languages" :key="index">
                        {{ item.title.title[locale] }}
                        {{ index < Views.workerBabyitem.Languages.length - 1 ? ', ' : '' }} </span>
                            <div class="anketa_item anketa_fix">{{ $t('baby_anketa.item3') }}</div>
                            <span v-if="Views.workerBabyitem.Typeworks"
                                v-for="(item, index) in Views.workerBabyitem.Typeworks" :key="index" class="anketa_text">
                                {{ item.title.title[locale] }}
                                {{ index < Views.workerBabyitem.Typeworks.length - 1 ? ', ' : '' }} </span>
                                    <div class="anketa_item anketa_fix">{{ $t('baby_anketa.item8') }}</div>
                                    <div v-if="Views.workerBabyitem.experience" class="anketa_text"> {{
                                        Views.workerBabyitem.experience.title[locale] }}
                                    </div>
                                    <div class="anketa_item">{{ $t('baby_anketa.item9') }}</div>
                                    <span v-if="Views.workerBabyitem.Agegroups" class="anketa_text"
                                        v-for="(item, index) in Views.workerBabyitem.Agegroups" :key="index">
                                        {{ item.title.title[locale] }}
                                        {{ index < Views.workerBabyitem.Agegroups.length - 1 ? ', ' : '' }} </span>
                                            <div class="anketa_item anketa_fix">{{ $t('baby_anketa.item10') }}</div>
                                            <span v-if="Views.workerBabyitem.Educations" class="anketa_text"
                                                v-for="(item, index) in Views.workerBabyitem.Educations" :key="index">
                                                {{ item.title.title[locale] }}
                                                {{ index < Views.workerBabyitem.Educations.length - 1 ? ', ' : '' }} </span>
                                                    <div class="anketa_item anketa_fix">{{ $t('baby_anketa.item13') }}</div>
                                                    <div v-if="Views.workerBabyitem.monthpay" class="anketa_text">
                                                        {{ Views.workerBabyitem.monthpay.title[locale] }}
                                                    </div>
                                                    <div class="anketa_item">{{ $t('baby_anketa.item14') }}</div>
                                                    <div v-if="Views.workerBabyitem.childrencount" class="anketa_text">
                                                        {{ Views.workerBabyitem.childrencount.title[locale] }}
                                                    </div>
                                                    <div class="anketa_item">{{ $t('baby_anketa.item15') }}</div>
                                                    <div v-if="Views.workerBabyitem.workperiod" class="anketa_text">
                                                        {{ Views.workerBabyitem.workperiod.title[locale] }}
                                                    </div>
                                                    <div class="anketa_item">{{ $t('baby_anketa.item16') }}</div>
                                                    <span v-if="Views.workerBabyitem.Duties" class="anketa_text"
                                                        v-for="(item, index) in Views.workerBabyitem.Duties" :key="index">
                                                        {{ item.title.title[locale] }}
                                                        {{ index < Views.workerBabyitem.Duties.length - 1 ? ', ' : '' }}
                                                            </span>
                                                            <div class="anketa_item anketa_fix">{{ $t('baby_anketa.item17')
                                                            }}</div>
                                                            <div v-if="Views.workerBabyitem.children_invalid"
                                                                class="anketa_text">
                                                                {{ Views.workerBabyitem.children_invalid[locale] }}
                                                            </div>
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
    name: 'BabyItem',
    setup() {
        const Views = useViewsStore();
        const User = useUserStore();
        const { t, locale } = useI18n({ useScope: 'global' });
        return { Views, User, t, locale };
    },
    methods: {
        back() { this.$router.push({ name: "BabyAll" }) },
        join() { this.$router.push({ name: "Popup" }); }
    },
    mounted() {
        this.Views.GET_WORKERBABY_ITEM();
        this.User.GET_USER();
        let watch = {};
        watch.user_id = localStorage.userID;
        watch.anketa_id = this.Views.workerBabyitem.id;
        this.Views.ADD_WORKERBABY(watch);
    },
}
</script>