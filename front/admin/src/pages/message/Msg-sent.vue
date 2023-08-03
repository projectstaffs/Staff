<template>
    <div @click.prevent="back()" class="category_change_btn">Назад</div>
    <div>sent</div>    
    <ul>                
        <li v-for="post in Message.messages_out" :key="post.id" class="category_item">
            {{ post.name }} {{ post.surname }} {{ post.title }} {{ post.content }}                                      
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
    },
    mounted() {                    
        this.Message.GET_MSG_OUT(localStorage.userID);                           
    },
}
</script>