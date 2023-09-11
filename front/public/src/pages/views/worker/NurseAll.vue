<template>
    <div v-for="post in Views.workerNurse" :key="post.id">
        <div class="anketa">
            <div class="anketa_img"> <img :src="post[0].User.image" alt="photo"> </div>
            <div class="anketa_content">
                <div class="anketa_content_name" @click.prevent="showItem(post)">
                    {{ post[0].User.name }} {{ post[0].User.patronymic }} {{ post[0].User.surname }}
                </div>
                <div class="anketa_content_age">
                    Возраст(лет): {{ post[0].User.current_age }} &nbsp;&nbsp;•&nbsp;&nbsp; Опыт работы: {{ post[0].experience }} &nbsp;&nbsp;•&nbsp;&nbsp; {{ post[0].User.city }}
                </div>
                <div class="anketa_content_typeworks">
                    <div v-for="work in post[0].Typeworks" :key="work.id" class="anketa_content_typeworks_item"> {{ work.title }},&nbsp; </div>                    
                </div>
                <div class="anketa_content_employment"> <b>Занятость:</b> {{ post[0].employment }} </div>
                <div class="anketa_content_about"> {{ post[0].nurse_exp }} </div>
                <div class="anketa_content_payment"> <b>Оплата:</b> {{ post[0].monthpay }} </div>
                <div class="anketa_content_more">
                    <div class="anketa_content_phone"> <b>Телефон:</b> {{ post[0].User.phone_number }} </div>
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
            this.Views.workerNurseitemUser = item[0].User;
            localStorage.workerNurseitemUser = JSON.stringify(item[0].User);           
            
            this.Views.workerNurseitem = item[0];
            localStorage.workerNurseitem = JSON.stringify(item[0]);
            this.$router.push({name: "NurseItem"});
        }
    },
    mounted() {
        this.User.GET_TOKEN();
        this.Views.GET_WORKERNURSE();
    },
}
</script>