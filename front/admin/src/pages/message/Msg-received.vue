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
export default {
    name: "Msg-received",
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
        this.Message.GET_MSG_IN(localStorage.userID);                   
    },
}
</script>