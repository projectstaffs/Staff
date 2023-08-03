import { defineStore } from 'pinia';
import axios from 'axios';
import api from "../assets/api";

export const useDataStore = defineStore('variables', {    
    state: () => {
        return {
            languages: {}, language: {},
            agegroups: {}, agegroup: {},
            childrens: {}, children: {},
            alcohols: {}, alcohol: {},
            babysittingduties: {}, babysittingdutie: {},
            citys: {}, city: {},
            countrys: {}, country: {},
            criminals: {}, criminal: {},
            diagnoses: {}, diagnose: {},              
            educations: {}, education: {},
            employments: {}, employment: {},
            experiences: {}, experience: {},
            hourlypayments: {}, hourlypayment: {},
            housekeeperduties: {}, housekeeperdutie: {},
            housekeeperpreferences: {}, housekeeperpreference: {},
            housekeepertypeofworks: {}, housekeepertypeofwork: {},
            joboptions: {}, joboption: {},
            monthlypayments: {}, monthlypayment: {},
            movings: {}, moving: {},
            nurseduties: {}, nursedutie: {},
            nursetypeofworks: {}, nursetypeofwork: {},
            nursingskills: {}, nursingskill: {},
            recommendations: {}, recommendation: {},
            religions: {}, religion: {},
            schedules: {}, schedule: {},
            smokings: {}, smoking: {},
            statuss: {}, status: {},
            typeofworks: {}, typeofwork: {},
            worklocations: {}, worklocation: {},
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

        DELETE_ALCOHOL(data){                       
            axios.post('http://localhost/api/alcohol/' + data, {_method: 'DELETE'})
                .then((res) => {
                    this.GET_ALCOHOLS();
                })
                .catch(error => { console.log(error); })
        },
        CHANGE_ALCOHOL( data){                       
            axios.put('http://localhost/api/alcohol/' + data.id, data)
                .then((res) => {
                })
                .catch(error => { console.log(error); })
        },
        GET_ALCOHOL(data){
            this.alcohol = data;
        },
        GET_ALCOHOLS(){
            axios.get('http://localhost/api/alcohol')
                .then(res => {                    
                    this.alcohols = res.data;
                })
                .catch(error => { console.log(error); })
        }, 
        CREATE_ALCOHOL(data){            
            axios.post('http://localhost/api/alcohol', data)
                .then((res) => {                    
                    this.GET_ALCOHOLS();
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

        DELETE_CRIMINAL(data){                       
            axios.post('http://localhost/api/criminal/' + data, {_method: 'DELETE'})
                .then((res) => {
                    this.GET_CRIMINALS();
                })
                .catch(error => { console.log(error); })
        },
        CHANGE_CRIMINAL( data){                       
            axios.put('http://localhost/api/criminal/' + data.id, data)
                .then((res) => {
                })
                .catch(error => { console.log(error); })
        },
        GET_CRIMINAL(data){
            this.criminal = data;
        },
        GET_CRIMINALS(){
            axios.get('http://localhost/api/criminal')
                .then(res => {                    
                    this.criminals = res.data;
                })
                .catch(error => { console.log(error); })
        }, 
        CREATE_CRIMINAL(data){            
            axios.post('http://localhost/api/criminal', data)
                .then((res) => {                    
                    this.GET_CRIMINALS();
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

        DELETE_EMPLOYMENT(data){                       
            api.post('http://localhost/api/auth/employment/' + data, {_method: 'DELETE'})
                .then((res) => {
                    this.GET_EMPLOYMENTS();
                })
                .catch(error => { console.log(error); })
        },
        CHANGE_EMPLOYMENT( data){                       
            api.put('http://localhost/api/auth/employment/' + data.id, data)
                .then((res) => {
                })
                .catch(error => { console.log(error); })
        },
        GET_EMPLOYMENT(data){
            this.employment = data;
        },
        GET_EMPLOYMENTS(){
            api.get('http://localhost/api/auth/employment')
                .then(res => {                    
                    this.employments = res.data;
                })
                .catch(error => { console.log(error); })
        }, 
        CREATE_EMPLOYMENT(data){            
            api.post('http://localhost/api/auth/employment', data)
                .then((res) => {                    
                    this.GET_EMPLOYMENTS();
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

        DELETE_JOBOPTION(data){                       
            api.post('http://localhost/api/auth/joboption/' + data, {_method: 'DELETE'})
                .then((res) => {
                    this.GET_JOBOPTIONS();
                })
                .catch(error => { console.log(error); })
        },
        CHANGE_JOBOPTION( data){                       
            api.put('http://localhost/api/auth/joboption/' + data.id, data)
                .then((res) => {
                })
                .catch(error => { console.log(error); })
        },
        GET_JOBOPTION(data){
            this.joboption = data;
        },
        GET_JOBOPTIONS(){
            api.get('http://localhost/api/auth/joboption')
                .then(res => {                    
                    this.joboptions = res.data;
                })
                .catch(error => { console.log(error); })
        }, 
        CREATE_JOBOPTION(data){            
            api.post('http://localhost/api/auth/joboption', data)
                .then((res) => {                    
                    this.GET_JOBOPTIONS();
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

        DELETE_MOVING(data){                       
            axios.post('http://localhost/api/moving/' + data, {_method: 'DELETE'})
                .then((res) => {
                    this.GET_MOVINGS();
                })
                .catch(error => { console.log(error); })
        },
        CHANGE_MOVING( data){                       
            axios.put('http://localhost/api/moving/' + data.id, data)
                .then((res) => {
                })
                .catch(error => { console.log(error); })
        },
        GET_MOVING(data){
            this.moving = data;
        },
        GET_MOVINGS(){
            axios.get('http://localhost/api/moving')
                .then(res => {                    
                    this.movings = res.data;
                })
                .catch(error => { console.log(error); })
        }, 
        CREATE_MOVING(data){            
            axios.post('http://localhost/api/moving', data)
                .then((res) => {                    
                    this.GET_MOVINGS();
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

        DELETE_NURSINGSKILL(data){                       
            api.post('http://localhost/api/auth/nursingskill/' + data, {_method: 'DELETE'})
                .then((res) => {
                    this.GET_NURSINGSKILLS();
                })
                .catch(error => { console.log(error); })
        },
        CHANGE_NURSINGSKILL( data){                       
            api.put('http://localhost/api/auth/nursingskill/' + data.id, data)
                .then((res) => {
                })
                .catch(error => { console.log(error); })
        },
        GET_NURSINGSKILL(data){
            this.nursingskill = data;
        },
        GET_NURSINGSKILLS(){
            api.get('http://localhost/api/auth/nursingskill')
                .then(res => {                    
                    this.nursingskills = res.data;
                })
                .catch(error => { console.log(error); })
        }, 
        CREATE_NURSINGSKILL(data){            
            api.post('http://localhost/api/auth/nursingskill', data)
                .then((res) => {                    
                    this.GET_NURSINGSKILLS();
                })
                .catch(error => { console.log(error); })
        },

        DELETE_RECOMMENDATION(data){                       
            api.post('http://localhost/api/auth/recommendation/' + data, {_method: 'DELETE'})
                .then((res) => {
                    this.GET_RECOMMENDATIONS();
                })
                .catch(error => { console.log(error); })
        },
        CHANGE_RECOMMENDATION( data){                       
            api.put('http://localhost/api/auth/recommendation/' + data.id, data)
                .then((res) => {
                })
                .catch(error => { console.log(error); })
        },
        GET_RECOMMENDATION(data){
            this.recommendation = data;
        },
        GET_RECOMMENDATIONS(){
            api.get('http://localhost/api/auth/recommendation')
                .then(res => {                    
                    this.recommendations = res.data;
                })
                .catch(error => { console.log(error); })
        }, 
        CREATE_RECOMMENDATION(data){            
            api.post('http://localhost/api/auth/recommendation', data)
                .then((res) => {                    
                    this.GET_RECOMMENDATIONS();
                })
                .catch(error => { console.log(error); })
        },

        DELETE_RELIGION(data){                       
            axios.post('http://localhost/api/religion/' + data, {_method: 'DELETE'})
                .then((res) => {
                    this.GET_RELIGIONS();
                })
                .catch(error => { console.log(error); })
        },
        CHANGE_RELIGION( data){                       
            axios.put('http://localhost/api/religion/' + data.id, data)
                .then((res) => {
                })
                .catch(error => { console.log(error); })
        },
        GET_RELIGION(data){
            this.religion = data;
        },
        GET_RELIGIONS(){
            axios.get('http://localhost/api/religion')
                .then(res => {                    
                    this.religions = res.data;
                })
                .catch(error => { console.log(error); })
        }, 
        CREATE_RELIGION(data){            
            axios.post('http://localhost/api/religion', data)
                .then((res) => {                    
                    this.GET_RELIGIONS();
                })
                .catch(error => { console.log(error); })
        },

        DELETE_SCHEDULE(data){                       
            api.post('http://localhost/api/auth/schedule/' + data, {_method: 'DELETE'})
                .then((res) => {
                    this.GET_SCHEDULES();
                })
                .catch(error => { console.log(error); })
        },
        CHANGE_SCHEDULE( data){                       
            api.put('http://localhost/api/auth/schedule/' + data.id, data)
                .then((res) => {
                })
                .catch(error => { console.log(error); })
        },
        GET_SCHEDULE(data){
            this.schedule = data;
        },
        GET_SCHEDULES(){
            api.get('http://localhost/api/auth/schedule')
                .then(res => {                    
                    this.schedules = res.data;
                })
                .catch(error => { console.log(error); })
        }, 
        CREATE_SCHEDULE(data){            
            api.post('http://localhost/api/auth/schedule', data)
                .then((res) => {                    
                    this.GET_SCHEDULES();
                })
                .catch(error => { console.log(error); })
        },

        DELETE_SMOKING(data){            
            axios.post('http://localhost/api/smoking/' + data, {_method: 'DELETE'})
                .then((res) => {
                    this.GET_SMOKINGS();
                })
                .catch(error => { console.log(error); })
        },
        CHANGE_SMOKING( data){       
            axios.put('http://localhost/api/smoking/' + data.id, data)
                .then((res) => {
                })
                .catch(error => { console.log(error); })
        },
        GET_SMOKING(data){
            this.smoking = data;
        },
        GET_SMOKINGS(){        
            axios.get('http://localhost/api/smoking')
                .then(res => {                    
                    this.smokings = res.data;
                })
                .catch(error => { console.log(error); })
        }, 
        CREATE_SMOKING(data){        
            axios.post('http://localhost/api/smoking', data)
                .then((res) => {                    
                    this.GET_SMOKINGS();
                })
                .catch(error => { console.log(error); })
        },

        DELETE_STATUS(data){                       
            axios.post('http://localhost/api/status/' + data, {_method: 'DELETE'})
                .then((res) => {
                    this.GET_STATUSS();
                })
                .catch(error => { console.log(error); })
        },
        CHANGE_STATUS( data){                       
            axios.put('http://localhost/api/status/' + data.id, data)
                .then((res) => {
                })
                .catch(error => { console.log(error); })
        },
        GET_STATUS(data){
            this.status = data;
        },
        GET_STATUSS(){
            axios.get('http://localhost/api/status')
                .then(res => {                    
                    this.statuss = res.data;
                })
                .catch(error => { console.log(error); })
        }, 
        CREATE_STATUS(data){            
            axios.post('http://localhost/api/status', data)
                .then((res) => {                    
                    this.GET_STATUSS();
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

        DELETE_WORKLOCATION( data){                       
            api.post('http://localhost/api/auth/worklocation/' + data, {_method: 'DELETE'})
                .then((res) => {
                    this.GET_WORKLOCATIONS();
                })
                .catch(error => { console.log(error); })
        },
        CHANGE_WORKLOCATION( data){                       
            api.put('http://localhost/api/auth/worklocation/' + data.id, data)
                .then((res) => {
                })
                .catch(error => { console.log(error); })
        },
        GET_WORKLOCATION(data){
            this.worklocation = data;
        },
        GET_WORKLOCATIONS(){
            api.get('http://localhost/api/auth/worklocation')
                .then(res => {                    
                    this.worklocations = res.data;
                })
                .catch(error => { console.log(error); })
        }, 
        CREATE_WORKLOCATION(data){            
            api.post('http://localhost/api/auth/worklocation', data)
                .then((res) => {                    
                    this.GET_WORKLOCATIONS();
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
        
        DELETE_COUNTRY(data){                       
            axios.post("http://localhost/api/country/" + data, {_method: 'DELETE'})
                .then((res) => {
                    this.GET_COUNTRYS();            
                })
                .catch(error => { console.log(error); })
        },
        CHANGE_COUNTRY(data){                                   
            axios.put("http://localhost/api/country/" + data.id, data)
                .then((res) => {                                
                })
                .catch(error => { console.log(error); })
        },
        GET_COUNTRY(data){            
            this.country = data;
        },  
        GET_COUNTRYS() {            
            axios.get("http://localhost/api/country")            
                .then(res => {                    
                    this.countrys = res.data;                   
                })
                .catch(error => { console.log(error); })
        },
        CREATE_COUNTRY(data){            
            axios.post("http://localhost/api/country", data)
                .then((res) => {                    
                    this.GET_COUNTRYS();                    
                })
                .catch(error => { console.log(error); })
        },
    },
})
