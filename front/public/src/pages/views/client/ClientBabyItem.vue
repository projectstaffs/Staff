<template>    
    <div @click.prevent="back()" class="category_change_btn">Назад</div>
    <div class="anketa">
        <div v-if="Views.clientBabyitemUser.image" class="anketaitem_img"> <img :src="Views.clientBabyitemUser.image" alt="photo"> </div>
        <div class="anketa_content">
            <div class="anketa_content_name">
                {{ Views.clientBabyitem.title }} 
            </div>
            <div class="anketa_content_age">
                <b>Имя работодателя:</b> {{ Views.clientBabyitemUser.name }} {{ Views.clientBabyitemUser.patronymic }} {{ Views.clientBabyitemUser.surname }}
            </div>
            <div class="anketa_content_typeworks">
                <b>Место работы: </b> {{ Views.clientBabyitemUser.city }}                    
            </div>
            <div class="anketa_content_phone">
                <b>Телефон:</b> {{ Views.clientBabyitemUser.phone_number }}
            </div>

            <h2 class="anketa_title client">Отправить сообщение работодателю</h2>
            <div class="anketa_msg_title">Кому: {{ Views.clientBabyitemUser.name }}</div>
            <form @submit.prevent="sentMessage" class="login_form">                
                <div>Укажите тему сообщения:</div>
                <input v-model="User.user.title" required class="login_form_item" type="text" placeholder="тема">
                <div>Напишите текст сообщения:</div>        
                <textarea v-model="User.user.content" required class="login_form_item" placeholder="about"></textarea>        
                <button type="submit" class="login_form_btn">Отправить сообщение</button>
            </form>

            <div class="register_error" v-for="item in User.global_error" :key="item"> {{ item[0] }} </div>
            <div class="msg_success">{{ Message.success }}</div>

            <h2 class="anketa_title">Описание работы</h2>
            <p class="anketa_client_about">{{ Views.clientBabyitem.title_about }}</p>
            
            <div class="anketa_content_phone">
                <b>Количество детей: </b> {{ Views.clientBabyitem.childrencount }}
            </div>
            <div class="anketa_content_phone">
                <b>Возраст детей: </b> <span v-for="age in Views.clientBabyitem.Agegroups" :key="age.id"> {{ age.title }},&nbsp; </span>
            </div>
            
            <div class="anketa_inform">
                <div class="anketa_inform_item">
                    <b>Занятость:</b> <br> 
                    <span v-for="work in Views.clientBabyitem.Joboptions" :key="work.id"> {{ work.title }},&nbsp; </span>
                    {{ Views.clientBabyitem.employment }}
                </div>
                <div class="anketa_inform_item">
                    <b>Заработная плата:</b> <br> 
                    {{ Views.clientBabyitem.monthpay }}
                </div>
                <div class="anketa_inform_item">
                    <b>Работа на срок:</b> <br> 
                    {{ Views.clientBabyitem.workperiod }}
                </div>
                <div class="anketa_inform_item">
                    <b>Наличие водительского удостоверения:</b> <br> {{ Views.clientBabyitem.drive }}
                </div>
                <div class="anketa_inform_item">
                    <b>Готовность выполнять следующие обязанности:</b> <br> 
                    <span v-for="work in Views.clientBabyitem.Duties" :key="work.id"> {{ work.title }},&nbsp; </span>
                </div>                
            </div>            
        </div>
    </div>
</template>

<script>
import { useViewsStore } from '../../../stores/views';
import { useUserStore } from '../../../stores/user';
import { useMessageStore } from '../../../stores/message';
export default {
    name: 'ClientBabyItem',
    setup() {
        const Views = useViewsStore();
        const User = useUserStore();
        const Message = useMessageStore();
        return { Views, User, Message };
    },
    methods: {
        back() {
            this.$router.push({name: "ClientBabyAll"})
        },
        sentMessage() {
            this.Message.success = '';
            this.User.global_error = null;
            this.User.user.reading = 0
            this.User.user.sender = this.User.user.id
            this.User.user.recipient = this.Views.clientBabyitemUser.id;
            this.User.user.time = new Date().toLocaleTimeString('en-US', {
                hour12: false, hour: 'numeric', minute: 'numeric'
            });
            
            this.Message.CREATE_MESSAGE_USER(this.User.user);
            this.User.user.title = ''; this.User.user.content = '';           
        },
    },
    mounted() {
        this.User.GET_TOKEN();
        this.Views.GET_CLIENTBABY_ITEM();
        this.User.GET_USER();
        this.User.global_error = null;
        this.Message.success = '';
    },
}
</script>