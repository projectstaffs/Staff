<template>
    <div v-if="User.user.role === 'Исполнитель'">
        <div @click.prevent="babysitting" class="admin_sidebar_item">Анкета для няни </div>
        <div @click.prevent="nurse" class="admin_sidebar_item">Анкета для сиделки </div>
        <div @click.prevent="housekeeper" class="admin_sidebar_item">Анкета для домработницы </div>
    </div> 
    
    <div v-if="User.user.role === 'Наниматель'">
        <div @click.prevent="client_babysitting" class="admin_sidebar_item">Вакансия для няни </div>
        <div @click.prevent="client_nurse" class="admin_sidebar_item">Вакансия для сиделки </div>
        <div @click.prevent="client_housekeeper" class="admin_sidebar_item">Вакансия для домработницы </div>
    </div>
    
    <div v-if="!photo">Добавьте изображение</div>
    <img v-else :src="photo" alt="">    
</template>

<script>
import { useUserStore } from '../../stores/user';
export default {
    name: "Account",
    data() {
        return {
            photo: ''
        }
    },  
    setup() {
        const User = useUserStore();        
        return { User };
    }, 
    methods: {        
        babysitting() {
            this.$router.push({name: "Babysitting"})
        },
        nurse() {
            this.$router.push({name: "Nurse"})
        },
        housekeeper() {
            this.$router.push({name: "Housekeeper"})
        },

        client_babysitting() {
            this.$router.push({name: "Client_baby"})
        },
        client_nurse() {
            this.$router.push({name: "Client_nurse"})
        },
        client_housekeeper() {
            this.$router.push({name: "Client_keeper"})
        },       
    },    
    mounted() {           
        this.User.GET_TOKEN();            
        this.photo = localStorage.user_image; 
        this.User.GET_ADMINID();          
    },
}
</script>
