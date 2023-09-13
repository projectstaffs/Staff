<template>
    <div v-for="post in Views.workerNurse" :key="post.id">
        <div class="anketa">
            <div v-if="post.User.image" class="anketa_img"> <img :src="post.User.image" alt="photo"> </div>
            <div class="anketa_content">
                <div class="anketa_content_name" @click.prevent="showItem(post)">
                    {{ post.User.name }} {{ post.User.patronymic }} {{ post.User.surname }}
                </div>
                <div class="anketa_content_age">
                    Возраст(лет): {{ post.User.current_age }} &nbsp;&nbsp;•&nbsp;&nbsp; Опыт работы: {{ post.experience }} &nbsp;&nbsp;•&nbsp;&nbsp; {{ post.User.city }}
                </div>
                <div class="anketa_content_typeworks">
                    <div v-for="work in post.Typeworks" :key="work.id" class="anketa_content_typeworks_item"> {{ work.title }},&nbsp; </div>                    
                </div>
                <div class="anketa_content_employment"> <b>Занятость:</b> {{ post.employment }} </div>
                <div class="anketa_content_about"> {{ post.nurse_exp }} </div>
                <div class="anketa_content_payment"> <b>Оплата:</b> {{ post.monthpay }} </div>
                <div class="anketa_content_more">
                    <div class="anketa_content_phone"> <b>Телефон:</b> {{ post.User.phone_number }} </div>
                    <div class="category_change_btn" @click.prevent="showItem(post)">Подробная анкета</div>
                </div>
            </div>
        </div>        
    </div>    
</template>

<script>
import { useViewsStore } from '../../../stores/views';
import { useUserStore } from '../../../stores/user';
export default {
    name: 'NurseAll',
    setup() {
        const Views = useViewsStore();
        const User = useUserStore();
        return { Views, User };
    },
    methods: {
        showItem(item) { 
            this.Views.workerNurseitemUser = item.User;
            localStorage.workerNurseitemUser = JSON.stringify(item.User);           
            
            this.Views.workerNurseitem = item;
            localStorage.workerNurseitem = JSON.stringify(item);
            this.$router.push({name: "NurseItem"});
        }
    },
    mounted() {
        this.User.GET_TOKEN();
        this.Views.GET_WORKERNURSE();
    },
}
</script>