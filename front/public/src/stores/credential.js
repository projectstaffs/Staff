import { defineStore } from 'pinia';
import api from "../assets/api";

export const useCredentialStore = defineStore('credential', {    
    state: () => {
        return { 
            credentials: {},
            credential: {},
        }
    },
    actions: {
        DELETE_CREDENTIAL(data){                       
            api.post('api/auth/credential/' + data, {_method: 'DELETE'})
                .then((res) => {
                    this.GET_CREDENTIALS();
                })
                .catch(error => { console.log(error); })
        },
        CHANGE_CREDENTIAL( data){                       
            api.put('api/auth/credential/' + data.id, data)
                .then((res) => {
                })
                .catch(error => { console.log(error); })
        },
        GET_CREDENTIAL(data){
            this.credential = data;
        },
        GET_CREDENTIALS(data){
            api.get('api/auth/credential', {params: {data}})
                .then(res => {                    
                    this.credentials = res.data;
                })
                .catch(error => { console.log(error); })
        }, 
        CREATE_CREDENTIAL(data){            
            api.post('api/auth/credential', data)
                .then((res) => {                    
                    this.GET_CREDENTIALS();
                })
                .catch(error => { console.log(error); })
        },
    },
})