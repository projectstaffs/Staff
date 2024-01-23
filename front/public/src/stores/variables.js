import { defineStore } from 'pinia';
import axios from 'axios';
import api from "../assets/api";

export const useDataStore = defineStore('variables', {    
    state: () => {
        return {
            languages: {}, 
            agegroups: {}, 
            childrens: {}, 
            babysittingduties: {}, 
            citys: {}, 
            countrys: {}, 
            diagnoses: {},               
            educations: {}, 
            experiences: {}, 
            hourlypayments: {}, 
            housekeeperduties: {}, 
            housekeeperpreferences: {}, 
            housekeepertypeofworks: {},
            monthlypayments: {}, 
            nurseduties: {}, 
            nursetypeofworks: {},
            schedules: {},
            typeofworks: {}, 
            workperiods: {},           
        }
    },
    actions: {        
        GET_LANGUAGES(){
            api.get('http://localhost/api/auth/language')
                .then(res => {                    
                    this.languages = res.data;
                })
                .catch(error => { console.log(error); })
        },
        GET_AGEGROUPS(){
            api.get('http://localhost/api/auth/agegroup')
                .then(res => {                    
                    this.agegroups = res.data;
                })
                .catch(error => { console.log(error); })
        },
        GET_BABYSITTINGDUTIES(){
            api.get('http://localhost/api/auth/babysittingdutie')
                .then(res => {                    
                    this.babysittingduties = res.data;
                })
                .catch(error => { console.log(error); })
        },
        GET_DIAGNOSES(){
            api.get('http://localhost/api/auth/diagnose')
                .then(res => {                    
                    this.diagnoses = res.data;
                })
                .catch(error => { console.log(error); })
        },
        GET_EDUCATIONS(){
            api.get('http://localhost/api/auth/education')
                .then(res => {                    
                    this.educations = res.data;
                })
                .catch(error => { console.log(error); })
        },
        GET_EXPERIENCES(){
            api.get('http://localhost/api/auth/experience')
                .then(res => {                    
                    this.experiences = res.data;
                })
                .catch(error => { console.log(error); })
        },
        GET_HOURLYPAYMENTS(){
            api.get('http://localhost/api/auth/hourlypayment')
                .then(res => {                    
                    this.hourlypayments = res.data;
                })
                .catch(error => { console.log(error); })
        },
        GET_HOUSEKEEPERDUTIES(){
            api.get('http://localhost/api/auth/housekeeperdutie')
                .then(res => {                    
                    this.housekeeperduties = res.data;
                    //this.housekeeperduties.forEach((element) => {                               
                    //    element.title = JSON.parse(element.title);                                                               
                    //})
                })
                .catch(error => { console.log(error); })
        },
        GET_HOUSEKEEPERPREFERENCES(){
            api.get('http://localhost/api/auth/housekeeperpreference')
                .then(res => {                    
                    this.housekeeperpreferences = res.data;                    
                })
                .catch(error => { console.log(error); })
        },
        GET_HOUSEKEEPERTYPEOFWORKS(){
            api.get('http://localhost/api/auth/housekeepertypeofwork')
                .then(res => {                    
                    this.housekeepertypeofworks = res.data;
                    //this.housekeepertypeofworks.forEach((element) => {                               
                    //    element.title = JSON.parse(element.title);                                                               
                    //})
                })
                .catch(error => { console.log(error); })
        },
        GET_MONTHLYPAYMENTS(){
            api.get('http://localhost/api/auth/monthlypayment')
                .then(res => {                    
                    this.monthlypayments = res.data;
                })
                .catch(error => { console.log(error); })
        },
        GET_NURSEDUTIES(){
            api.get('http://localhost/api/auth/nursedutie')
                .then(res => {                    
                    this.nurseduties = res.data;
                    //this.nurseduties.forEach((element) => {                               
                    //    element.title = JSON.parse(element.title);                                                               
                    //})
                })
                .catch(error => { console.log(error); })
        },
        GET_NURSETYPEOFWORKS(){
            api.get('http://localhost/api/auth/nursetypeofwork')
                .then(res => {                    
                    this.nursetypeofworks = res.data;
                    //this.nursetypeofworks.forEach((element) => {                               
                    //    element.title = JSON.parse(element.title);                                                               
                    //})
                })
                .catch(error => { console.log(error); })
        },
        GET_SCHEDULES(){
            api.get('http://localhost/api/auth/schedule')
                .then(res => {                    
                    this.schedules = res.data;
                })
                .catch(error => { console.log(error); })
        },
        GET_TYPEOFWORKS(){
            api.get('http://localhost/api/auth/typeofwork')
                .then(res => {                    
                    this.typeofworks = res.data;
                })
                .catch(error => { console.log(error); })
        },
        GET_WORKPERIODS(){
            api.get('http://localhost/api/auth/workperiod')
                .then(res => {                    
                    this.workperiods = res.data;
                })
                .catch(error => { console.log(error); })
        },
        GET_CHILDRENS(){
            api.get('http://localhost/api/auth/children')
                .then(res => {                    
                    this.childrens = res.data;
                })
                .catch(error => { console.log(error); })
        },  
        GET_CITYS() {            
            axios.get("http://localhost/api/city")            
                .then(res => {                    
                    this.citys = res.data;                 
                })
                .catch(error => { console.log(error); })
        },  
        GET_COUNTRYS() {            
            axios.get("http://localhost/api/country")            
                .then(res => {                    
                    this.countrys = res.data;                
                })
                .catch(error => { console.log(error); })
        },
    },
})
