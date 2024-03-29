import { defineStore } from 'pinia';
import axios from 'axios';
import api from "../assets/api";
import router from "../router";

export const useUserStore = defineStore('user', {    
    state: () => {
        return {         
            user: {},
            users: {}, 
            users_client: {},
            users_worker: {},
            token: '',
            currentCPage: 1, currentWPage: 1,
            url: 'https://househub.pp.ua/'                 
        }
    },
    actions: {  
        GET_TOKEN(){
            this.token = localStorage.access_token;
        },      
        CREATE_PHOTO(data){            
            api.post(this.url + 'api/auth/photo', data)
                .then((res) => {                                   
                    localStorage.user_image = res.data.preview_url;                    
                    router.push({name: "Account"});                 
                })
                .catch(error => { console.log(error); })
        },
        DELETE_PHOTO(data) {            
            api.post(this.url + 'api/auth/photo/' + data, {_method: 'DELETE'})
                .then((res) => { 
                    localStorage.user_image = '';                
                })
                .catch(error => { console.log(error); })
        },       
        
        LOGOUT_USER(){                                                 
            api.post(this.url + 'api/auth/logout')
                .then((res) => {                    
                    localStorage.removeItem('access_token');
                    localStorage.removeItem('user');                
                    localStorage.removeItem('user_image');
                    localStorage.removeItem('user_id');  
                    localStorage.removeItem('userID');
                    localStorage.removeItem('userVerify');                  
                    
                    this.user = {};                   
                    //router.push({name: "Login"}); 
                    window.location.href = this.url;                   
                })
                .catch(error => { console.log(error); })
        },
        GET_USER(){                                     
            this.user = JSON.parse(localStorage.user);
        },
        LOGIN_USER(data){                                                 
            axios.post(this.url + 'api/auth/login', data)
                .then((res) => {                
                    localStorage.access_token = res.data[0].original.access_token;
                    localStorage.user = JSON.stringify(res.data[1].original);               
                    localStorage.user_image = res.data[1].original.image;
                    localStorage.userID = res.data[1].original.id;                    
                    
                    this.token = res.data[0].original.access_token;
                    this.user = res.data[1].original;
                    router.push({name: "Users"});                    
                })
                .catch(error => { console.log(error); })
        },
        GET_USERS(){       
            axios.get(this.url + 'api/user/')
                .then((res) => {                                                 
                    this.users = res.data.data;                 
                })
                .catch(error => { console.log(error); })
        }, 
        GET_USERS_CLIENT(){       
            axios.get(this.url + 'api/user/')
                .then((res) => { 
                    res.data.data.forEach(obj => {
                        if(obj.role === 'Наниматель') {
                            this.users_client = Object.assign(this.users_client, { [obj.id]: obj });
                        }                        
                    });                
                })
                .catch(error => { console.log(error); })
        },
        GET_USERS_WORKER(){       
            axios.get(this.url + 'api/user/')
                .then((res) => {                                                 
                    res.data.data.forEach(obj => {
                        if(obj.role === 'Исполнитель') {                            
                            this.users_worker = Object.assign(this.users_worker, { [obj.id]: obj });
                        }                        
                    });                 
                })
                .catch(error => { console.log(error); })
        }, 
        BLOCK_USER_CLIENT(data){     
            api.post(this.url + 'api/auth/blockuser', data)
                .then((res) => {
                    this.GET_USERS_CLIENT();
                })
                .catch(error => { console.log(error); })
        }, 
        BLOCK_USER_WORKER(data){       
            api.post(this.url + 'api/auth/blockuser', data)
                .then((res) => { 
                    this.GET_USERS_WORKER();               
                })
                .catch(error => { console.log(error); })
        }, 
        RESTORE_USER_CLIENT(data){     
            api.post(this.url + 'api/auth/restoreuser', data)
                .then((res) => {
                    this.GET_USERS_CLIENT();
                })
                .catch(error => { console.log(error); })
        }, 
        RESTORE_USER_WORKER(data){     
            api.post(this.url + 'api/auth/restoreuser', data)
                .then((res) => {
                    this.GET_USERS_WORKER();
                })
                .catch(error => { console.log(error); })
        },           
    },
})
