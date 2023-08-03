import { defineStore } from 'pinia';
import api from "../assets/api";

export const useForm_HousekeeperStore = defineStore('form_housekeeper', {    
    state: () => {
        return {                        
            keeper: {},
            keeper_options: {},                      
        }
    },
    actions: {  
        DELETE_KEEPER(data){                                
            api.post('api/auth/keeper/' + data[0], {_method: 'DELETE'})
                .then((res) => {
                    this.GET_KEEPER(data[0]);
                    api.post('api/auth/keeperdutie/' + data[1], {_method: 'DELETE'})
                    api.post('api/auth/keeperjoboption/' + data[1], {_method: 'DELETE'})
                    api.post('api/auth/keeperpreference/' + data[1], {_method: 'DELETE'})
                    api.post('api/auth/keepertypework/' + data[1], {_method: 'DELETE'})
                })
                .catch(error => { console.log(error); })
        },
        CHANGE_KEEPER(data){
            api.put('api/auth/keeper/' + data[0].id, data[0])      
                .then((res) => {                
                    this.GET_KEEPER(data[0].user_id);                
                    api.post('api/auth/keeperdutie/' + data[0].id, {_method: 'DELETE'})
                    api.post('api/auth/keeperjoboption/' + data[0].id, {_method: 'DELETE'})
                    api.post('api/auth/keeperpreference/' + data[0].id, {_method: 'DELETE'})
                    api.post('api/auth/keepertypework/' + data[0].id, {_method: 'DELETE'})        
                    
                    let joboption = {};
                    let result_joboption = [];
                    data[1].forEach((element) => {                               
                        joboption.form_id = data[0].id;
                        joboption.keeperjoboption_id = element;
                        result_joboption.push(joboption);
                        joboption = {};                                                               
                    })                  
                    this.CREATE_FORMKEEPERJOBOPTION([result_joboption, result_joboption.length]);
    
                    let preference = {};
                    let result_preference = [];
                    data[2].forEach((element) => {                               
                        preference.form_id = data[0].id;
                        preference.keeperpreference_id = element;
                        result_preference.push(preference);
                        preference = {};                                                               
                    })                  
                    this.CREATE_FORMKEEPERPREFERENCE([result_preference, result_preference.length]);
    
                    let keeperdutie = {};
                    let result_keeperdutie = [];
                    data[3].forEach((element) => {                               
                        keeperdutie.form_id = data[0].id;
                        keeperdutie.keeperdutie_id = element;
                        result_keeperdutie.push(keeperdutie);
                        keeperdutie = {};                                                               
                    })                  
                    this.CREATE_FORMKEEPERDUTIE([result_keeperdutie, result_keeperdutie.length]);
    
                    let keepertypework = {};
                    let result_keepertypework = [];
                    data[4].forEach((element) => {                               
                        keepertypework.form_id = data[0].id;
                        keepertypework.keepertypework_id = element;
                        result_keepertypework.push(keepertypework);
                        keepertypework = {};                                                               
                    })                  
                    this.CREATE_FORMKEEPERTYPEWORK([result_keepertypework, result_keepertypework.length]);                    
                })
                .catch(error => { console.log(error); })
        },
        CREATE_KEEPER(data){                           
            api.post('api/auth/keeper', data[0])
                .then((res) => {
                    let joboption = {};
                    let result_joboption = [];
                    data[1].forEach((element) => {                               
                        joboption.form_id = res.data.id;
                        joboption.keeperjoboption_id = element;
                        result_joboption.push(joboption);
                        joboption = {};                                                               
                    })                  
                    this.CREATE_FORMKEEPERJOBOPTION([result_joboption, result_joboption.length]);
    
                    let preference = {};
                    let result_preference = [];
                    data[2].forEach((element) => {                               
                        preference.form_id = res.data.id;
                        preference.keeperpreference_id = element;
                        result_preference.push(preference);
                        preference = {};                                                               
                    })                  
                    this.CREATE_FORMKEEPERPREFERENCE([result_preference, result_preference.length]);
    
                    let keeperdutie = {};
                    let result_keeperdutie = [];
                    data[3].forEach((element) => {                               
                        keeperdutie.form_id = res.data.id;
                        keeperdutie.keeperdutie_id = element;
                        result_keeperdutie.push(keeperdutie);
                        keeperdutie = {};                                                               
                    })                  
                    this.CREATE_FORMKEEPERDUTIE([result_keeperdutie, result_keeperdutie.length]);
    
                    let keepertypework = {};
                    let result_keepertypework = [];
                    data[4].forEach((element) => {                               
                        keepertypework.form_id = res.data.id;
                        keepertypework.keepertypework_id = element;
                        result_keepertypework.push(keepertypework);
                        keepertypework = {};                                                               
                    })                  
                    this.CREATE_FORMKEEPERTYPEWORK([result_keepertypework, result_keepertypework.length]);
    
                    this.GET_KEEPER(data[0].user_id);
                })
                .catch(error => { console.log(error); })
        },
        GET_KEEPER(data){ 
            api.get('api/auth/keeper', {params: {data}})
                .then((res) => {                                                                                 
                    this.keeper = res.data.data;
                    let temp = [];
                    for (let i = 0; i < res.data.data.Typeworks.length; i++) {            
                        temp.push(res.data.data.Typeworks[i].id);
                    }
                    this.keeper_options.anketatypeworks = temp; temp = [];
                    for (let i = 0; i < res.data.data.Joboptions.length; i++) {            
                        temp.push(res.data.data.Joboptions[i].id);
                    }
                    this.keeper_options.anketajoboptions = temp; temp = [];        
                    for (let i = 0; i < res.data.data.Duties.length; i++) {            
                        temp.push(res.data.data.Duties[i].id);
                    }
                    this.keeper_options.anketaduties = temp; temp = [];
                    for (let i = 0; i < res.data.data.Preferences.length; i++) {            
                        temp.push(res.data.data.Preferences[i].id);
                    } 
                    this.keeper_options.anketarpreferences = temp; temp = [];
                })
                .catch(error => { console.log(error); })
        },    
        CREATE_FORMKEEPERJOBOPTION(data){            
            api.post('api/auth/keeperjoboption', data)
                .then((res) => {
                })
                .catch(error => { console.log(error); })
        },
        CREATE_FORMKEEPERPREFERENCE(data){            
            api.post('api/auth/keeperpreference', data)
                .then((res) => {
                })
                .catch(error => { console.log(error); })
        },
        CREATE_FORMKEEPERDUTIE(data){            
            return api.post('api/auth/keeperdutie', data)
                .then((res) => {
                })
                .catch(error => { console.log(error); })
        },    
        CREATE_FORMKEEPERTYPEWORK(data){            
            return api.post('api/auth/keepertypework', data)
                .then((res) => {
                })
                .catch(error => { console.log(error); })
        },      
    },
})
