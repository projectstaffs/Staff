import { defineStore } from 'pinia';
import api from "../assets/api";
import axios from 'axios';
import { useUserStore } from './user';
const User = useUserStore();

export const useViewsStore = defineStore('views', {
    state: () => {
        return {
            clientBaby: {}, 
            clientNurse: {}, 
            clientKeeper: {}, 
            workerBaby: {}, 
            workerNurse: {}, 
            workerKeeper: {}, 
            currentWBPage: 1, currentWNPage: 1, currentWKPage: 1,
            currentCBPage: 1, currentCNPage: 1, currentCKPage: 1,
        }
    },

    actions: {
        GET_CLIENTBABY(){   
            api.get(User.url + 'api/auth/c_baby')
                .then(res => {
                    this.clientBaby = res.data.data;
                })
                .catch(error => { console.log(error); })
        },
        BLOCK_CLIENTBABY(data){   
            api.post(User.url + 'api/auth/blockclientbaby', data)
                .then(res => {
                    this.GET_CLIENTBABY();
                })
                .catch(error => { console.log(error); })
        },
        RESTORE_CLIENTBABY(data){   
            api.post(User.url + 'api/auth/restoreclientbaby', data)
                .then(res => {
                    this.GET_CLIENTBABY();
                })
                .catch(error => { console.log(error); })
        },

        GET_CLIENTNURSE(){   
            api.get(User.url + 'api/auth/c_nurse')
                .then(res => {                                    
                    this.clientNurse = res.data.data;
                })
                .catch(error => { console.log(error); })
        },  
        BLOCK_CLIENTNURSE(data){   
            api.post(User.url + 'api/auth/blockclientnurse', data)
                .then(res => {
                    this.GET_CLIENTNURSE();
                })
                .catch(error => { console.log(error); })
        },
        RESTORE_CLIENTNURSE(data){   
            api.post(User.url + 'api/auth/restoreclientnurse', data)
                .then(res => {
                    this.GET_CLIENTNURSE();
                })
                .catch(error => { console.log(error); })
        },      
        
        GET_CLIENTKEEPER(){   
            api.get(User.url + 'api/auth/c_keeper')
                .then(res => {                                    
                    this.clientKeeper = res.data.data;
                })
                .catch(error => { console.log(error); })
        }, 
        BLOCK_CLIENTKEEPER(data){   
            api.post(User.url + 'api/auth/blockclientkeeper', data)
                .then(res => {
                    this.GET_CLIENTKEEPER();
                })
                .catch(error => { console.log(error); })
        },
        RESTORE_CLIENTKEEPER(data){   
            api.post(User.url + 'api/auth/restoreclientkeeper', data)
                .then(res => {
                    this.GET_CLIENTKEEPER();
                })
                .catch(error => { console.log(error); })
        },       

        GET_WORKERBABY(){   
            api.get(User.url + 'api/auth/w_baby')
                .then(res => {                                    
                    this.workerBaby = res.data.data;
                })
                .catch(error => { console.log(error); })
        },
        BLOCK_BABY(data){   
            api.post(User.url + 'api/auth/blockbaby', data)
                .then(res => {
                    this.GET_WORKERBABY();
                })
                .catch(error => { console.log(error); })
        },
        RESTORE_BABY(data){   
            api.post(User.url + 'api/auth/restorebaby', data)
                .then(res => {
                    this.GET_WORKERBABY();
                })
                .catch(error => { console.log(error); })
        },        

        GET_WORKERNURSE(){   
            api.get(User.url + 'api/auth/w_nurse')
                .then(res => {                                    
                    this.workerNurse = res.data.data;
                })
                .catch(error => { console.log(error); })
        },
        BLOCK_NURSE(data){   
            api.post(User.url + 'api/auth/blocknurse', data)
                .then(res => {
                    this.GET_WORKERNURSE();
                })
                .catch(error => { console.log(error); })
        },
        RESTORE_NURSE(data){   
            api.post(User.url + 'api/auth/restorenurse', data)
                .then(res => {
                    this.GET_WORKERNURSE();
                })
                .catch(error => { console.log(error); })
        },        

        GET_WORKERKEEPER(){   
            api.get(User.url + 'api/auth/w_keeper')
                .then(res => {                                    
                    this.workerKeeper = res.data.data;
                })
                .catch(error => { console.log(error); })
        },
        BLOCK_KEEPER(data){   
            api.post(User.url + 'api/auth/blockkeeper', data)
                .then(res => {
                    this.GET_WORKERKEEPER();
                })
                .catch(error => { console.log(error); })
        },
        RESTORE_KEEPER(data){   
            api.post(User.url + 'api/auth/restorekeeper', data)
                .then(res => {
                    this.GET_WORKERKEEPER();
                })
                .catch(error => { console.log(error); })
        },        
    }
})