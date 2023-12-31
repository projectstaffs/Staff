import { defineStore } from 'pinia';
import api from "../assets/api";
import router from "../router";

export const useForm_NurseStore = defineStore('form_nurse', {    
    state: () => {
        return { 
            nurse: null,
            nurse_options: {},
            errors: null                               
        }
    },
    actions: {  
        DELETE_NURSE(data){                                
            api.post('api/auth/nurse/' + data[0], {_method: 'DELETE'})
                .then((res) => {
                    this.GET_NURSE(data[0]);
                    
                    api.post('api/auth/formdiagnose/' + data[1], {_method: 'DELETE'})
                    api.post('api/auth/formnursedutie/' + data[1], {_method: 'DELETE'})
                    api.post('api/auth/formnursetypework/' + data[1], {_method: 'DELETE'})
                    api.post('api/auth/formnurseeducation/' + data[1], {_method: 'DELETE'})
                    router.push({name: "CreateNurse"});
                })
                .catch(error => { console.log(error); })
        },
        CHANGE_NURSE(data){
            api.put('api/auth/nurse/' + data[0].id, data[0])      
                .then((res) => {                
                    this.GET_NURSE(data[0].user_id);                
                    api.post('api/auth/formdiagnose/' + data[0].id, {_method: 'DELETE'})
                    api.post('api/auth/formnursedutie/' + data[0].id, {_method: 'DELETE'})
                    api.post('api/auth/formnursetypework/' + data[0].id, {_method: 'DELETE'})
                    api.post('api/auth/formnurseeducation/' + data[0].id, {_method: 'DELETE'})
                                         
                    let education = {};
                    let result_education = [];
                    data[1].forEach((element) => {                               
                        education.form_id = data[0].id;
                        education.nurseeducation_id = element;
                        result_education.push(education);
                        education = {};                                                               
                    })                  
                    this.CREATE_FORMNURSEEDUCATION([result_education, result_education.length]);
    
                    let diagnose = {};
                    let result_diagnose = [];
                    data[2].forEach((element) => {                               
                        diagnose.form_id = data[0].id;
                        diagnose.diagnose_id = element;
                        result_diagnose.push(diagnose);
                        diagnose = {};                                                               
                    })                  
                    this.CREATE_FORMDIAGNOSE([result_diagnose, result_diagnose.length]);
    
                    let nursedutie = {};
                    let result_nursedutie = [];
                    data[3].forEach((element) => {                               
                        nursedutie.form_id = data[0].id;
                        nursedutie.nursedutie_id = element;
                        result_nursedutie.push(nursedutie);
                        nursedutie = {};                                                               
                    })                  
                    this.CREATE_FORMNURSEDUTIE([result_nursedutie, result_nursedutie.length]);
    
                    let nursetypework = {};
                    let result_nursetypework = [];
                    data[4].forEach((element) => {                               
                        nursetypework.form_id = data[0].id;
                        nursetypework.nursetypework_id = element;
                        result_nursetypework.push(nursetypework);
                        nursetypework = {};                                                               
                    })                  
                    this.CREATE_FORMNURSETYPEWORK([result_nursetypework, result_nursetypework.length]);
                    router.push({name: "Nurse"});
                })
                .catch(error => { 
                    this.errors = error.response.data.errors;                    
                    for (const key in this.errors) {
                        this.errors[key][0] = JSON.parse(this.errors[key][0]);
                    } 
                })
        },
        CREATE_NURSE(data){                          
            api.post('api/auth/nurse', data[0])
                .then((res) => {
                    let education = {};
                    let result_education = [];
                    data[1].forEach((element) => {                               
                        education.form_id = res.data.id;
                        education.nurseeducation_id = element;
                        result_education.push(education);
                        education = {};                                                               
                    })                  
                    this.CREATE_FORMNURSEEDUCATION([result_education, result_education.length]);
    
                    let diagnose = {};
                    let result_diagnose = [];
                    data[2].forEach((element) => {                               
                        diagnose.form_id = res.data.id;
                        diagnose.diagnose_id = element;
                        result_diagnose.push(diagnose);
                        diagnose = {};                                                               
                    })                  
                    this.CREATE_FORMDIAGNOSE([result_diagnose, result_diagnose.length]);
    
                    let nursedutie = {};
                    let result_nursedutie = [];
                    data[3].forEach((element) => {                               
                        nursedutie.form_id = res.data.id;
                        nursedutie.nursedutie_id = element;
                        result_nursedutie.push(nursedutie);
                        nursedutie = {};                                                               
                    })                  
                    this.CREATE_FORMNURSEDUTIE([result_nursedutie, result_nursedutie.length]);
    
                    let nursetypework = {};
                    let result_nursetypework = [];
                    data[4].forEach((element) => {                               
                        nursetypework.form_id = res.data.id;
                        nursetypework.nursetypework_id = element;
                        result_nursetypework.push(nursetypework);
                        nursetypework = {};                                                               
                    })                  
                    this.CREATE_FORMNURSETYPEWORK([result_nursetypework, result_nursetypework.length]);
    
                    this.GET_NURSE(data[0].user_id);
                    router.push({name: "Nurse"});
                })
                .catch(error => { 
                    this.errors = error.response.data.errors;                    
                    for (const key in this.errors) {
                        this.errors[key][0] = JSON.parse(this.errors[key][0]);
                    } 
                })
        },
        GET_NURSE(data){ 
            api.get('api/auth/nurse', {params: {data}})
                .then((res) => {
                    if(res.data !== null) {
                        this.nurse = res.data.data;
                        let temp = [];          
                        for (let i = 0; i < res.data.data.Diagnoses.length; i++) {            
                            temp.push(res.data.data.Diagnoses[i].id);
                        }
                        this.nurse_options.anketadiagnoses = temp; temp = [];
                        for (let i = 0; i < res.data.data.Educations.length; i++) {            
                            temp.push(res.data.data.Educations[i].id);
                        }
                        this.nurse_options.anketaeducations = temp; temp = [];
                        for (let i = 0; i < res.data.data.Typeworks.length; i++) {            
                            temp.push(res.data.data.Typeworks[i].id);
                        }
                        this.nurse_options.anketatypeworks = temp; temp = [];
                        for (let i = 0; i < res.data.data.Duties.length; i++) {            
                            temp.push(res.data.data.Duties[i].id);
                        }
                        this.nurse_options.anketaduties = temp; temp = [];
                    }
                })
                .catch(error => { console.log(error); })
        },
        CREATE_FORMNURSEEDUCATION(data){            
            api.post('api/auth/formnurseeducation', data)
                .then((res) => {
                })
                .catch(error => { console.log(error); })
        },
        CREATE_FORMDIAGNOSE(data){            
            api.post('api/auth/formdiagnose', data)
                .then((res) => {
                })
                .catch(error => { console.log(error); })
        },
        CREATE_FORMNURSEDUTIE(data){            
            api.post('api/auth/formnursedutie', data)
                .then((res) => {
                })
                .catch(error => { console.log(error); })
        },
        CREATE_FORMNURSETYPEWORK(data){            
            api.post('api/auth/formnursetypework', data)
                .then((res) => {
                })
                .catch(error => { console.log(error); })
        },
    },
})
