import { defineStore } from 'pinia';
import api from "../assets/api";
import router from "../router";

export const useClient_KeeperStore = defineStore('client_keeper', {    
    state: () => {
        return {                        
            keeper: null,
            keeper_options: {}, 
            errors: null                     
        }
    },
    actions: {  
        DELETE_KEEPER(data){                                
            api.post('api/auth/clientkeeper/' + data[0], {_method: 'DELETE'})
                .then((res) => {
                    //this.GET_KEEPER(data[0]);
                    api.post('api/auth/clientkeeperdutie/' + data[1], {_method: 'DELETE'})
                    router.push({name: "CreateClientKeeper"});
                })
                .catch(error => { console.log(error); })
        },
        CHANGE_KEEPER(data){
            api.put('api/auth/clientkeeper/' + data[0].id, data[0])      
                .then((res) => {                
                    //this.GET_KEEPER(data[0].user_id);                
                    api.post('api/auth/clientkeeperdutie/' + data[0].id, {_method: 'DELETE'})
                                           
                    let keeperdutie = {};
                    let result_keeperdutie = [];
                    data[1].forEach((element) => {                               
                        keeperdutie.form_id = data[0].id;
                        keeperdutie.keeperdutie_id = element;
                        result_keeperdutie.push(keeperdutie);
                        keeperdutie = {};                                                               
                    })                  
                    this.CREATE_FORMKEEPERDUTIE([result_keeperdutie, result_keeperdutie.length]);                        
                    router.push({name: "Client_keeper"});
                })
                .catch(error => { 
                    this.errors = error.response.data.errors;                    
                    for (const key in this.errors) {
                        this.errors[key][0] = JSON.parse(this.errors[key][0]);
                    } 
                })
        },
        CREATE_KEEPER(data){                           
            api.post('api/auth/clientkeeper', data[0])
                .then((res) => {                    
        
                    let keeperdutie = {};
                    let result_keeperdutie = [];
                    data[1].forEach((element) => {                               
                        keeperdutie.form_id = res.data.id;
                        keeperdutie.keeperdutie_id = element;
                        result_keeperdutie.push(keeperdutie);
                        keeperdutie = {};                                                               
                    })                  
                    this.CREATE_FORMKEEPERDUTIE([result_keeperdutie, result_keeperdutie.length]);
    
                    //this.GET_KEEPER(data[0].user_id);
                    router.push({name: "Client_keeper"});
                })
                .catch(error => { 
                    this.errors = error.response.data.errors;                    
                    for (const key in this.errors) {
                        this.errors[key][0] = JSON.parse(this.errors[key][0]);
                    } 
                })
        },
        GET_KEEPER(data){ 
            api.get('api/auth/clientkeeper', {params: {data}})
                .then((res) => { 
                    if(res.data !== null) {
                        this.keeper = res.data.data;
                        let temp = [];                    
                        for (let i = 0; i < res.data.data.Duties.length; i++) {            
                            temp.push(res.data.data.Duties[i].id);
                        }
                        this.keeper_options.anketaduties = temp; temp = [];
                    }                                                                               
                })
                .catch(error => { console.log(error); })
        },
        CREATE_FORMKEEPERDUTIE(data){            
            return api.post('api/auth/clientkeeperdutie', data)
                .then((res) => {
                })
                .catch(error => { console.log(error); })
        },      
    },
})
