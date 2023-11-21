<template>
    <div @click.prevent="back()" class="category_change_btn">Назад</div>
    <div> add message </div>    
    <form @submit.prevent="sentMessage" class="login_form">
        <div>Укажите тему сообщения:</div>
        <input v-model="User.user.title" required class="login_form_item" type="text" placeholder="тема">
        <div>Напишите текст сообщения:</div>        
        <textarea v-model="User.user.content" required class="login_form_item" placeholder="about"></textarea>        
        <button type="submit" class="login_form_btn">Отправить сообщение</button>
    </form>
</template>

<script>
import { useUserStore } from '../../stores/user';
import { useMessageStore } from '../../stores/message'
export default {
    name: "Add-message",
    setup() {
        const User = useUserStore();
        const Message = useMessageStore();
        return { User, Message };
    },
    methods: {
        back() {
            this.$router.push({name: "Messages"})
        },
        sentMessage() {
            this.User.user.reading = 0
            this.User.user.sender = this.User.user.id
            this.User.user.recipient = localStorage.user_id          
            this.User.user.time = new Date().toLocaleTimeString('en-US', {
                hour12: false, hour: 'numeric', minute: 'numeric'
            });            
            this.Message.CREATE_MESSAGE(this.User.user);
            this.$router.push({name: "Messages"})            
        },
    },
    mounted() {         
        this.User.GET_USER();                            
    },
}
</script>
