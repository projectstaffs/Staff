<template>    
    <div @click.prevent="back()" class="category_change_btn">Назад</div>
    <div class="anketa">
        <div v-if="Views.workerBabyitemUser.image" class="anketaitem_img"> <img :src="Views.workerBabyitemUser.image" alt="photo"> </div>
        <div class="anketa_content">
            <div class="anketa_content_name">
                {{ Views.workerBabyitemUser.name }} {{ Views.workerBabyitemUser.patronymic }} {{ Views.workerBabyitemUser.surname }}
            </div>
            <div class="anketa_content_age">
                Возраст(лет): {{ Views.workerBabyitemUser.current_age }} &nbsp;&nbsp;•&nbsp;&nbsp; Опыт работы: {{ Views.workerBabyitem.experience }} &nbsp;&nbsp;•&nbsp;&nbsp; {{ Views.workerBabyitemUser.city }}
            </div>
            <div class="anketa_content_typeworks">
                <b>Предоставляю услуги:&nbsp;</b> <div v-for="work in Views.workerBabyitem.Typeworks" :key="work.id" class="anketa_content_typeworks_item"> {{ work.title }},&nbsp; </div>                    
            </div>
            <div class="anketa_content_employment">
                <b>Занятость:</b> {{ Views.workerBabyitem.employment }}
            </div>
            <div class="anketa_content_phone">
                <b>Телефон:</b> {{ Views.workerBabyitemUser.phone_number }}
            </div>

            <h2 class="anketa_title">Обо мне</h2>
            <p>{{ Views.workerBabyitemUser.about }}</p>
            <p>{{ Views.workerBabyitem.baby_exp }}</p>
            <p>{{ Views.workerBabyitem.additional }}</p>
            <div class="anketa_inform">
                <div class="anketa_inform_item">
                    <b>Гражданство:</b> <br> {{ Views.workerBabyitemUser.citizen }}
                </div>
                <div class="anketa_inform_item">
                    <b>Наличие водительского удостоверения:</b> <br> {{ Views.workerBabyitemUser.drive }}
                </div>
                <div class="anketa_inform_item">
                    <b>Право работать на территории Украины?:</b> <br> {{ Views.workerBabyitemUser.right_work }}
                </div>
                <div class="anketa_inform_item">
                    <b>Справка об отсутствии судимости:</b> <br> {{ Views.workerBabyitemUser.criminal }}
                </div>
                <div class="anketa_inform_item">
                    <b>Умение плавать:</b> <br> {{ Views.workerBabyitemUser.swimming }}
                </div>
                <div class="anketa_inform_item">
                    <b>Семейное положение:</b> <br> {{ Views.workerBabyitemUser.status }}
                </div>
                <div class="anketa_inform_item">
                    <b>Религия:</b> <br> {{ Views.workerBabyitemUser.religion }}
                </div>
                <div class="anketa_inform_item">
                    <b>Курение:</b> <br> {{ Views.workerBabyitemUser.smoking }}
                </div>
                <div class="anketa_inform_item">
                    <b>Готовность работать в доме с домашними животными:</b> <br> {{ Views.workerBabyitemUser.animal_work }}
                </div>
                <div class="anketa_inform_item">
                    <b>Знание языков:</b> <br> 
                    <span v-for="lang in Views.workerBabyitem.Languages" :key="lang.id"> {{ lang.title }},&nbsp; </span>
                </div>
            </div>
            
            <h2 class="anketa_title">Опыт работы и Образование</h2>
            <div class="anketa_experience">
                Опыт работы: {{ Views.workerBabyitem.experience }}, Рекомендации с прежних мест работы: {{ Views.workerBabyitem.recommendation }}
            </div>
            <div class="anketa_agegroup">
                <b>Опыт работы с детьми следующих возрастных групп:</b> <br> 
                <span v-for="agegroup in Views.workerBabyitem.Agegroups" :key="agegroup.id"> {{ agegroup.title }},&nbsp; </span>
            </div>
            <div class="anketa_education">
                <b>Образование / курсы:</b> <br> 
                <span v-for="education in Views.workerBabyitem.Educations" :key="education.id"> {{ education.title }},&nbsp; </span>
            </div>
            <p class="anketa_education_about"> {{ Views.workerBabyitem.education_about }} </p>

            <h2 class="anketa_title">Предпочтения по желаемой должности</h2>
            <div class="anketa_inform">
                <div class="anketa_inform_item">
                    <b>Должность:</b> <br> 
                    <span v-for="work in Views.workerBabyitem.Typeworks" :key="work.id"> {{ work.title }},&nbsp; </span>
                </div>
                <div class="anketa_inform_item">
                    <b>Приемлемые варианты работы:</b> <br> 
                    <span v-for="work in Views.workerBabyitem.Joboptions" :key="work.id"> {{ work.title }},&nbsp; </span>
                    {{ Views.workerBabyitem.employment }}
                </div>
                <div class="anketa_inform_item">
                    <b>Желаемая зарплата:</b> <br> 
                    {{ Views.workerBabyitem.monthpay }}
                </div>
                <div class="anketa_inform_item">
                    <b>Максимум детей в семье для одновременной работы:</b> <br> 
                    {{ Views.workerBabyitem.childrencount }}
                </div>
                <div class="anketa_inform_item">
                    <b>Работа на срок:</b> <br> 
                    {{ Views.workerBabyitem.workperiod }}
                </div>
                <div class="anketa_inform_item">
                    <b>Согласны ли вы на переезд:</b> <br> 
                    {{ Views.workerBabyitemUser.moving }}
                </div>
                <div class="anketa_inform_item">
                    <b>Готовность выполнять следующие обязанности:</b> <br> 
                    <span v-for="work in Views.workerBabyitem.Duties" :key="work.id"> {{ work.title }},&nbsp; </span>
                </div>
                <div class="anketa_inform_item">
                    <b>Готовность работать с детьми-инвалидами:</b> <br> 
                    {{ Views.workerBabyitem.children_invalid }}
                </div>
            </div>

            <h2 class="anketa_title">Отправить сообщение соискателю</h2>
            <div class="anketa_msg_title">Кому: {{ Views.workerBabyitemUser.name }}</div>
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
    name: 'BabyItem',
    setup() {
        const Views = useViewsStore();
        const User = useUserStore();
        const Message = useMessageStore();
        return { Views, User, Message };
    },
    methods: {
        back() {
            this.$router.push({name: "BabyAll"})
        },
        sentMessage() {
            this.Message.success = '';
            this.User.global_error = null;
            this.User.user.reading = 0
            this.User.user.sender = this.User.user.id
            this.User.user.recipient = this.Views.workerBabyitemUser.id;
            this.User.user.time = new Date().toLocaleTimeString('en-US', {
                hour12: false, hour: 'numeric', minute: 'numeric'
            });
            
            this.Message.CREATE_MESSAGE_USER(this.User.user);
            this.User.user.title = ''; this.User.user.content = '';           
        },
    },
    mounted() {
        this.User.GET_TOKEN();
        this.Views.GET_WORKERBABY_ITEM(); 
        this.User.GET_USER();
        this.User.global_error = null;
        this.Message.success = '';               
    },
}
</script>