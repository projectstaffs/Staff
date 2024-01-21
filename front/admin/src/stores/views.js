import { defineStore } from 'pinia';
import api from "../assets/api";
import axios from 'axios';

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
            api.get('http://localhost/api/auth/c_baby')
                .then(res => {
                    this.clientBaby = res.data.data;
                })
                .catch(error => { console.log(error); })
        },

        GET_CLIENTNURSE(){   
            api.get('http://localhost/api/auth/c_nurse')
                .then(res => {                                    
                    this.clientNurse = res.data.data;
                })
                .catch(error => { console.log(error); })
        },        
        
        GET_CLIENTKEEPER(){   
            api.get('http://localhost/api/auth/c_keeper')
                .then(res => {                                    
                    this.clientKeeper = res.data.data;
                })
                .catch(error => { console.log(error); })
        },        

        GET_WORKERBABY(){   
            api.get('http://localhost/api/auth/w_baby')
                .then(res => {                                    
                    this.workerBaby = res.data.data;
                })
                .catch(error => { console.log(error); })
        },        

        GET_WORKERNURSE(){   
            api.get('http://localhost/api/auth/w_nurse')
                .then(res => {                                    
                    this.workerNurse = res.data.data;
                })
                .catch(error => { console.log(error); })
        },        

        GET_WORKERKEEPER(){   
            api.get('http://localhost/api/auth/w_keeper')
                .then(res => {                                    
                    this.workerKeeper = res.data.data;
                })
                .catch(error => { console.log(error); })
        },        
    }
})