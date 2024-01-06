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
                            <div v-if="Views.clientBabyitemUser.name" class="anketa_text">
                                {{ Views.clientBabyitemUser.name[locale] }}
                                {{ Views.clientBabyitemUser.surname[locale] }}
                            </div>
                            <div v-if="Views.clientBabyitemUser.country_title" class="anketa_text">{{
                                $t('baby_anketa.item2') }}
                                {{ Views.clientBabyitemUser.country_title.title[locale] }}
                            </div>
                            <div v-if="Views.clientBabyitemUser.city_title" class="anketa_text">
                                {{ $t('cabinet.city') }} {{ Views.clientBabyitemUser.city_title.title[locale] }}
                            </div>
                            <div class="anketa_item anketa_fix">{{ $t('baby_anketa.item4') }}</div>
                            <div class="anketa_text">{{ Views.clientBabyitemUser.phone_number }}</div>
                            <div class="anketa_item">{{ $t('c_baby.item3') }}</div>
                            <div class="anketa_text" v-if="Views.clientBabyitem.title_about">{{
                                Views.clientBabyitem.title_about[locale] }}</div>
                        </div>
                        <div class="cabinet_box">
                            <img v-if="Views.clientBabyitemUser.image" class="cabinet_img"
                                :src="Views.clientBabyitemUser.image" alt="">
                            <div v-else class="cabinet_noimg">{{ $t('cabinet.no_img') }}</div>
                        </div>
                    </div>

                    <div class="anketa_item"> {{ $t('baby_anketa.item14') }} </div>
                    <div v-if="Views.clientBabyitem.childrencount" class="anketa_text"> {{
                        Views.clientBabyitem.childrencount.title[locale] }} </div>

                    <div class="anketa_item">{{ $t('baby_anketa.item9') }}</div>
                    <span v-if="Views.clientBabyitem.Agegroups" class="anketa_text"
                        v-for="(item, index) in Views.clientBabyitem.Agegroups" :key="index">
                        {{ item.title.title[locale] }}
                        {{ index < Views.clientBabyitem.Agegroups.length - 1 ? ', ' : '' }} </span>

                            <div class="anketa_item anketa_fix">{{ $t('baby_anketa.item13') }}</div>
                            <div v-if="Views.clientBabyitem.monthpay" class="anketa_text">
                                {{ Views.clientBabyitem.monthpay.title[locale] }}
                            </div>
                            <div class="anketa_item">{{ $t('baby_anketa.item15') }}</div>
                            <div v-if="Views.clientBabyitem.workperiod" class="anketa_text">
                                {{ Views.clientBabyitem.workperiod.title[locale] }}
                            </div>
                            <div class="anketa_item">{{ $t('baby_anketa.item16') }}</div>
                            <span v-if="Views.clientBabyitem.Duties" class="anketa_text"
                                v-for="(item, index) in Views.clientBabyitem.Duties" :key="index">
                                {{ item.title.title[locale] }}
                                {{ index < Views.clientBabyitem.Duties.length - 1 ? ', ' : '' }} </span>
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
    name: 'ClientBabyItem',
    setup() {
        const Views = useViewsStore();
        const User = useUserStore();
        const { t, locale } = useI18n({ useScope: 'global' });
        return { Views, User, t, locale };
    },
    methods: {
        back() { this.$router.push({ name: "ClientBabyAll" }) },
        join() { this.$router.push({ name: "Popup" }); }
    },
    mounted() {
        this.Views.GET_CLIENTBABY_ITEM();
        this.User.GET_USER();
        let watch = {};
        watch.user_id = localStorage.userID;
        watch.anketa_id = this.Views.clientBabyitem.id;
        this.Views.ADD_CLIENTBABY(watch);
    },
}
</script>