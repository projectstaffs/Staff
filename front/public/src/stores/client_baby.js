import { defineStore } from 'pinia';
import api from "../assets/api";
import router from "../router";

export const useClient_BabyStore = defineStore('client_baby', {
    state: () => {
        return {
            baby: null,
            baby_options: {},
            errors: null
        }
    },

    actions: {
        DELETE_BABY(data){                                
            api.post('api/auth/clientbaby/' + data[0], {_method: 'DELETE'})
                .then((res) => {                    
                    //this.GET_BABY(data[0]);                    
                    
                    api.post('api/auth/clientagegroup/' + data[1], {_method: 'DELETE'})
                    api.post('api/auth/clientdutie/' + data[1], {_method: 'DELETE'})                    
                    router.push({name: "CreateClientBaby"});
                })
                .catch(error => { console.log(error); })
        },
        CHANGE_BABY(data){
            api.put('api/auth/clientbaby/' + data[0].id, data[0])      
                .then((res) => {                
                    //this.GET_BABY(data[0].user_id);
                    
                    api.post('api/auth/clientagegroup/' + data[0].id, {_method: 'DELETE'})
                    api.post('api/auth/clientdutie/' + data[0].id, {_method: 'DELETE'})                    
            
                    let dutie = {};
                    let result_dutie = [];
                    data[1].forEach((element) => {                               
                        dutie.form_id = data[0].id;
                        dutie.dutie_id = element;
                        result_dutie.push(dutie);
                        dutie = {};                                                               
                    })                  
                    this.CREATE_FORMDUTIE([result_dutie, result_dutie.length]);
    
                    let agegroup = {};
                    let result_agegroup = [];
                    data[2].forEach((element) => {                               
                        agegroup.form_id = data[0].id;
                        agegroup.agegroup_id = element;
                        result_agegroup.push(agegroup);
                        agegroup = {};                                                               
                    })                  
                    this.CREATE_FORMAGEGROUP([result_agegroup, result_agegroup.length]);
                    router.push({name: "Client_baby"});                    
                })
                .catch(error => { 
                    this.errors = error.response.data.errors;                    
                    for (const key in this.errors) {
                        this.errors[key][0] = JSON.parse(this.errors[key][0]);
                    } 
                })
        },
        CREATE_BABY(data){                    
            api.post('api/auth/clientbaby', data[0])            
                .then((res) => {    
                    let dutie = {};
                    let result_dutie = [];
                    data[1].forEach((element) => {                               
                        dutie.form_id = res.data.id;
                        dutie.dutie_id = element;
                        result_dutie.push(dutie);
                        dutie = {};                                                               
                    })                  
                    this.CREATE_FORMDUTIE([result_dutie, result_dutie.length]);
    
                    let agegroup = {};
                    let result_agegroup = [];
                    data[2].forEach((element) => {                               
                        agegroup.form_id = res.data.id;
                        agegroup.agegroup_id = element;
                        result_agegroup.push(agegroup);
                        agegroup = {};                                                               
                    })                  
                    this.CREATE_FORMAGEGROUP([result_agegroup, result_agegroup.length]);
    
                    router.push({name: "Client_baby"});
                })
                .catch(error => { 
                    this.errors = error.response.data.errors;                    
                    for (const key in this.errors) {
                        this.errors[key][0] = JSON.parse(this.errors[key][0]);
                    }                     
                })
        },
        GET_BABY(data){ 
            api.get('api/auth/clientbaby', {params: {data}})
                .then((res) => { 
                    if(res.data !== null) {
                        this.baby = res.data.data; 
                        let temp = [];
                        for (let i = 0; i < res.data.data.Agegroups.length; i++) {            
                            temp.push(res.data.data.Agegroups[i].id);
                        }  
                        this.baby_options.anketaagegroups = temp; temp = [];
                        for (let i = 0; i < res.data.data.Duties.length; i++) {            
                            temp.push(res.data.data.Duties[i].id);
                        }
                        this.baby_options.anketaduties = temp; temp = [];
                    }
                })
                .catch(error => { console.log(error); })
        },
        CREATE_FORMAGEGROUP(data){            
            api.post('api/auth/clientagegroup', data)
                .then((res) => {
                })
                .catch(error => { console.log(error); })
        },
        CREATE_FORMDUTIE(data){            
            api.post('api/auth/clientdutie', data)
                .then((res) => {
                })
                .catch(error => { console.log(error); })
        },
    }
})