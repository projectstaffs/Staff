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
                            <div v-if="Views.workerKeeperitemUser.name" class="anketa_text">
                                {{ Views.workerKeeperitemUser.name[locale] }}
                                {{ Views.workerKeeperitemUser.surname[locale] }}
                            </div>
                            <div v-if="Views.workerKeeperitemUser.city_title" class="anketa_text">
                                {{ $t('baby_anketa.item1') }} {{ Views.workerKeeperitemUser.current_age }}
                                &nbsp;&nbsp;•&nbsp;&nbsp; {{ Views.workerKeeperitemUser.city_title.title[locale] }}
                            </div>
                            <div class="anketa_item anketa_fix">{{ $t('baby_anketa.item4') }}</div>
                            <div class="anketa_text">{{ Views.workerKeeperitemUser.phone_number }}</div>
                        </div>
                        <div class="cabinet_box">
                            <img v-if="Views.workerKeeperitemUser.image" class="cabinet_img"
                                :src="Views.workerKeeperitemUser.image" alt="">
                            <div v-else class="cabinet_noimg">{{ $t('cabinet.no_img') }}</div>
                        </div>
                    </div>

                    <div class="anketa_item">{{ $t('baby_anketa.item5') }}</div>
                    <div class="anketa_text">
                        <p v-if="Views.workerKeeperitemUser.about">{{ Views.workerKeeperitemUser.about[locale] }}
                        </p>
                        <p v-if="Views.workerKeeperitem.keeper_exp">{{ Views.workerKeeperitem.keeper_exp[locale] }}
                        </p>
                    </div>
                    <div class="anketa_item"> {{ $t('baby_anketa.item6') }} </div>
                    <div v-if="Views.workerKeeperitemUser.animal_work" class="anketa_text">{{
                        Views.workerKeeperitemUser.animal_work[locale] }}</div>
                    <div class="anketa_item">{{ $t('baby_anketa.item3') }}</div>
                    <span v-if="Views.workerKeeperitem.Typeworks" v-for="(item, index) in Views.workerKeeperitem.Typeworks"
                        :key="index" class="anketa_text">
                        {{ item.title.title[locale] }}
                        {{ index < Views.workerKeeperitem.Typeworks.length - 1 ? ', ' : '' }} </span>
                            <div class="anketa_item anketa_fix">{{ $t('baby_anketa.item8') }}</div>
                            <div v-if="Views.workerKeeperitem.experience" class="anketa_text"> {{
                                Views.workerKeeperitem.experience.title[locale] }}
                            </div>
                            <div class="anketa_item  anketa_fix">{{ $t('w_keeper.item4') }}</div>
                            <span v-if="Views.workerKeeperitem.Preferences"
                                v-for="(item, index) in Views.workerKeeperitem.Preferences" :key="index"
                                class="anketa_text">
                                {{ item.title.title[locale] }}{{
                                    index < Views.workerKeeperitem.Preferences.length - 1 ? ', ' : '' }} </span>

                                    <div class="anketa_item anketa_fix">{{ $t('baby_anketa.item13') }}</div>
                                    <div v-if="Views.workerKeeperitem.monthpay" class="anketa_text">
                                        {{ Views.workerKeeperitem.monthpay.title[locale] }}
                                    </div>
                                    <div class="anketa_item">{{ $t('baby_anketa.item15') }}</div>
                                    <div v-if="Views.workerKeeperitem.workperiod" class="anketa_text">
                                        {{ Views.workerKeeperitem.workperiod.title[locale] }}
                                    </div>
                                    <div class="anketa_item">{{ $t('baby_anketa.item16') }}</div>
                                    <span v-if="Views.workerKeeperitem.Duties" class="anketa_text"
                                        v-for="(item, index) in Views.workerKeeperitem.Duties" :key="index">
                                        {{ item.title.title[locale] }}{{ index < Views.workerKeeperitem.Duties.length - 1
                                            ? ', ' : '' }}</span>
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
    name: 'KeeperItem',
    setup() {
        const Views = useViewsStore();
        const User = useUserStore();
        const { t, locale } = useI18n({ useScope: 'global' });
        return { Views, User, t, locale };
    },
    methods: {
        back() { this.$router.push({ name: "KeeperAll" }) },
        join() { this.$router.push({ name: "Popup" }); }
    },
    mounted() {
        this.Views.GET_WORKERKEEPER_ITEM();
        this.User.GET_USER();
        let watch = {};
        watch.user_id = localStorage.userID;
        watch.anketa_id = this.Views.workerKeeperitem.id;
        this.Views.ADD_WORKERKEEPER(watch);
    },
}
</script>