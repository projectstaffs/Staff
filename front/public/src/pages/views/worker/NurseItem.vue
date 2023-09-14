<template>    
    <div @click.prevent="back()" class="category_change_btn">Назад</div>
    <div class="anketa">
        <div v-if="Views.workerNurseitemUser.image" class="anketaitem_img"> <img :src="Views.workerNurseitemUser.image" alt="photo"> </div>
        <div class="anketa_content">
            <div class="anketa_content_name">
                {{ Views.workerNurseitemUser.name }} {{ Views.workerNurseitemUser.patronymic }} {{ Views.workerNurseitemUser.surname }}
            </div>
            <div class="anketa_content_age">
                Возраст(лет): {{ Views.workerNurseitemUser.current_age }} &nbsp;&nbsp;•&nbsp;&nbsp; Опыт работы: {{ Views.workerNurseitem.experience }} &nbsp;&nbsp;•&nbsp;&nbsp; {{ Views.workerNurseitemUser.city }}
            </div>
            <div class="anketa_content_typeworks">
                <b>Предоставляю услуги:&nbsp;</b> <div v-for="work in Views.workerNurseitem.Typeworks" :key="work.id" class="anketa_content_typeworks_item"> {{ work.title }},&nbsp; </div>                    
            </div>
            <div class="anketa_content_employment">
                <b>Занятость:</b> {{ Views.workerNurseitem.employment }}
            </div>
            <div class="anketa_content_phone">
                <b>Телефон:</b> {{ Views.workerNurseitemUser.phone_number }}
            </div>

            <h2 class="anketa_title">Обо мне</h2>
            <p>{{ Views.workerNurseitemUser.about }}</p>
            <p>{{ Views.workerNurseitem.nurse_exp }}</p>
            <p>{{ Views.workerNurseitem.additional }}</p>
            <div class="anketa_inform">
                <div class="anketa_inform_item">
                    <b>Гражданство:</b> <br> {{ Views.workerNurseitemUser.citizen }}
                </div>
                <div class="anketa_inform_item">
                    <b>Наличие водительского удостоверения:</b> <br> {{ Views.workerNurseitemUser.drive }}
                </div>
                <div class="anketa_inform_item">
                    <b>Право работать на территории Украины?:</b> <br> {{ Views.workerNurseitemUser.right_work }}
                </div>
                <div class="anketa_inform_item">
                    <b>Справка об отсутствии судимости:</b> <br> {{ Views.workerNurseitemUser.criminal }}
                </div>
                <div class="anketa_inform_item">
                    <b>Умение плавать:</b> <br> {{ Views.workerNurseitemUser.swimming }}
                </div>
                <div class="anketa_inform_item">
                    <b>Семейное положение:</b> <br> {{ Views.workerNurseitemUser.status }}
                </div>
                <div class="anketa_inform_item">
                    <b>Религия:</b> <br> {{ Views.workerNurseitemUser.religion }}
                </div>
                <div class="anketa_inform_item">
                    <b>Курение:</b> <br> {{ Views.workerNurseitemUser.smoking }}
                </div>
                <div class="anketa_inform_item">
                    <b>Готовность работать в доме с домашними животными:</b> <br> {{ Views.workerNurseitemUser.animal_work }}
                </div>
            </div>
            
            <h2 class="anketa_title">Опыт работы и Образование</h2>
            <div class="anketa_experience">
                Опыт работы: {{ Views.workerNurseitem.experience }}
            </div>
            <div class="anketa_agegroup">
                <b>Рекомендации с прежних мест работы: {{ Views.workerNurseitem.recommendation }}:</b> <br> 
                <span v-for="credential in Views.workerNurseitem.Credentials" :key="credential.id"> 
                    <div>- {{ credential.full_name }}, {{ credential.email }}, {{ credential.phone }}, {{ credential.content }}; </div> 
                </span>
            </div>
            <div class="anketa_inform">
                <div class="anketa_inform_item">
                    <b>Умения и навыки:</b> <br> 
                    <span v-for="work in Views.workerNurseitem.Skills" :key="work.id"> {{ work.title }},&nbsp; </span>
                </div>
                <div class="anketa_inform_item">
                    <b>Опыт работы со следующими Диагнозами пациентов:</b> <br> 
                    <span v-for="work in Views.workerNurseitem.Diagnoses" :key="work.id"> {{ work.title }},&nbsp; </span>
                </div>
            </div>
            <div class="anketa_education">
                <b>Образование / курсы:</b> <br> 
                <span v-for="education in Views.workerNurseitem.Educations" :key="education.id"> {{ education.title }},&nbsp; </span>
            </div>
            <p class="anketa_education_about"> {{ Views.workerNurseitem.education_about }} </p>

            <h2 class="anketa_title">Предпочтения по желаемой должности</h2>
            <div class="anketa_inform">
                <div class="anketa_inform_item">
                    <b>Должность:</b> <br> 
                    <span v-for="work in Views.workerNurseitem.Typeworks" :key="work.id"> {{ work.title }},&nbsp; </span>
                </div>
                <div class="anketa_inform_item">
                    <b>Приемлемые варианты работы:</b> <br> 
                    <span v-for="work in Views.workerNurseitem.Joboptions" :key="work.id"> {{ work.title }},&nbsp; </span>
                    {{ Views.workerNurseitem.employment }}
                </div>
                <div class="anketa_inform_item">
                    <b>Желаемая зарплата:</b> <br> 
                    {{ Views.workerNurseitem.monthpay }}
                </div>
                <div class="anketa_inform_item">
                    <b>Работа на срок:</b> <br> 
                    {{ Views.workerNurseitem.workperiod }}
                </div>
                <div class="anketa_inform_item">
                    <b>Согласны ли вы на переезд:</b> <br> 
                    {{ Views.workerNurseitemUser.moving }}
                </div>
                <div class="anketa_inform_item">
                    <b>Предпочтения по работе:</b> <br> 
                    <span v-for="work in Views.workerNurseitem.Worklocations" :key="work.id"> {{ work.title }},&nbsp; </span>
                </div>
                <div class="anketa_inform_item">
                    <b>Готовность выполнять следующие обязанности:</b> <br> 
                    <span v-for="work in Views.workerNurseitem.Duties" :key="work.id"> {{ work.title }},&nbsp; </span>
                </div>
            </div>

            <h2 class="anketa_title">Отправить сообщение соискателю</h2>
            <div class="anketa_msg_title">Кому: {{ Views.workerNurseitemUser.name }}</div>
            <form @submit.prevent="sentMessage" class="login_form">                
                <div>Укажите тему сообщения:</div>
                <input v-model="User.user.title" required class="login_form_item" type="text" placeholder="тема">
                <div>Напишите текст сообщения:</div>        
                <textarea v-model="User.user.content" required class="login_form_item" placeholder="about"></textarea>        
                <button type="submit" class="login_form_btn">Отправить сообщение</button>
            </form>

            <div class="register_error" v-for="item in User.global_error" :key="item"> {{ item[0] }} </div>
            <div class="msg_success">{{ Message.success }}</div>
        </div>
    </div>  
</template>

<script>
import { useViewsStore } from '../../../stores/views';
import { useUserStore } from '../../../stores/user';
import { useMessageStore } from '../../../stores/message';
export default {
    name: 'NurseItem',
    setup() {
        const Views = useViewsStore();
        const User = useUserStore();
        const Message = useMessageStore();
        return { Views, User, Message };
    },
    methods: {
        back() {
            this.$router.push({name: "NurseAll"})
        },
        sentMessage() {
            this.Message.success = '';
            this.User.global_error = null;
            this.User.user.reading = 0
            this.User.user.sender = this.User.user.id
            this.User.user.recipient = this.Views.workerNurseitemUser.id;
            this.User.user.time = new Date().toLocaleTimeString('en-US', {
                hour12: false, hour: 'numeric', minute: 'numeric'
            });
            
            this.Message.CREATE_MESSAGE_USER(this.User.user);
            this.User.user.title = ''; this.User.user.content = '';           
        },
    },
    mounted() {
        this.User.GET_TOKEN();
        this.Views.GET_WORKERNURSE_ITEM();
        this.User.GET_USER();
        this.User.global_error = null;
        this.Message.success = '';
    },
}
</script>