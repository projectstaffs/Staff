import { defineStore } from 'pinia';
import api from "../assets/api";
import axios from 'axios';

export const useViewsStore = defineStore('views', {
    state: () => {
        return {
            clientBaby: {}, clientBabyitem: {},
            clientNurse: {}, clientNurseitem: {},
            clientKeeper: {}, clientKeeperitem: {},
            workerBaby: {}, workerBabyitem: {},
            workerNurse: {}, workerNurseitem: {},
            workerKeeper: {}, workerKeeperitem: {},
        }
    },

    actions: {
        GET_CLIENTBABY(){   
            api.get('api/auth/c_baby')
                .then(res => {                                    
                    this.clientBaby = res.data;
                })
                .catch(error => { console.log(error); })
        },
        GET_CLIENTBABY_ITEM(){   
            this.clientBabyitem = JSON.parse(localStorage.clientBabyitem);
        },
        GET_CLIENTNURSE(){   
            api.get('api/auth/c_nurse')
                .then(res => {                                    
                    this.clientNurse = res.data;
                })
                .catch(error => { console.log(error); })
        },
        GET_CLIENTNURSE_ITEM(){   
            this.clientNurseitem = JSON.parse(localStorage.clientNurseitem);
        },
        GET_CLIENTKEEPER(){   
            api.get('api/auth/c_keeper')
                .then(res => {                                    
                    this.clientKeeper = res.data;
                })
                .catch(error => { console.log(error); })
        },
        GET_CLIENTKEEPER_ITEM(){   
            this.clientKeeperitem = JSON.parse(localStorage.clientKeeperitem);
        },

        GET_WORKERBABY(){   
            api.get('api/auth/w_baby')
                .then(res => {                                    
                    this.workerBaby = res.data;
                })
                .catch(error => { console.log(error); })
        },
        GET_WORKERBABY_ITEM(){   
            this.workerBabyitem = JSON.parse(localStorage.workerBabyitem);
        },
        GET_WORKERNURSE(){   
            api.get('api/auth/w_nurse')
                .then(res => {                                    
                    this.workerNurse = res.data;
                })
                .catch(error => { console.log(error); })
        },
        GET_WORKERNURSE_ITEM(){   
            this.workerNurseitem = JSON.parse(localStorage.workerNurseitem);
        },
        GET_WORKERKEEPER(){   
            api.get('api/auth/w_keeper')
                .then(res => {                                    
                    this.workerKeeper = res.data;
                })
                .catch(error => { console.log(error); })
        },
        GET_WORKERKEEPER_ITEM(){   
            this.workerKeeperitem = JSON.parse(localStorage.workerKeeperitem);
        },
    }
})