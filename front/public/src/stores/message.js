import { defineStore } from 'pinia';
import api from "../assets/api";
import router from "../router";

export const useMessageStore = defineStore('message', {
    state: () => {
        return {
            countmessage: 0,
            messages_out: {}, 
            messages_in: {},
            success: ''
        }
    },

    actions: {
        GET_MESSAGES_OUT(data){   
            api.get('api/auth/message', {params: {data}})
                .then(res => {                                    
                    this.messages_out = res.data;
                })
                .catch(error => { console.log(error); })
        },
        GET_MESSAGES_IN(data){
            api.get('api/auth/message_in', {params: {data}})
                .then(res => {
                    this.messages_in = res.data;
                    for (let index = 0; index < res.data.length; index++) {
                        if(res.data[index].reading==0){
                            api.post('api/auth/message/' + res.data[index].id, { _method: 'PUT', reading: 1 })                    
                            .catch(error => { console.log(error); })
                        }
                    }
                })
                .catch(error => { console.log(error); })
        },
        GET_MESSAGES_INSOCKET(data){
            api.get('api/auth/message_in', {params: {data}})
                .then(res => {
                    this.messages_in = res.data;                    
                })
                .catch(error => { console.log(error); })
        },
        GET_COUNTMESSAGE_USER(data){
            api.get('api/auth/message_in', {params: {data}})
                .then(res => {                                    
                    this.countmessage = 0;
                    for (let index = 0; index < res.data.length; index++) {
                        if(res.data[index].reading==0){
                            this.countmessage++                                       
                        }
                    }
                })                
                .catch(error => { console.log(error); })
        },    
    
        CREATE_MESSAGE(data){            
            api.post('api/auth/message', data)
                .then((res) => {
                    router.push({name: "Sent"}); 
                })
                .catch(error => { console.log(error); })
        },
        CREATE_MESSAGE_USER(data){            
            api.post('api/auth/message', data)
                .then((res) => {
                    this.success = 'Сообщение успешно отправлено!';
                })
                .catch(error => { console.log(error); })
        },
        DELETE_MESSAGE({dispatch}, data){  // надо сделать                     
            return api.post('api/auth/message/' + data, {_method: 'DELETE'})
                .then((res) => {
                    dispatch('GET_MESSAGES');                  
                    return res;
                })
                .catch(error => { console.log(error); return error; })
        },
    }
})