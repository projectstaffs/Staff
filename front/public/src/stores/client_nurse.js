import { defineStore } from 'pinia';
import api from "../assets/api";

export const useClient_NurseStore = defineStore('client_nurse', {
    state: () => {
        return {
            nurse: {},
            nurse_options: {} 
        }
    },

    actions: {  
        DELETE_NURSE(data){                                
            api.post('api/auth/clientnurse/' + data[0], {_method: 'DELETE'})
                .then((res) => {
                    this.GET_NURSE(data[0]);                    
                    
                    api.post('api/auth/clientnursedutie/' + data[1], {_method: 'DELETE'})
                    api.post('api/auth/clientnursejoboption/' + data[1], {_method: 'DELETE'})
                })
                .catch(error => { console.log(error); })
        },
        CHANGE_NURSE(data){
            api.put('api/auth/clientnurse/' + data[0].id, data[0])      
                .then((res) => {                
                    this.GET_NURSE(data[0].user_id);
                    api.post('api/auth/clientnursedutie/' + data[0].id, {_method: 'DELETE'})
                    api.post('api/auth/clientnursejoboption/' + data[0].id, {_method: 'DELETE'})
                    
                    let joboption = {};
                    let result_joboption = [];
                    data[1].forEach((element) => {                               
                        joboption.form_id = data[0].id;
                        joboption.nursejoboption_id = element;
                        result_joboption.push(joboption);
                        joboption = {};                                                               
                    })                  
                    this.CREATE_FORMNURSEJOBOPTION([result_joboption, result_joboption.length]);
                        
                    let nursedutie = {};
                    let result_nursedutie = [];
                    data[2].forEach((element) => {                               
                        nursedutie.form_id = data[0].id;
                        nursedutie.nursedutie_id = element;
                        result_nursedutie.push(nursedutie);
                        nursedutie = {};                                                               
                    })                  
                    this.CREATE_FORMNURSEDUTIE([result_nursedutie, result_nursedutie.length]);   
                })
                .catch(error => { console.log(error); })
        },
        CREATE_NURSE(data){                           
            api.post('api/auth/clientnurse', data[0])
                .then((res) => {
                    let joboption = {};
                    let result_joboption = [];
                    data[1].forEach((element) => {                               
                        joboption.form_id = res.data.id;
                        joboption.nursejoboption_id = element;
                        result_joboption.push(joboption);
                        joboption = {};                                                               
                    })                  
                    this.CREATE_FORMNURSEJOBOPTION([result_joboption, result_joboption.length]);
                        
                    let nursedutie = {};
                    let result_nursedutie = [];
                    data[2].forEach((element) => {                               
                        nursedutie.form_id = res.data.id;
                        nursedutie.nursedutie_id = element;
                        result_nursedutie.push(nursedutie);
                        nursedutie = {};                                                               
                    })                  
                    this.CREATE_FORMNURSEDUTIE([result_nursedutie, result_nursedutie.length]);
    
                    this.GET_NURSE(data[0].user_id);
                })
                .catch(error => { console.log(error); })
        },
        GET_NURSE(data){ 
            api.get('api/auth/clientnurse', {params: {data}})
                .then((res) => {
                    this.nurse = res.data.data;
                    let temp = [];                    
                    for (let i = 0; i < res.data.data.Joboptions.length; i++) {            
                        temp.push(res.data.data.Joboptions[i].id);
                    }
                    this.nurse_options.anketajoboptions = temp; temp = [];        
                    for (let i = 0; i < res.data.data.Duties.length; i++) {            
                        temp.push(res.data.data.Duties[i].id);
                    }
                    this.nurse_options.anketaduties = temp; temp = [];                   
                })
                .catch(error => { console.log(error); })
        },
        CREATE_FORMNURSEJOBOPTION(data){            
            api.post('api/auth/clientnursejoboption', data)
                .then((res) => {
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