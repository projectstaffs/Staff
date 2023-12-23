import { defineStore } from 'pinia';
import api from "../assets/api";
import router from "../router";

export const useCredentialStore = defineStore('credential', {    
    state: () => {
        return { 
            credentials: {}
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
        GET_CREDENTIALS(){
            api.get('api/auth/credential')
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
        /*CHANGE_CREDENTIAL( data){                       
            api.put('api/auth/credential/' + data.id, data)
                .then((res) => {
                    router.push({name: "Credentials"})
                })
                .catch(error => { console.log(error); })
        },*/
    },
})