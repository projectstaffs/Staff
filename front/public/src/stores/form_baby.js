import { defineStore } from 'pinia';
import api from "../assets/api";
import router from "../router";

export const useForm_BabyStore = defineStore('form_baby', {
    state: () => {
        return {
            baby: null,
            baby_options: {},
            errors: null
        }
    },

    actions: {
        DELETE_BABY(data){                                
            api.post('api/auth/baby/' + data[0], {_method: 'DELETE'})
                .then((res) => {                    
                    this.GET_BABY(data[0]);
                    
                    api.post('api/auth/userlanguages/' + data[0], {_method: 'DELETE'})
                    api.post('api/auth/formagegroup/' + data[1], {_method: 'DELETE'})
                    api.post('api/auth/formdutie/' + data[1], {_method: 'DELETE'})
                    api.post('api/auth/formeducation/' + data[1], {_method: 'DELETE'})
                    api.post('api/auth/formtypework/' + data[1], {_method: 'DELETE'})
                    router.push({name: "Account"});
                })
                .catch(error => { console.log(error); })
        },
        CHANGE_BABY(data){
            api.put('api/auth/baby/' + data[0].id, data[0])      
                .then((res) => {                
                    this.GET_BABY(data[0].user_id);
                    api.post('api/auth/userlanguages/' + data[0].user_id, {_method: 'DELETE'})
                    api.post('api/auth/formagegroup/' + data[0].id, {_method: 'DELETE'})
                    api.post('api/auth/formdutie/' + data[0].id, {_method: 'DELETE'})
                    api.post('api/auth/formeducation/' + data[0].id, {_method: 'DELETE'})
                    api.post('api/auth/formtypework/' + data[0].id, {_method: 'DELETE'})
                        
                    let user_language = {};
                    let result = [];
                    data[1].forEach((element) => {                               
                        user_language.user_id = data[0].user_id;
                        user_language.language_id = element;
                        result.push(user_language);
                        user_language = {};                                                               
                    })                  
                    this.CREATE_USERLANGUAGES([result, result.length]);
    
                    let education = {};
                    let result_education = [];
                    data[2].forEach((element) => {                               
                        education.form_id = data[0].id;
                        education.education_id = element;
                        result_education.push(education);
                        education = {};                                                               
                    })                  
                    this.CREATE_FORMEDUCATION([result_education, result_education.length]);
    
                    let typework = {};
                    let result_typework = [];
                    data[3].forEach((element) => {                               
                        typework.form_id = data[0].id;
                        typework.typework_id = element;
                        result_typework.push(typework);
                        typework = {};                                                               
                    })                  
                    this.CREATE_FORMTYPEWORK([result_typework, result_typework.length]);
    
                    let dutie = {};
                    let result_dutie = [];
                    data[4].forEach((element) => {                               
                        dutie.form_id = data[0].id;
                        dutie.dutie_id = element;
                        result_dutie.push(dutie);
                        dutie = {};                                                               
                    })                  
                    this.CREATE_FORMDUTIE([result_dutie, result_dutie.length]);
    
                    let agegroup = {};
                    let result_agegroup = [];
                    data[5].forEach((element) => {                               
                        agegroup.form_id = data[0].id;
                        agegroup.agegroup_id = element;
                        result_agegroup.push(agegroup);
                        agegroup = {};                                                               
                    })                  
                    this.CREATE_FORMAGEGROUP([result_agegroup, result_agegroup.length]);                    
                    router.push({name: "Babysitting"});
                })
                .catch(error => {
                    this.errors = error.response.data.errors;                    
                    for (const key in this.errors) {
                        this.errors[key][0] = JSON.parse(this.errors[key][0]);
                    }  
                })
        },
        CREATE_BABY(data){                  
            api.post('api/auth/baby', data[0])
                .then((res) => { 
                    this.errors = null;                
                    let user_language = {};
                    let result = [];
                    data[1].forEach((element) => {                               
                        user_language.user_id = data[0].user_id;
                        user_language.language_id = element;
                        result.push(user_language);
                        user_language = {};                                                               
                    })                  
                    this.CREATE_USERLANGUAGES([result, result.length]);
    
                    let education = {};
                    let result_education = [];
                    data[2].forEach((element) => {                               
                        education.form_id = res.data.id;
                        education.education_id = element;
                        result_education.push(education);
                        education = {};                                                               
                    })                  
                    this.CREATE_FORMEDUCATION([result_education, result_education.length]);
    
                    let typework = {};
                    let result_typework = [];
                    data[3].forEach((element) => {                               
                        typework.form_id = res.data.id;
                        typework.typework_id = element;
                        result_typework.push(typework);
                        typework = {};                                                               
                    })                  
                    this.CREATE_FORMTYPEWORK([result_typework, result_typework.length]);
    
                    let dutie = {};
                    let result_dutie = [];
                    data[4].forEach((element) => {                               
                        dutie.form_id = res.data.id;
                        dutie.dutie_id = element;
                        result_dutie.push(dutie);
                        dutie = {};                                                               
                    })                  
                    this.CREATE_FORMDUTIE([result_dutie, result_dutie.length]);
    
                    let agegroup = {};
                    let result_agegroup = [];
                    data[5].forEach((element) => {                               
                        agegroup.form_id = res.data.id;
                        agegroup.agegroup_id = element;
                        result_agegroup.push(agegroup);
                        agegroup = {};                                                               
                    })                  
                    this.CREATE_FORMAGEGROUP([result_agegroup, result_agegroup.length]);
    
                    this.GET_BABY(data[0].user_id);
                    router.push({name: "Account"});
                })
                .catch(error => { 
                    this.errors = error.response.data.errors;                    
                    for (const key in this.errors) {
                        this.errors[key][0] = JSON.parse(this.errors[key][0]);
                    } 
                })
        },
        GET_BABY(data){ 
            api.get('api/auth/baby', {params: {data}})
                .then((res) => {
                    if(res.data !== null) {
                        this.baby = res.data.data;                    
                        let temp = [];
                        for (let i = 0; i < res.data.data.Agegroups.length; i++) {            
                            temp.push(res.data.data.Agegroups[i].id);
                        }  
                        this.baby_options.anketaagegroups = temp; temp = [];              
                        for (let i = 0; i < res.data.data.Languages.length; i++) {            
                            temp.push(res.data.data.Languages[i].id);
                        }
                        this.baby_options.anketalanguages = temp; temp = [];
                        for (let i = 0; i < res.data.data.Educations.length; i++) {            
                            temp.push(res.data.data.Educations[i].id);
                        }
                        this.baby_options.anketaeducations = temp; temp = [];
                        for (let i = 0; i < res.data.data.Typeworks.length; i++) {            
                            temp.push(res.data.data.Typeworks[i].id);
                        }
                        this.baby_options.anketatypeworks = temp; temp = [];                         
                        for (let i = 0; i < res.data.data.Duties.length; i++) {            
                            temp.push(res.data.data.Duties[i].id);
                        }
                        this.baby_options.anketaduties = temp; temp = [];                      
                    }                      
                })
                .catch(error => { console.log(error); })
        },
        CREATE_USERLANGUAGES(data){            
            api.post('api/auth/userlanguages', data)
                .then((res) => {
                })
                .catch(error => { console.log(error); })
        },
        CREATE_FORMAGEGROUP(data){            
            api.post('api/auth/formagegroup', data)
                .then((res) => {
                })
                .catch(error => { console.log(error); })
        },
        CREATE_FORMDUTIE(data){            
            api.post('api/auth/formdutie', data)
                .then((res) => {
                })
                .catch(error => { console.log(error); })
        },
        CREATE_FORMEDUCATION(data){            
            api.post('api/auth/formeducation', data)
                .then((res) => {
                })
                .catch(error => { console.log(error); })
        },
        CREATE_FORMTYPEWORK(data){            
            api.post('api/auth/formtypework', data)
                .then((res) => {
                })
                .catch(error => { console.log(error); })
        },
    }
})