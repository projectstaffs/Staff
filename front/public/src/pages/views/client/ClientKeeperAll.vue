<template>
    <div v-for="post in Views.clientKeeper" :key="post.id">
        <div class="anketa">
            <div class="anketa_img"> <img :src="post[0].User.image" alt=""> </div>
            <div class="anketa_content">
                <div class="anketa_content_name" @click.prevent="showItem(post)">
                    {{ post[0].title }} 
                </div>
                <div class="anketa_content_age">
                    <b> Город: </b> {{ post[0].User.city }}
                </div>
                <div class="anketa_content_employment"> <b>Занятость:</b> {{ post[0].employment }} </div>
                <div class="anketa_content_about"> {{ post[0].title_about }} </div>
                <div class="anketa_content_more">
                    <div class="anketa_content_payment"> <b>Оплата:</b> {{ post[0].monthpay }} </div>
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
            this.Views.clientKeeperitemUser = item[0].User;
            localStorage.clientKeeperitemUser = JSON.stringify(item[0].User);

            this.Views.clientKeeperitem = item[0];
            localStorage.clientKeeperitem = JSON.stringify(item[0]);
            this.$router.push({name: "ClientKeeperItem"});
        }
    },
    mounted() {
        this.User.GET_TOKEN();
        this.Views.GET_CLIENTKEEPER();
    },
}
</script>