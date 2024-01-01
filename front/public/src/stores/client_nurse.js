import { defineStore } from 'pinia';
import api from "../assets/api";
import router from "../router";

export const useClient_NurseStore = defineStore('client_nurse', {
    state: () => {
        return {
            nurse: null,
            nurse_options: {},
            errors: null  
        }
    },

    actions: {  
        DELETE_NURSE(data){                                
            api.post('api/auth/clientnurse/' + data[0], {_method: 'DELETE'})
                .then((res) => {
                    //this.GET_NURSE(data[0]);                    
                    
                    api.post('api/auth/clientnursedutie/' + data[1], {_method: 'DELETE'})
                    router.push({name: "CreateClientNurse"});
                })
                .catch(error => { console.log(error); })
        },
        CHANGE_NURSE(data){
            api.put('api/auth/clientnurse/' + data[0].id, data[0])      
                .then((res) => {                
                    //this.GET_NURSE(data[0].user_id);
                    api.post('api/auth/clientnursedutie/' + data[0].id, {_method: 'DELETE'})
                    
                    let nursedutie = {};
                    let result_nursedutie = [];
                    data[1].forEach((element) => {                               
                        nursedutie.form_id = data[0].id;
                        nursedutie.nursedutie_id = element;
                        result_nursedutie.push(nursedutie);
                        nursedutie = {};                                                               
                    })                  
                    this.CREATE_FORMNURSEDUTIE([result_nursedutie, result_nursedutie.length]);   
                    router.push({name: "Client_nurse"});
                })
                .catch(error => { 
                    this.errors = error.response.data.errors;                    
                    for (const key in this.errors) {
                        this.errors[key][0] = JSON.parse(this.errors[key][0]);
                    } 
                })
        },
        CREATE_NURSE(data){                           
            api.post('api/auth/clientnurse', data[0])
                .then((res) => {                   
                    let nursedutie = {};
                    let result_nursedutie = [];
                    data[1].forEach((element) => {                               
                        nursedutie.form_id = res.data.id;
                        nursedutie.nursedutie_id = element;
                        result_nursedutie.push(nursedutie);
                        nursedutie = {};                                                               
                    })                  
                    this.CREATE_FORMNURSEDUTIE([result_nursedutie, result_nursedutie.length]);
    
                    //this.GET_NURSE(data[0].user_id);
                    router.push({name: "Client_nurse"});
                })
                .catch(error => { 
                    this.errors = error.response.data.errors;                    
                    for (const key in this.errors) {
                        this.errors[key][0] = JSON.parse(this.errors[key][0]);
                    } 
                })
        },
        GET_NURSE(data){ 
            api.get('api/auth/clientnurse', {params: {data}})
                .then((res) => {
                    if(res.data !== null) {
                        this.nurse = res.data.data;
                        let temp = [];
                        for (let i = 0; i < res.data.data.Duties.length; i++) {            
                            temp.push(res.data.data.Duties[i].id);
                        }
                        this.nurse_options.anketaduties = temp; temp = [];
                    }                                       
                })
                .catch(error => { console.log(error); })
        },
        CREATE_FORMNURSEDUTIE(data){            
            api.post('api/auth/clientnursedutie', data)
                .then((res) => {
                })
                .catch(error => { console.log(error); })
        },
    },
})