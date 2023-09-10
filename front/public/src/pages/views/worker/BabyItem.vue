<template>    
    <div @click.prevent="back()" class="category_change_btn">Назад</div>
    <div class="anketa">
        <div class="anketaitem_img">
            <img :src="Views.workerBabyitemUser.image" alt="photo">
        </div>
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
            <p class="anketa_education_about">
                {{ Views.workerBabyitem.education_about }}
            </p>

            <h2 class="anketa_title">Предпочтения по желаемой должности</h2>
        </div>
    </div>
    <div>{{ Views.workerBabyitem }}</div>
</template>

<script>
import { useViewsStore } from '../../../stores/views';
import { useUserStore } from '../../../stores/user';
export default {
    name: 'BabyItem',
    setup() {
        const Views = useViewsStore();
        const User = useUserStore();
        return { Views, User };
    },
    methods: {
        back() {
            this.$router.push({name: "BabyAll"})
        },
    },
    mounted() {
        this.User.GET_TOKEN();
        this.Views.GET_WORKERBABY_ITEM();                
    },
}
</script>