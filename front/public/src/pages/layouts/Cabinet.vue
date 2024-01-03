<template>
    <div class="block">
        <div class="block_back"></div>
        <div class="block_content">
            <div class="container">
                <div class="staff_title">{{ $t('cabinet.title') }}</div>
                <div class="cabinet">
                    <div class="cabinet_sidebar">
                        <div class="cabinet_box">
                            <img v-if="User.photo" class="cabinet_img" :src="User.photo" alt="">
                            <div v-else class="cabinet_noimg">{{ $t('cabinet.no_img') }}</div>
                        </div>
                        <div @click.prevent="account" class="sidebar_item">{{ $t('cabinet.item1') }}</div>
                        <div @click.prevent="edit" class="sidebar_item">{{ $t('cabinet.item2') }}</div>
                        <div @click.prevent="myphoto" class="sidebar_item">{{ $t('cabinet.item3') }}</div>
                        <div @click.prevent="babysitter" class="sidebar_item">
                            <span v-if="User.user.role === 'Исполнитель'">{{ $t('cabinet.item4') }}</span>
                            <span v-else>{{ $t('c_baby.title') }}</span>
                        </div>
                        <div @click.prevent="nurse" class="sidebar_item">
                            <span v-if="User.user.role === 'Исполнитель'">{{ $t('cabinet.item5') }}</span>
                            <span v-else>{{ $t('c_nurse.title') }}</span>
                        </div>
                        <div @click.prevent="keeper" class="sidebar_item">
                            <span v-if="User.user.role === 'Исполнитель'">{{ $t('cabinet.item6') }}</span>
                            <span v-else>{{ $t('c_keeper.title') }}</span>
                        </div>
                    </div>
                    <div class="cabinet_main">
                        <router-view />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { useUserStore } from '../../stores/user';
import { useForm_BabyStore } from '../../stores/form_baby';
import { useForm_NurseStore } from '../../stores/form_nurse';
import { useForm_HousekeeperStore } from '../../stores/form_housekeeper';
import { useClient_BabyStore } from '../../stores/client_baby';
import { useClient_NurseStore } from '../../stores/client_nurse';
import { useClient_KeeperStore } from '../../stores/client_keeper';
export default {
    name: "Cabinet",
    setup() {
        const Baby = useForm_BabyStore();
        const Nurse = useForm_NurseStore();
        const Keeper = useForm_HousekeeperStore();
        const ClientBaby = useClient_BabyStore();
        const ClientNurse = useClient_NurseStore();
        const ClientKeeper = useClient_KeeperStore();
        const User = useUserStore();
        return { User, Baby, Nurse, Keeper, ClientBaby, ClientNurse, ClientKeeper };
    },
    methods: {
        account() { this.$router.push({ name: "Account" }) },
        myphoto() { this.$router.push({ name: "Myphoto" }) },
        edit() {
            this.$router.push({ name: "Edit" })
        },
        babysitter() {
            if (this.User.user.role === 'Исполнитель') {
                if (this.Baby.baby) { this.$router.push({ name: "Babysitting" }) }
                else { this.$router.push({ name: "CreateBabysitting" }) }
            }
            else {
                if (this.ClientBaby.baby) { this.$router.push({ name: "Client_baby" }) }
                else { this.$router.push({ name: "CreateClientBaby" }) }
            }
        },
        nurse() {
            if (this.User.user.role === 'Исполнитель') {
                if (this.Nurse.nurse) { this.$router.push({ name: "Nurse" }) }
                else { this.$router.push({ name: "CreateNurse" }) }
            }
            else {
                if (this.ClientNurse.nurse) { this.$router.push({ name: "Client_nurse" }) }
                else { this.$router.push({ name: "CreateClientNurse" }) }
            }
        },
        keeper() {
            if (this.User.user.role === 'Исполнитель') {
                if (this.Keeper.keeper) { this.$router.push({ name: "Housekeeper" }) }
                else { this.$router.push({ name: "CreateKeeper" }) }
            }
            else {
                if (this.ClientKeeper.keeper) { this.$router.push({ name: "Client_keeper" }) }
                else { this.$router.push({ name: "CreateClientKeeper" }) }
            }
        },
    },
    mounted() {
        this.User.GET_USER();
        this.User.GET_PHOTO();
        this.User.GET_TOKEN();

        this.Baby.GET_BABY(localStorage.userID);
        this.Nurse.GET_NURSE(localStorage.userID);
        this.Keeper.GET_KEEPER(localStorage.userID);
        this.ClientBaby.GET_BABY(localStorage.userID);
        this.ClientNurse.GET_NURSE(localStorage.userID);
        this.ClientKeeper.GET_KEEPER(localStorage.userID);
    },
}
</script>

<style>
.cabinet {
    width: 100%;
    display: flex;
    margin-top: 48px;
    border-top: 1px solid #8E8E8E;
    padding-top: 32px;
}

.cabinet_sidebar {
    width: 307px;
    padding-right: 37px;
    border-right: 1px solid #8E8E8E;
}

.sidebar_item {
    cursor: pointer;
    transition: color 0.3s, background 0.3s;
    width: 250px;
    font-size: 16px;
    margin: 10px 0px;
    padding: 5px 10px;
    border-radius: 10px;
}

.sidebar_item:hover {
    color: #FFF0D2;
    background: #5C4538;
}

.cabinet_main {
    padding: 0 64px;
    flex: 1;
}
</style>

