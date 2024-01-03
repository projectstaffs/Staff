import { defineStore } from 'pinia';
import api from "../assets/api";
import axios from 'axios';

export const useViewsStore = defineStore('views', {
    state: () => {
        return {
            clientBaby: {}, clientBabyitem: {}, clientBabyitemUser: {},
            clientNurse: {}, clientNurseitem: {}, clientNurseitemUser: {},
            clientKeeper: {}, clientKeeperitem: {}, clientKeeperitemUser: {},
            workerBaby: {}, workerBabyitem: {}, workerBabyitemUser: {},
            workerNurse: {}, workerNurseitem: {}, workerNurseitemUser: {},
            workerKeeper: {}, workerKeeperitem: {}, workerKeeperitemUser: {},
            currentWBPage: 1, currentWNPage: 1, currentWKPage: 1,
            currentCBPage: 1, currentCNPage: 1, currentCKPage: 1,
        }
    },

    actions: {
        GET_CLIENTBABY(){   
            api.get('api/auth/c_baby')
                .then(res => {
                    this.clientBaby = res.data.data;
                })
                .catch(error => { console.log(error); })
        },
        GET_CLIENTBABY_ITEM(){   
            this.clientBabyitem = JSON.parse(localStorage.clientBabyitem);
            this.clientBabyitemUser = JSON.parse(localStorage.clientBabyitemUser);
        },
        SEARCH_CLIENTBABY(data){            
            api.get('api/auth/c_baby')
                .then(res => {
                    let result = [];
                    res.data.data.forEach((item) => { 
                        let count = 0;
                        if(item.User.city_id === data.city) { count++; } 
                        if(item.employment_id === data.employment) { count++; }
                        item.Joboptions.forEach((el) => {
                            if(el.id === data.joboption) {count++;}
                        })                             
                        if(count === 3) { result.push(item); }                                                               
                    })        
                    this.clientBaby = result;
                    this.currentCBPage = 1;
                })
                .catch(error => { console.log(error); })    
        },
        ADD_CLIENTBABY(data){   
            api.post('api/auth/w_c_baby', data)
                .then(res => {                                    
                    console.log(res.data);
                })
                .catch(error => { console.log(error); })
        },
        WATCH_CLIENTBABY(data){
            api.get('api/auth/c_baby')
                .then(ankets => {
                    let result = [];
                    api.get('api/auth/w_c_baby', {params: {data}})
                        .then(watch => {
                            ankets.data.data.forEach((itemAnketa) => {                                
                                watch.data.forEach((el) => {
                                    if(el.anketa_id === itemAnketa.id) { result.push(itemAnketa); }
                                })
                            })
                            this.clientBaby = result;
                            this.currentCBPage = 1;
                        })
                        .catch(error => { console.log(error); })
                })
                .catch(error => { console.log(error); })   
                
        },

        GET_CLIENTNURSE(){   
            api.get('api/auth/c_nurse')
                .then(res => {                                    
                    this.clientNurse = res.data.data;
                })
                .catch(error => { console.log(error); })
        },
        GET_CLIENTNURSE_ITEM(){   
            this.clientNurseitem = JSON.parse(localStorage.clientNurseitem);
            this.clientNurseitemUser = JSON.parse(localStorage.clientNurseitemUser);
        },
        SEARCH_CLIENTNURSE(data){            
            api.get('api/auth/c_nurse')
                .then(res => {
                    let result = [];
                    res.data.data.forEach((item) => { 
                        let count = 0;
                        if(item.User.city_id === data.city) { count++; } 
                        if(item.employment_id === data.employment) { count++; }
                        item.Joboptions.forEach((el) => {
                            if(el.id === data.joboption) {count++;}
                        })                             
                        if(count === 3) { result.push(item); }                                                               
                    })        
                    this.clientNurse = result;
                    this.currentCNPage = 1;
                })
                .catch(error => { console.log(error); })    
        },
        ADD_CLIENTNURSE(data){   
            api.post('api/auth/w_c_nurse', data)
                .then(res => {                                    
                    console.log(res.data);
                })
                .catch(error => { console.log(error); })
        },
        WATCH_CLIENTNURSE(data){
            api.get('api/auth/c_nurse')
                .then(ankets => {
                    let result = [];
                    api.get('api/auth/w_c_nurse', {params: {data}})
                        .then(watch => {
                            ankets.data.data.forEach((itemAnketa) => {                                
                                watch.data.forEach((el) => {
                                    if(el.anketa_id === itemAnketa.id) { result.push(itemAnketa); }
                                })
                            })
                            this.clientNurse = result;
                            this.currentCNPage = 1;
                        })
                        .catch(error => { console.log(error); })
                })
                .catch(error => { console.log(error); })   
                
        },
        
        GET_CLIENTKEEPER(){   
            api.get('api/auth/c_keeper')
                .then(res => {                                    
                    this.clientKeeper = res.data.data;
                })
                .catch(error => { console.log(error); })
        },
        GET_CLIENTKEEPER_ITEM(){   
            this.clientKeeperitem = JSON.parse(localStorage.clientKeeperitem);
            this.clientKeeperitemUser = JSON.parse(localStorage.clientKeeperitemUser);
        },
        SEARCH_CLIENTKEEPER(data){            
            api.get('api/auth/c_keeper')
                .then(res => {
                    let result = [];
                    res.data.data.forEach((item) => { 
                        let count = 0;
                        if(item.User.city_id === data.city) { count++; } 
                        if(item.employment_id === data.employment) { count++; }
                        item.Joboptions.forEach((el) => {
                            if(el.id === data.joboption) {count++;}
                        })                             
                        if(count === 3) { result.push(item); }                                                               
                    })        
                    this.clientKeeper = result;
                    this.currentCKPage = 1;
                })
                .catch(error => { console.log(error); })    
        },
        ADD_CLIENTKEEPER(data){   
            api.post('api/auth/w_c_keeper', data)
                .then(res => {                                    
                    console.log(res.data);
                })
                .catch(error => { console.log(error); })
        },
        WATCH_CLIENTKEEPER(data){
            api.get('api/auth/c_keeper')
                .then(ankets => {
                    let result = [];
                    api.get('api/auth/w_c_keeper', {params: {data}})
                        .then(watch => {
                            ankets.data.data.forEach((itemAnketa) => {                                
                                watch.data.forEach((el) => {
                                    if(el.anketa_id === itemAnketa.id) { result.push(itemAnketa); }
                                })
                            })
                            this.clientKeeper = result;
                            this.currentCKPage = 1;
                        })
                        .catch(error => { console.log(error); })
                })
                .catch(error => { console.log(error); })   
                
        },

        GET_WORKERBABY(){   
            api.get('api/auth/w_baby')
                .then(res => {                                    
                    this.workerBaby = res.data.data;
                })
                .catch(error => { console.log(error); })
        },
        GET_WORKERBABY_ITEM(){   
            this.workerBabyitem = JSON.parse(localStorage.workerBabyitem);
            this.workerBabyitemUser = JSON.parse(localStorage.workerBabyitemUser);
        },
        SEARCH_WORKERBABY(data){            
            api.get('api/auth/w_baby')
                .then(res => {
                    let result = [];
                    res.data.data.forEach((item) => { 
                        let count = 0;
                        if(item.User.city_id === data.city) { count++; } 
                        if(item.employment_id === data.employment) { count++; }
                        item.Typeworks.forEach((el) => {
                            if(el.id === data.typeofwork) {count++;}
                        })                             
                        if(count === 3) { result.push(item); }                                                               
                    })        
                    this.workerBaby = result;
                    this.currentWBPage = 1;
                })
                .catch(error => { console.log(error); })    
        },
        ADD_WORKERBABY(data){   
            api.post('api/auth/w_w_baby', data)
                .then(res => {                                    
                    console.log(res.data);
                })
                .catch(error => { console.log(error); })
        },
        WATCH_WORKERBABY(data){
            api.get('api/auth/w_baby')
                .then(ankets => {
                    let result = [];
                    api.get('api/auth/w_w_baby', {params: {data}})
                        .then(watch => {
                            ankets.data.data.forEach((itemAnketa) => {                                
                                watch.data.forEach((el) => {
                                    if(el.anketa_id === itemAnketa.id) { result.push(itemAnketa); }
                                })
                            })
                            this.workerBaby = result;
                            this.currentWBPage = 1;
                        })
                        .catch(error => { console.log(error); })
                })
                .catch(error => { console.log(error); })
            },

        GET_WORKERNURSE(){   
            api.get('api/auth/w_nurse')
                .then(res => {                                    
                    this.workerNurse = res.data.data;
                })
                .catch(error => { console.log(error); })
        },
        GET_WORKERNURSE_ITEM(){   
            this.workerNurseitem = JSON.parse(localStorage.workerNurseitem);
            this.workerNurseitemUser = JSON.parse(localStorage.workerNurseitemUser);
        },
        SEARCH_WORKERNURSE(data){            
            api.get('api/auth/w_nurse')
                .then(res => {
                    let result = [];
                    res.data.data.forEach((item) => { 
                        let count = 0;
                        if(item.User.city_id === data.city) { count++; } 
                        if(item.employment_id === data.employment) { count++; }
                        item.Typeworks.forEach((el) => {
                            if(el.id === data.typeofwork) {count++;}
                        })                             
                        if(count === 3) { result.push(item); }                                                               
                    })        
                    this.workerNurse = result;
                    this.currentWNPage = 1;
                })
                .catch(error => { console.log(error); })    
        },
        ADD_WORKERNURSE(data){   
            api.post('api/auth/w_w_nurse', data)
                .then(res => {                                    
                    console.log(res.data);
                })
                .catch(error => { console.log(error); })
        },
        WATCH_WORKERNURSE(data){
            api.get('api/auth/w_nurse')
                .then(ankets => {
                    let result = [];
                    api.get('api/auth/w_w_nurse', {params: {data}})
                        .then(watch => {
                            ankets.data.data.forEach((itemAnketa) => {                                
                                watch.data.forEach((el) => {
                                    if(el.anketa_id === itemAnketa.id) { result.push(itemAnketa); }
                                })
                            })
                            this.workerNurse = result;
                            this.currentWNPage = 1;
                        })
                        .catch(error => { console.log(error); })
                })
                .catch(error => { console.log(error); })   
                
        },

        GET_WORKERKEEPER(){   
            api.get('api/auth/w_keeper')
                .then(res => {                                    
                    this.workerKeeper = res.data.data;
                })
                .catch(error => { console.log(error); })
        },
        GET_WORKERKEEPER_ITEM(){   
            this.workerKeeperitem = JSON.parse(localStorage.workerKeeperitem);
            this.workerKeeperitemUser = JSON.parse(localStorage.workerKeeperitemUser);
        },
        SEARCH_WORKERKEEPER(data){            
            api.get('api/auth/w_keeper')
                .then(res => {
                    let result = [];
                    res.data.data.forEach((item) => { 
                        let count = 0;
                        if(item.User.city_id === data.city) { count++; } 
                        if(item.employment_id === data.employment) { count++; }
                        item.Typeworks.forEach((el) => {
                            if(el.id === data.typeofwork) {count++;}
                        })                             
                        if(count === 3) { result.push(item); }                                                               
                    })        
                    this.workerKeeper = result;
                    this.currentWKPage = 1;
                })
                .catch(error => { console.log(error); })    
        },
        ADD_WORKERKEEPER(data){   
            api.post('api/auth/w_w_keeper', data)
                .then(res => {                                    
                    console.log(res.data);
                })
                .catch(error => { console.log(error); })
        },
        WATCH_WORKERKEEPER(data){
            api.get('api/auth/w_keeper')
                .then(ankets => {
                    let result = [];
                    api.get('api/auth/w_w_keeper', {params: {data}})
                        .then(watch => {
                            ankets.data.data.forEach((itemAnketa) => {                                
                                watch.data.forEach((el) => {
                                    if(el.anketa_id === itemAnketa.id) { result.push(itemAnketa); }
                                })
                            })
                            this.workerKeeper = result;
                            this.currentWKPage = 1;
                        })
                        .catch(error => { console.log(error); })
                })
                .catch(error => { console.log(error); })   
                
        },
    }
})