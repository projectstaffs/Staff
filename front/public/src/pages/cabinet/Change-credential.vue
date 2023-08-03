<template>    
    <div class="category_title">Изменение рекомендации:</div>
    <form @submit.prevent="changeCredential" class="category_form">
        <div>Введите ФИО рекомендателя:</div>
        <input class="category_form_title" v-model="Credential.credential.full_name" type="text" required placeholder="Напишите что-нибудь"> 
        <div>Укажите номер телефона рекомендателя:</div>
        <input class="category_form_title" v-model="Credential.credential.phone" type="tel" required placeholder="Напишите что-нибудь">
        <div>Введите электронный адрес рекомендателя:</div>
        <input class="category_form_title" v-model="Credential.credential.email" type="text" required placeholder="Напишите что-нибудь"> 
        <div>Укажите комментарии по рекомендации:</div>        
        <textarea v-model="Credential.credential.content" required class="category_form_title" placeholder="about"></textarea>                
        <button class="category_form_btn" type="submit">Изменить рекомендацию</button>
    </form>
</template>

<script>
import { useCredentialStore } from '../../stores/credential';
export default {
    name: 'Change-credential',
    setup() {
            const Credential = useCredentialStore();            
            return { Credential };
        },
    methods: {        
        changeCredential() {            
            this.Credential.CHANGE_CREDENTIAL(this.Credential.credential);
            this.$router.push({name: "Credentials"})
        }
    },
}
</script>