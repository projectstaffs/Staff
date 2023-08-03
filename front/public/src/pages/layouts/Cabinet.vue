<template>      
    <div class="cabinet">        
        <div class="cabinet_sidebar">
            <div class="cabinet_sidebar_title">{{ User.user.name }}</div>
            <div @click.prevent="account" class="admin_sidebar_item">Учетная запись</div>
            <div @click.prevent="mailbox" class="admin_sidebar_item">Почтовый ящик</div>            
            <div @click.prevent="vacancies" class="admin_sidebar_item">Мои вакансии</div>
            <div @click.prevent="credentials" class="admin_sidebar_item">Мои рекомендации</div>
            <div @click.prevent="edit" class="admin_sidebar_item">Редактировать профиль</div>
            <div @click.prevent="myphoto" class="admin_sidebar_item">Моя фотография</div>
            <div @click.prevent="logout" class="admin_sidebar_item">Выйти</div>
        </div>
        <div class="cabinet_main">
            <div @click.prevent="back()" class="category_change_btn">Назад</div>
            <router-view/>        
        </div>                
    </div>
</template>

<script>
import { useUserStore } from '../../stores/user';
export default {
    name: "Cabinet", 
    setup() {
        const User = useUserStore();        
        return { User };
    },       
    methods: {        
        back() {
            this.$router.push({name: "Home"})
        },
        account() {
            this.$router.push({name: "Account"})
        },
        mailbox() {
            this.$router.push({name: "Mailbox"})
        }, 
        myphoto() {
            this.$router.push({name: "Myphoto"})
        },
        edit() {
            this.$router.push({name: "Edit"})
        },
        vacancies() {
            this.$router.push({name: "Vacancies"})
        },
        credentials() {
            this.$router.push({name: "Credentials"})
        },
        logout() {
            this.User.LOGOUT_USER();
        },       
    }, 
    mounted() {
        this.User.GET_USER();
    },       
}
</script>

