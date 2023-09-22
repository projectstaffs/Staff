<template>
    <div @click.prevent="back()" class="category_change_btn">Назад</div>
    <div>sent</div>    
    <ul>                
        <li v-for="post in Message.messages_out" :key="post.id" class="category_item">
            {{ post.name }} {{ post.surname }} {{ post.title }} {{ post.content }} <span class="category_change_btn red" @click.prevent="delete_message(post.id)">Удалить сообщение</span>                                     
        </li>   
    </ul>
</template>

<script>
import { useMessageStore } from '../../stores/message'
export default {
    name: "Msg-sent",
    setup() {
        const Message = useMessageStore();
        return { Message };
    },
    methods: {
        back() {
            this.$router.push({name: "Messages"})
        },
        delete_message(id) {
            this.Message.DELETE_MESSAGE_OUT(id);
        }
    },
    mounted() {                    
        this.Message.GET_MSG_OUT(localStorage.userID);                           
    },
}
</script>