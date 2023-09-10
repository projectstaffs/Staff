import { defineStore } from 'pinia';
import api from "../assets/api";
import axios from 'axios';

export const useViewsStore = defineStore('views', {
    state: () => {
        return {
            clientBaby: {}, clientBabyitem: {}, clientBabyitemUser: {},
            clientNurse: {}, clientNurseitem: {}, clientNurseitemUser: {},
            clientKeeper: {}, clientKeeperitem: {}, clientKeeperitemUser: {},
            workerBaby: {}, workerBabyitem: {}, workerBabyitemUser: {},
            workerNurse: {}, workerNurseitem: {}, workerNurseitemUser: {},
            workerKeeper: {}, workerKeeperitem: {}, workerKeeperitemUser: {},
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
            this.clientBabyitemUser = JSON.parse(localStorage.clientBabyitemUser);
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
            this.clientNurseitemUser = JSON.parse(localStorage.clientNurseitemUser);
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
            this.clientKeeperitemUser = JSON.parse(localStorage.clientKeeperitemUser);
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
            this.workerBabyitemUser = JSON.parse(localStorage.workerBabyitemUser);
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
            this.workerNurseitemUser = JSON.parse(localStorage.workerNurseitemUser);
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
            this.workerKeeperitemUser = JSON.parse(localStorage.workerKeeperitemUser);
        },
    }
})