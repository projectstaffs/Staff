<template>
    <div class="category_title">Все пользователи:</div>       
    <ul>                
        <li v-for="post in User.users" :key="post.id" class="category_item">
            {{ post.name }} 
            <span class="category_change_btn" @click.prevent="addMessage(post.id)">Написать сообщение</span>                            
        </li>   
    </ul>
    
    <div @click.prevent="incoming" class="admin_sidebar_item">Входящие {{ Message.countmessage }}</div>
    <div @click.prevent="sent" class="admin_sidebar_item">Отправленные</div>
</template>

<script>
import { useUserStore } from '../../stores/user';
import { useMessageStore } from '../../stores/message';
import { useSocketStore } from '../../stores/socket';
export default {
    name: "Messages",
    setup() {
        const User = useUserStore();
        const Message = useMessageStore();
        const Socket = useSocketStore();
        return { User, Message, Socket };
    }, 
    methods: {
        incoming() {
            this.$router.push({name: "Msg-received"})
        },
        sent() {
            this.$router.push({name: "Msg-sent"})
        },
        addMessage(id) {
            localStorage.user_id = id; 
            this.$router.push({name: "Add-message"})
        }
    },
    mounted() {       
        this.User.GET_TOKEN();  
        this.User.GET_USERS(); 
        this.Socket.connect(); 
    },
    beforeRouteEnter(to, from, next) {
        const Message = useMessageStore();        
        if(from.name === 'Msg-received') {
            Message.countmessage = 0;
        } else {
            Message.GET_COUNTMESSAGE(localStorage.userID);
        }
        next();        
    },
}
</script>