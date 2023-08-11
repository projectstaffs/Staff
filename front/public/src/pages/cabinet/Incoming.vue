<template>
    <div @click.prevent="back()" class="category_change_btn">Назад</div>
    <div> incoming </div>    
    <ul>                
        <li v-for="post in Message.messages_in" :key="post.id" class="category_item">
            {{ post.name }} {{ post.surname }} {{ post.title }} {{ post.content }}                                      
        </li>   
    </ul>
</template>

<script>
import { useMessageStore } from '../../stores/message';
import { useUserStore } from '../../stores/user';
export default {
    name: "Incoming",    
    setup() {        
        const Message = useMessageStore();
        const User = useUserStore();
        return { Message, User };
    },
    methods: {
        back() {
            this.$router.push({name: "Mailbox"})
        },                
    },
    mounted() {
        this.User.GET_TOKEN();
        this.Message.GET_MESSAGES_IN(localStorage.userID);                   
    },
}
</script>
