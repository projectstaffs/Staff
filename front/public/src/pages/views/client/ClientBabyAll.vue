<template>
    <div v-for="post in Views.clientBaby" :key="post.id">
        <div class="anketa">
            <div v-if="post.User.image" class="anketa_img"> <img :src="post.User.image" alt=""> </div>
            <div class="anketa_content">
                <div class="anketa_content_name" @click.prevent="showItem(post)">
                    {{ post.title }} 
                </div>
                <div class="anketa_content_age">
                    <b> Город: </b> {{ post.User.city }}
                </div>
                <div class="anketa_content_employment"> <b>Занятость:</b> {{ post.employment }} </div>
                <div class="anketa_content_about"> {{ post.title_about }} </div>
                <div class="anketa_content_more">
                    <div class="anketa_content_payment"> <b>Оплата:</b> {{ post.monthpay }} </div>
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
    name: 'ClientBabyAll',
    setup() {
        const Views = useViewsStore();
        const User = useUserStore();
        return { Views, User };
    },
    methods: {
        showItem(item) {  
            this.Views.clientBabyitemUser = item.User;
            localStorage.clientBabyitemUser = JSON.stringify(item.User);

            this.Views.clientBabyitem = item;
            localStorage.clientBabyitem = JSON.stringify(item);
            this.$router.push({name: "ClientBabyItem"});
        }
    },
    mounted() {
        this.User.GET_TOKEN();
        this.Views.GET_CLIENTBABY();
    },
}
</script>