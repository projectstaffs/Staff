<template>
    <div class="edit_title">{{ $t('c_keeper.title') }}</div>
    <div class="anketa">
        <div class="anketa_text"> <span v-if="User.user.name">{{ User.user.name[locale] }}</span> <span
                v-if="User.user.surname">{{
                    User.user.surname[locale] }}</span> </div>
        <div class="anketa_text">
            {{ $t('c_baby.item2') }} <span v-if="User.user.city_title">{{ User.user.city_title.title[locale] }}</span>
        </div>
        <div class="anketa_item anketa_fix">{{ $t('baby_anketa.item4') }}</div>
        <div class="anketa_text">{{ User.user.phone_number }}</div>

        <div class="anketa_item"> {{ $t('c_baby.item3') }} </div>
        <div v-if="Keeper.keeper" class="anketa_text">{{ Keeper.keeper.title_about[locale] }}</div>

        <div class="anketa_item anketa_fix">{{ $t('baby_anketa.item13') }}</div>
        <div v-if="Keeper.keeper" class="anketa_text"> {{ Keeper.keeper.monthpay.title[locale] }}
        </div>
        <div class="anketa_item">{{ $t('baby_anketa.item15') }}</div>
        <div v-if="Keeper.keeper" class="anketa_text">{{ Keeper.keeper.workperiod.title[locale] }}
        </div>
        <div class="anketa_item">{{ $t('baby_anketa.item16') }}</div>
        <span v-if="Keeper.keeper" class="anketa_text" v-for="(item, index) in Keeper.keeper.Duties" :key="index"> {{
            item.title[locale] }}{{ index < Keeper.keeper.Duties.length - 1 ? ', ' : '' }} </span>
    </div>

    <div class="personal_btns">
        <span class="btn" @click.prevent="change_keeper()">{{ $t('c_nurse.btn_change') }}</span>
        <span class="btn" @click.prevent="delete_keeper()">{{ $t('c_nurse.btn_delete') }}</span>
    </div>
</template>

<script>
import { useI18n } from 'vue-i18n';
import { useClient_KeeperStore } from '../../../stores/client_keeper';
import { useUserStore } from '../../../stores/user';
export default {
    name: "Client_keeper",

    setup() {
        const Keeper = useClient_KeeperStore();
        const User = useUserStore();
        const { t, locale } = useI18n({ useScope: 'global' });
        return { t, locale, Keeper, User };
    },
    methods: {
        change_keeper() {
            this.$router.push({ name: "Change-client_keeper" })
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

