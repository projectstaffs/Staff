<template>
    <div class="admin">
        <div class="admin_sidebar">   
            <div class="admin_sidebar_title">Главная</div>      
            <div @click.prevent="message" class="admin_sidebar_item">Почтовый ящик</div>
            <div @click.prevent="users" class="admin_sidebar_item">Пользователи</div> 
            <div @click.prevent="children" class="admin_sidebar_item">Количество детей</div>      
            <div @click.prevent="languages" class="admin_sidebar_item">Родной язык</div>
            <div @click.prevent="alcohol" class="admin_sidebar_item">Отношение к алкоголю</div> 
            <div @click.prevent="agegroup" class="admin_sidebar_item">Возрастные групы</div> 
            <div @click.prevent="babysittingdutie" class="admin_sidebar_item">Обязаности для няни</div>
            <div @click.prevent="city" class="admin_sidebar_item">Родной город</div>
            <div @click.prevent="country" class="admin_sidebar_item">Страна проживания</div> 
            <div @click.prevent="criminal" class="admin_sidebar_item">Информация о несудимости</div>
            <div @click.prevent="diagnose" class="admin_sidebar_item">Диагнозы</div> 
            <div @click.prevent="education" class="admin_sidebar_item">Образование</div>
            <div @click.prevent="employment" class="admin_sidebar_item">Занятость</div>
            <div @click.prevent="experience" class="admin_sidebar_item">Опыт работы</div>
            <div @click.prevent="hourlypayment" class="admin_sidebar_item">Почасовая оплата</div>
            <div @click.prevent="housekeeperdutie" class="admin_sidebar_item">Обязаности домработницы</div>
            <div @click.prevent="housekeeperpreference" class="admin_sidebar_item">Предпочтения для домработницы</div>
            <div @click.prevent="housekeepertypeofwork" class="admin_sidebar_item">Вид работы для домработницы</div>
            <div @click.prevent="joboption" class="admin_sidebar_item">Варианты работы</div>
            <div @click.prevent="monthlypayment" class="admin_sidebar_item">Помесячная оплата</div>
            <div @click.prevent="moving" class="admin_sidebar_item">Варианты переезда</div>  
            <div @click.prevent="nursedutie" class="admin_sidebar_item">Обязаности сиделки</div>
            <div @click.prevent="nursetypeofwork" class="admin_sidebar_item">Вид работы для сиделки</div> 
            <div @click.prevent="nursingskill" class="admin_sidebar_item">Умения для сиделки</div> 
            <div @click.prevent="recommendation" class="admin_sidebar_item">Рекомендации</div> 
            <div @click.prevent="religion" class="admin_sidebar_item">Религии</div>
            <div @click.prevent="schedule" class="admin_sidebar_item">График работы</div> 
            <div @click.prevent="smoking" class="admin_sidebar_item">Отношение к курению</div>
            <div @click.prevent="status" class="admin_sidebar_item">Семейное положение</div>
            <div @click.prevent="typeofwork" class="admin_sidebar_item">Вид работы для няни</div> 
            <div @click.prevent="worklocation" class="admin_sidebar_item">Местоположение работы для сиделки</div>
            <div @click.prevent="workperiod" class="admin_sidebar_item">Периоды работы</div>                        
        </div>
        <div class="admin_main">
            <div class="admin_main_title">Админ-панель</div>            
            <router-view/>
        </div>
    </div>  
</template>

<script>
export default {
    name: "Menu",
    methods: {        
        message() {
            this.$router.push({name: "Messages"})
        },         
        users() {
            this.$router.push({name: "Users"})
        },
        children() {
            this.$router.push({name: "Children"})
        },
        languages() {
            this.$router.push({name: "Languages"})
        },
        alcohol() {
            this.$router.push({name: "Alcohol"})
        },
        agegroup() {
            this.$router.push({name: "Agegroup"})
        },
        babysittingdutie() {
            this.$router.push({name: "Babysittingdutie"})
        },
        city() {
            this.$router.push({name: "City"})
        },
        country() {
            this.$router.push({name: "Country"})
        },
        criminal() {
            this.$router.push({name: "Criminal"})
        },
        diagnose() {
            this.$router.push({name: "Diagnose"})
        },
        education() {
            this.$router.push({name: "Education"})
        },
        employment() {
            this.$router.push({name: "Employment"})
        },
        experience() {
            this.$router.push({name: "Experience"})
        },
        hourlypayment() {
            this.$router.push({name: "Hourlypayment"})
        },
        housekeeperdutie() {
            this.$router.push({name: "Housekeeperdutie"})
        },
        housekeeperpreference() {
            this.$router.push({name: "Housekeeperpreference"})
        },
        housekeepertypeofwork() {
            this.$router.push({name: "Housekeepertypeofwork"})
        },
        joboption() {
            this.$router.push({name: "Joboption"})
        },
        monthlypayment() {
            this.$router.push({name: "Monthlypayment"})
        },
        moving() {
            this.$router.push({name: "Moving"})
        },
        nursedutie() {
            this.$router.push({name: "Nursedutie"})
        },
        nursetypeofwork() {
            this.$router.push({name: "Nursetypeofwork"})
        },
        nursingskill() {
            this.$router.push({name: "Nursingskill"})
        },
        recommendation() {
            this.$router.push({name: "Recommendation"})
        },
        religion() {
            this.$router.push({name: "Religion"})
        },
        schedule() {
            this.$router.push({name: "Schedule"})
        },
        smoking() {
            this.$router.push({name: "Smoking"})
        },
        status() {
            this.$router.push({name: "Status"})
        },
        typeofwork() {
            this.$router.push({name: "Typeofwork"})
        },
        worklocation() {
            this.$router.push({name: "Worklocation"})
        },
        workperiod() {
            this.$router.push({name: "Workperiod"})
        },
    }
}
</script>


