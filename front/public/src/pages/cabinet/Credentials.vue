<template>
    <div class="category_title">Добавление рекомендации:</div>    
    <form @submit.prevent="createCredential" class="category_form">
        <div>Введите ФИО рекомендателя:</div>
        <input class="category_form_title" v-model="credential.full_name" type="text" required placeholder="Напишите что-нибудь"> 
        <div>Укажите номер телефона рекомендателя:</div>
        <div> +380 <input v-model="credential.phone" type="tel" required placeholder="Напишите что-нибудь"> </div>
        <div>Введите электронный адрес рекомендателя:</div>
        <input class="category_form_title" v-model="credential.email" type="email" required placeholder="Напишите что-нибудь"> 
        <div>Укажите комментарии по рекомендации:</div>        
        <textarea v-model="credential.content" required class="category_form_title" placeholder="about"></textarea>               
        <button class="category_form_btn" type="submit">Добавить рекомендацию</button>
    </form>
    <div class="register_error" v-for="item in User.global_error" :key="item">
        {{ item[0] }}
    </div>
    
    <div class="category_title">Все рекомендации:</div>       
    <ul>                
        <li v-for="post in Credential.credentials" :key="post.id" class="category_item">
            {{ post.full_name }} {{ post.phone }} {{ post.email }} {{ post.content }}
            <span class="category_change_btn" @click.prevent="change_credential(post)">Изменить рекомендацию</span>
            <span class="category_change_btn red" @click.prevent="delete_credential(post.id)">Удалить рекомендацию</span>                
        </li>   
    </ul>    
</template>

<script>
import { useCredentialStore } from '../../stores/credential';
import { useUserStore } from '../../stores/user';   
    export default {
        name: 'Credentials',
        data() {
            return {
                credential: {},                
            }
        },
        setup() {
            const Credential = useCredentialStore();  
            const User = useUserStore();          
            return { Credential, User };
        },
        methods: {
            createCredential() {
                this.User.global_error = null;
                this.credential.user_id = localStorage.userID;
                this.Credential.CREATE_CREDENTIAL(this.credential);
                //this.credential.full_name = ''; this.credential.phone = ''; this.credential.email = ''; this.credential.content = '';
            },
            change_credential(post) {                
                post.user_id = localStorage.userID;                
                this.Credential.GET_CREDENTIAL(post);
                this.$router.push({name: "Change-credential"})                
            },
            delete_credential(id) {                
                this.Credential.DELETE_CREDENTIAL(id);                                
            } 
        },
        mounted() {
            this.User.GET_TOKEN();
            this.Credential.GET_CREDENTIALS(localStorage.userID);                                  
            this.User.global_error = null;
        },
    }
</script>