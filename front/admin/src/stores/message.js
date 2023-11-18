import { defineStore } from 'pinia';
import api from "../assets/api";

export const useMessageStore = defineStore('message', {
    state: () => {
        return {
            countmessage: 0,
            messages_out: {}, 
            messages_in: {}
        }
    },

    actions: {
        GET_MSG_OUT(data){  
            api.get('http://localhost/api/auth/message', {params: {data}})
                .then(res => {                                    
                    this.messages_out = res.data;
                })
                .catch(error => { console.log(error); })
        },
        GET_MSG_IN(data){  
            api.get('http://localhost/api/auth/message_in', {params: {data}})
                .then(res => {                                    
                    this.messages_in = res.data;
                    for (let index = 0; index < res.data.length; index++) {
                        if(res.data[index].reading==0){
                            api.post('http://localhost/api/auth/message/' + res.data[index].id, { _method: 'PUT', reading: 1 })                    
                            .catch(error => { console.log(error); })
                        }
                    }
                })                
                .catch(error => { console.log(error); })
        },
        GET_MSG_INSOCKET(data){  
            api.get('http://localhost/api/auth/message_in', {params: {data}})
                .then(res => {                                    
                    this.messages_in = res.data;                    
                })                
                .catch(error => { console.log(error); })
        },
        GET_COUNTMESSAGE(data){             
            api.get('http://localhost/api/auth/message_in', {params: {data}})
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
            api.post('http://localhost/api/auth/message', data)
                .then((res) => {
                })
                .catch(error => { console.log(error); })
        },
        DELETE_MESSAGE_OUT(data){                       
            api.post('http://localhost/api/auth/message/' + data, {_method: 'DELETE'})
                .then((res) => {
                    this.GET_MSG_OUT(localStorage.userID);
                })
                .catch(error => { console.log(error); })
        },
        DELETE_MESSAGE_IN(data){                       
            api.post('http://localhost/api/auth/message/' + data, {_method: 'DELETE'})
                .then((res) => {
                    this.GET_MSG_IN(localStorage.userID);
                })
                .catch(error => { console.log(error); })
        },
    }
 })