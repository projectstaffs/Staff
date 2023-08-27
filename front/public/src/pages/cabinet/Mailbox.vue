<template>
    <div> mail box </div>
    <form @submit.prevent="sentMessage" class="login_form">
        <div>Укажите тему сообщения:</div>
        <input v-model="User.user.title" required class="login_form_item" type="text" placeholder="тема">
        <div>Напишите текст сообщения:</div>        
        <textarea v-model="User.user.content" required class="login_form_item" placeholder="about"></textarea>        
        <button type="submit" class="login_form_btn">Отправить сообщение</button>
    </form>

    <div class="register_error" v-for="item in User.global_error" :key="item">
        {{ item[0] }}
    </div>
    
    <div @click.prevent="incoming" class="admin_sidebar_item">Входящие {{ Message.countmessage }}</div>
    <div @click.prevent="sent" class="admin_sidebar_item">Отправленные</div>
</template>

<script>
import { useUserStore } from '../../stores/user';
import { useMessageStore } from '../../stores/message';
import { useSocketStore } from '../../stores/socket';
export default {
    name: "Mailbox",
    setup() {
        const User = useUserStore();
        const Message = useMessageStore();
        const Socket = useSocketStore();
        return { User, Message, Socket };
    },   
    methods: {
        sentMessage() {
            this.User.global_error = null;
            this.User.user.reading = 0
            this.User.user.sender = this.User.user.id
            this.User.user.recipient = localStorage.admin_id
            this.User.user.time = new Date().toLocaleTimeString('en-US', {
                hour12: false, hour: 'numeric', minute: 'numeric'
            });
            
            this.Message.CREATE_MESSAGE(this.User.user);            
        },
        incoming() {
            this.$router.push({name: "Incoming"})
        },
        sent() {
            this.$router.push({name: "Sent"})
        },
    },
    mounted() {  
        this.User.GET_TOKEN();                 
        this.User.GET_USER();        
        this.Message.GET_COUNTMESSAGE_USER(localStorage.userID); 
        this.Socket.connect();
        this.User.global_error = null;               
    },
}
</script>
