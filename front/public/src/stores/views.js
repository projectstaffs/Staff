import { defineStore } from 'pinia';
import api from "../assets/api";

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
    }
})