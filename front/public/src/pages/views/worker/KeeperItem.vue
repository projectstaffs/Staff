<template>    
    <div @click.prevent="back()" class="category_change_btn">Назад</div>
    <div class="anketa">
        <div class="anketaitem_img"> <img :src="Views.workerKeeperitemUser.image" alt="photo"> </div>
        <div class="anketa_content">
            <div class="anketa_content_name">
                {{ Views.workerKeeperitemUser.name }} {{ Views.workerKeeperitemUser.patronymic }} {{ Views.workerKeeperitemUser.surname }}
            </div>
            <div class="anketa_content_age">
                Возраст(лет): {{ Views.workerKeeperitemUser.current_age }} &nbsp;&nbsp;•&nbsp;&nbsp; Опыт работы: {{ Views.workerKeeperitem.experience }} &nbsp;&nbsp;•&nbsp;&nbsp; {{ Views.workerKeeperitemUser.city }}
            </div>
            <div class="anketa_content_typeworks">
                <b>Предоставляю услуги:&nbsp;</b> <div v-for="work in Views.workerKeeperitem.Typeworks" :key="work.id" class="anketa_content_typeworks_item"> {{ work.title }},&nbsp; </div>                    
            </div>
            <div class="anketa_content_employment">
                <b>Занятость:</b> {{ Views.workerKeeperitem.employment }}
            </div>
            <div class="anketa_content_phone">
                <b>Телефон:</b> {{ Views.workerKeeperitemUser.phone_number }}
            </div>

            <h2 class="anketa_title">Обо мне</h2>
            <p>{{ Views.workerKeeperitemUser.about }}</p>
            <p>{{ Views.workerKeeperitem.keeper_exp }}</p>            
            <div class="anketa_inform">
                <div class="anketa_inform_item">
                    <b>Гражданство:</b> <br> {{ Views.workerKeeperitemUser.citizen }}
                </div>
                <div class="anketa_inform_item">
                    <b>Наличие водительского удостоверения:</b> <br> {{ Views.workerKeeperitemUser.drive }}
                </div>
                <div class="anketa_inform_item">
                    <b>Право работать на территории Украины?:</b> <br> {{ Views.workerKeeperitemUser.right_work }}
                </div>
                <div class="anketa_inform_item">
                    <b>Справка об отсутствии судимости:</b> <br> {{ Views.workerKeeperitemUser.criminal }}
                </div>
                <div class="anketa_inform_item">
                    <b>Умение плавать:</b> <br> {{ Views.workerKeeperitemUser.swimming }}
                </div>
                <div class="anketa_inform_item">
                    <b>Семейное положение:</b> <br> {{ Views.workerKeeperitemUser.status }}
                </div>
                <div class="anketa_inform_item">
                    <b>Религия:</b> <br> {{ Views.workerKeeperitemUser.religion }}
                </div>
                <div class="anketa_inform_item">
                    <b>Курение:</b> <br> {{ Views.workerKeeperitemUser.smoking }}
                </div>
                <div class="anketa_inform_item">
                    <b>Готовность работать в доме с домашними животными:</b> <br> {{ Views.workerKeeperitemUser.animal_work }}
                </div>
            </div>
            
            <h2 class="anketa_title">Опыт работы</h2>
            <div class="anketa_experience">
                Опыт работы: {{ Views.workerKeeperitem.experience }}, Рекомендации с прежних мест работы: {{ Views.workerKeeperitem.recommendation }}
            </div>
            <p>{{ Views.workerKeeperitem.additional }}</p>

            <h2 class="anketa_title">Предпочтения по желаемой должности</h2>
            <div class="anketa_inform">
                <div class="anketa_inform_item">
                    <b>Должность:</b> <br> 
                    <span v-for="work in Views.workerKeeperitem.Typeworks" :key="work.id"> {{ work.title }},&nbsp; </span>
                </div>
                <div class="anketa_inform_item">
                    <b>Место работы:</b> <br> 
                    <span v-for="work in Views.workerKeeperitem.Preferences" :key="work.id"> {{ work.title }},&nbsp; </span>
                </div>
                <div class="anketa_inform_item">
                    <b>Желаемая зарплата:</b> <br> 
                    {{ Views.workerKeeperitem.monthpay }}
                </div>
                <div class="anketa_inform_item">
                    <b>Приемлемые варианты работы:</b> <br> 
                    <span v-for="work in Views.workerKeeperitem.Joboptions" :key="work.id"> {{ work.title }},&nbsp; </span>
                    {{ Views.workerKeeperitem.employment }}
                </div>
                <div class="anketa_inform_item">
                    <b>Обязанности по присмотру за детьми:</b> <br> 
                    {{ Views.workerKeeperitem.baby_keeper }}
                </div>
                <div class="anketa_inform_item">
                    <b>Обязанности по уходу за престарелыми/больными:</b> <br> 
                    {{ Views.workerKeeperitem.nurse_keeper }}
                </div>
                <div class="anketa_inform_item">
                    <b>Работа на срок:</b> <br> 
                    {{ Views.workerKeeperitem.workperiod }}
                </div>
                <div class="anketa_inform_item">
                    <b>Можете ли вы обеспечить собственную технику для уборки (пылесос, др.)?:</b> <br> 
                    {{ Views.workerKeeperitem.technique }}
                </div>
                <div class="anketa_inform_item">
                    <b>Можете ли вы обеспечить собственные средства для уборки (моющие, чистящие, др.)?:</b> <br> 
                    {{ Views.workerKeeperitem.material }}
                </div>                
                <div class="anketa_inform_item">
                    <b>Работы по дому:</b> <br> 
                    <span v-for="work in Views.workerKeeperitem.Duties" :key="work.id"> {{ work.title }},&nbsp; </span>
                </div>
            </div>

            <h2 class="anketa_title">Отправить сообщение соискателю</h2>
            <div class="anketa_msg_title">Кому: {{ Views.workerKeeperitemUser.name }}</div>
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
    name: 'KeeperItem',
    setup() {
        const Views = useViewsStore();
        const User = useUserStore();
        const Message = useMessageStore();
        return { Views, User, Message };
    },
    methods: {
        back() {
            this.$router.push({name: "KeeperAll"})
        },
        sentMessage() {
            this.Message.success = '';
            this.User.global_error = null;
            this.User.user.reading = 0
            this.User.user.sender = this.User.user.id
            this.User.user.recipient = this.Views.workerKeeperitemUser.id;
            this.User.user.time = new Date().toLocaleTimeString('en-US', {
                hour12: false, hour: 'numeric', minute: 'numeric'
            });
            
            this.Message.CREATE_MESSAGE_USER(this.User.user);
            this.User.user.title = ''; this.User.user.content = '';           
        },
    },
    mounted() {
        this.User.GET_TOKEN();
        this.Views.GET_WORKERKEEPER_ITEM();
        this.User.GET_USER();
        this.User.global_error = null;
        this.Message.success = '';
    },
}
</script>