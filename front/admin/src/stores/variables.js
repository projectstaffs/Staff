import { defineStore } from 'pinia';
import axios from 'axios';
import api from "../assets/api";

export const useDataStore = defineStore('variables', {    
    state: () => {
        return {
            languages: {}, language: {},
            agegroups: {}, agegroup: {},
            childrens: {}, children: {},
            babysittingduties: {}, babysittingdutie: {},
            citys: {}, city: {},
            diagnoses: {}, diagnose: {},              
            educations: {}, education: {},
            experiences: {}, experience: {},
            hourlypayments: {}, hourlypayment: {},
            housekeeperduties: {}, housekeeperdutie: {},
            housekeeperpreferences: {}, housekeeperpreference: {},
            housekeepertypeofworks: {}, housekeepertypeofwork: {},
            monthlypayments: {}, monthlypayment: {},
            nurseduties: {}, nursedutie: {},
            nursetypeofworks: {}, nursetypeofwork: {},
            typeofworks: {}, typeofwork: {},
            workperiods: {}, workperiod: {},          
        }
    },
    actions: {
        DELETE_LANGUAGE(data){                       
            api.post('http://localhost/api/auth/language/' + data, {_method: 'DELETE'})
                .then((res) => {
                    this.GET_LANGUAGES();
                })
                .catch(error => { console.log(error); })
        },
        CHANGE_LANGUAGE(data){                       
            api.put('http://localhost/api/auth/language/' + data.id, data)
                .then((res) => {
                })
                .catch(error => { console.log(error); })
        },
        GET_LANGUAGE(data){
            this.language = data;
        },
        GET_LANGUAGES(){
            api.get('http://localhost/api/auth/language')
                .then(res => {                    
                    this.languages = res.data;
                })
                .catch(error => { console.log(error); })
        }, 
        CREATE_LANGUAGE(data){            
            api.post('http://localhost/api/auth/language', data)
                .then((res) => {                    
                    this.GET_LANGUAGES();
                })
                .catch(error => { console.log(error); })
        },

        DELETE_AGEGROUP(data){                       
            api.post('http://localhost/api/auth/agegroup/' + data, {_method: 'DELETE'})
                .then((res) => {
                    this.GET_AGEGROUPS();
                })
                .catch(error => { console.log(error); })
        },
        CHANGE_AGEGROUP( data){                       
            api.put('http://localhost/api/auth/agegroup/' + data.id, data)
                .then((res) => {
                })
                .catch(error => { console.log(error); })
        },
        GET_AGEGROUP(data){
            this.agegroup = data;
        },
        GET_AGEGROUPS(){
            api.get('http://localhost/api/auth/agegroup')
                .then(res => {                    
                    this.agegroups = res.data;
                })
                .catch(error => { console.log(error); })
        }, 
        CREATE_AGEGROUP(data){            
            api.post('http://localhost/api/auth/agegroup', data)
                .then((res) => {                    
                    this.GET_AGEGROUPS();
                })
                .catch(error => { console.log(error); })
        },        

        DELETE_BABYSITTINGDUTIE(data){                       
            api.post('http://localhost/api/auth/babysittingdutie/' + data, {_method: 'DELETE'})
                .then((res) => {
                    this.GET_BABYSITTINGDUTIES();
                })
                .catch(error => { console.log(error); })
        },
        CHANGE_BABYSITTINGDUTIE( data){                       
            api.put('http://localhost/api/auth/babysittingdutie/' + data.id, data)
                .then((res) => {
                })
                .catch(error => { console.log(error); })
        },
        GET_BABYSITTINGDUTIE(data){
            this.babysittingdutie = data;
        },
        GET_BABYSITTINGDUTIES(){
            api.get('http://localhost/api/auth/babysittingdutie')
                .then(res => {                    
                    this.babysittingduties = res.data;
                })
                .catch(error => { console.log(error); })
        }, 
        CREATE_BABYSITTINGDUTIE(data){            
            api.post('http://localhost/api/auth/babysittingdutie', data)
                .then((res) => {                    
                    this.GET_BABYSITTINGDUTIES();
                })
                .catch(error => { console.log(error); })
        },        

        DELETE_DIAGNOSE(data){                       
            api.post('http://localhost/api/auth/diagnose/' + data, {_method: 'DELETE'})
                .then((res) => {
                    this.GET_DIAGNOSES();
                })
                .catch(error => { console.log(error); })
        },
        CHANGE_DIAGNOSE( data){                       
            api.put('http://localhost/api/auth/diagnose/' + data.id, data)
                .then((res) => {
                })
                .catch(error => { console.log(error); })
        },
        GET_DIAGNOSE(data){
            this.diagnose = data;
        },
        GET_DIAGNOSES(){
            api.get('http://localhost/api/auth/diagnose')
                .then(res => {                    
                    this.diagnoses = res.data;
                })
                .catch(error => { console.log(error); })
        }, 
        CREATE_DIAGNOSE(data){            
            api.post('http://localhost/api/auth/diagnose', data)
                .then((res) => {
                    this.GET_DIAGNOSES();
                })
                .catch(error => { console.log(error); })
        },

        DELETE_EDUCATION(data){                       
            api.post('http://localhost/api/auth/education/' + data, {_method: 'DELETE'})
                .then((res) => {
                    this.GET_EDUCATIONS();
                })
                .catch(error => { console.log(error); })
        },
        CHANGE_EDUCATION( data){                       
            api.put('http://localhost/api/auth/education/' + data.id, data)
                .then((res) => {
                })
                .catch(error => { console.log(error); })
        },
        GET_EDUCATION(data){
            this.education = data;
        },
        GET_EDUCATIONS(){
            api.get('http://localhost/api/auth/education')
                .then(res => {                    
                    this.educations = res.data;
                })
                .catch(error => { console.log(error); })
        }, 
        CREATE_EDUCATION(data){            
            api.post('http://localhost/api/auth/education', data)
                .then((res) => {                    
                    this.GET_EDUCATIONS();
                })
                .catch(error => { console.log(error); })
        },        

        DELETE_EXPERIENCE(data){                       
            api.post('http://localhost/api/auth/experience/' + data, {_method: 'DELETE'})
                .then((res) => {
                    this.GET_EXPERIENCES();
                })
                .catch(error => { console.log(error); })
        },
        CHANGE_EXPERIENCE( data){                       
            api.put('http://localhost/api/auth/experience/' + data.id, data)
                .then((res) => {
                })
                .catch(error => { console.log(error); })
        },
        GET_EXPERIENCE(data){
            this.experience = data;
        },
        GET_EXPERIENCES(){
            api.get('http://localhost/api/auth/experience')
                .then(res => {                    
                    this.experiences = res.data;
                })
                .catch(error => { console.log(error); })
        }, 
        CREATE_EXPERIENCE(data){            
            api.post('http://localhost/api/auth/experience', data)
                .then((res) => {                    
                    this.GET_EXPERIENCES();
                })
                .catch(error => { console.log(error); })
        },

        DELETE_HOURLYPAYMENT(data){                       
            api.post('http://localhost/api/auth/hourlypayment/' + data, {_method: 'DELETE'})
                .then((res) => {
                    this.GET_HOURLYPAYMENTS();
                })
                .catch(error => { console.log(error); })
        },
        CHANGE_HOURLYPAYMENT( data){                       
            api.put('http://localhost/api/auth/hourlypayment/' + data.id, data)
                .then((res) => {
                })
                .catch(error => { console.log(error); })
        },
        GET_HOURLYPAYMENT(data){
            this.hourlypayment = data;
        },
        GET_HOURLYPAYMENTS(){
            api.get('http://localhost/api/auth/hourlypayment')
                .then(res => {                    
                    this.hourlypayments = res.data;
                })
                .catch(error => { console.log(error); })
        }, 
        CREATE_HOURLYPAYMENT(data){            
            api.post('http://localhost/api/auth/hourlypayment', data)
                .then((res) => {                    
                    this.GET_HOURLYPAYMENTS();
                })
                .catch(error => { console.log(error); })
        },

        DELETE_HOUSEKEEPERDUTIE(data){                       
            api.post('http://localhost/api/auth/housekeeperdutie/' + data, {_method: 'DELETE'})
                .then((res) => {
                    this.GET_HOUSEKEEPERDUTIES();
                })
                .catch(error => { console.log(error); })
        },
        CHANGE_HOUSEKEEPERDUTIE( data){                       
            api.put('http://localhost/api/auth/housekeeperdutie/' + data.id, data)
                .then((res) => {
                })
                .catch(error => { console.log(error); })
        },
        GET_HOUSEKEEPERDUTIE(data){
            this.housekeeperdutie = data;
        },
        GET_HOUSEKEEPERDUTIES(){
            api.get('http://localhost/api/auth/housekeeperdutie')
                .then(res => {                    
                    this.housekeeperduties = res.data;
                })
                .catch(error => { console.log(error); })
        }, 
        CREATE_HOUSEKEEPERDUTIE(data){            
            api.post('http://localhost/api/auth/housekeeperdutie', data)
                .then((res) => {                    
                    this.GET_HOUSEKEEPERDUTIES();
                })
                .catch(error => { console.log(error); })
        },

        DELETE_HOUSEKEEPERPREFERENCE(data){                       
            api.post('http://localhost/api/auth/housekeeperpreference/' + data, {_method: 'DELETE'})
                .then((res) => {
                    this.GET_HOUSEKEEPERPREFERENCES();
                })
                .catch(error => { console.log(error); })
        },
        CHANGE_HOUSEKEEPERPREFERENCE( data){                       
            api.put('http://localhost/api/auth/housekeeperpreference/' + data.id, data)
                .then((res) => {
                })
                .catch(error => { console.log(error); })
        },
        GET_HOUSEKEEPERPREFERENCE(data){
            this.housekeeperpreference = data;
        },
        GET_HOUSEKEEPERPREFERENCES(){
            api.get('http://localhost/api/auth/housekeeperpreference')
                .then(res => {                    
                    this.housekeeperpreferences = res.data;
                })
                .catch(error => { console.log(error); })
        }, 
        CREATE_HOUSEKEEPERPREFERENCE(data){            
            api.post('http://localhost/api/auth/housekeeperpreference', data)
                .then((res) => {                    
                    this.GET_HOUSEKEEPERPREFERENCES();
                })
                .catch(error => { console.log(error); })
        },

        DELETE_HOUSEKEEPERTYPEOFWORK(data){                       
            api.post('http://localhost/api/auth/housekeepertypeofwork/' + data, {_method: 'DELETE'})
                .then((res) => {
                    this.GET_HOUSEKEEPERTYPEOFWORKS();
                })
                .catch(error => { console.log(error); })
        },
        CHANGE_HOUSEKEEPERTYPEOFWORK( data){                       
            api.put('http://localhost/api/auth/housekeepertypeofwork/' + data.id, data)
                .then((res) => {
                })
                .catch(error => { console.log(error); })
        },
        GET_HOUSEKEEPERTYPEOFWORK(data){
            this.housekeepertypeofwork = data;
        },
        GET_HOUSEKEEPERTYPEOFWORKS(){
            api.get('http://localhost/api/auth/housekeepertypeofwork')
                .then(res => {                    
                    this.housekeepertypeofworks = res.data;
                })
                .catch(error => { console.log(error); })
        }, 
        CREATE_HOUSEKEEPERTYPEOFWORK(data){            
            api.post('http://localhost/api/auth/housekeepertypeofwork', data)
                .then((res) => {                    
                    this.GET_HOUSEKEEPERTYPEOFWORKS();
                })
                .catch(error => { console.log(error); })
        },

        DELETE_MONTHLYPAYMENT(data){                       
            api.post('http://localhost/api/auth/monthlypayment/' + data, {_method: 'DELETE'})
                .then((res) => {
                    this.GET_MONTHLYPAYMENTS();
                })
                .catch(error => { console.log(error); })
        },
        CHANGE_MONTHLYPAYMENT( data){                       
            api.put('http://localhost/api/auth/monthlypayment/' + data.id, data)
                .then((res) => {
                })
                .catch(error => { console.log(error); })
        },
        GET_MONTHLYPAYMENT(data){
            this.monthlypayment = data;
        },
        GET_MONTHLYPAYMENTS(){
            api.get('http://localhost/api/auth/monthlypayment')
                .then(res => {                    
                    this.monthlypayments = res.data;
                })
                .catch(error => { console.log(error); })
        }, 
        CREATE_MONTHLYPAYMENT(data){            
            api.post('http://localhost/api/auth/monthlypayment', data)
                .then((res) => {                    
                    this.GET_MONTHLYPAYMENTS();
                })
                .catch(error => { console.log(error); })
        },

        DELETE_NURSEDUTIE(data){                       
            api.post('http://localhost/api/auth/nursedutie/' + data, {_method: 'DELETE'})
                .then((res) => {
                    this.GET_NURSEDUTIES();
                })
                .catch(error => { console.log(error); })
        },
        CHANGE_NURSEDUTIE( data){                       
            api.put('http://localhost/api/auth/nursedutie/' + data.id, data)
                .then((res) => {
                })
                .catch(error => { console.log(error); })
        },
        GET_NURSEDUTIE(data){
            this.nursedutie = data;
        },
        GET_NURSEDUTIES(){
            api.get('http://localhost/api/auth/nursedutie')
                .then(res => {                    
                    this.nurseduties = res.data;
                })
                .catch(error => { console.log(error); })
        }, 
        CREATE_NURSEDUTIE(data){            
            api.post('http://localhost/api/auth/nursedutie', data)
                .then((res) => {                    
                    this.GET_NURSEDUTIES();
                })
                .catch(error => { console.log(error); })
        },

        DELETE_NURSETYPEOFWORK(data){                       
            api.post('http://localhost/api/auth/nursetypeofwork/' + data, {_method: 'DELETE'})
                .then((res) => {
                    this.GET_NURSETYPEOFWORKS();
                })
                .catch(error => { console.log(error); })
        },
        CHANGE_NURSETYPEOFWORK( data){                       
            api.put('http://localhost/api/auth/nursetypeofwork/' + data.id, data)
                .then((res) => {
                })
                .catch(error => { console.log(error); })
        },
        GET_NURSETYPEOFWORK(data){
            this.nursetypeofwork = data;
        },
        GET_NURSETYPEOFWORKS(){
            api.get('http://localhost/api/auth/nursetypeofwork')
                .then(res => {                    
                    this.nursetypeofworks = res.data;
                })
                .catch(error => { console.log(error); })
        }, 
        CREATE_NURSETYPEOFWORK(data){            
            api.post('http://localhost/api/auth/nursetypeofwork', data)
                .then((res) => {                    
                    this.GET_NURSETYPEOFWORKS();
                })
                .catch(error => { console.log(error); })
        },

        DELETE_TYPEOFWORK(data){                       
            api.post('http://localhost/api/auth/typeofwork/' + data, {_method: 'DELETE'})
                .then((res) => {
                    this.GET_TYPEOFWORKS();
                })
                .catch(error => { console.log(error); })
        },
        CHANGE_TYPEOFWORK( data){                       
            api.put('http://localhost/api/auth/typeofwork/' + data.id, data)
                .then((res) => {
                })
                .catch(error => { console.log(error); })
        },
        GET_TYPEOFWORK(data){
            this.typeofwork = data;
        },
        GET_TYPEOFWORKS(){
            api.get('http://localhost/api/auth/typeofwork')
                .then(res => {                    
                    this.typeofworks = res.data;
                })
                .catch(error => { console.log(error); })
        }, 
        CREATE_TYPEOFWORK(data){            
            api.post('http://localhost/api/auth/typeofwork', data)
                .then((res) => {                    
                    this.GET_TYPEOFWORKS();
                })
                .catch(error => { console.log(error); })
        },

        DELETE_WORKPERIOD(data){                       
            api.post('http://localhost/api/auth/workperiod/' + data, {_method: 'DELETE'})
                .then((res) => {
                    this.GET_WORKPERIODS();
                })
                .catch(error => { console.log(error); })
        },
        CHANGE_WORKPERIOD( data){                       
            api.put('http://localhost/api/auth/workperiod/' + data.id, data)
                .then((res) => {
                })
                .catch(error => { console.log(error); })
        },
        GET_WORKPERIOD(data){
            this.workperiod = data;
        },
        GET_WORKPERIODS(){
            api.get('http://localhost/api/auth/workperiod')
                .then(res => {                    
                    this.workperiods = res.data;
                })
                .catch(error => { console.log(error); })
        }, 
        CREATE_WORKPERIOD(data){            
            api.post('http://localhost/api/auth/workperiod', data)
                .then((res) => {                    
                    this.GET_WORKPERIODS();
                })
                .catch(error => { console.log(error); })
        },

        DELETE_CHILDREN(data){                       
            api.post('http://localhost/api/auth/children/' + data, {_method: 'DELETE'})
                .then((res) => {
                    this.GET_CHILDRENS();                 
                })
                .catch(error => { console.log(error); })
        },
        CHANGE_CHILDREN(data){                       
            api.put('http://localhost/api/auth/children/' + data.id, data)
                .then((res) => {                  
                })
                .catch(error => { console.log(error); })
        },
        GET_CHILDREN(data){
            this.children = data;
        },
        GET_CHILDRENS(){
            api.get('http://localhost/api/auth/children')
                .then(res => {                    
                    this.childrens = res.data;
                })
                .catch(error => { console.log(error); })
        }, 
        CREATE_CHILDREN(data){            
            api.post('http://localhost/api/auth/children', data)
                .then((res) => {                    
                    this.GET_CHILDRENS();
                })
                .catch(error => { console.log(error); })
        },

        DELETE_CITY(data){                       
            axios.post("http://localhost/api/city/" + data, {_method: 'DELETE'})
                .then((res) => {
                    this.GET_CITYS();            
                })
                .catch(error => { console.log(error); })
        },
        CHANGE_CITY(data){                                   
            axios.put("http://localhost/api/city/" + data.id, data)
                .then((res) => {                                
                })
                .catch(error => { console.log(error); })
        },
        GET_CITY(data){            
            this.city = data;
        },  
        GET_CITYS() {            
            axios.get("http://localhost/api/city")            
                .then(res => {                    
                    this.citys = res.data;                   
                })
                .catch(error => { console.log(error); })
        },
        CREATE_CITY(data){            
            axios.post("http://localhost/api/city", data)
                .then((res) => {                    
                    this.GET_CITYS();                    
                })
                .catch(error => { console.log(error); })
        },
    },
})
