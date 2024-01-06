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
                            <div v-if="Views.clientNurseitemUser.name" class="anketa_text">
                                {{ Views.clientNurseitemUser.name[locale] }}
                                {{ Views.clientNurseitemUser.surname[locale] }}
                            </div>
                            <div v-if="Views.clientNurseitemUser.country_title" class="anketa_text">{{
                                $t('baby_anketa.item2') }}
                                {{ Views.clientNurseitemUser.country_title.title[locale] }}
                            </div>
                            <div v-if="Views.clientNurseitemUser.city_title" class="anketa_text">
                                {{ $t('cabinet.city') }} {{ Views.clientNurseitemUser.city_title.title[locale] }}
                            </div>
                            <div class="anketa_item anketa_fix">{{ $t('baby_anketa.item4') }}</div>
                            <div class="anketa_text">{{ Views.clientNurseitemUser.phone_number }}</div>
                            <div class="anketa_item">{{ $t('c_baby.item3') }}</div>
                            <div class="anketa_text" v-if="Views.clientNurseitem.title_about">
                                {{ Views.clientNurseitem.title_about[locale] }}</div>
                        </div>
                        <div class="cabinet_box">
                            <img v-if="Views.clientNurseitemUser.image" class="cabinet_img"
                                :src="Views.clientNurseitemUser.image" alt="">
                            <div v-else class="cabinet_noimg">{{ $t('cabinet.no_img') }}</div>
                        </div>
                    </div>
                    <div class="anketa_item">{{ $t('baby_anketa.item13') }}</div>
                    <div v-if="Views.clientNurseitem.monthpay" class="anketa_text">
                        {{ Views.clientNurseitem.monthpay.title[locale] }}
                    </div>
                    <div class="anketa_item">{{ $t('baby_anketa.item15') }}</div>
                    <div v-if="Views.clientNurseitem.workperiod" class="anketa_text">
                        {{ Views.clientNurseitem.workperiod.title[locale] }}
                    </div>
                    <div class="anketa_item">{{ $t('baby_anketa.item16') }}</div>
                    <span v-if="Views.clientNurseitem.Duties" class="anketa_text"
                        v-for="(item, index) in Views.clientNurseitem.Duties" :key="index">
                        {{ item.title[locale] }}{{ index < Views.clientNurseitem.Duties.length - 1 ? ', ' : '' }} </span>
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
    name: 'ClientNurseItem',
    setup() {
        const Views = useViewsStore();
        const User = useUserStore();
        const { t, locale } = useI18n({ useScope: 'global' });
        return { Views, User, t, locale };
    },
    methods: {
        back() { this.$router.push({ name: "ClientNurseAll" }) },
        join() { this.$router.push({ name: "Popup" }); }
    },
    mounted() {
        this.Views.GET_CLIENTNURSE_ITEM();
        this.User.GET_USER();
        let watch = {};
        watch.user_id = localStorage.userID;
        watch.anketa_id = this.Views.clientNurseitem.id;
        this.Views.ADD_CLIENTNURSE(watch);
    },
}
</script>