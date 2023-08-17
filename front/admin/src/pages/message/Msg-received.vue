<template>
    <div @click.prevent="back()" class="category_change_btn">Назад</div>
    <div>received</div>    
    <ul>                
        <li v-for="post in Message.messages_in" :key="post.id" class="category_item">
            {{ post.name }} {{ post.surname }} {{ post.title }} {{ post.content }}                                      
        </li>   
    </ul>
    
</template>

<script>
import { useMessageStore } from '../../stores/message'
import { useSocketStore } from '../../stores/socket';
export default {
    name: "Msg-received",
    setup() {        
        const Message = useMessageStore();
        const Socket = useSocketStore();
        return { Message, Socket };
    },
    methods: {
        back() {
            this.$router.push({name: "Messages"})
        },
    },
    mounted() {                     
        this.Message.GET_MSG_IN(localStorage.userID); 
        this.Socket.connect();                  
    },
}
</script>