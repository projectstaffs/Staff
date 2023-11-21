<template>
    <div @click.prevent="back()" class="category_change_btn">Назад</div>
    <div> incoming </div>    
    <ul>                
        <li v-for="post in Message.messages_in" :key="post.id" class="category_item">
            {{ post.name }} {{ post.surname }} {{ post.title }} {{ post.content }} <span class="category_change_btn red" @click.prevent="delete_message(post.id)">Удалить сообщение</span>                                     
        </li>   
    </ul>
</template>

<script>
import { useMessageStore } from '../../stores/message';
import { useUserStore } from '../../stores/user';
import { useSocketStore } from '../../stores/socket';
export default {
    name: "Incoming",    
    setup() {        
        const Message = useMessageStore();
        const User = useUserStore();
        const Socket = useSocketStore();
        return { Message, User, Socket };
    },
    methods: {
        back() {
            this.$router.push({name: "Mailbox"})
        }, 
        delete_message(id) {
            this.Message.DELETE_MESSAGE_IN(id);
        }               
    },
    mounted() {
        this.User.GET_TOKEN();
        this.Message.GET_MESSAGES_INSOCKET(localStorage.userID);                
        this.Socket.connect();                   
    },
    beforeRouteLeave(to, from, next) {        
        this.Message.GET_MESSAGES_IN(localStorage.userID);
        next();
    },
}
</script>
